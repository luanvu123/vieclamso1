<?php

namespace App\Http\Controllers;

use App\Models\PlanFeature;
use Illuminate\Http\Request;

class PlanFeatureController extends Controller
{
    public function __construct()
{
    $this->middleware('permission:plan-feature-list|plan-feature-create|plan-feature-edit|plan-feature-delete', ['only' => ['index', 'store']]);
    $this->middleware('permission:plan-feature-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:plan-feature-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:plan-feature-delete', ['only' => ['destroy']]);
}

    public function index()
    {
        $planFeatures = PlanFeature::all();
        return view('admin.plan_features.index', compact('planFeatures'));
    }

    public function create()
    {
        return view('admin.plan_features.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'feature' => 'required|string|max:255',
        ]);

        PlanFeature::create($request->all());
        return redirect()->route('plan-features.index');
    }

    public function show(PlanFeature $planFeature)
    {
        return view('admin.plan_features.show', compact('planFeature'));
    }

    public function edit(PlanFeature $planFeature)
    {
        return view('admin.plan_features.edit', compact('planFeature'));
    }

    public function update(Request $request, PlanFeature $planFeature)
    {
        $request->validate([
            'feature' => 'required|string|max:255',
        ]);

        $planFeature->update($request->all());
        return redirect()->route('plan-features.index');
    }

    public function destroy(PlanFeature $planFeature)
    {
        $planFeature->delete();
        return redirect()->route('plan-features.index');
    }
}
