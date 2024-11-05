@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thêm dịch vụ cho nhà tuyển dụng {{ $employer->name }}</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('employers.store-cart', $employer->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="cart_id">Chọn Dịch vụ</label>
            <select name="cart_id" id="cart_id" class="form-control">
                <option value="">Choose a servive...</option>
                @foreach($carts as $cart)
                    <option value="{{ $cart->id }}">{{ $cart->title }} - {{ $cart->validity }} days</option>
                @endforeach
            </select>
            @error('cart_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('employers.edit', $employer->id) }}" class="btn btn-secondary">Về trang chủ</a>
    </form>
</div>
@endsection
