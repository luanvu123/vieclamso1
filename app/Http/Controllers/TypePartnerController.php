<?php
namespace App\Http\Controllers;

use App\Models\TypePartner;
use Illuminate\Http\Request;

class TypePartnerController extends Controller
{
      public function __construct()
    {
        $this->middleware('permission:type-partner-list', ['only' => ['index']]);
        $this->middleware('permission:type-partner-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:type-partner-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:type-partner-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $typePartners = TypePartner::all();
        return view('admin.type_partners.index', compact('typePartners'));
    }

    public function create()
    {
        return view('admin.type_partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        TypePartner::create($request->all());

        return redirect()->route('type-partners.index')->with('success', 'TypePartner created successfully.');
    }

    public function show(TypePartner $typePartner)
    {
        return view('admin.type_partners.show', compact('typePartner'));
    }

    public function edit(TypePartner $typePartner)
    {
        return view('admin.type_partners.edit', compact('typePartner'));
    }

    public function update(Request $request, TypePartner $typePartner)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $typePartner->update($request->all());

        return redirect()->route('type-partners.index')->with('success', 'TypePartner updated successfully.');
    }

    public function destroy(TypePartner $typePartner)
    {
        $typePartner->delete();

        return redirect()->route('type-partners.index')->with('success', 'TypePartner deleted successfully.');
    }
}
