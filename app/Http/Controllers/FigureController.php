<?php

namespace App\Http\Controllers;

use App\Models\Figure;
use Illuminate\Http\Request;

class FigureController extends Controller
{
     public function __construct()
    {
        $this->middleware('permission:figure-list', ['only' => ['index']]);
        $this->middleware('permission:figure-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:figure-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:figure-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $figures = Figure::all();
        return view('admin.figures.index', compact('figures'));
    }

    public function create()
    {
        return view('admin.figures.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'status' => 'required|boolean',
        ]);

        Figure::create($request->all());

        return redirect()->route('figures.index')->with('success', 'Figure created successfully.');
    }

    public function show(Figure $figure)
    {
        return view('admin.figures.show', compact('figure'));
    }

    public function edit(Figure $figure)
    {
        return view('admin.figures.edit', compact('figure'));
    }

    public function update(Request $request, Figure $figure)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'status' => 'required|boolean',
        ]);

        $figure->update($request->all());

        return redirect()->route('figures.index')->with('success', 'Figure updated successfully.');
    }

    public function destroy(Figure $figure)
    {
        $figure->delete();

        return redirect()->route('figures.index')->with('success', 'Figure deleted successfully.');
    }
}
