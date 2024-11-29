@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chi tiết dịch vụ</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Thể loại dịch vụ:</strong> {{ $cart->typeCart->name ?? 'N/A' }}</p>
            <p><strong>Giá trị dịch vụ:</strong> {{ number_format($cart->value, 0, ',', '.') }} {{ $cart->planCurrency->currency }}</p>
            <p><strong>Trạng thái:</strong> {{ $cart->status ? 'Active' : 'Inactive' }}</p>
            <p><strong>Top Point:</strong> {{ $cart->top_point }}</p>
            <p><strong>Thời gian hiệu lực của dịch vụ:</strong> {{ $cart->validity }} days</p>
            <p><strong>Tiêu đề:</strong> {{ $cart->title }}</p>

            @if($cart->background_image)
                <p><strong>Background Image:</strong></p>
                <img src="{{ asset('storage/' . $cart->background_image) }}" alt="Background Image" width="200">
            @endif
        </div>
        <div class="card-body">
            <h5 class="card-title">Bảng giá dịch vụ</h5>
            <p><strong>Quyền lợi đặc biệt:</strong> {{ $cart->description_home }}</p>
            <p><strong>Hiển thị trang chủ báo giá:</strong> {{ $cart->Pricing ? 'Yes' : 'No' }}</p>
        </div>
    </div>
</div>
@endsection
