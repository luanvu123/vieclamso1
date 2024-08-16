<?php

namespace App\Http\Controllers;

use App\Models\TypeConsultation;
use Illuminate\Http\Request;

class TypeConsultationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:type-consultation-list', ['only' => ['index']]);
        $this->middleware('permission:type-consultation-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:type-consultation-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:type-consultation-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $typeConsultations = TypeConsultation::all();
        return view('admin.type-consultations.index', compact('typeConsultations'));
    }

    public function create()
    {
        return view('admin.type-consultations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        TypeConsultation::create($request->all());
        return redirect()->route('type-consultations.index')->with('success', 'Type of consultation created successfully.');
    }

    public function show(TypeConsultation $typeConsultation)
    {
        return view('admin.type-consultations.show', compact('typeConsultation'));
    }

    public function edit(TypeConsultation $typeConsultation)
    {
        return view('admin.type-consultations.edit', compact('typeConsultation'));
    }

     public function update(Request $request, TypeConsultation $typeConsultation)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        $typeConsultation->update([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('type-consultations.index')->with('success', 'Type Consultation updated successfully.');
    }

    public function destroy(TypeConsultation $typeConsultation)
    {
        $typeConsultation->delete();
        return redirect()->route('type-consultations.index')->with('success', 'Type of consultation deleted successfully.');
    }
}
