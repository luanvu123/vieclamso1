<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateManageController extends Controller
{
   public function index()
    {
        $candidates = Candidate::with('cvs')->get();
        return view('admin.candidates.index', compact('candidates'));
    }

    public function show($id)
    {
        $candidate = Candidate::with('cvs')->findOrFail($id);
        return view('admin.candidates.show', compact('candidate'));
    }
}

