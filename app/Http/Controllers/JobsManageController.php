<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use File;
class JobsManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('permission:jobPosting-choose', ['only' => ['jobPosting_choose']]);
    }
    public function index()
    {
        $jobPostings = JobPosting::with('employer')->get();
         $path=public_path()."/json/";
        if(!is_dir($path)) {
            mkdir($path,0777,true);
         }
        File::put($path.'jobs.json',json_encode($jobPostings));
        return view('admin.jobs_manage.index', compact('jobPostings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobPosting = JobPosting::with('employer', 'applications')->findOrFail($id);
        return view('admin.jobs_manage.show', compact('jobPosting'));
    }

     public function jobPosting_choose(Request $request)
    {
        $data = $request->all();
        $jobPosting = jobPosting::find($data['id']);
        $jobPosting->status = $data['trangthai_val'];
        $jobPosting->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $jobPosting->save();
    }
}
