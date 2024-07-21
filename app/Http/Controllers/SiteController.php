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
        $jobPostings = JobPosting::with('employer')->where('status', 0)->paginate(12);
        return view('pages.home', compact('jobPostings'));
    }
    public function filter(Request $request)
    {

        $query = JobPosting::with('employer')->where('status', 0);


        if ($request->filled('city')) {
            $query->where('city', 'like', '%' . $request->input('city') . '%');
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
        $jobPostings = $query->paginate(12);
        return view('pages.home', compact('jobPostings'));
    }

    public function show($slug)
    {
        $jobPosting = JobPosting::where('slug', $slug)->where('status', 0)->firstOrFail();
        $closingDate = Carbon::parse($jobPosting->closing_date);
        $isExpired = $closingDate->isPast();
        $candidate = Auth::guard('candidate')->user();
        $applied = false;
        $appliedDate = null;
        if ($candidate) {
            $applied = $candidate->applications()->where('job_posting_id', $jobPosting->id)->exists();
            if ($applied) {
                $application = $candidate->applications()->where('job_posting_id', $jobPosting->id)->first();
                $appliedDate = Carbon::parse($application->created_at)->format('d/m/Y');
            }
        }
        // Lấy các công việc liên quan
        $relatedJobs = JobPosting::where('category', $jobPosting->category)
            ->orWhere('city', 'like', '%' . $jobPosting->city . '%')
            ->where('id', '!=', $jobPosting->id)
            ->where('status', 0)
            ->take(5) // Lấy tối đa 5 công việc liên quan
            ->get();
        foreach ($relatedJobs as $relatedJob) {
            $relatedJob->days_to_closing = Carbon::now()->diffInDays(Carbon::parse($relatedJob->closing_date), false);
            $relatedJob->time_since_update = Carbon::parse($relatedJob->updated_at)->diffForHumans();
        }
        return view('pages.job', compact('jobPosting', 'closingDate', 'isExpired', 'candidate', 'applied', 'appliedDate', 'relatedJobs'));
    }

   public function searchJobs(Request $request)
{
    $query = JobPosting::query()->where('status', 0);

    if ($request->filled('keyword')) {
        $query->where('title', 'like', '%' . $request->keyword . '%');
        $keyword = $request->keyword; // Lưu từ khóa tìm kiếm
    } else {
        $keyword = null;
    }

    if ($request->filled('city')) {
        $query->where('city', $request->city);
        $city = $request->city; // Lưu thành phố tìm kiếm
    } else {
        $city = null;
    }

    $jobPostings = $query->get();
    $jobCount = $jobPostings->count(); // Số lượng công việc tìm thấy

    return view('pages.tim-kiem', compact('jobPostings', 'keyword', 'city', 'jobCount'));
}

}
