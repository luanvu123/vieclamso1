<?php
namespace App\Http\Controllers;

use App\Models\TypeHotline;
use Illuminate\Http\Request;

class TypeHotlineController extends Controller
{
     public function __construct()
    {
        $this->middleware('permission:type-hotline-list', ['only' => ['index']]);
        $this->middleware('permission:type-hotline-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:type-hotline-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:type-hotline-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $typeHotlines = TypeHotline::all();
        return view('admin.type_hotlines.index', compact('typeHotlines'));
    }

    public function create()
    {
        return view('admin.type_hotlines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        TypeHotline::create($request->all());
        return redirect()->route('type_hotlines.index')->with('success', 'Type of Hotline created successfully.');
    }

    public function edit(TypeHotline $typeHotline)
    {
        return view('admin.type_hotlines.edit', compact('typeHotline'));
    }

    public function update(Request $request, TypeHotline $typeHotline)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $typeHotline->update($request->all());
        return redirect()->route('type_hotlines.index')->with('success', 'Type of Hotline updated successfully.');
    }

    public function destroy(TypeHotline $typeHotline)
    {
        $typeHotline->delete();
        return redirect()->route('type_hotlines.index')->with('success', 'Type of Hotline deleted successfully.');
    }
}
