<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index()
{
    $medias = Media::all();
    return view('admin.medias.index', compact('medias'));
}


    public function create()
    {
        return view('admin.medias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'website' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        $mediaData = [
            'user_id' => Auth::id(),
            'website' => $request->website,
            'status' => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('medias', 'public');
            $mediaData['image'] = $imagePath;
        }

        Media::create($mediaData);

        return redirect()->route('medias.index')->with('success', 'Media created successfully!');
    }

    public function edit(Media $media)
    {
        if ($media->user_id !== Auth::id()) {
            return redirect()->route('medias.index')->with('error', 'Unauthorized access.');
        }

        return view('admin.medias.edit', compact('media'));
    }

    public function update(Request $request, Media $media)
    {
        if ($media->user_id !== Auth::id()) {
            return redirect()->route('medias.index')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'website' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        $mediaData = [
            'website' => $request->website,
            'status' => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('image')) {
            if ($media->image && Storage::disk('public')->exists($media->image)) {
                Storage::disk('public')->delete($media->image);
            }

            $image = $request->file('image');
            $imagePath = $image->store('medias', 'public');
            $mediaData['image'] = $imagePath;
        }

        $media->update($mediaData);

        return redirect()->route('medias.index')->with('success', 'Media updated successfully!');
    }

    public function destroy(Media $media)
    {
        if ($media->user_id !== Auth::id()) {
            return redirect()->route('medias.index')->with('error', 'Unauthorized access.');
        }

        if ($media->image && Storage::disk('public')->exists($media->image)) {
            Storage::disk('public')->delete($media->image);
        }

        $media->delete();

        return redirect()->route('medias.index')->with('success', 'Media deleted successfully!');
    }
    public function show($id)
    {
        $media = Media::findOrFail($id);
        return view('admin.medias.show', compact('media'));
    }
}
