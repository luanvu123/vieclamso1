<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\TypeSupport;
use Illuminate\Http\Request;

class TypeSupportController extends Controller
{
    public function index()
    {
        $typeSupports = TypeSupport::all();
        return view('admin.type_support.index', compact('typeSupports'));
    }

    public function create()
    {
        return view('admin.type_support.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        TypeSupport::create($request->all());

        return redirect()->route('type_support.index')->with('success', 'Type of support created successfully.');
    }

    public function show(TypeSupport $typeSupport)
    {
        return view('admin.type_support.show', compact('typeSupport'));
    }

    public function edit(TypeSupport $typeSupport)
    {
        return view('admin.type_support.edit', compact('typeSupport'));
    }

    public function update(Request $request, TypeSupport $typeSupport)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $typeSupport->update($request->all());

        return redirect()->route('type_support.index')->with('success', 'Type of support updated successfully.');
    }

    public function destroy(TypeSupport $typeSupport)
    {
        $typeSupport->delete();
        return redirect()->route('type_support.index')->with('success', 'Type of support deleted successfully.');
    }

      public function indexSupport()
    {
        $supports = Support::with('typeSupport')->get();
        return view('admin.type_support.indexSupport', compact('supports'));
    }
      public function showSupport($id)
    {
        $support = Support::with('typeSupport')->findOrFail($id);
        return view('admin.type_support.showSupport', compact('support'));
    }

    public function destroySupport($id)
    {
        $support = Support::findOrFail($id);
        $support->delete();

        return redirect()->route('supports.index.list')->with('success', 'Support request deleted successfully.');
    }
}
