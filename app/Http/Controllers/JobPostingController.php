<?php

namespace App\Http\Controllers;

use App\DataTables\CandidateDataTable;
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
use App\Mail\ApplicationStatusUpdate;
use App\Models\Bank;
use App\Models\Notification;
use App\Models\SavedProfile;
use Illuminate\Support\Facades\Mail;


class JobPostingController extends Controller
{
    public function savedProfiles()
    {
        $employerId = Auth::guard('employer')->id();
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();


        $savedProfiles = SavedProfile::with('candidate')->where('employer_id', $employerId)->paginate(10);

        return view('job_postings.saved_profiles', compact('savedProfiles', 'recentMessagesCount', 'recentApplicationsCount'));
    }


    public function removeSavedProfile($candidateId)
    {
        $employerId = Auth::guard('employer')->id();

        // Xóa hồ sơ đã lưu
        SavedProfile::where('employer_id', $employerId)
            ->where('candidate_id', $candidateId)
            ->delete();

        return back()->with('success', 'Xóa hồ sơ thành công!');
    }

    public function saveProfile($candidateId)
    {
        $employerId = Auth::guard('employer')->id();

        // Kiểm tra nếu hồ sơ đã được lưu
        $exists = SavedProfile::where('employer_id', $employerId)
            ->where('candidate_id', $candidateId)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Hồ sơ này đã được lưu trước đó.');
        }

        // Lưu hồ sơ
        SavedProfile::create([
            'employer_id' => $employerId,
            'candidate_id' => $candidateId,
        ]);

