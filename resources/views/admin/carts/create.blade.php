@extends('layouts.app')

@section('title', 'Create Cart')

@section('content')
    <h1>Tạo Dịch Vụ Sản Phẩm</h1>

    <form action="{{ route('carts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="title">Tiêu Đề:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="plan_currency_id">Đơn Vị Tiền Tệ:</label>
            <select id="plan_currency_id" name="plan_currency_id" required>
                @foreach ($planCurrencies as $planCurrency)
                    <option value="{{ $planCurrency->id }}">{{ $planCurrency->currency }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="type_cart_id">Loại Dịch Vụ:</label>
            <select id="type_cart_id" name="type_cart_id" required>
                @foreach ($typeCarts as $typeCart)
                    <option value="{{ $typeCart->id }}">{{ $typeCart->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="value">Giá Trị:</label>
            <input type="number" id="value" name="value" step="0.01" value="{{ old('value') }}" required>
        </div>

        <div>
            <label for="description">Mô Tả:</label>
            <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary4" spellcheck="true"></textarea>
        </div>

        <div>
            <label for="top_point">Top point:</label>
            <input type="number" id="top_point" name="top_point" value="{{ old('top_point') }}">
        </div>

        <div>
            <label for="validity">Thời Gian Hiệu Lực (ngày):</label>
            <input type="number" id="validity" name="validity" value="{{ old('validity') }}" required>
        </div>

        <div>
            <label for="background_image">Hình Ảnh Nền:</label>
            <input type="file" id="background_image" name="background_image" accept="image/*">
        </div>

        <div>
            <label for="status">Trạng Thái:</label>
            <select id="status" name="status" required>
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Hoạt Động</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Không Hoạt Động</option>
            </select>
        </div>

        <div>
            <label for="plan_features">Tính Năng Gói (Quyền lợi đặc biệt)</label>
            <select id="plan_features" name="plan_features[]" multiple>
                @foreach ($planFeatures as $planFeature)
                    <option value="{{ $planFeature->id }}"
                        {{ in_array($planFeature->id, old('plan_features', [])) ? 'selected' : '' }}>
                        {{ $planFeature->feature }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="description_home">Mô Tả Trang Chủ:</label>
            <input type="text" id="description_home" name="description_home" value="{{ old('description_home') }}">
        </div>

        <div>
            <label for="Pricing">Hiển Thị Trang Chủ Báo Giá:</label>
            <input type="checkbox" id="Pricing" name="Pricing" value="1" {{ old('Pricing') ? 'checked' : '' }}>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
