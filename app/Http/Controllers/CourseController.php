<?php
namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
        ]);

        $courseData = [
            'user_id' => Auth::id(),
            'name' => $request->name,
            'website' => $request->website,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('courses', 'public');
            $courseData['image'] = $imagePath;
        }

        Course::create($courseData);

        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }

    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
        ]);

        $courseData = [
            'name' => $request->name,
            'website' => $request->website,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('courses', 'public');
            $courseData['image'] = $imagePath;
        }

        $course->update($courseData);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}

