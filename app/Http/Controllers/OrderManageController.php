<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;

class OrderManageController extends Controller
{
    // Display a listing of the orders
    public function index()
    {
        $orders = Order::with('orderDetails.cart.planCurrency', 'employer')->get();

        return view('admin.orders.index', compact('orders'));
    }

    // Display the specified order
    public function show($id)
    {
        $order = Order::with('orderDetails.cart.planCurrency')->findOrFail($id);
        $info = \App\Models\Info::first(); // Assuming you want to show VAT info

        return view('admin.orders.show', compact('order', 'info'));
    }

    // Show the form for editing the status of the specified order
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orders.edit', compact('order'));
    }

    // Update the status of the specified order
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,completed,canceled',
        ]);

        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('ordermanages.index')->with('success', 'Order status updated successfully.');
    }

    // Remove the specified order from storage
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('ordermanages.index')->with('success', 'Order deleted successfully.');
    }
}
