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
               @php
    $jobPostings = \App\Models\JobPosting::where('order_id', $order->id)->get();
@endphp

<td>
    <ul class="mb-0 pl-3">
        @forelse ($order->jobPostings as $jp)
            <li>{{ $jp->title }}</li>
        @empty
            <li>Không có tin tuyển dụng</li>
        @endforelse
    </ul>
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

