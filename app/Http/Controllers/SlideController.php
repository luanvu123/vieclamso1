<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
  public function __construct()
{
    $this->middleware('permission:slide-choose', ['only' => ['slide_choose']]);
    $this->middleware('permission:slide-list|slide-create|slide-edit|slide-delete', ['only' => ['index', 'store']]);
    $this->middleware('permission:slide-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:slide-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:slide-delete', ['only' => ['destroy']]);
}


    public function index()
    {
        $sliders = Slide::all();
        return view('admin.slides.index', compact('sliders'));
    }

    public function show($id)
    {
        $slider = Slide::findOrFail($id);
        return view('admin.slides.show', compact('slider'));
    }

    public function create()
    {
        return view('admin.slides.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|in:active,inactive',
            'link' => 'required|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $slideData = $request->only(['status', 'link']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('slides', 'public');
            $slideData['image'] = $imagePath;
        }

        $slideData['user_id'] = Auth::id(); // Set user_id

        Slide::create($slideData);

        return redirect()->route('slides.index')->with('success', 'Slide created successfully.');
    }

    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    public function update(Request $request, Slide $slide)
    {
        $request->validate([
            'status' => 'required|in:active,inactive',
            'link' => 'required|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $slideData = $request->only(['status', 'link']);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($slide->image) {
                Storage::disk('public')->delete($slide->image);
            }

            $image = $request->file('image');
            $imagePath = $image->store('slides', 'public');
            $slideData['image'] = $imagePath;
        }

        $slide->update($slideData);

        return redirect()->route('slides.index')->with('success', 'Slide updated successfully.');
    }

    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        if ($slide->image) {
            Storage::disk('public')->delete($slide->image);
        }
        $slide->delete();
        return redirect()->route('slides.index')->with('success', 'Slide deleted successfully.');
    }

    public function slide_choose(Request $request)
    {
        $data = $request->all();
        $slide = Slide::find($data['id']);
        $slide->status = $data['status'];
        $slide->save();
    }
}
