<?php

namespace App\Http\Controllers;

use App\Models\Ecosystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EcosystemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ecosystems = Ecosystem::all();
        return view('admin.ecosystems.index', compact('ecosystems'));
    }

    public function create()
    {
        return view('admin.ecosystems.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'detail' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'website' => 'nullable|string|max:255',
        'name_link_website' => 'nullable|string|max:255',
        'image_footer' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'nullable|boolean',
    ]);

    $ecosystemData = [
        'user_id' => Auth::id(),
        'name' => $request->name,
        'detail' => $request->detail,
        'website' => $request->website,
        'name_link_website' => $request->name_link_website,
        'status' => $request->has('status') ? 1 : 0,
    ];

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('ecosystems', 'public');
        $ecosystemData['image'] = $imagePath;
    }

    if ($request->hasFile('image_footer')) {
        $imageFooter = $request->file('image_footer');
        $imageFooterPath = $imageFooter->store('ecosystems_footer', 'public');
        $ecosystemData['image_footer'] = $imageFooterPath;
    }

    Ecosystem::create($ecosystemData);

    return redirect()->route('ecosystems.index')->with('success', 'Ecosystem created successfully!');
}

public function update(Request $request, Ecosystem $ecosystem)
{
    if ($ecosystem->user_id !== Auth::id()) {
        return redirect()->route('ecosystems.index')->with('error', 'Unauthorized access.');
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'detail' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'website' => 'nullable|string|max:255',
        'name_link_website' => 'nullable|string|max:255',
        'image_footer' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'nullable|boolean',
    ]);

    $ecosystemData = [
        'name' => $request->name,
        'detail' => $request->detail,
        'website' => $request->website,
        'name_link_website' => $request->name_link_website,
        'status' => $request->has('status') ? 1 : 0,
    ];

    if ($request->hasFile('image')) {
        if ($ecosystem->image && Storage::disk('public')->exists($ecosystem->image)) {
            Storage::disk('public')->delete($ecosystem->image);
        }

        $image = $request->file('image');
        $imagePath = $image->store('ecosystems', 'public');
        $ecosystemData['image'] = $imagePath;
    }

    if ($request->hasFile('image_footer')) {
        if ($ecosystem->image_footer && Storage::disk('public')->exists($ecosystem->image_footer)) {
            Storage::disk('public')->delete($ecosystem->image_footer);
        }

        $imageFooter = $request->file('image_footer');
        $imageFooterPath = $imageFooter->store('ecosystems_footer', 'public');
        $ecosystemData['image_footer'] = $imageFooterPath;
    }

    $ecosystem->update($ecosystemData);

    return redirect()->route('ecosystems.index')->with('success', 'Ecosystem updated successfully!');
}


    public function edit(Ecosystem $ecosystem)
    {
        if ($ecosystem->user_id !== Auth::id()) {
            return redirect()->route('ecosystems.index')->with('error', 'Unauthorized access.');
        }

        return view('admin.ecosystems.edit', compact('ecosystem'));
    }



    public function destroy(Ecosystem $ecosystem)
    {
        if ($ecosystem->user_id !== Auth::id()) {
            return redirect()->route('ecosystems.index')->with('error', 'Unauthorized access.');
        }

        // Delete image if exists
        if ($ecosystem->image && Storage::disk('public')->exists($ecosystem->image)) {
            Storage::disk('public')->delete($ecosystem->image);
        }

        $ecosystem->delete();

        return redirect()->route('ecosystems.index')->with('success', 'Ecosystem deleted successfully!');
    }
    public function show($id)
    {
        $ecosystem = Ecosystem::findOrFail($id);
        return view('admin.ecosystems.show', compact('ecosystem'));
    }
}
