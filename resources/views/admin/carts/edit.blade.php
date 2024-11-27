@extends('layouts.app')

@section('title', 'Edit Cart')

@section('content')
    <h1>Chỉnh sửa dịch vụ</h1>

    <form action="{{ route('carts.update', $cart->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Tiêu đề:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $cart->title) }}" required>
        </div>


        <div class="form-group">
            <label for="plan_currency_id">Đơn Vị Tiền Tệ:</label>
            <select id="plan_currency_id" name="plan_currency_id" required>
                @foreach ($planCurrencies as $planCurrency)
                    <option value="{{ $planCurrency->id }}"
                        {{ $planCurrency->id == $cart->plan_currency_id ? 'selected' : '' }}>
                        {{ $planCurrency->currency }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="type_cart_id">Loại Dịch Vụ:</label>
            <select id="type_cart_id" name="type_cart_id" required>
                @foreach ($typeCarts as $typeCart)
                    <option value="{{ $typeCart->id }}" {{ $typeCart->id == $cart->type_cart_id ? 'selected' : '' }}>
                        {{ $typeCart->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="value">Giá Trị:</label>
            <input type="number" id="value" name="value" step="0.01" value="{{ old('value', $cart->value) }}"
                required>
        </div>

        <div class="form-group">
            <label for="description">Mô Tả:</label>
            <textarea class="WYSIWYG" name="description" cols="80" rows="6" id="summary4" spellcheck="true">{!! $cart->description !!}</textarea>
        </div>

        <div class="form-group">
            <label for="top_point">Top Point:</label>
            <input type="number" id="top_point" name="top_point" value="{{ old('top_point', $cart->top_point) }}">
        </div>

        <div class="form-group">
            <label for="validity">Thời Gian Hiệu Lực (ngày):</label>
            <input type="number" id="validity" name="validity" value="{{ old('validity', $cart->validity) }}" required>
        </div>

        <div class="form-group">
            <label for="background_image">Hình Ảnh Nền:</label>
            @if ($cart->background_image)
                <div>
                    <p>Current Image:</p>
                    <img src="{{ asset('storage/' . $cart->background_image) }}" alt="Background Image" width="200">
                </div>
            @endif
            <input type="file" id="background_image" name="background_image" accept="image/*">
        </div>

        <div class="form-group">
            <label for="status">Trạng Thái</label>
            <select id="status" name="status" required>
                <option value="1" {{ $cart->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$cart->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <label for="plan_features">Tính Năng Gói(Quyền lợi đặc biệt)</label>
            <select id="plan_features" name="plan_features[]" multiple>
                @foreach ($planFeatures as $planFeature)
                    <option value="{{ $planFeature->id }}"
                        {{ in_array($planFeature->id, old('plan_features', $cart->planFeatures->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $planFeature->feature }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description_home">Mô Tả Trang Chủ:</label>
            <input type="text" id="description_home" name="description_home"
                value="{{ old('description_home', $cart->description_home) }}">
        </div>

        <div class="form-group">
            <label for="Pricing">Hiển Thị Trang Chủ Báo Giá:</label>
            <input type="checkbox" id="Pricing" name="Pricing" value="1"
                {{ old('Pricing', $cart->Pricing) ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="Time_to_display">Thời gian hiển thị tin:</label>
            <input type="text" id="Time_to_display" name="Time_to_display"
                value="{{ old('Time_to_display', $cart->Time_to_display) }}">
        </div>

        <div class="form-group">
            <label for="Featured_job">Box việc làm nổi bật:</label>
            <input type="text" id="Featured_job" name="Featured_job"
                value="{{ old('Featured_job', $cart->Featured_job) }}">
        </div>

        <div class="form-group">
            <label for="job_suggestions">Hiển thị trong TOP đề xuất việc làm phù hợp:</label>
            <input type="text" id="job_suggestions" name="job_suggestions"
                value="{{ old('job_suggestions', $cart->job_suggestions) }}">
        </div>

        <div class="form-group">
            <label for="job_suggestion_cv">Hiển thị trong TOP đề xuất việc làm theo CV:</label>
            <input type="text" id="job_suggestion_cv" name="job_suggestion_cv"
                value="{{ old('job_suggestion_cv', $cart->job_suggestion_cv) }}">
        </div class="form-group">

        <div class="form-group">
            <label for="job_suggestion_related">Hiển thị trong TOP đề xuất việc làm liên quan:</label>
            <input type="text" id="job_suggestion_related" name="job_suggestion_related"
                value="{{ old('job_suggestion_related', $cart->job_suggestion_related) }}">
        </div>

        <div class="form-group">
            <label for="job_suggestion_top">Hiển thị trong TOP kết quả tìm kiếm việc làm có nền nổi bật:</label>
            <input type="text" id="job_suggestion_top" name="job_suggestion_top"
                value="{{ old('job_suggestion_top', $cart->job_suggestion_top) }}">
        </div>

        <div class="form-group">
            <label for="Top_Job_Alert">Thông báo việc làm/ Top Job Alert:</label>
            <input type="checkbox" id="Top_Job_Alert" name="Top_Job_Alert" value="1"
                {{ old('Top_Job_Alert', $cart->Top_Job_Alert) ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="prime_time">Đẩy top khung giờ vàng:</label>
            <input type="text" id="prime_time" name="prime_time" value="{{ old('prime_time', $cart->prime_time) }}">
        </div>

        <div class="form-group">
            <label for="regular_time">Đẩy top khung giờ thường:</label>
            <input type="text" id="regular_time" name="regular_time"
                value="{{ old('regular_time', $cart->regular_time) }}">
        </div>

        <div class="form-group">
            <label for="AI_powered_CV">Tính năng CV đề xuất bởI AI:</label>
            <input type="checkbox" id="AI_powered_CV" name="AI_powered_CV" value="1"
                {{ old('AI_powered_CV', $cart->AI_powered_CV) ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="Top_Add_ons">Top Add-ons:</label>
            <input type="checkbox" id="Top_Add_ons" name="Top_Add_ons" value="1"
                {{ old('Top_Add_ons', $cart->Top_Add_ons) ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="Advanced_news_headline">Tiêu đề tin nâng cao:</label>
            <input type="checkbox" id="Advanced_news_headline" name="Advanced_news_headline" value="1"
                {{ old('Advanced_news_headline', $cart->Advanced_news_headline) ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="Add_on_visual">Add-on Visual:</label>
            <input type="checkbox" id="Add_on_visual" name="Add_on_visual" value="1"
                {{ old('Add_on_visual', $cart->Add_on_visual) ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="Service_Warranty">Điều kiện: Tin đăng chạy dịch vụ có dưới X lượt ứng tuyển trong thời gian chạy
                dịch vụ:</label>
            <input type="text" id="Service_Warranty" name="Service_Warranty"
                value="{{ old('Service_Warranty', $cart->Service_Warranty) }}">
        </div>

        <div class="form-group">
            <label for="search_results">Hiển thị trong TOP kết quả tìm kiếm việc làm có nền xanh và hình ảnh nổi bật trong
                2 tuần</label>
            <input type="checkbox" id="search_results" name="search_results" value="1"
                {{ old('search_results', $cart->search_results) ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="Top_Add_ons_in_2">Kích hoạt Top Add-on trong 2 tuần

                (nếu tin đăng có sử dụng Top Add-on ngay trước đó)</label>
            <input type="checkbox" id="Top_Add_ons_in_2" name="Top_Add_ons_in_2" value="1"
                {{ old('Top_Add_ons_in_2', $cart->Top_Add_ons_in_2) ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="Activate_CV_proposal">Kích hoạt CV đề xuất trong 1 tuần:</label>
            <input type="checkbox" id="Activate_CV_proposal" name="Activate_CV_proposal" value="1"
                {{ old('Activate_CV_proposal', $cart->Activate_CV_proposal) ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="Give_350_Credits">Tặng 350 Credits vào tài khoản khuyến mãi </label>
            <input type="checkbox" id="Give_350_Credits" name="Give_350_Credits" value="1"
                {{ old('Give_350_Credits', $cart->Give_350_Credits) ? 'checked' : '' }}>
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
