<?php

namespace App\Http\Controllers;

use App\Models\PublicLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PublicLinkController extends Controller
{
  public function __construct()
    {
        $this->middleware('permission:public_link-list|public_link-create|public_link-edit|public_link-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:public_link-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:public_link-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:public_link-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $publicLinks = PublicLink::all();
        return view('admin.public_links.index', compact('publicLinks'));
    }

    public function create()
    {
        return view('admin.public_links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->only(['link', 'status']);
        $data['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        PublicLink::create($data);

        return redirect()->route('public_links.index')->with('success', 'Public link created successfully.');
    }

    public function show(PublicLink $publicLink)
    {
        return view('admin.public_links.show', compact('publicLink'));
    }

    public function edit(PublicLink $publicLink)
    {
        return view('admin.public_links.edit', compact('publicLink'));
    }

    public function update(Request $request, PublicLink $publicLink)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->only(['link', 'status']);
        $data['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            if ($publicLink->image) {
                Storage::disk('public')->delete($publicLink->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $publicLink->update($data);

        return redirect()->route('public_links.index')->with('success', 'Public link updated successfully.');
    }

    public function destroy(PublicLink $publicLink)
    {
        if ($publicLink->image) {
            Storage::disk('public')->delete($publicLink->image);
        }

        $publicLink->delete();

        return redirect()->route('public_links.index')->with('success', 'Public link deleted successfully.');
    }
}
