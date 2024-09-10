<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AwardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:award-list|award-create|award-edit|award-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:award-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:award-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:award-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $awards = Award::all();
        return view('admin.awards.index', compact('awards'));
    }

    public function create()
    {
        return view('admin.awards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'website' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        $awardData = [
            'user_id' => Auth::id(),
            'name' => $request->name,
            'website' => $request->website,
            'status' => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('awards', 'public');
            $awardData['image'] = $imagePath;
        }

        Award::create($awardData);

        return redirect()->route('awards.index')->with('success', 'Award created successfully!');
    }

    public function edit(Award $award)
    {
        if ($award->user_id !== Auth::id()) {
            return redirect()->route('awards.index')->with('error', 'Unauthorized access.');
        }

        return view('admin.awards.edit', compact('award'));
    }

    public function update(Request $request, Award $award)
{
    if ($award->user_id !== Auth::id()) {
        return redirect()->route('awards.index')->with('error', 'Unauthorized access.');
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'website' => 'nullable|string|max:255',
        'status' => 'boolean',  // Ensure 'status' is boolean
    ]);

    $awardData = [
        'name' => $request->name,
        'website' => $request->website,
        'status' => $request->has('status') ? 1 : 0,  // Check if checkbox is checked
    ];

    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($award->image && Storage::disk('public')->exists($award->image)) {
            Storage::disk('public')->delete($award->image);
        }

        $image = $request->file('image');
        $imagePath = $image->store('awards', 'public');
        $awardData['image'] = $imagePath;
    }

    $award->update($awardData);

    return redirect()->route('awards.index')->with('success', 'Award updated successfully!');
}


    public function destroy(Award $award)
    {
        if ($award->user_id !== Auth::id()) {
            return redirect()->route('awards.index')->with('error', 'Unauthorized access.');
        }

        // Delete image if exists
        if ($award->image && Storage::disk('public')->exists($award->image)) {
            Storage::disk('public')->delete($award->image);
        }

        $award->delete();

        return redirect()->route('awards.index')->with('success', 'Award deleted successfully!');
    }
     public function show($id)
    {
        $award = Award::findOrFail($id);
        return view('admin.awards.show', compact('award'));
    }
}
