<?php

// app/Http/Controllers/AdviserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adviser;
use Illuminate\Support\Facades\Auth;

class AdviserController extends Controller
{
    // Hiển thị danh sách cố vấn
    public function index()
    {
        $candidate = Auth::guard('candidate')->user();
        $advisers = $candidate->advisers;
        return view('pages.advisers.index', compact('advisers'));
    }

    // Hiển thị form để thêm cố vấn
    public function create()
    {
        return view('pages.advisers.create');
    }

    // Lưu cố vấn mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $candidate = Auth::guard('candidate')->user();
        $adviser = new Adviser($request->all());
        $adviser->candidate_id = $candidate->id;
        $adviser->save();

        return redirect()->route('advisers.index')->with('success', 'Cố vấn đã được thêm.');
    }

    // Hiển thị form để chỉnh sửa cố vấn
    public function edit(Adviser $adviser)
    {
        return view('pages.advisers.edit', compact('adviser'));
    }

    // Cập nhật cố vấn trong cơ sở dữ liệu
    public function update(Request $request, Adviser $adviser)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $adviser->update($request->all());

        return redirect()->route('advisers.index')->with('success', 'Cố vấn đã được cập nhật.');
    }

    // Xóa cố vấn khỏi cơ sở dữ liệu
    public function destroy(Adviser $adviser)
    {
        $adviser->delete();
        return redirect()->route('advisers.index')->with('success', 'Cố vấn đã được xóa.');
    }
}
