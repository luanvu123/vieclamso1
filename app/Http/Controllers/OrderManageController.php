<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
use App\Models\TypeEmployer;

class OrderManageController extends Controller
{
    public function __construct()
{
    $this->middleware('permission:ordermanage-list|ordermanage-create|ordermanage-edit|ordermanage-delete', ['only' => ['index', 'store']]);
    $this->middleware('permission:ordermanage-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:ordermanage-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:ordermanage-delete', ['only' => ['destroy']]);
}

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
        return view('admin.orders.show', compact('order'));
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

        $transitions = [
            'pending' => ['completed', 'canceled'],
            'completed' => ['canceled'],
            'canceled' => [],
        ];

        $currentStatus = $order->status;
        $newStatus = $request->input('status');

        if (!in_array($newStatus, $transitions[$currentStatus])) {
            return redirect()->back()->withErrors(['status' => 'Invalid status transition.']);
        }

        if ($currentStatus !== 'completed' && $newStatus === 'completed') {
            $employer = $order->employer;

            // Update employer's top_point based on the carts in the order
            foreach ($order->orderDetails as $orderDetail) {
                $cart = $orderDetail->cart;
                if ($cart->top_point > 0) {
                    $employer->top_point += $cart->top_point;
                     $employer->credit += $cart->top_point;
                }
            }

            // Save the updated top_point value for the employer
            $employer->save();

            // Update type_employer_id based on the updated top_point
            $employer->updateTypeEmployer();
        }

        $order->status = $newStatus;
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
