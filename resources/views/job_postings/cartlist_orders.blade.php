@extends('dashboard-employer')

@section('content')
<style>
.table {
    width: 100%;
    margin-bottom: 1.5rem;
    background-color: #fff;
    border: 1px solid #ddd;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 15px;
    vertical-align: middle;
    border: 1px solid #ddd;
    text-align: center;
    color: #555;
}

.table thead th {
    background-color: #f8f9fa;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 0.95em;
}

.table tbody tr:nth-of-type(even) {
    background-color: #f2f2f2;
}

.table tbody tr:hover {
    background-color: #e9ecef;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 0.9em;
    font-weight: bold;
    text-align: center;
    color: #fff;
    background-color: #007bff;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #0056b3;
}

.btn-info {
    background-color: #17a2b8;
}

.btn-info:hover {
    background-color: #117a8b;
}

p {
    text-align: center;
    font-size: 1.2em;
    color: #777;
}

</style>
    <div class="container">
        <h1>Danh sách đơn hàng</h1>

        @if ($orders->isEmpty())
            <p>Bạn không có đơn hàng nào.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tổng tiền</th>
                        <th>Trang thái</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->total_amount }} {{ $order->orderDetails->first()->cart->planCurrency->currency }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>
                                <a href="{{ route('cartlist.showOrder', $order->id) }}" class="btn btn-info">Xem</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
