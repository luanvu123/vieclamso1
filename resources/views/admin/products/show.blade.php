<!-- resources/views/admin/products/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Product Details</h1>

    <div>
        <strong>Name:</strong> {{ $product->name }}
    </div>

    <div>
        <strong>Company:</strong> {{ $product->company }}
    </div>

    <div>
        <strong>Number of Days:</strong> {{ $product->number_day }}
    </div>

    <div>
        <strong>Top Point:</strong> {{ $product->top_point }}
    </div>

    <div>
        <strong>Type:</strong> {{ ucfirst($product->type_product) }}
    </div>

    <div>
        <strong>Status:</strong> {{ ucfirst($product->status) }}
    </div>

    <div>
        <strong>Image:</strong>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
        @endif
    </div>

    <div>
        <strong>Description:</strong> {{ $product->description }}
    </div>

    <div>
        <strong>Condition:</strong> {{ $product->condition }}
    </div>
<div>
    <strong>Usage Count:</strong> {{ $product->usage_count }}
</div>

    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
