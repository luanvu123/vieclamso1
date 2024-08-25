@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Order Status - Order #{{ $order->id }}</h1>

        <form action="{{ route('ordermanages.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Status</button>
            <a href="{{ route('ordermanages.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
