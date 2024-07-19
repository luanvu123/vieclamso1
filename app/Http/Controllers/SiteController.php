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
        $jobPostings = JobPosting::with('employer')->where('status', 1)->paginate(12);;
        return view('pages.home', compact('jobPostings'));
    }

    public function show($slug)
    {
        $jobPosting = JobPosting::where('slug', $slug)->firstOrFail();
        $closingDate = Carbon::parse($jobPosting->closing_date);
        $isExpired = $closingDate->isPast();

        // Get the authenticated candidate
        $candidate = Auth::guard('candidate')->user();

        // Check if the candidate has applied for this job posting
        $applied = $candidate->applications()->where('job_posting_id', $jobPosting->id)->exists();

        // Get and format applied date if applied
        $appliedDate = null; // Initialize appliedDate variable
        if ($applied) {
            $application = $candidate->applications()->where('job_posting_id', $jobPosting->id)->first();
            $appliedDate = Carbon::parse($application->created_at)->format('d/m/Y');
        }

        return view('pages.job', compact('jobPosting', 'closingDate', 'isExpired', 'candidate', 'applied', 'appliedDate'));
    }
}
