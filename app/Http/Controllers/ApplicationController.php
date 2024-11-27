<?php

// app/Http/Controllers/ApplicationController.php

namespace App\Http\Controllers;

use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ApplicationSuccess;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
  public function store(Request $request)
{
    $candidate = Auth::guard('candidate')->user();

    // Kiểm tra trạng thái của ứng viên
    if ($candidate->status != 1) {
        // Nếu trạng thái không phải 1, hiển thị thông báo lỗi
        return redirect()->back()->with('error', 'Hồ sơ của bạn đang chờ duyệt.');
    }

    // Xóa ứng tuyển hiện tại nếu tồn tại
    $existingApplication = Application::where('job_posting_id', $request->job_posting_id)
        ->where('candidate_id', $candidate->id)
        ->first();

    if ($existingApplication) {
        $existingApplication->delete();
    }

    // Tạo ứng tuyển mới
    $application = new Application();
    $application->job_posting_id = $request->job_posting_id;
    $application->candidate_id = $candidate->id;
    $application->cv_id = $request->cv_id;
    $application->application_letter = $request->application_letter;
    $application->save();

    // Gửi email thông báo
    Mail::to($application->candidate->email)->send(new ApplicationSuccess($application));

    session()->flash('success', 'Ứng tuyển thành công!');
    return redirect()->back();
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
