<!-- resources/views/admin/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create New Product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="company">Company:</label>
            <input type="text" id="company" name="company" value="{{ old('company') }}" required>
            @error('company')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
<div>
    <label for="usage_count">Usage Count:</label>
    <input type="number" id="usage_count" name="usage_count" value="{{ old('usage_count') }}" required>
    @error('usage_count')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
</div>

        <div>
            <label for="number_day">Number of Days:</label>
            <input type="number" id="number_day" name="number_day" value="{{ old('number_day') }}" required>
            @error('number_day')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="top_point">Top Point:</label>
            <input type="number" id="top_point" name="top_point" value="{{ old('top_point') }}" required>
            @error('top_point')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="type_product">Type:</label>
            <select name="type_product" id="type_product" class="form-control" required>
                <option value="service" {{ old('type_product') == 'service' ? 'selected' : '' }}>Service</option>
                <option value="voucher" {{ old('type_product') == 'voucher' ? 'selected' : '' }}>Voucher</option>
            </select>
            @error('type_product')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            @error('image')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="condition">Condition:</label>
            <textarea id="condition" name="condition">{{ old('condition') }}</textarea>
        </div>

        <button type="submit">Create Product</button>
    </form>
@endsection
