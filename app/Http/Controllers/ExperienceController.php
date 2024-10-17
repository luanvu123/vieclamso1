<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    // Hiển thị danh sách kinh nghiệm
    public function index()
    {
        $candidate = Auth::guard('candidate')->user();
        $experiences = $candidate->experiences;
         $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.experiences.index', compact('experiences','notifications'));
    }

    // Hiển thị form để thêm kinh nghiệm
    public function create()
    {
         $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.experiences.create',compact('notifications'));
    }

    // Lưu kinh nghiệm mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $candidate = Auth::guard('candidate')->user();
        $experience = new Experience($request->all());
        $experience->candidate_id = $candidate->id;
        $experience->save();

        return redirect()->route('experience.index')->with('success', 'Kinh nghiệm đã được thêm.');
    }

    // Hiển thị form để chỉnh sửa kinh nghiệm
    public function edit(Experience $experience)
    {
         $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.experiences.edit', compact('experience','notifications'));
    }

    // Cập nhật kinh nghiệm trong cơ sở dữ liệu
    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $experience->update($request->all());

        return redirect()->route('experience.index')->with('success', 'Kinh nghiệm đã được cập nhật.');
    }

    // Xóa kinh nghiệm khỏi cơ sở dữ liệu
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experience.index')->with('success', 'Kinh nghiệm đã được xóa.');
    }
}
