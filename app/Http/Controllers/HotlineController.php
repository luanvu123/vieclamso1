<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hotline;
use App\Models\TypeHotline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotlineController extends Controller
{
    public function index()
    {
        $hotlines = Hotline::with('typeHotline')->get();
        return view('admin.hotlines.index', compact('hotlines'));
    }

    public function create()
    {
        $typeHotlines = TypeHotline::where('status', true)->get();
        return view('admin.hotlines.create', compact('typeHotlines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string|max:255',
            'contact_name' => 'nullable|string|max:255',
            'type_hotline_id' => 'required|exists:type_hotlines,id',
            'status' => 'required|boolean',
        ]);

        $hotline = new Hotline($request->all());
        $hotline->user_id = Auth::id();
        $hotline->status = $request->has('status') ? $request->status : true;
        $hotline->save();

        return redirect()->route('hotlines.index')->with('success', 'Hotline created successfully!');
    }

    public function show(Hotline $hotline)
    {
        return view('admin.hotlines.show', compact('hotline'));
    }

    public function edit(Hotline $hotline)
    {
        $typeHotlines = TypeHotline::where('status', true)->get();
        return view('admin.hotlines.edit', compact('hotline', 'typeHotlines'));
    }

    public function update(Request $request, Hotline $hotline)
    {
        $request->validate([
            'phone_number' => 'required|string|max:255',
            'contact_name' => 'nullable|string|max:255',
            'type_hotline_id' => 'required|exists:type_hotlines,id',
            'status' => 'required|boolean',
        ]);

        $hotline->update($request->all());

        return redirect()->route('hotlines.index')->with('success', 'Hotline updated successfully!');
    }

    public function destroy(Hotline $hotline)
    {
        $hotline->delete();

        return redirect()->route('hotlines.index')->with('success', 'Hotline deleted successfully!');
    }
}
