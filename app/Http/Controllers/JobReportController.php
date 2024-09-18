<?php
namespace App\Http\Controllers;

use App\Models\JobReport;
use Illuminate\Http\Request;

class JobReportController extends Controller
{
     public function __construct()
    {
        $this->middleware('permission:job-report-list', ['only' => ['index']]);
        $this->middleware('permission:job-report-show', ['only' => ['show']]);
        $this->middleware('permission:job-report-edit', ['only' => ['edit']]);
        $this->middleware('permission:job-report-update', ['only' => ['update']]);
    }
    public function index()
    {
        $jobReports = JobReport::with('jobPosting.employer')->orderBy('updated_at', 'DESC')->get();
        return view('admin.job_reports.index', compact('jobReports'));
    }

    public function show($id)
    {
        $jobReport = JobReport::with('jobPosting.employer')->findOrFail($id);
        return view('admin.job_reports.show', compact('jobReport'));
    }

  public function edit($id)
{
    $jobReport = JobReport::findOrFail($id);
    $statuses = ['pending', 'reviewed', 'resolved', 'rejected']; // Define possible statuses
    return view('admin.job_reports.edit', compact('jobReport', 'statuses'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $jobReport = JobReport::findOrFail($id);
        $jobReport->update([
            'status' => $request->status,
        ]);

        return redirect()->route('job-reports.index')->with('success', 'Job report updated successfully.');
    }
}
