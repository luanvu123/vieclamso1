<?php

// app/Http/Controllers/JobPostingController.php

namespace App\Http\Controllers;

use App\Models\Application;
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

        return view('job_postings.dashboard');
    }
    public function create()
    {
        $employer = Auth::guard('employer')->user();
        $email = $employer->email;
        return view('job_postings.create', compact('email'));
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
            'company_name' => 'required|string|max:255',
            'email' => 'required|email',
            'salary' => 'nullable|string|max:255',
            'place' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'rank' => 'nullable|string|max:255',
            'number_of_recruits' => 'nullable|integer',
            'sex' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'skills_required' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Job title is required.',
            'type.required' => 'Job type is required.',
            'category.required' => 'At least one category is required.',
            'description.required' => 'Job description is required.',
            'application_email_url.required' => 'Application email or URL is required.',
            'company_name.required' => 'Company name is required.',
            'email.required' => 'Your email is required.',
            'email.email' => 'Please enter a valid email address.',
        ]);

        $jobPosting = new JobPosting();
        $jobPosting->employer_id = Auth::guard('employer')->id();
        $jobPosting->email = $request->email;
        $jobPosting->title = $request->title;
        $jobPosting->slug = $request->slug;
        $jobPosting->type = $request->type;
        $jobPosting->category = implode(', ', $request->category);
        $jobPosting->location = $request->location;
        $jobPosting->tags = $request->tags;
        $jobPosting->description = $request->description;
        $jobPosting->application_email_url = $request->application_email_url;
        $jobPosting->closing_date = $request->closing_date;
        $jobPosting->company_name = $request->company_name;
        $jobPosting->website = $request->website;
        $jobPosting->tagline = $request->tagline;
        $jobPosting->video = $request->video;
        $jobPosting->twitter = $request->twitter;
        $jobPosting->salary = $request->salary;
        $jobPosting->place = $request->place;
        $jobPosting->experience = $request->experience;
        $jobPosting->rank = $request->rank;
        $jobPosting->number_of_recruits = $request->number_of_recruits;
        $jobPosting->sex = $request->sex;
        $jobPosting->status = $request->status;
        $jobPosting->skills_required = $request->skills_required;
        $jobPosting->area = $request->area;

        // Xử lý logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('logo_company', 'public');
            $jobPosting->logo = $logoPath;
        }

        // Save the job posting
        $jobPosting->save();

        // Redirect with success message
        return redirect()->route('job-postings.index')->with('success', 'Job posting created successfully!');
    }

    public function destroy($id)
    {
        $employer = Auth::guard('employer')->user();
        $jobPosting = JobPosting::where('id', $id)->where('employer_id', $employer->id)->first();

        if (!$jobPosting) {
            return redirect()->route('job-postings.index')->with('error', 'Job posting not found or you do not have permission to delete it.');
        }

        // Delete the job posting
        $jobPosting->delete();

        // Redirect with success message
        return redirect()->route('job-postings.index')->with('success', 'Job posting deleted successfully!');
    }




    public function edit($id)
    {
        $jobPosting = JobPosting::findOrFail($id);
        return view('job_postings.edit', compact('jobPosting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'category' => 'required|array',
            'description' => 'required|string',
            'application_email_url' => 'required|string',
            'company_name' => 'required|string|max:255',
            'email' => 'required|email',
            'salary' => 'nullable|string|max:255',
            'place' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'rank' => 'nullable|string|max:255',
            'number_of_recruits' => 'nullable|integer',
            'sex' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'skills_required' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Job title is required.',
            'type.required' => 'Job type is required.',
            'category.required' => 'At least one category is required.',
            'description.required' => 'Job description is required.',
            'application_email_url.required' => 'Application email or URL is required.',
            'company_name.required' => 'Company name is required.',
            'email.required' => 'Your email is required.',
            'email.email' => 'Please enter a valid email address.',
        ]);

        $jobPosting = JobPosting::findOrFail($id);

        // Kiểm tra quyền sở hữu
        if (Auth::guard('employer')->id() != $jobPosting->employer_id) {
            return redirect()->route('job-postings.index')->with('error', 'You do not have permission to edit this job posting.');
        }

        $jobPosting->email = $request->email;
        $jobPosting->title = $request->title;
        $jobPosting->slug = $request->slug;
        $jobPosting->type = $request->type;
        $jobPosting->category = implode(', ', $request->category);
        $jobPosting->location = $request->location;
        $jobPosting->tags = $request->tags;
        $jobPosting->description = $request->description;
        $jobPosting->application_email_url = $request->application_email_url;
        $jobPosting->closing_date = $request->closing_date;
        $jobPosting->company_name = $request->company_name;
        $jobPosting->website = $request->website;
        $jobPosting->tagline = $request->tagline;
        $jobPosting->video = $request->video;
        $jobPosting->twitter = $request->twitter;
        $jobPosting->salary = $request->salary;
        $jobPosting->place = $request->place;
        $jobPosting->experience = $request->experience;
        $jobPosting->rank = $request->rank;
        $jobPosting->number_of_recruits = $request->number_of_recruits;
        $jobPosting->sex = $request->sex;
        $jobPosting->status = $request->status;
        $jobPosting->skills_required = $request->skills_required;
        $jobPosting->area = $request->area;

        // Xử lý logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('logo_company', 'public');
            $jobPosting->logo = $logoPath;
        }

        // Save the job posting
        $jobPosting->save();

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
}
