<?php

// app/Http/Controllers/JobPostingController.php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobPostingController extends Controller
{
    public function index()
    {
        $employer = Auth::guard('employer')->user();
        $jobPostings = $employer->jobPostings;
        return view('job_postings.index', compact('jobPostings'));
    }

    public function create()
    {
        return view('job_postings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $employer = Auth::guard('employer')->user();
        $employer->jobPostings()->create($request->all());

        return redirect()->route('job-postings.index')->with('success', 'Job posting created successfully.');
    }

    public function show($id)
    {
        $jobPosting = JobPosting::findOrFail($id);
        return view('job_postings.show', compact('jobPosting'));
    }

    public function edit($id)
    {
        $jobPosting = JobPosting::findOrFail($id);
        return view('job_postings.edit', compact('jobPosting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $jobPosting = JobPosting::findOrFail($id);
        $jobPosting->update($request->all());

        return redirect()->route('job-postings.index')->with('success', 'Job posting updated successfully.');
    }

    public function destroy($id)
    {
        $jobPosting = JobPosting::findOrFail($id);
        $jobPosting->delete();

        return redirect()->route('job-postings.index')->with('success', 'Job posting deleted successfully.');
    }
}

