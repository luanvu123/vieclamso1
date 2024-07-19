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
        // Check if the candidate has already applied for this job posting
        $existingApplication = Application::where('job_posting_id', $request->job_posting_id)
            ->where('candidate_id', Auth::guard('candidate')->id())
            ->exists();

        if ($existingApplication) {
            // Handle case where candidate has already applied
            // Redirect back with a message or handle as needed
            return redirect()->back()->with('error', 'Bạn đã ứng tuyển cho vị trí này trước đó.');
        }

        // If not already applied, proceed to store the application
        $application = new Application();
        $application->job_posting_id = $request->job_posting_id;
        $application->candidate_id = Auth::guard('candidate')->id();
        $application->cv_id = $request->cv_id;
        $application->application_letter = $request->application_letter;
        $application->save();
        // Flash success message to session
        $message = 'Ứng tuyển thành công!';
        session()->flash('success', $message);

        // Return view with applied date and other necessary data
         return redirect()->back();
    }

    
}
