<?php
// app/Http/Controllers/ActivityController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    // Hiển thị danh sách hoạt động
    public function index()
    {
        $candidate = Auth::guard('candidate')->user();
        $activities = $candidate->activities;
         $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.activities.index', compact('activities','notifications'));
    }

    // Hiển thị form để thêm hoạt động
    public function create()
    {
         $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.activities.create',compact('notifications'));
    }

    // Lưu hoạt động mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $candidate = Auth::guard('candidate')->user();
        $activity = new Activity($request->all());
        $activity->candidate_id = $candidate->id;
        $activity->save();

        return redirect()->route('activities.index')->with('success', 'Hoạt động đã được thêm.');
    }

    // Hiển thị form để chỉnh sửa hoạt động
    public function edit(Activity $activity)
    {
         $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.activities.edit', compact('activity','notifications'));
    }

    // Cập nhật hoạt động trong cơ sở dữ liệu
    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $activity->update($request->all());

        return redirect()->route('activities.index')->with('success', 'Hoạt động đã được cập nhật.');
    }

    // Xóa hoạt động khỏi cơ sở dữ liệu
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('activities.index')->with('success', 'Hoạt động đã được xóa.');
    }
}
