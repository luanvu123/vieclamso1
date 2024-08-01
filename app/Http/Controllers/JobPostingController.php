<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Candidate;
use App\Models\Category;
use App\Models\Company;
use App\Models\JobPosting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobPostingController extends Controller
{
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
        return view('job_postings.dashboard', compact('activeJobPostingsCount', 'totalJobViews', 'totalApplications', 'totalMessages'));
    }



    public function create()
    {
        $employer = Auth::guard('employer')->user();
        $email = $employer->email;
        $categories = Category::all();
        $companies = $employer->companies; // Lấy tất cả các công ty của nhà tuyển dụng
        return view('job_postings.create', compact('email', 'categories', 'companies'));
    }

    public function show($id)
    {
        $jobPosting = JobPosting::findOrFail($id);
        $applications = $jobPosting->applications()->with('candidate')->get();
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
        $jobPosting->city = implode(', ', $request->city); // Convert array to comma-separated string

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

        // Redirect with success message
        return redirect()->route('job-postings.index')->with('success', 'Job posting created successfully!');
    }


    public function destroy($id)
    {
        $jobPosting = JobPosting::findOrFail($id);

        // Kiểm tra quyền truy cập của người dùng
        if ($jobPosting->employer_id !== Auth::guard('employer')->id()) {
            return redirect()->route('job-postings.index')->with('error', 'Unauthorized access.');
        }

        // Xóa job posting
        $jobPosting->delete();

        return redirect()->route('job-postings.index')->with('success', 'Job posting deleted successfully!');
    }




    public function edit($id)
    {
        $jobPosting = JobPosting::findOrFail($id);
        $selectedCities = explode(', ', $jobPosting->city);
        $cities = [
            'Hà Nội', 'Hồ Chí Minh', 'Đà Nẵng', 'Cần Thơ', 'Hải Phòng', 'Huế',
        ];
        $jobPosting = JobPosting::findOrFail($id);
        $categories = Category::all();
        $selectedCategories = $jobPosting->categories->pluck('id')->toArray();
        $employer = Auth::guard('employer')->user();
        $companies = $employer->companies;
        return view('job_postings.edit', compact('jobPosting', 'selectedCities', 'cities', 'categories', 'selectedCategories', 'companies'));
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
        $jobPosting->city = implode(', ', $request->city); // Convert array to comma-separated string
        $jobPosting->company_id = $request->company_id;

        $jobPosting->save();

        // Sync categories
        $jobPosting->categories()->sync($request->category);

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
}
