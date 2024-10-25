@extends('layouts.app')

@section('title', 'View Cart')

@section('content')
    <h1>View Service</h1>

    <div>
        <p><strong>ID:</strong> {{ $cart->id }}</p>
        <p><strong>Title:</strong> {{ $cart->title }}</p> <!-- Thêm Title -->
        <p><strong>Plan Currency:</strong> {{ $cart->planCurrency->currency }}</p>
        <p><strong>Value:</strong> {{ $cart->value }}</p>
        <p><strong>Top Point:</strong> {{ $cart->top_point }}</p>
        <p><strong>Description:</strong> {{ $cart->description }}</p>
        <p><strong>Type Cart:</strong> {{ $cart->typeCart->name ?? 'N/A' }}</p> <!-- Hiển thị Type Cart -->
        <p><strong>Status:</strong> {{ $cart->status ? 'Active' : 'Inactive' }}</p>
        <p><strong>Validity:</strong> {{ $cart->validity }} days</p> <!-- Thêm Validity -->

        <p><strong>Background Image:</strong></p> <!-- Thêm Background Image -->
        @if ($cart->background_image)
            <img src="{{ asset('storage/' . $cart->background_image) }}" alt="Background Image" width="200">
        @else
            <p>No background image available.</p>
        @endif

        <p><strong>Plan Features:</strong></p>
        <ul>
            @foreach ($cart->planFeatures as $feature)
                <li>{{ $feature->feature }}</li>
            @endforeach
        </ul>
    </div>

    <a href="{{ route('carts.index') }}">Back to List</a>
@endsection
