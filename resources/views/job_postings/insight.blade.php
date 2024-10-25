@extends('dashboard-employer')

@section('content')
<style>
    .insights-empty-view.page {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 80vh;
    text-align: center;
}

.insights-empty-view .image img {
    max-width: 500px;
    height:  300px;
    margin-bottom: 20px;
     align-items: center;
    justify-content: center;
}

.insights-empty-view .content {
    max-width: 600px;
}

.insights-empty-view .header {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 15px;
}

.insights-empty-view .headline {
    font-size: 16px;
    margin-bottom: 10px;
}

.insights-empty-view .info {
    font-size: 14px;
    color: #666;
    margin-bottom: 20px;
}

.insights-empty-view .action .btn-buy-service {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
}

.insights-empty-view .action .btn-buy-service:hover {
    background-color: #0056b3;
    color: #fff;
}

</style>
    <div data-v-735a3cda="" class="insights-page">
        <div data-v-735a3cda="" class="breadcrumb-box">
            <h6 class="breadcrumb-title d-flex">
                <div><span>TopCV Insights</span> </div>
            </h6>
        </div>
        <div data-v-735a3cda="" class="container empty-content">
            <div data-v-ead34d80="" data-v-735a3cda="" class="insights-empty-view page">
                <div data-v-ead34d80="" class="image">
                    <img data-v-ead34d80="" alt="empty" src="{{ asset('backend_admin/images/no-right-to-see.e537843.jpg') }}">
                </div>
                <div data-v-ead34d80="" class="content">
                    <div data-v-ead34d80="" class="header">TopCV Insights</div>
                    <div data-v-ead34d80="" class="headline">
                        TopCV Insights cung cấp những bí kíp, thông tin hữu ích về Xu hướng thị trường tuyển dụng, Hành vi tìm việc của ứng viên,... giúp bạn có thêm góc nhìn, góp phần nâng cao hiệu quả tuyển dụng.
                    </div>
                    <div data-v-ead34d80="" class="info">
                        Mua dịch vụ ngay để khám phá tính năng ưu việt và cập nhật thông tin tức thì cùng TopCV!
                    </div>
                    <div data-v-ead34d80="" class="action">
                        <a href="{{ route('job-postings.cart') }}" class="btn-buy-service">Mua dịch vụ ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

