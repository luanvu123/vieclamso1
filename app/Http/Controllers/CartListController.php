<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartlist;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThankYouEmail;

class CartListController extends Controller
{
    public function addToCart(Request $request, $cartId)
    {
        $employer = Auth::guard('employer')->user();

        // Check if the cart item already exists in the cartlist for this employer
        $cartlist = Cartlist::where('employer_id', $employer->id)
            ->where('cart_id', $cartId)
            ->first();

        if ($cartlist) {
            // If it exists, increment the quantity
            $cartlist->quantity += 1;
            $cartlist->save();
        } else {
            // Otherwise, create a new entry
            Cartlist::create([
                'employer_id' => $employer->id,
                'cart_id' => $cartId,
                'quantity' => 1,
                'price' => $request->input('price'),
                'status' => 'pending'
            ]);
        }

        return redirect()->back()->with('success', 'Item added to cart successfully!');
    }

    public function index()
    {
        $cartlists = Cartlist::with('cart.planCurrency')->where('employer_id', Auth::guard('employer')->id())->get();
        return view('job_postings.cartlist_index', compact('cartlists'));
    }
    public function destroy($id)
    {
        $cartlist = Cartlist::findOrFail($id);
        $cartlist->delete();

        return redirect()->route('cartlist.index')->with('success', 'Item removed from cart successfully.');
    }
    public function edit($id)
    {
        $cartlist = Cartlist::findOrFail($id);
        return view('job_postings.cartlist_edit', compact('cartlist'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartlist = Cartlist::findOrFail($id);
        $cartlist->quantity = $request->input('quantity');
        $cartlist->save();

        return redirect()->route('cartlist.index')->with('success', 'Quantity updated successfully.');
    }

    public function storeOrder(Request $request)
    {
        $employer = Auth::guard('employer')->user();
        $cartlists = Cartlist::where('employer_id', $employer->id)->get();

        if ($cartlists->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Calculate total cost with VAT
        $totalCost = $cartlists->sum(function ($cartlist) {
            return $cartlist->price * $cartlist->quantity;
        });
        $vatAmount = $totalCost * ($request->input('vat') / 100);
        $totalCostWithVAT = $totalCost + $vatAmount;

        // Create an order with VAT
        $order = Order::create([
            'employer_id' => $employer->id,
            'total_amount' => $totalCostWithVAT,
            'vat' => $request->input('vat'), // Save VAT value
            'status' => 'pending', // or another status
        ]);

        // Create order details
        foreach ($cartlists as $cartlist) {
            OrderDetail::create([
                'order_id' => $order->id,
                'cart_id' => $cartlist->cart_id,
                'quantity' => $cartlist->quantity,
                'price' => $cartlist->price,
            ]);
        }

        $orderId = $order->id;
        $email = $employer->email;
        $amount =  $order->total_amount;
        $this->sendThankYouEmail($email, $orderId, $amount);
        // Clear the cart after order is placed
        Cartlist::where('employer_id', $employer->id)->delete();

        return redirect()->route('cartlist.showOrder', $order->id)->with('success', 'Your order has been placed successfully!');
    }
    public function sendThankYouEmail($email, $orderId, $amount)
    {
        Mail::to($email)->send(new ThankYouEmail($orderId, $amount));
    }

    public function listOrder()
    {
        $employer = Auth::guard('employer')->user();
        $orders = Order::where('employer_id', $employer->id)->with('orderDetails.cart')->get();

        return view('job_postings.cartlist_orders', compact('orders'));
    }
    public function showOrder($orderId)
    {
        $employer = Auth::guard('employer')->user();
        $order = Order::where('id', $orderId)
            ->where('employer_id', $employer->id)
            ->with('orderDetails.cart')
            ->firstOrFail();

        return view('job_postings.cartlist_order-details', compact('order'));
    }
}
