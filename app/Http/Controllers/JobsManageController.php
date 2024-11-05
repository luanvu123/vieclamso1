<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobsManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:job-posting-manage-list|jobPosting-choose|job-posting-manage-create|job-posting-manage-edit|job-posting-manage-delete', ['only' => ['index', 'store', 'jobPosting_choose']]);
    }

    public function index()
    {
        $user = Auth::user();
        $userId = $user->id;

        // Nếu người dùng là Admin, hiển thị tất cả job postings; nếu không, chỉ hiển thị job postings thuộc về user_id của nhà tuyển dụng
        if ($user->roles()->where('id', 1)->exists()) {
            $jobPostings = JobPosting::with('employer')->orderBy('updated_at', 'DESC')->get();
        } else {
            $jobPostings = JobPosting::with('employer')->whereHas('employer', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->orderBy('updated_at', 'DESC')->get();
        }

        return view('admin.jobs_manage.index', compact('jobPostings'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $userId = $user->id;

        // Lấy thông tin công việc
        $jobPosting = JobPosting::with('employer', 'applications', 'categories', 'cities', 'salaries')->findOrFail($id);

        // Kiểm tra nếu người dùng là Admin hoặc là chủ sở hữu của công việc thông qua user_id của nhà tuyển dụng
        if ($user->roles()->where('id', 1)->exists() || $jobPosting->employer->user_id === $userId) {
            return view('admin.jobs_manage.show', compact('jobPosting'));
        }

        return redirect()->route('jobs.index')->with('error', 'Bạn không có quyền xem công việc này.');
    }



    public function jobPosting_choose(Request $request)
    {
        $data = $request->all();
        $jobPosting = jobPosting::find($data['id']);
        $jobPosting->status = $data['trangthai_val'];
        $jobPosting->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $jobPosting->save();
    }
    public function isHot_choose(Request $request)
{
    $data = $request->all();
    $jobPosting = JobPosting::find($data['id']);
    $jobPosting->isHot = $data['isHot_val'];
    $jobPosting->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
    $jobPosting->save();

    return response()->json(['success' => 'Thay đổi isHot thành công!']);
}

}
