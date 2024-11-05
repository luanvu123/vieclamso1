<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
use App\Models\TypeEmployer;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $userId = $user->id;

        // Nếu người dùng là Admin, hiển thị tất cả đơn hàng; nếu không, chỉ hiển thị đơn hàng thuộc về công ty của nhà tuyển dụng
        if ($user->roles()->where('id', 1)->exists()) {
            $orders = Order::with('orderDetails.cart.planCurrency', 'employer')->orderBy('updated_at', 'DESC')->get();
        } else {
            $orders = Order::with('orderDetails.cart.planCurrency', 'employer')->whereHas('employer', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->orderBy('updated_at', 'DESC')->get();
        }

        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $userId = $user->id;

        // Lấy thông tin đơn hàng
        $order = Order::with('orderDetails.cart.planCurrency')->findOrFail($id);

        // Kiểm tra nếu người dùng là Admin hoặc là chủ sở hữu của đơn hàng thông qua user_id của nhà tuyển dụng
        if ($user->roles()->where('id', 1)->exists() || $order->employer->user_id === $userId) {
            return view('admin.orders.show', compact('order'));
        }

        return redirect()->route('ordermanages.index')->with('error', 'Bạn không có quyền xem đơn hàng này.');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $userId = $user->id;

        // Lấy thông tin đơn hàng
        $order = Order::findOrFail($id);

        // Kiểm tra nếu người dùng là Admin hoặc là chủ sở hữu của đơn hàng
        if (!$user->roles()->where('id', 1)->exists() && $order->employer->user_id !== $userId) {
            return redirect()->route('ordermanages.index')->with('error', 'Bạn không có quyền chỉnh sửa đơn hàng này.');
        }

        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Validate the incoming request
        $request->validate([
            'status' => 'required|string|in:pending,completed,canceled', // validate status
        ]);

        $transitions = [
            'pending' => ['completed', 'canceled'],
            'completed' => ['canceled'],
            'canceled' => [],
        ];

        $currentStatus = $order->status;
        $newStatus = $request->input('status');

        // Check for valid status transition
        if (!in_array($newStatus, $transitions[$currentStatus])) {
            return redirect()->back()->withErrors(['status' => 'Invalid status transition.']);
        }

        // Update employer's points if transitioning to completed
        if ($currentStatus !== 'completed' && $newStatus === 'completed') {
            $employer = $order->employer;
            foreach ($order->orderDetails as $orderDetail) {
                $cart = $orderDetail->cart;
                if ($cart->top_point > 0) {
                    $employer->top_point += $cart->top_point;
                    $employer->credit += $cart->top_point;
                }
            }
            $employer->save();
            $employer->updateTypeEmployer();
        }

        // Update order status
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
