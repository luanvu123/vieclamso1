<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        $jobPostings = JobPosting::with('employer')->where('status', 0)->paginate(12);;
        return view('pages.home', compact('jobPostings'));
    }
public function filter(Request $request)
{
    $query = JobPosting::query();

    if ($request->filled('location')) {
        $query->where('location', 'like', '%' . $request->input('location') . '%');
    }

    if ($request->filled('salary')) {
        $query->where('salary', 'like', '%' . $request->input('salary') . '%');
    }

    if ($request->filled('experience')) {
        $query->where('experience', 'like', '%' . $request->input('experience') . '%');
    }

    if ($request->filled('category')) {
        $query->where('category', 'like', '%' . $request->input('category') . '%');
    }

    $jobPostings = $query->paginate(10);

    return view('pages.job', compact('jobPostings'));
}
   public function show($slug)
{
    $jobPosting = JobPosting::where('slug', $slug)->where('status', 0)->firstOrFail();
    $closingDate = Carbon::parse($jobPosting->closing_date);
    $isExpired = $closingDate->isPast();

    // Get the authenticated candidate
    $candidate = Auth::guard('candidate')->user();

    // Check if the candidate has applied for this job posting
    $applied = false;
    $appliedDate = null; // Initialize appliedDate variable

    if ($candidate) {
        $applied = $candidate->applications()->where('job_posting_id', $jobPosting->id)->exists();

        // Get and format applied date if applied
        if ($applied) {
            $application = $candidate->applications()->where('job_posting_id', $jobPosting->id)->first();
            $appliedDate = Carbon::parse($application->created_at)->format('d/m/Y');
        }
    }

    return view('pages.job', compact('jobPosting', 'closingDate', 'isExpired', 'candidate', 'applied', 'appliedDate'));
}

    public function searchJobs(Request $request)
    {
        $query = JobPosting::query()->where('status', 0);

        if ($request->filled('keyword')) {
            $query->where('title', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        $jobPostings = $query->get();

        return view('pages.tim-kiem', compact('jobPostings'));
    }
}
