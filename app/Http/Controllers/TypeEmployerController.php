<?php

namespace App\Http\Controllers;

use App\Models\TypeEmployer;
use Illuminate\Http\Request;

class TypeEmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeEmployers = TypeEmployer::all();
        return view('admin.type_employers.index', compact('typeEmployers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.type_employers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'top_point' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $typeEmployer = new TypeEmployer();
        $typeEmployer->name = $request->name;
        $typeEmployer->top_point = $request->top_point;
        $typeEmployer->status = $request->status;

        if ($request->hasFile('image')) {
            $typeEmployer->image = $request->file('image')->store('type_employer_images', 'public');
        }

        $typeEmployer->save();

        return redirect()->route('type-employer.index')->with('success', 'Type Employer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeEmployer $typeEmployer)
    {
        return view('admin.type_employers.show', compact('typeEmployer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeEmployer $typeEmployer)
    {
        return view('admin.type_employers.edit', compact('typeEmployer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeEmployer $typeEmployer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'top_point' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $typeEmployer->name = $request->name;
        $typeEmployer->top_point = $request->top_point;
        $typeEmployer->status = $request->status;

        if ($request->hasFile('image')) {
            if ($typeEmployer->image) {
                \Storage::disk('public')->delete($typeEmployer->image);
            }
            $typeEmployer->image = $request->file('image')->store('type_employer_images', 'public');
        }

        $typeEmployer->save();

        return redirect()->route('type-employer.index')->with('success', 'Type Employer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeEmployer $typeEmployer)
    {
        if ($typeEmployer->image) {
            \Storage::disk('public')->delete($typeEmployer->image);
        }

        $typeEmployer->delete();

        return redirect()->route('type-employer.index')->with('success', 'Type Employer deleted successfully.');
    }
    
}
