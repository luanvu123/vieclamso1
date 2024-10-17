<?php
// app/Http/Controllers/PrizeController.php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Prize;
use Illuminate\Support\Facades\Auth;

class PrizeController extends Controller
{
    // Hiển thị danh sách giải thưởng
    public function index()
    {
        $candidate = Auth::guard('candidate')->user();
        $prizes = $candidate->prizes;
         $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.prizes.index', compact('prizes','notifications'));
    }

    // Hiển thị form để thêm giải thưởng
    public function create()
    {
         $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.prizes.create',compact('notifications'));
    }

    // Lưu giải thưởng mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'date_awarded' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $candidate = Auth::guard('candidate')->user();
        $prize = new Prize($request->all());
        $prize->candidate_id = $candidate->id;
        $prize->save();

        return redirect()->route('prizes.index')->with('success', 'Giải thưởng đã được thêm.');
    }

    // Hiển thị form để chỉnh sửa giải thưởng
    public function edit(Prize $prize)
    {
         $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.prizes.edit', compact('prize','notifications'));
    }

    // Cập nhật giải thưởng trong cơ sở dữ liệu
    public function update(Request $request, Prize $prize)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'date_awarded' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $prize->update($request->all());

        return redirect()->route('prizes.index')->with('success', 'Giải thưởng đã được cập nhật.');
    }

    // Xóa giải thưởng khỏi cơ sở dữ liệu
    public function destroy(Prize $prize)
    {
        $prize->delete();
        return redirect()->route('prizes.index')->with('success', 'Giải thưởng đã được xóa.');
    }
}
