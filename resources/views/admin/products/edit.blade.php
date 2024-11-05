<!-- resources/views/admin/products/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Sửa đổi quà</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Tên:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="usage_count">Số lượng đã sử dụng:</label>
            <input type="number" id="usage_count" name="usage_count"
                value="{{ old('usage_count', $product->usage_count) }}" required>
            @error('usage_count')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="company">Công ty:</label>
            <input type="text" id="company" name="company" value="{{ old('company', $product->company) }}" required>
            @error('company')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="number_day">Thời hạn sử dụng:</label>
            <input type="number" id="number_day" name="number_day" value="{{ old('number_day', $product->number_day) }}"
                required>
            @error('number_day')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="top_point">Top Point:</label>
            <input type="number" id="top_point" name="top_point" value="{{ old('top_point', $product->top_point) }}"
                required>
            @error('top_point')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="type_product">Thể loại:</label>
            <select name="type_product" id="type_product" class="form-control" required>
                <option value="service" {{ old('type_product', $product->type_product) == 'service' ? 'selected' : '' }}>
                    Service</option>
                <option value="voucher" {{ old('type_product', $product->type_product) == 'voucher' ? 'selected' : '' }}>
                    Voucher</option>
            </select>
            @error('type_product')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="status">Trạng thái:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Inactive
                </option>
            </select>
            @error('status')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
            @endif
            @error('image')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div>
            <label for="condition">Condition:</label>
            <textarea id="condition" name="condition">{{ old('condition', $product->condition) }}</textarea>
        </div>

        <button type="submit">Update Product</button>
    </form>
@endsection
