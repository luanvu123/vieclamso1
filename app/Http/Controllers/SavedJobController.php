<?php

namespace App\Http\Controllers;

use App\Models\SavedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SavedJobController extends Controller
{
     public function store(Request $request)
    {
        $candidateId = Auth::guard('candidate')->id();
        $jobPostingId = $request->job_posting_id;

        // Kiểm tra nếu việc làm đã được lưu
        $existingSavedJob = SavedJob::where('candidate_id', $candidateId)
            ->where('job_posting_id', $jobPostingId)
            ->exists();

        if ($existingSavedJob) {
            return response()->json(['message' => 'Việc làm đã được lưu trước đó.'], 400);
        }

        // Lưu việc làm
        SavedJob::create([
            'candidate_id' => $candidateId,
            'job_posting_id' => $jobPostingId,
        ]);

        return response()->json(['message' => 'Việc làm đã được lưu.']);
    }
     public function index()
    {
        $candidateId = Auth::guard('candidate')->id();
        $savedJobs = SavedJob::where('candidate_id', $candidateId)
            ->with('jobPosting')
            ->get();

        return view('pages.save-job', compact('savedJobs'));
    }
     public function unsave(Request $request)
    {
        $candidateId = Auth::guard('candidate')->id();
        $jobId = $request->input('job_id');

        // Xóa việc làm khỏi danh sách đã lưu
        $savedJob = SavedJob::where('candidate_id', $candidateId)
            ->where('job_posting_id', $jobId)
            ->first();

        if ($savedJob) {
            $savedJob->delete();
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error', 'message' => 'Không tìm thấy việc làm đã lưu.']);
    }
}
