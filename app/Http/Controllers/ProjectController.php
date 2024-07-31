<?php
// app/Http/Controllers/ProjectController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // Hiển thị danh sách dự án
    public function index()
    {
        $candidate = Auth::guard('candidate')->user();
        $projects = $candidate->projects;
        return view('pages.projects.index', compact('projects'));
    }

    // Hiển thị form để thêm dự án
    public function create()
    {
        return view('pages.projects.create');
    }

    // Lưu dự án mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $candidate = Auth::guard('candidate')->user();
        $project = new Project($request->all());
        $project->candidate_id = $candidate->id;
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Dự án đã được thêm.');
    }

    // Hiển thị form để chỉnh sửa dự án
    public function edit(Project $project)
    {
        return view('pages.projects.edit', compact('project'));
    }

    // Cập nhật dự án trong cơ sở dữ liệu
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Dự án đã được cập nhật.');
    }

    // Xóa dự án khỏi cơ sở dữ liệu
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Dự án đã được xóa.');
    }
}
