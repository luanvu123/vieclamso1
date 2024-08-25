@extends('layouts.app')

@section('title', 'View Cart')

@section('content')
    <h1>View Cart</h1>

    <div>
        <p><strong>ID:</strong> {{ $cart->id }}</p>
        <p><strong>Plan Currency:</strong> {{ $cart->planCurrency->currency }}</p>
        <p><strong>Value:</strong> {{ $cart->value }}</p>
        <p><strong>Description:</strong> {{ $cart->description }}</p>
        <p><strong>Status:</strong> {{ $cart->status ? 'Active' : 'Inactive' }}</p>
        <p><strong>Plan Features:</strong></p>
        <ul>
            @foreach ($cart->planFeatures as $feature)
                <li>{{ $feature->feature }}</li>
            @endforeach
        </ul>
    </div>

    <a href="{{ route('carts.edit', $cart->id) }}">Edit</a>
    <form action="{{ route('carts.destroy', $cart->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('carts.index') }}">Back to List</a>
@endsection
