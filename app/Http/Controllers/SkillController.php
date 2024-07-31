<?php
// app/Http/Controllers/SkillController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    // Hiển thị danh sách kỹ năng
    public function index()
    {
        $candidate = Auth::guard('candidate')->user();
        $skills = $candidate->skills;
        return view('pages.skills.index', compact('skills'));
    }

    // Hiển thị form để thêm kỹ năng
    public function create()
    {
        return view('pages.skills.create');
    }

    // Lưu kỹ năng mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'proficiency' => 'nullable|integer|min:1|max:10',
        ]);

        $candidate = Auth::guard('candidate')->user();
        $skill = new Skill($request->all());
        $skill->candidate_id = $candidate->id;
        $skill->save();

        return redirect()->route('skills.index')->with('success', 'Kỹ năng đã được thêm.');
    }

    // Hiển thị form để chỉnh sửa kỹ năng
    public function edit(Skill $skill)
    {
        return view('pages.skills.edit', compact('skill'));
    }

    // Cập nhật kỹ năng trong cơ sở dữ liệu
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'proficiency' => 'nullable|integer|min:1|max:10',
        ]);

        $skill->update($request->all());

        return redirect()->route('skills.index')->with('success', 'Kỹ năng đã được cập nhật.');
    }

    // Xóa kỹ năng khỏi cơ sở dữ liệu
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index')->with('success', 'Kỹ năng đã được xóa.');
    }
}

