<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\JobPosting;
use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class JobsManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:job-posting-manage-list|jobPosting-choose|job-posting-manage-create|job-posting-manage-edit|job-posting-manage-delete', ['only' => ['destroy', 'edit', 'update', 'index', 'store', 'jobPosting_choose']]);
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
    public function edit($id)
    {
        $jobPosting = JobPosting::with('salaries', 'categories', 'cities')->findOrFail($id);
        $categories = Category::all();
        $cities = City::all();
        $salaries = Salary::all();

        // Lấy danh sách các ID đã chọn
        $selectedCategories = $jobPosting->categories->pluck('id')->toArray();
        $selectedCities = $jobPosting->cities->pluck('id')->toArray();
        $selectedSalaries = $jobPosting->salaries->pluck('id')->toArray();

        return view('admin.jobs_manage.edit', compact('jobPosting', 'categories', 'cities', 'salaries', 'selectedCategories', 'selectedCities', 'selectedSalaries'));
    }

    public function update(Request $request, $id)
    {
        $jobPosting = JobPosting::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'type' => 'required|string',
            'location' => 'nullable|string',
            'salary' => 'nullable|string',
            'experience' => 'nullable|string',
            'rank' => 'nullable|string',
            'number_of_recruits' => 'nullable|integer',
            'sex' => 'nullable|string',
            'skills_required' => 'nullable|string',
            'city' => 'array',
            'category' => 'array',
            'salaries' => 'array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $jobPosting->update([
                'title' => $request->title,
                'slug' => $request->slug ?? Str::slug($request->title),
                'type' => $request->type,
                'location' => $request->location,
                'salary' => $request->salary,
                'experience' => $request->experience,
                'rank' => $request->rank,
                'number_of_recruits' => $request->number_of_recruits,
                'sex' => $request->sex,
                'skills_required' => $request->skills_required,
            ]);

            // Đồng bộ bảng pivot
            $jobPosting->categories()->sync($request->category ?? []);
            $jobPosting->cities()->sync($request->city ?? []);
            $jobPosting->salaries()->sync($request->salaries ?? []);

            DB::commit();
            return redirect()->route('job-postings-manage.index')->with('success', 'Job updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update job: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $jobPosting = JobPosting::findOrFail($id);
        $jobPosting->categories()->detach();
        $jobPosting->cities()->detach();
        $jobPosting->salaries()->detach();
        $jobPosting->delete();

        return redirect()->route('job-postings-manage.index')->with('success', 'Job deleted successfully.');
    }
}
