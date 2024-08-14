<?php

namespace App\Http\Controllers;

use App\Models\Value;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    public function index()
    {
        $values = Value::all();
        return view('admin.values.index', compact('values'));
    }

    public function create()
    {
        return view('admin.values.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'description' => 'required',
            'status' => 'required|boolean',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Value::create([
            'name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('values.index')->with('success', 'Value created successfully.');
    }

    public function show(Value $value)
    {
        return view('admin.values.show', compact('value'));
    }

    public function edit(Value $value)
    {
        return view('admin.values.edit', compact('value'));
    }

    public function update(Request $request, Value $value)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'sometimes|image',
            'description' => 'required',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $value->image = $imagePath;
        }

        $value->update($request->all());

        return redirect()->route('values.index')->with('success', 'Value updated successfully.');
    }

    public function destroy(Value $value)
    {
        $value->delete();
        return redirect()->route('values.index')->with('success', 'Value deleted successfully.');
    }
}
