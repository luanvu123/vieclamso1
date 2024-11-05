<!-- resources/views/admin/products/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Chi tiết quà</h1>

    <div>
        <strong>Tên:</strong> {{ $product->name }}
    </div>

    <div>
        <strong>Công ty:</strong> {{ $product->company }}
    </div>

    <div>
        <strong>Thời hạn sử dụng:</strong> {{ $product->number_day }}
    </div>

    <div>
        <strong>Top Point:</strong> {{ $product->top_point }}
    </div>

    <div>
        <strong>Thể loại:</strong> {{ ucfirst($product->type_product) }}
    </div>

    <div>
        <strong>Trang thái:</strong> {{ ucfirst($product->status) }}
    </div>

    <div>
        <strong>Ảnh :</strong>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
        @endif
    </div>

    <div>
        <strong>Mô tả:</strong> {{ $product->description }}
    </div>

    <div>
        <strong>Điều kiện sử dụng:</strong> {{ $product->condition }}
    </div>
<div>
    <strong>Số lần sử dụng:</strong> {{ $product->usage_count }}
</div>

    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Sửa</a>
    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>
@endsection
