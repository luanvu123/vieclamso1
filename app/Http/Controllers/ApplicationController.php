<?php

// app/Http/Controllers/ApplicationController.php

namespace App\Http\Controllers;

use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $existingApplication = Application::where('job_posting_id', $request->job_posting_id)
            ->where('candidate_id', Auth::guard('candidate')->id())
            ->exists();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'Bạn đã ứng tuyển cho vị trí này trước đó.');
        }
        $application = new Application();
        $application->job_posting_id = $request->job_posting_id;
        $application->candidate_id = Auth::guard('candidate')->id();
        $application->cv_id = $request->cv_id;
        $application->application_letter = $request->application_letter;
        $application->save();
        $message = 'Ứng tuyển thành công!';
        session()->flash('success', $message);
         return redirect()->back();
    }

    public function showAppliedJobs()
    {
        $candidate_id = Auth::guard('candidate')->id();
        $applications = Application::where('candidate_id', $candidate_id)
            ->with('jobPosting.company', 'cv') // Eager load to reduce the number of queries
            ->get();

        return view('pages.history', compact('applications'));
    }
}
