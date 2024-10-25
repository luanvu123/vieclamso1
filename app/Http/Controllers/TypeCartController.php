<?php

namespace App\Http\Controllers;

use App\Models\TypeCart;
use Illuminate\Http\Request;

class TypeCartController extends Controller
{
    public function index()
    {
        $typeCarts = TypeCart::all();
        return view('admin.type_cart.index', compact('typeCarts'));
    }

    public function create()
    {
        return view('admin.type_cart.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'detail' => 'nullable|string',
        ]);

        TypeCart::create($request->all());
        return redirect()->route('type_cart.index')->with('success', 'TypeCart created successfully.');
    }

    public function show(TypeCart $typeCart)
    {
        return view('admin.type_cart.show', compact('typeCart'));
    }

    public function edit(TypeCart $typeCart)
    {
        return view('admin.type_cart.edit', compact('typeCart'));
    }

    public function update(Request $request, TypeCart $typeCart)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'detail' => 'nullable|string',
        ]);

        $typeCart->update($request->all());
        return redirect()->route('type_cart.index')->with('success', 'TypeCart updated successfully.');
    }

    public function destroy(TypeCart $typeCart)
    {
        $typeCart->delete();
        return redirect()->route('type_cart.index')->with('success', 'TypeCart deleted successfully.');
    }
}
