@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">

                    <h1>Orders</h1>

                    @if ($orders->isEmpty())
                        <p>No orders found.</p>
                    @else
                        <table class="table table-striped" id="user-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Employer</th>
                                    <th>Details</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    @php
                                        // Kiểm tra nếu created_at của đơn hàng chưa tới 2 giờ kể từ hiện tại
                                        $isNew = $order->created_at->diffInHours(now()) < 2;
                                    @endphp
                                    <tr>
                                        <td @if ($isNew) style="font-weight: bold;" @endif>
                                            {{ $order->id }}</td>
                                        <td @if ($isNew) style="font-weight: bold;" @endif>
                                            {{ $order->total_amount }}
                                            {{ $order->orderDetails->first()->cart->planCurrency->currency }}
                                        </td>
                                        <td @if ($isNew) style="font-weight: bold;" @endif>
                                            {{ ucfirst($order->status) }}</td>
                                        <td @if ($isNew) style="font-weight: bold;" @endif>
                                            {{ $order->employer->name }}</td>
                                        <td>
                                            <a href="{{ route('ordermanages.show', $order->id) }}" class="btn btn-info">View
                                                Details</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('ordermanages.edit', $order->id) }}"><i
                                                    class="fa fa-pencil"></i>Edit
                                                Status</a>
                                            {{-- <form action="{{ route('ordermanages.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                                </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
