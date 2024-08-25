<?php

namespace App\Http\Controllers;

use App\Models\PlanCurrency;
use Illuminate\Http\Request;

class PlanCurrencyController extends Controller
{
    public function index()
    {
        $planCurrencies = PlanCurrency::all();
        return view('admin.plan_currencies.index', compact('planCurrencies'));
    }

    public function create()
    {
        return view('admin.plan_currencies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'currency' => 'required|string|max:10',
        ]);

        PlanCurrency::create($request->all());
        return redirect()->route('plan-currencies.index');
    }

    public function show(PlanCurrency $planCurrency)
    {
        return view('admin.plan_currencies.show', compact('planCurrency'));
    }

    public function edit(PlanCurrency $planCurrency)
    {
        return view('admin.plan_currencies.edit', compact('planCurrency'));
    }

    public function update(Request $request, PlanCurrency $planCurrency)
    {
        $request->validate([
            'currency' => 'required|string|max:10',
        ]);

        $planCurrency->update($request->all());
        return redirect()->route('plan-currencies.index');
    }

    public function destroy(PlanCurrency $planCurrency)
    {
        $planCurrency->delete();
        return redirect()->route('plan-currencies.index');
    }
}
