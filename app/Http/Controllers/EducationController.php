<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function index()
    {
        $candidate = Auth::guard('candidate')->user();
        $educations = $candidate->educations;
        return view('pages.educations.index', compact('educations'));
    }

    public function create()
    {
        return view('pages.educations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $candidate = Auth::guard('candidate')->user();
        $education = new Education($request->all());
        $education->candidate_id = $candidate->id;
        $education->save();

        return redirect()->route('education.index')->with('success', 'Học vấn đã được thêm.');
    }

    public function edit(Education $education)
    {
        return view('pages.educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $education->update($request->all());

        return redirect()->route('education.index')->with('success', 'Học vấn đã được cập nhật.');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('education.index')->with('success', 'Học vấn đã được xóa.');
    }
}