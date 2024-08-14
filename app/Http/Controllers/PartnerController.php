<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\TypePartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        $typePartners = TypePartner::all();
        return view('admin.partners.create', compact('typePartners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_partner_id' => 'required',
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        $partnerData = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $partnerData['image'] = $path;
        }

        Partner::create($partnerData);

        return redirect()->route('partners.index')->with('success', 'Partner created successfully!');
    }


    public function show(Partner $partner)
    {
        return view('admin.partners.show', compact('partner'));
    }

    public function edit(Partner $partner)
    {
        $typePartners = TypePartner::all();
        return view('admin.partners.edit', compact('partner', 'typePartners'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'type_partner_id' => 'required',
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        $partnerData = $request->all();

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($partner->image) {
                Storage::disk('public')->delete($partner->image);
            }
            $path = $request->file('image')->store('images', 'public');
            $partnerData['image'] = $path;
        }

        $partner->update($partnerData);

        return redirect()->route('partners.index')->with('success', 'Partner updated successfully!');
    }


    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('partners.index')->with('success', 'Partner deleted successfully.');
    }
}
