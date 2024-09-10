<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Candidate;
use App\Models\Cart;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\JobPosting;
use App\Models\Product;
use App\Models\Purchased;
use App\Models\Salary;
use App\Models\Slide;
use App\Models\TypeEmployer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobPostingController extends Controller
{

    public function updateNote(Request $request, Application $application)
    {
        $validatedData = $request->validate([
            'note' => 'nullable|string',
        ]);

        $application->update([
            'note' => $validatedData['note'],
        ]);

        return redirect()->back()->with('success', 'Application updated successfully');
    }
    public function updateRating(Request $request, Application $application)
    {
        $validatedData = $request->validate([
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        $application->update([
            'rating' => $validatedData['rating'],
        ]);

        return redirect()->back()->with('success', 'Rating updated successfully');
    }

    public function index()
    {
        $employer = Auth::guard('employer')->user();
        $jobPostings = $employer->jobPostings;
        return view('job_postings.index', compact('jobPostings'));
    }

    public function dashboard()
    {
        $employer = Auth::guard('employer')->user();
        $activeJobPostingsCount = $employer->activeJobPostingsCount();
        $totalJobViews = $employer->totalJobViews();
        $totalApplications = $employer->totalApplications();
        $totalMessages = $employer->totalMessages();
        $applicationsLast30Days = $employer->jobPostings()
            ->with('applications')
            ->get()
            ->flatMap(function ($jobPosting) {
                return $jobPosting->applications;
            })
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d');
            })
            ->map(function ($applications) {
                return count($applications);
            });
        $dates = collect();
        for ($i = 0; $i < 30; $i++) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $dates[$date] = $applicationsLast30Days->get($date, 0);
        }

        $dates = $dates->reverse();
        $activeTypeEmployer = TypeEmployer::where('status', 'active')->get();
        $slides = Slide::where('status', 'active')->get();

        return view('job_postings.dashboard', compact('activeJobPostingsCount', 'totalJobViews', 'totalApplications', 'totalMessages', 'dates', 'activeTypeEmployer', 'employer', 'slides'));
    }



    public function create()
    {
        $employer = Auth::guard('employer')->user();

        if ($employer->level != 3) {
            return redirect()->back()->with('error', 'Bạn cần có cấp độ 3 để tạo việc làm.');
        }

        $email = $employer->email;
        $categories = Category::all();
        $cities = City::all();
        $company = $employer->company;
        $salaries = Salary::where('status', 'active')->get();
        return view('job_postings.create', compact('email', 'categories', 'company', 'cities', 'salaries'));
    }


    public function show(Request $request, $id)
    {
        $jobPosting = JobPosting::findOrFail($id);

        // Get filter and sort parameters from request
        $status = $request->input('status');
        $sort = $request->input('sort', 'created_at'); // Default sort by created_at

        $applications = $jobPosting->applications()
            ->when($status, function ($query, $status) {
                return $query->where('applications.status', $status);
            })
            ->when($sort === 'name', function ($query) {
                return $query->join('candidates', 'applications.candidate_id', '=', 'candidates.id')
                    ->orderBy('candidates.fullname_candidate', 'asc')
                    ->select('applications.*'); // Select only the columns from applications
            }, function ($query) use ($sort) {
                return $query->orderBy($sort, 'desc');
            })
            ->with('candidate') // Ensure candidate relationship is loaded for use in views
            ->get();

        return view('job_postings.show', compact('jobPosting', 'applications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'category' => 'required|array',
            'description' => 'required|string',
            'application_email_url' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email',
            'salary' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'rank' => 'nullable|string|max:255',
            'number_of_recruits' => 'nullable|integer',
            'sex' => 'nullable|string|max:255',
            'skills_required' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
            'city' => 'required|array',
            'salaries' => 'required|array|min:1',
            'salaries.*' => 'exists:salaries,id',
        ], [
            'title.required' => 'Job title is required.',
            'type.required' => 'Job type is required.',
            'category.required' => 'At least one category is required.',
            'description.required' => 'Job description is required.',
            'application_email_url.required' => 'Application email or URL is required.',
            'company_id.required' => 'Company is required.',
            'email.required' => 'Your email is required.',
            'email.email' => 'Please enter a valid email address.',
            'city.required' => 'At least one city is required.',
        ]);

        $jobPosting = new JobPosting();
        $jobPosting->employer_id = Auth::guard('employer')->id();
        $jobPosting->company_id = $request->company_id;
        $jobPosting->email = $request->email;
        $jobPosting->title = $request->title;
        $jobPosting->slug = $request->slug;
        $jobPosting->type = $request->type;
        $jobPosting->location = $request->location;
        $jobPosting->tags = $request->tags;
        $jobPosting->description = $request->description;
        $jobPosting->application_email_url = $request->application_email_url;
        $jobPosting->closing_date = $request->closing_date;
        $jobPosting->salary = $request->salary;
        $jobPosting->experience = $request->experience;
        $jobPosting->rank = $request->rank;
        $jobPosting->number_of_recruits = $request->number_of_recruits;
        $jobPosting->sex = $request->sex;
        $jobPosting->status = 1;
        $jobPosting->skills_required = $request->skills_required;
        $jobPosting->area = $request->area;
        // Proceed with saving the job posting


        // Handle logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('logo_company', 'public');
            $jobPosting->logo = $logoPath;
        }

        // Save job posting before syncing categories
        $jobPosting->save();

        // Sync categories
        $jobPosting->categories()->sync($request->category);
        $jobPosting->cities()->sync($request->city);
        $jobPosting->salaries()->sync($request->input('salaries'));

        // Redirect with success message
        return redirect()->route('job-postings.index')->with('success', 'Job posting created successfully!');
    }


    public function destroy($id)
    {
        $jobPosting = JobPosting::findOrFail($id);
        if ($jobPosting->employer_id !== Auth::guard('employer')->id()) {
            return redirect()->route('job-postings.index')->with('error', 'Unauthorized access.');
        }
        $jobPosting->delete();

        return redirect()->route('job-postings.index')->with('success', 'Job posting deleted successfully!');
    }




    public function edit($id)
    {
        $jobPosting = JobPosting::findOrFail($id);
        $selectedCities = explode(', ', $jobPosting->city);
        $cities = City::all();
        $selectedCities = $jobPosting->cities->pluck('id')->toArray();
        $jobPosting = JobPosting::findOrFail($id);
        $categories = Category::all();
        $selectedCategories = $jobPosting->categories->pluck('id')->toArray();
        $employer = Auth::guard('employer')->user();
        $company = $employer->company;
        $salaries = Salary::where('status', 'active')->get();
        return view('job_postings.edit', compact('jobPosting', 'selectedCities', 'cities', 'categories', 'selectedCategories', 'company', 'selectedCities', 'salaries'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'category' => 'required|array',
            'description' => 'required|string',
            'application_email_url' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email',
            'salary' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'rank' => 'nullable|string|max:255',
            'number_of_recruits' => 'nullable|integer',
            'sex' => 'nullable|string|max:255',
            'skills_required' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
            'salaries' => 'required|array|min:1', // Salaries are required and must be an array with at least one item
            'salaries.*' => 'exists:salaries,id', // Each item in the salaries array must exist in the salaries table
            'city' => 'required|array',
        ], [
            'title.required' => 'Job title is required.',
            'type.required' => 'Job type is required.',
            'category.required' => 'At least one category is required.',
            'description.required' => 'Job description is required.',
            'application_email_url.required' => 'Application email or URL is required.',
            'company_id.required' => 'Company is required.',
            'email.required' => 'Your email is required.',
            'email.email' => 'Please enter a valid email address.',
            'city.required' => 'At least one city is required.',
        ]);

        $jobPosting = JobPosting::findOrFail($id);
        $jobPosting->email = $request->email;
        $jobPosting->title = $request->title;
        $jobPosting->slug = $request->slug;
        $jobPosting->type = $request->type;
        $jobPosting->location = $request->location;
        $jobPosting->tags = $request->tags;
        $jobPosting->description = $request->description;
        $jobPosting->application_email_url = $request->application_email_url;
        $jobPosting->closing_date = $request->closing_date;
        $jobPosting->salary = $request->salary;
        $jobPosting->experience = $request->experience;
        $jobPosting->rank = $request->rank;
        $jobPosting->number_of_recruits = $request->number_of_recruits;
        $jobPosting->sex = $request->sex;
        $jobPosting->skills_required = $request->skills_required;
        $jobPosting->area = $request->area;
        $jobPosting->company_id = $request->company_id;

        $jobPosting->save();

        // Sync categories
        $jobPosting->categories()->sync($request->category);
        $jobPosting->cities()->sync($request->city);
        $jobPosting->salaries()->sync($request->input('salaries'));

        // Redirect with success message
        return redirect()->route('job-postings.index')->with('success', 'Job posting updated successfully!');
    }


    public function application_choose(Request $request)
    {
        $data = $request->all();
        $application = Application::find($data['id']);
        $application->status = $data['trangthai_val'];
        $application->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $application->save();
    }


    public function showCV($id)
    {
        $candidate = Candidate::with([
            'cvs',
            'educations',
            'experiences',
            'skills',
            'certificates',
            'projects',
            'activities',
            'hobbies',
            'advisers',
            'prizes'
        ])->findOrFail($id);

        return view('pages.overview-cv', compact('candidate'));
    }

    public function showCart()
    {
        // Lấy các carts có status = 1
        $carts = Cart::where('status', 1)->get();

        // Truyền dữ liệu carts sang view
        return view('job_postings.cart', compact('carts'));
    }

    public function buyGift(Request $request)
    {
        $employer = Auth::guard('employer')->user();
        $typeProduct = $request->get('type_product', 'all');
        if ($typeProduct === 'all') {
            $products = Product::active()->get();
        } else {
            $products = Product::active()->where('type_product', $typeProduct)->get();
        }

        // Trả về view với danh sách sản phẩm
        return view('job_postings.gift', compact('products', 'employer'));
    }
    // Hàm hiển thị chi tiết sản phẩm
    public function productDetail($id)
    {
        $employer = Auth::guard('employer')->user();
        // Tìm sản phẩm theo ID
        $product = Product::findOrFail($id);

        // Trả về view và truyền thông tin sản phẩm vào view
        return view('job_postings.gift_detail', compact('product', 'employer'));
    }
    public function purchaseProduct(Request $request, $id)
    {
        $employer = Auth::guard('employer')->user();
        $product = Product::findOrFail($id);

        // Check if the employer has reached the usage count limit
        $purchasesCount = Purchased::where('employer_id', $employer->id)
            ->where('product_id', $product->id)
            ->count();

        if ($purchasesCount >= $product->usage_count) {
            return redirect()->back()->with('error', 'Giới hạn lượt mua.');
        }

        // Check if the employer has enough Top Points
        if ($employer->top_point >= $product->top_point) {
            // Deduct the points
            $employer->top_point -= $product->top_point;
            $employer->save();

            // Save the purchase
            Purchased::create([
                'employer_id' => $employer->id,
                'product_id' => $product->id,
                'status' => 'success',
            ]);

            return redirect()->back()->with('success', 'Product purchased successfully!');
        } else {
            return redirect()->back()->with('error', 'Not enough Top Points to purchase this product.');
        }
    }



    public function loyalCustomer()
    {
        $employer = Auth::guard('employer')->user();
        $nextType = $employer->pointsToNextTypeEmployer();

        // Retrieve the list of purchases for the employer
        $purchases = Purchased::where('employer_id', $employer->id)->with('product')->get();

        return view('job_postings.reward', compact('employer', 'nextType', 'purchases'));
    }
}
