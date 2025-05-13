@extends('dashboard-employer')

@section('content')
           <main data-v-48257136="" class="page-container service-page position-relative">
        <div data-v-48257136="" class="breadcrumb-box">
            <h6 class="breadcrumb-title d-flex">
                <div><span>Danh sách đơn hàng</span></div>
            </h6>
        </div>
        <div data-v-48257136="" class="container-fluid page-content">
            <div data-v-1eb6ef20="" data-v-48257136="">



        @if($orders->isEmpty())
            <div class="alert alert-info">
                Bạn chưa có đơn hàng nào.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped" id="user-table">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->order_key }}</td>
                                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                <td>₫{{ number_format($order->total_price, 0) }}</td>
                                <td>
                                    @if($order->status == 'Đã thanh toán')
                                        <span class="badge bg-success">{{ $order->status }}</span>
                                    @else
                                        <span class="badge bg-warning">{{ $order->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('employer.orders.show', $order->id) }}" class="btn btn-primary btn-sm">
                                        Xem chi tiết
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
            </div>
        </div>
@endsection
