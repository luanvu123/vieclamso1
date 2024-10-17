<?php

// app/Http/Controllers/HobbyController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hobby;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class HobbyController extends Controller
{
    // Hiển thị danh sách sở thích
    public function index()
    {
        $candidate = Auth::guard('candidate')->user();
        $hobbies = $candidate->hobbies;
         $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.hobbies.index', compact('hobbies','notifications'));
    }

    // Hiển thị form để thêm sở thích
    public function create()
    {
         $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.hobbies.create',compact('notifications'));
    }

    // Lưu sở thích mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $candidate = Auth::guard('candidate')->user();
        $hobby = new Hobby($request->all());
        $hobby->candidate_id = $candidate->id;
        $hobby->save();

        return redirect()->route('hobbies.index')->with('success', 'Sở thích đã được thêm.');
    }

    // Hiển thị form để chỉnh sửa sở thích
    public function edit(Hobby $hobby)
    {
         $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.hobbies.edit', compact('hobby','notifications'));
    }

    // Cập nhật sở thích trong cơ sở dữ liệu
    public function update(Request $request, Hobby $hobby)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $hobby->update($request->all());

        return redirect()->route('hobbies.index')->with('success', 'Sở thích đã được cập nhật.');
    }

    // Xóa sở thích khỏi cơ sở dữ liệu
    public function destroy(Hobby $hobby)
    {
        $hobby->delete();
        return redirect()->route('hobbies.index')->with('success', 'Sở thích đã được xóa.');
    }
}
