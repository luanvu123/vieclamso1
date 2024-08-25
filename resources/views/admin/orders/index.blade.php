@extends('layouts.app')

@section('content')
    <div class="container">
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
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->total_amount }} {{ $order->orderDetails->first()->cart->planCurrency->currency }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>{{ $order->employer->name }}</td>
                            <td>
                                <a href="{{ route('ordermanages.show', $order->id) }}" class="btn btn-info">View Details</a>
                            </td>
                            <td>
                                <a href="{{ route('ordermanages.edit', $order->id) }}" class="btn btn-warning">Edit Status</a>
                                <form action="{{ route('ordermanages.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
