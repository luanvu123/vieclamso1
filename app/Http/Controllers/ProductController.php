<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:product-choose', ['only' => ['product_choose']]);
    //     $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'store']]);
    //     $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'number_day' => 'required|integer',
            'top_point' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description' => 'nullable|string',
            'condition' => 'nullable|string',
              'usage_count' => 'required|integer',
            'type_product' => 'required|in:service,voucher',
            'status' => 'required|in:active,inactive',
        ]);

        $productData = $request->only([
            'name', 'company', 'number_day', 'top_point',
            'description', 'condition', 'type_product', 'status','usage_count'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('products', 'public');
            $productData['image'] = $imagePath;
        }

        $productData['user_id'] = Auth::id();

        Product::create($productData);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'number_day' => 'required|integer',
            'top_point' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description' => 'nullable|string',
            'condition' => 'nullable|string',
            'type_product' => 'required|in:service,voucher',
            'status' => 'required|in:active,inactive',
              'usage_count' => 'required|integer',
        ]);

        $productData = $request->only([
            'name', 'company', 'number_day', 'top_point',
            'description', 'condition', 'type_product', 'status','usage_count'
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $image = $request->file('image');
            $imagePath = $image->store('products', 'public');
            $productData['image'] = $imagePath;
        }

        $product->update($productData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function product_choose(Request $request)
    {
        $data = $request->all();
        $product = Product::find($data['id']);
        $product->status = $data['status'];
        $product->save();
    }
}
