<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
     public function __construct()
    {
        $this->middleware('permission:consultation-list', ['only' => ['index']]);
        $this->middleware('permission:consultation-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:consultation-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultation-delete', ['only' => ['destroy']]);
    }
   public function index()
    {
        $consultations = Consultation::with('city', 'typeConsultation')->orderBy('updated_at', 'DESC')->get();
        return view('admin.consultations.index', compact('consultations'));
    }
    public function edit(Consultation $consultation)
    {
        return view('admin.consultations.edit', [
            'consultation' => $consultation,
        ]);
    }

    // Update the status of the specified consultation in storage
    public function update(Request $request, Consultation $consultation)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $consultation->status = $request->input('status');
        $consultation->save();

        return redirect()->route('consultations.index')
            ->with('success', 'Consultation status updated successfully.');
    }

    // Delete the specified consultation from storage
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();

        return redirect()->route('consultations.index')
            ->with('success', 'Consultation deleted successfully.');
    }
}
