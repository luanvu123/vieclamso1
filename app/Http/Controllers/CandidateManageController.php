<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateManageController extends Controller
{
   public function __construct()
    {
        $this->middleware('permission:candidate-list|candidate-create|candidate-edit|candidate-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:candidate-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:candidate-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:candidate-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $candidates = Candidate::with('cvs')->get();
        return view('admin.candidates.index', compact('candidates'));
    }
  public function edit($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('admin.candidates.edit', compact('candidate'));
    }

    // Update candidate status
   public function update(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:0,1',
        // other validation rules
    ]);

    $candidate = Candidate::findOrFail($id);
    $candidate->status = (int) $request->input('status');
    // Update other fields
    $candidate->save();

    return redirect()->route('candidates.index')->with('success', 'Candidate updated successfully.');
}

    public function show($id)
    {
        $candidate = Candidate::with([
            'cvs',
            'educations',
            'experiences',
            'skills',
            'certificates',
            'projects',
            'activities',
            'hobbies',
            'advisers',
            'prizes'
        ])->findOrFail($id);

        return view('admin.candidates.show', compact('candidate'));
    }
}
