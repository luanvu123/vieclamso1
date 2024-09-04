<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\PlanCurrency;
use App\Models\PlanFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartManageController extends Controller
{
    public function __construct()
{
    $this->middleware('permission:cart-list|cart-create|cart-edit|cart-delete', ['only' => ['index', 'store']]);
    $this->middleware('permission:cart-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:cart-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:cart-delete', ['only' => ['destroy']]);
}

    public function index()
    {
        $carts = Cart::all();
        return view('admin.carts.index', compact('carts'));
    }

    public function create()
    {
        $planCurrencies = PlanCurrency::all();
        $planFeatures = PlanFeature::all();
        return view('admin.carts.create', compact('planCurrencies', 'planFeatures'));
    }

   public function store(Request $request)
{
    $request->validate([
        'plan_currency_id' => 'required|exists:plan_currencies,id',
        'value' => 'required|numeric',
        'description' => 'nullable|string',
        'status' => 'required|boolean',
        'top_point' => 'required|integer',
        'plan_features' => 'array'

    ]);

    $cart = new Cart([
        'user_id' => Auth::id(),
        'plan_currency_id' => $request->plan_currency_id,
        'value' => $request->value,
        'description' => $request->description,
        'status' => $request->status,
        'top_point' => $request->top_point,
    ]);
    $cart->save();

    // Liên kết nhiều tính năng vào cart
    $cart->planFeatures()->sync($request->plan_features);

    return redirect()->route('carts.index');
}

    public function show(Cart $cart)
    {
        return view('admin.carts.show', compact('cart'));
    }

    public function edit(Cart $cart)
    {
        $planCurrencies = PlanCurrency::all();
        $planFeatures = PlanFeature::all();
        return view('admin.carts.edit', compact('cart', 'planCurrencies', 'planFeatures'));
    }

   public function update(Request $request, Cart $cart)
{
    $request->validate([
        'plan_currency_id' => 'required|exists:plan_currencies,id',
        'value' => 'required|numeric',
        'description' => 'nullable|string',
        'status' => 'required|boolean',
        'top_point' => 'required|integer',
        'plan_features' => 'array'
    ]);

    $cart->update([
        'plan_currency_id' => $request->plan_currency_id,
        'value' => $request->value,
        'description' => $request->description,
         'top_point' => $request->top_point,
        'status' => $request->status
    ]);

    // Cập nhật liên kết nhiều tính năng vào cart
    $cart->planFeatures()->sync($request->plan_features);

    return redirect()->route('carts.index');
}

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('carts.index');
    }
}
