<?php

// app/Http/Controllers/ApplicationController.php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'job_posting_id' => 'required|exists:job_postings,id',
            'cv_id' => 'required|exists:cvs,id',
        ]);

        $candidate = Auth::guard('candidate')->user();
        $application = new Application();
        $application->job_posting_id = $request->job_posting_id;
        $application->candidate_id = $candidate->id;
        $application->cv_id = $request->cv_id;
        $application->save();

        return redirect()->back()->with('success', 'CV applied successfully.');
    }
}
