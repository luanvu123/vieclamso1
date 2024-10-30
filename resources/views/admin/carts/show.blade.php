@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chi tiết dịch vụ</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Đơn vị:</strong> {{ $cart->planCurrency->currency ?? 'N/A' }}</p>
            <p><strong>Thể loại dịch vụ:</strong> {{ $cart->typeCart->name ?? 'N/A' }}</p>
            <p><strong>Giá:</strong> {{ $cart->value }}</p>
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
            <p><strong>Thời gian hiển thị tin:</strong> {{ $cart->Time_to_display }}</p>
            <p><strong>Box việc làm nổi bật:</strong> {{ $cart->Featured_job }}</p>
            <p><strong>Hiển thị trong TOP đề xuất việc làm phù hợp:</strong> {{ $cart->job_suggestions }}</p>
            <p><strong>Hiển thị trong TOP đề xuất việc làm theo CV:</strong> {{ $cart->job_suggestion_cv }}</p>
            <p><strong>Hiển thị trong TOP đề xuất việc làm liên quan:</strong> {{ $cart->job_suggestion_related }}</p>
            <p><strong>Hiển thị trong TOP kết quả tìm kiếm việc làm có nền nổi bật:</strong> {{ $cart->job_suggestion_top }}</p>
            <p><strong>Thông báo việc làm/ Top Job Alert:</strong> {{ $cart->Top_Job_Alert ? 'Yes' : 'No' }}</p>
            <p><strong>Đẩy top khung giờ vàng:</strong> {{ $cart->prime_time }}</p>
            <p><strong>Đẩy top khung giờ thường:</strong> {{ $cart->regular_time }}</p>
            <p><strong>Tính năng CV đề xuất bởI AI:</strong> {{ $cart->AI_powered_CV ? 'Yes' : 'No' }}</p>
            <p><strong>Top Add-ons:</strong> {{ $cart->Top_Add_ons ? 'Yes' : 'No' }}</p>
            <p><strong>Tiêu đề tin nâng cao:</strong> {{ $cart->Advanced_news_headline ? 'Yes' : 'No' }}</p>
            <p><strong>Add-on Visual:</strong> {{ $cart->Add_on_visual ? 'Yes' : 'No' }}</p>
            <p><strong>Điều kiện: Tin đăng chạy dịch vụ có dưới X lượt ứng tuyển trong thời gian chạy dịch vụ:</strong> {{ $cart->Service_Warranty }}</p>
            <p><strong>Hiển thị trong TOP kết quả tìm kiếm việc làm có nền xanh và hình ảnh nổi bật trong 2 tuần:</strong> {{ $cart->search_results ? 'Yes' : 'No' }}</p>
            <p><strong>Kích hoạt Top Add-on trong 2 tuần

(nếu tin đăng có sử dụng Top Add-on ngay trước đó):</strong> {{ $cart->Top_Add_ons_in_2 ? 'Yes' : 'No' }}</p>
            <p><strong>Kích hoạt CV đề xuất trong 1 tuần:</strong> {{ $cart->Activate_CV_proposal ? 'Yes' : 'No' }}</p>
            <p><strong>Tặng 350 Credits vào tài khoản khuyến mãi:</strong> {{ $cart->Give_350_Credits ? 'Yes' : 'No' }}</p>
        </div>

        <div class="card-body">
            <h5 class="card-title">Plan Features</h5>
            @if($cart->planFeatures->isNotEmpty())
                <ul>
                    @foreach($cart->planFeatures as $feature)
                        <li>{{ $feature->feature }}</li>
                    @endforeach
                </ul>
            @else
                <p>No features assigned.</p>
            @endif
        </div>
        <div class="card-body">
            <h5 class="card-title">Employers</h5>
            @if($cart->employers->isNotEmpty())
                <ul>
                    @foreach($cart->employers as $employer)
                        <li>
                            {{ $employer->name }}
                            (Start Date: {{ $employer->pivot->start_date }},
                            End Date: {{ $employer->pivot->end_date }})
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No employers assigned.</p>
            @endif
        </div>
    </div>
</div>
@endsection
