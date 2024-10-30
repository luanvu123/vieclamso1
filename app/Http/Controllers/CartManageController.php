<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\PlanCurrency;
use App\Models\PlanFeature;
use App\Models\TypeCart;
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
        $carts = Cart::with(['planCurrency', 'planFeatures', 'typeCart'])->get();
        return view('admin.carts.index', compact('carts'));
    }

    public function create()
    {
        $planCurrencies = PlanCurrency::all();
        $planFeatures = PlanFeature::all();
        $typeCarts = TypeCart::all();
        return view('admin.carts.create', compact('planCurrencies', 'planFeatures', 'typeCarts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan_currency_id' => 'required|exists:plan_currencies,id',
            'value' => 'required|numeric',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'top_point' => 'nullable|integer',
            'type_cart_id' => 'required|exists:type_carts,id',
            'validity' => 'nullable|integer',
            'title' => 'nullable|string|max:255',
            'background_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'plan_features' => 'array',
            // Validate các cột mới
            'description_home' => 'nullable|string',
            'Pricing' => 'boolean',
            'Time_to_display' => 'nullable|string',
            'Featured_job' => 'nullable|string',
            'job_suggestions' => 'nullable|string',
            'job_suggestion_cv' => 'nullable|string',
            'job_suggestion_related' => 'nullable|string',
            'job_suggestion_top' => 'nullable|string',
            'Top_Job_Alert' => 'boolean',
            'prime_time' => 'nullable|string',
            'regular_time' => 'nullable|string',
            'AI_powered_CV' => 'boolean',
            'Top_Add_ons' => 'boolean',
            'Advanced_news_headline' => 'boolean',
            'Add_on_visual' => 'boolean',
            'Service_Warranty' => 'nullable|string',
            'search_results' => 'boolean',
            'Top_Add_ons_in_2' => 'boolean',
            'Activate_CV_proposal' => 'boolean',
            'Give_350_Credits' => 'boolean',
        ]);

        $cartData = $request->only([
            'plan_currency_id',
            'value',
            'description',
            'status',
            'top_point',
            'type_cart_id',
            'validity',
            'title',
            'description_home',
            'Pricing',
            'Time_to_display',
            'Featured_job',
            'job_suggestions',
            'job_suggestion_cv',
            'job_suggestion_related',
            'job_suggestion_top',
            'Top_Job_Alert',
            'prime_time',
            'regular_time',
            'AI_powered_CV',
            'Top_Add_ons',
            'Advanced_news_headline',
            'Add_on_visual',
            'Service_Warranty',
            'search_results',
            'Top_Add_ons_in_2',
            'Activate_CV_proposal',
            'Give_350_Credits'
        ]);

        $cartData['user_id'] = Auth::id();

        if ($request->hasFile('background_image')) {
            $image = $request->file('background_image');
            $imagePath = $image->store('carts', 'public');
            $cartData['background_image'] = $imagePath;
        }

        $cart = Cart::create($cartData);
        $cart->planFeatures()->sync($request->plan_features);

        return redirect()->route('carts.index')->with('success', 'Cart created successfully');
    }


    public function show(Cart $cart)
    {
        return view('admin.carts.show', compact('cart'));
    }

    public function edit($id)
    {
        $cart = Cart::findOrFail($id);
        $planCurrencies = PlanCurrency::all();
        $planFeatures = PlanFeature::all();
        $typeCarts = TypeCart::all();
        return view('admin.carts.edit', compact('cart', 'planCurrencies', 'planFeatures', 'typeCarts'));
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);

        $request->validate([
            'plan_currency_id' => 'required|exists:plan_currencies,id',
            'value' => 'required|numeric',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'top_point' => 'nullable|numeric',
            'type_cart_id' => 'required|exists:type_carts,id',
            'validity' => 'nullable|integer',
            'title' => 'nullable|string|max:255',
            'background_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'plan_features' => 'nullable|array',
            'description_home' => 'nullable|string',
            'Pricing' => 'boolean',
            'Time_to_display' => 'nullable|string',
            'Featured_job' => 'nullable|string',
            'job_suggestions' => 'nullable|string',
            'job_suggestion_cv' => 'nullable|string',
            'job_suggestion_related' => 'nullable|string',
            'job_suggestion_top' => 'nullable|string',
            'Top_Job_Alert' => 'boolean',
            'prime_time' => 'nullable|string',
            'regular_time' => 'nullable|string',
            'AI_powered_CV' => 'boolean',
            'Top_Add_ons' => 'boolean',
            'Advanced_news_headline' => 'boolean',
            'Add_on_visual' => 'boolean',
            'Service_Warranty' => 'nullable|string',
            'search_results' => 'boolean',
            'Top_Add_ons_in_2' => 'boolean',
            'Activate_CV_proposal' => 'boolean',
            'Give_350_Credits' => 'boolean',
        ]);

        $cartData = $request->only([
            'plan_currency_id',
            'value',
            'description',
            'status',
            'top_point',
            'type_cart_id',
            'validity',
            'title',
            'description_home',
            'Pricing',
            'Time_to_display',
            'Featured_job',
            'job_suggestions',
            'job_suggestion_cv',
            'job_suggestion_related',
            'job_suggestion_top',
            'Top_Job_Alert',
            'prime_time',
            'regular_time',
            'AI_powered_CV',
            'Top_Add_ons',
            'Advanced_news_headline',
            'Add_on_visual',
            'Service_Warranty',
            'search_results',
            'Top_Add_ons_in_2',
            'Activate_CV_proposal',
            'Give_350_Credits'
        ]);

        if ($request->hasFile('background_image')) {
            $image = $request->file('background_image');
            $imagePath = $image->store('carts', 'public');
            $cartData['background_image'] = $imagePath;
        }

        $cart->update($cartData);
        $cart->planFeatures()->sync($request->plan_features);

        return redirect()->route('carts.index')->with('success', 'Cart updated successfully');
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->route('carts.index')->with('success', 'Cart deleted successfully');
    }
}
