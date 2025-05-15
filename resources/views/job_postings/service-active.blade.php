@extends('dashboard-employer')

@section('content')


   <main data-v-48257136="" class="page-container service-page position-relative">
        <div data-v-48257136="" class="breadcrumb-box">
            <h6 class="breadcrumb-title d-flex">
                <div><span>Dịch vụ đã mua</span></div>
            </h6>
        </div>
        <div data-v-48257136="" class="container-fluid page-content">
            <div data-v-1eb6ef20="" data-v-48257136="">

<table class="table" id="user-table">
    <thead>
        <tr>
            <th>Mã đơn</th>
            <th>Tổng tiền</th>
            <th>Ngày thanh toán</th>
            <th>Bài đăng</th>
        </tr>
    </thead>
    <tbody>
        @forelse($orders as $order)
            <tr>
                <td>{{ $order->order_key }}</td>
                <td>₫{{ number_format($order->total_price, 0, ',', '.') }}</td>
                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    @php
                        $languageTrainings = \App\Models\LanguageTraining::where('order_id', $order->id)->get();
                        $studyAbroads = \App\Models\StudyAbroad::where('order_id', $order->id)->get();
                        $jobPostings = \App\Models\JobPosting::where('order_id', $order->id)->get();
                        $newsItems = \App\Models\News::where('order_id', $order->id)->get();
                        $advertisements = \App\Models\Advertise::where('order_id', $order->id)->get();
                    @endphp

                    @if ($languageTrainings->isNotEmpty())
                        <strong>Khóa học tiếng:</strong>
                        <ul class="mb-0 pl-3">
                            @foreach ($languageTrainings as $lt)
                                <li>{{ $lt->name }}</li>
                            @endforeach
                        </ul>
                    @elseif ($studyAbroads->isNotEmpty())
                        <strong>Du học:</strong>
                        <ul class="mb-0 pl-3">
                            @foreach ($studyAbroads as $sa)
                                <li>{{ $sa->name }}</li>
                            @endforeach
                        </ul>
                    @elseif ($jobPostings->isNotEmpty())
                        <strong>Tin tuyển dụng:</strong>
                        <ul class="mb-0 pl-3">
                            @foreach ($jobPostings as $jp)
                                <li>{{ $jp->title }}</li>
                            @endforeach
                        </ul>
                    @elseif ($newsItems->isNotEmpty())
                        <strong>Bài viết:</strong>
                        <ul class="mb-0 pl-3">
                            @foreach ($newsItems as $news)
                                <li>{{ $news->title }}</li>
                            @endforeach
                        </ul>
                    @elseif ($advertisements->isNotEmpty())
                        <strong>Quảng cáo:</strong>
                        <ul class="mb-0 pl-3">
                            @foreach ($advertisements as $ad)
                                <li>{{ $ad->title }}</li>
                            @endforeach
                        </ul>
                    @else
                        -
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Không có đơn hàng đã thanh toán.</td>
            </tr>
        @endforelse
    </tbody>
</table>



            </div>
        </div>


@endsection

