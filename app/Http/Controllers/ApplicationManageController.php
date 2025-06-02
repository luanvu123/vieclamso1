<?php

namespace App\Http\Controllers;

use App\Mail\ApplicationNotification;
use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class ApplicationManageController extends Controller
{
   public function index()
    {
        $user = Auth::user();

        // Nếu người dùng là Admin (id = 1 hoặc name = 'Admin') => hiển thị tất cả
        if ($user->roles()->where('id', 1)->orWhere('name', 'Admin')->exists()) {
            $applications = Application::with(['candidate', 'jobPosting'])->latest()->get();
        } else {
            // Nếu không phải admin => chỉ hiển thị theo user_id
            $userId = $user->id;
            $applications = Application::whereHas('jobPosting.employer.user', function ($query) use ($userId) {
                $query->where('id', $userId);
            })->with(['candidate', 'jobPosting'])->latest()->get();
        }

        return view('admin.applications.index', compact('applications'));
    }

    // Phương thức thêm CV che thông tin
    public function addHiddenCv(Request $request, $id)
    {
        $application = Application::with('jobPosting.employer')->findOrFail($id);
        $this->authorizeEmployer($application);

        $request->validate([
            'cv_hidden' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('cv_hidden')) {
            // Xóa file cũ nếu có
            if ($application->cv_path_hidden_info && Storage::disk('public')->exists($application->cv_path_hidden_info)) {
                Storage::disk('public')->delete($application->cv_path_hidden_info);
            }

            // Lưu file mới
            $cvHiddenPath = $request->file('cv_hidden')->store('cv_hidden', 'public');

            $application->update([
                'cv_path_hidden_info' => $cvHiddenPath
            ]);

            return redirect()->route('application-manage.index')->with('success', 'Thêm CV che thông tin thành công.');
        }

        return redirect()->route('application-manage.index')->with('error', 'Không có file CV được chọn.');
    }
    // Phương thức xóa CV che thông tin
    public function deleteHiddenCv($id)
    {
        $application = Application::with('jobPosting.employer')->findOrFail($id);
        $this->authorizeEmployer($application);

        if ($application->cv_path_hidden_info) {
            // Xóa file từ storage
            if (Storage::disk('public')->exists($application->cv_path_hidden_info)) {
                Storage::disk('public')->delete($application->cv_path_hidden_info);
            }

            // Cập nhật database
            $application->update([
                'cv_path_hidden_info' => null
            ]);

            return redirect()->route('application-manage.index')->with('success', 'Đã xóa CV che thông tin.');
        }

        return redirect()->route('application-manage.index')->with('error', 'Không tìm thấy CV che thông tin.');
    }
    // Phương thức cập nhật CV path từ CV nộp lại
    public function updateCvPath($id)
    {
        $application = Application::with('jobPosting.employer')->findOrFail($id);
        $this->authorizeEmployer($application);

        if (!$application->cv_path_resubmit) {
            return redirect()->route('application-manage.index')->with('error', 'Không có CV nộp lại để cập nhật.');
        }

        // Xóa CV cũ
        if ($application->cv_path && Storage::disk('public')->exists($application->cv_path)) {
            Storage::disk('public')->delete($application->cv_path);
        }

        // Cập nhật CV path bằng CV nộp lại
        $application->update([
            'cv_path' => $application->cv_path_resubmit
        ]);

        return redirect()->route('application-manage.index')->with('success', 'Cập nhật CV path thành công.');
    }

    public function show($id)
    {
        $application = Application::with(['candidate', 'jobPosting'])->findOrFail($id);
        return view('admin.applications.show', compact('application'));
    }


    public function edit($id)
    {
        $application = Application::with(['candidate', 'jobPosting.employer'])->findOrFail($id);
        $this->authorizeEmployer($application);
        $jobPosting = $application->jobPosting;

        // Tạo mảng chứa các email cần gửi
        $emailRecipients = [];

        // Thêm email của employer nếu có
        if ($jobPosting->employer->email) {
            $emailRecipients[] = $jobPosting->employer->email;
        }

        // Thêm application_email_url nếu có và khác với email employer
        if (
            $jobPosting->application_email_url &&
            !in_array($jobPosting->application_email_url, $emailRecipients)
        ) {
            $emailRecipients[] = $jobPosting->application_email_url;
        }

        // Gửi email tới tất cả recipients (loại bỏ trùng lặp)
        if (!empty($emailRecipients)) {
            Mail::to($emailRecipients)->send(new ApplicationNotification($application));
        }

        return view('admin.applications.edit', compact('application'));
    }

    public function update(Request $request, $id)
    {
        $application = Application::with('jobPosting.employer')->findOrFail($id);
        $this->authorizeEmployer($application);

        $request->validate([
            'approve_application' => 'required|in:Chờ duyệt,Đã duyệt,Nộp lại,Từ chối',
            'summary' => 'nullable|string',
        ]);

        $application->update([
            'approve_application' => $request->approve_application,
            'summary' => $request->summary,
        ]);

        return redirect()->route('application-manage.index')->with('success', 'Cập nhật đơn ứng tuyển thành công.');
    }

    protected function authorizeEmployer($application)
    {
        $user = Auth::user();

        // Bỏ qua kiểm tra nếu là Admin
        if ($user->roles()->where('id', 1)->orWhere('name', 'Admin')->exists()) {
            return;
        }

        // Kiểm tra quyền truy cập theo user_id
        if ($application->jobPosting->employer->user_id != $user->id) {
            abort(403, 'Bạn không có quyền truy cập đơn ứng tuyển này.');
        }
    }

}
