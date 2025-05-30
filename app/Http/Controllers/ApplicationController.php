<?php

// app/Http/Controllers/ApplicationController.php

namespace App\Http\Controllers;

use App\Mail\ApplicationNotification;
use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ApplicationSuccess;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('candidate');
    }
   public function store(Request $request)
{
    // Log the incoming request data for debugging
    \Log::info('Application submission data:', $request->all());
    $request->validate([
        'job_posting_id' => 'required|exists:job_postings,id',
        'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'cv_id' => 'nullable|exists:cvs,id',
        'introduction' => 'nullable|string|max:1000'
    ]);

    $candidate = auth('candidate')->user();

    // Verify the job_posting_id is correct
    $jobPosting = \App\Models\JobPosting::find($request->job_posting_id);
    if (!$jobPosting) {
        \Log::error('Job posting not found with ID: ' . $request->job_posting_id);
        return redirect()->back()->with('error', 'Công việc không tồn tại');
    }

    $existing = Application::where('candidate_id', $candidate->id)
        ->where('job_posting_id', $request->job_posting_id)
        ->latest()
        ->first();

    $cvPath = null;

    // Trường hợp chọn CV có sẵn
    if ($request->cv_id) {
        $cv = $candidate->cvs()->where('cvs.id', $request->cv_id)->first();
        if (!$cv)
            return redirect()->back()->with('error', 'CV không hợp lệ');
        $cvPath = $cv->cv_path;
    }

    // Trường hợp upload CV mới
    if ($request->hasFile('cv')) {
        $cvPath = $request->file('cv')->store('cv', 'public');
    }

    if (!$cvPath) {
        return redirect()->back()->with('error', 'Vui lòng chọn hoặc tải lên CV');
    }

    if ($existing && $existing->created_at->diffInHours(now()) < 24) {
        return redirect()->back()->with('error', 'Bạn chỉ có thể cập nhật CV sau 24 giờ kể từ lần nộp trước.');
    }

    if ($existing) {
        if ($existing->created_at->diffInHours(now()) < 24) {
            return redirect()->back()->with('error', 'Bạn chỉ có thể nộp lại hồ sơ sau 24 giờ kể từ lần nộp trước.');
        }
        // Nếu nộp lại sau 24h -> Lưu CV mới vào cv_path_resubmit
        $existing->update([
            'cv_path_resubmit' => $cvPath,
            'introduction' => $request->introduction,
            'updated_at' => now(),
        ]);
        $application = $existing;
    } else {
        // Tạo mới
        $application = Application::create([
            'candidate_id' => $candidate->id,
            'job_posting_id' => $request->job_posting_id,
            'cv_path' => $cvPath,
            'introduction' => $request->introduction,
        ]);
    }

   

    // Gửi email thông báo
    Mail::to($application->candidate->email)->send(new ApplicationSuccess($application));

    $message = $existing ? 'Nộp lại hồ sơ thành công' : 'Nộp hồ sơ thành công';

    if ($request->ajax() || $request->wantsJson()) {
        return response()->json([
            'status' => 'success',
            'message' => $message
        ]);
    }

    return redirect()->back()->with('success', $message);
}

    public function checkApplication($jobPostingId)
    {
        $candidateId = Auth::guard('candidate')->id();

        $application = Application::where('candidate_id', $candidateId)
            ->where('job_posting_id', $jobPostingId)
            ->latest()
            ->first();

        if ($application) {
            return response()->json([
                'hasApplied' => true,
                'applicationDate' => $application->created_at,
                'lastUpdateDate' => $application->updated_at,
            ]);
        }

        return response()->json(['hasApplied' => false]);
    }





    public function showAppliedJobs()
    {

        $candidate_id = Auth::guard('candidate')->id();
        $applications = Application::where('candidate_id', $candidate_id)
            ->with('jobPosting.company', 'cv') // Eager load to reduce the number of queries
            ->get();
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.history', compact('applications', 'notifications'));
    }
}