        return back()->with('success', 'Lưu hồ sơ thành công!');
    }


    public function searchCandidate(Request $request)
    {
        $query = Candidate::query();
        $query->where('is_public', 1);
        // Tìm kiếm theo từ khóa
        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('fullname_candidate', 'like', "%$search%")
                    ->orWhere('position', 'like', "%$search%")
                    ->orWhere('working_form', 'like', "%$search%")
                    ->orWhere('desired_salary', 'like', "%$search%")
                    ->orWhere('years_of_experience', 'like', "%$search%");
            });
        }

        // Lọc theo thứ tự
        if ($request->filled('filter')) {
            $filter = $request->input('filter');

            switch ($filter) {
                case 'recent':
                    $query->orderBy('created_at', 'desc'); // Gần nhất
                    break;

                case 'oldest':
                    $query->orderBy('created_at', 'asc'); // Cũ nhất
                    break;

                case 'ratehigh':
                    $query->orderBy('years_of_experience', 'desc'); // Nhiều năm kinh nghiệm
                    break;
            }
        }
        if ($request->filled('category_candidate')) {
            $categoryId = $request->input('category_candidate');

            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('categories.id', $categoryId);
            });
        }
        $candidates = $query->paginate(10);
        $categories = Category::all();

        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();

        return view('job_postings.search_candidate', compact('candidates', 'categories', 'recentMessagesCount', 'recentApplicationsCount'));
    }


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
        // Xác thực dữ liệu
        $validatedData = $request->validate([
            'rating' => 'nullable|integer|min:1|max:5',
            'status' => 'required|integer|in:1,2,3,4',  // Xác thực giá trị status
        ]);

        // Cập nhật cả rating và status
        $application->update([
            'rating' => $validatedData['rating'],
            'status' => $validatedData['status'],
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ]);

        // Xác định thông điệp trạng thái
        $statusMessage = '';
        switch ($application->status) {
            case 1:
                $statusMessage = 'Đã ứng tuyển';
                break;
            case 2:
                $statusMessage = 'Nhà tuyển dụng đã xem hồ sơ';
                break;
            case 3:
                $statusMessage = 'Hồ sơ phù hợp';
                break;
            case 4:
                $statusMessage = 'Hồ sơ chưa phù hợp';
                break;
            default:
                $statusMessage = 'Trạng thái không xác định';
                break;
        }

        // Gửi email với rating
        if ($application->candidate && $application->candidate->email) {
            Mail::to($application->candidate->email)
                ->send(new ApplicationStatusUpdate($application, $statusMessage, $validatedData['rating']));
        }

        // Trả về kết quả sau khi cập nhật
        return redirect()->back()->with('success', 'CV và đánh giá đã được cập nhật thành công!');
    }

    public function index()
    {
        $employer = Auth::guard('employer')->user();
        $jobPostings = $employer->jobPostings;
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();

        return view('job_postings.index', compact('jobPostings', 'recentMessagesCount', 'recentApplicationsCount'));
    }

    public function dashboard()
    {
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
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

        return view('job_postings.dashboard', compact('activeJobPostingsCount', 'totalJobViews', 'totalApplications', 'totalMessages', 'dates', 'activeTypeEmployer', 'employer', 'slides', 'recentMessagesCount', 'recentApplicationsCount'));
    }



    public function create()
    {
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        if ($employer->level != 3) {
            return redirect()->back()->with('error', 'Bạn cần có cấp độ 3 để tạo việc làm.');
        }

        $email = $employer->email;
        $categories = Category::all();
        $cities = City::all();
        $company = $employer->company;
        $salaries = Salary::where('status', 'active')->get();
        return view('job_postings.create', compact('email', 'categories', 'company', 'cities', 'salaries', 'recentMessagesCount', 'recentApplicationsCount'));
    }


    public function show(Request $request, $id)
    {
        $employer = Auth::guard('employer')->user();

        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $jobPosting = JobPosting::findOrFail($id);
        if ($employer->id != $jobPosting->employer_id) {
            return redirect()->back()->with('error', 'Bạn không có quyền xem tin tuyển dụng này.');
        }
        $status = $request->input('status');
        $sort = $request->input('sort', 'created_at');

        $applications = $jobPosting->applications()
            ->when($status, function ($query, $status) {
                return $query->where('applications.status', $status);
            })
            ->when($sort === 'name', function ($query) {
                return $query->join('candidates', 'applications.candidate_id', '=', 'candidates.id')
                    ->orderBy('candidates.fullname_candidate', 'asc')
                    ->select('applications.*');
            }, function ($query) use ($sort) {
                return $query->orderBy($sort, 'desc');
            })
            ->with('candidate')
            ->get();
        $isInfomation = $employer->isInfomation ?? false;
        return view('job_postings.show', compact('jobPosting', 'applications', 'isInfomation', 'recentMessagesCount', 'recentApplicationsCount'));
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
        // Lấy công ty đăng bài
        $company = Company::find($jobPosting->company_id);

        // Gửi thông báo đến các candidate theo dõi công ty
        $followers = $company->followers;
        foreach ($followers as $follower) {
            Notification::create([
                'candidate_id' => $follower->id,
                'company_id' => $company->id,
                'message' => "Công ty {$company->name} đã đăng bài tuyển dụng mới.",
            ]);
        }
        return redirect()->route('job-postings.index')->with('success', 'Job posting created successfully!');
    }


    public function destroy($id)
    {
        $jobPosting = JobPosting::findOrFail($id);
        if ($jobPosting->employer_id != Auth::guard('employer')->id()) {
            return redirect()->route('job-postings.index')->with('error', 'Unauthorized access.');
        }
        $jobPosting->delete();

        return redirect()->route('job-postings.index')->with('success', 'Job posting deleted successfully!');
    }




    public function edit($id)
    {
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $jobPosting = JobPosting::findOrFail($id);
        if ($employer->id != $jobPosting->employer_id) {
            // Nếu không phải, chuyển hướng về trang trước đó với thông báo lỗi
            return redirect()->back()->with('error', 'Bạn không có quyền chỉnh sửa tin tuyển dụng này.');
        }
        $selectedCities = explode(', ', $jobPosting->city);
        $cities = City::all();
        $selectedCities = $jobPosting->cities->pluck('id')->toArray();
        $jobPosting = JobPosting::findOrFail($id);
        $categories = Category::all();
        $selectedCategories = $jobPosting->categories->pluck('id')->toArray();

        $company = $employer->company;
        $salaries = Salary::where('status', 'active')->get();
        return view('job_postings.edit', compact('jobPosting', 'selectedCities', 'cities', 'categories', 'selectedCategories', 'company', 'selectedCities', 'salaries', 'recentMessagesCount', 'recentApplicationsCount'));
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
    public function showCV($id)
    {
        // Lấy nhà tuyển dụng đang đăng nhập
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
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

        // Truyền thêm biến isInfomation để kiểm tra trong view
        $isInfomation = $employer->isInfomation ?? false;
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.overview-cv', compact('candidate', 'isInfomation', 'notifications', 'recentMessagesCount', 'recentApplicationsCount'));
    }


    public function showCart()
    {
        // Lấy các carts có status = 1
        $carts = Cart::where('status', 1)->get();
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        // Truyền dữ liệu carts sang view
        return view('job_postings.cart', compact('carts', 'recentMessagesCount', 'recentApplicationsCount'));
    }
    public function showCartDetail($id)
    {
        // Lấy cart theo ID
        $cart = Cart::findOrFail($id);
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        // Truyền dữ liệu cart sang view
        return view('job_postings.cart_detail', compact('cart', 'recentMessagesCount', 'recentApplicationsCount'));
    }


    public function buyGift(Request $request)
    {
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $typeProduct = $request->get('type_product', 'all');
        if ($typeProduct === 'all') {
            $products = Product::active()->get();
        } else {
            $products = Product::active()->where('type_product', $typeProduct)->get();
        }

        // Trả về view với danh sách sản phẩm
        return view('job_postings.gift', compact('products', 'employer', 'recentMessagesCount', 'recentApplicationsCount'));
    }
    // Hàm hiển thị chi tiết sản phẩm
    public function productDetail($id)
    {
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        // Tìm sản phẩm theo ID
        $product = Product::findOrFail($id);

        // Trả về view và truyền thông tin sản phẩm vào view
        return view('job_postings.gift_detail', compact('product', 'employer', 'recentMessagesCount', 'recentApplicationsCount'));
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
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $nextType = $employer->pointsToNextTypeEmployer();

        // Retrieve the list of purchases for the employer
        $purchases = Purchased::where('employer_id', $employer->id)->with('product')->get();

        return view('job_postings.reward', compact('employer', 'nextType', 'purchases', 'recentMessagesCount', 'recentApplicationsCount'));
    }
    public function appInsight()
    {
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        return view('job_postings.insight', compact('employer', 'recentMessagesCount', 'recentApplicationsCount'));
    }
    public function showCartEmployer()
    {
        // Lấy employer hiện tại
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        // Lấy danh sách cart của employer từ bảng pivot cart_employer
        $cartEmployers = $employer->carts()->withPivot('start_date', 'end_date', 'user_id')->get();

        // Truyền dữ liệu sang view để hiển thị
        return view('job_postings.cart_employer', compact('employer', 'cartEmployers', 'recentMessagesCount', 'recentApplicationsCount'));
    }
    public function showCheckout()
    {
        $banks = Bank::where('status', '1')->get();
        $groupedBanks = $banks->groupBy('area');
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        return view('job_postings.checkout', compact('groupedBanks', 'recentMessagesCount', 'recentApplicationsCount'));
    }
}
