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

        .cart-summary {
            margin-top: 30px;
            padding: 20px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .cart-summary h3 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
        }

        .cart-summary p {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 10px;
            text-align: left;
        }

        p {
            text-align: center;
            font-size: 1.2em;
            color: #777;
        }

        .status-pending {
            color: #ffc107;
        }

        .status-completed {
            color: #28a745;
        }

        .status-cancelled {
            color: #dc3545;
        }
    </style>
   <div class="container">
    <h1>Chi tiết đơn hàng - Mã đơn #{{ $order->id }}</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Dịch vụ</th>
                <th>Chi tiết</th>
                <th>Số điểm</th>
                <th>Giá tiền</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderDetails as $detail)
                <tr>
                    <td>{{ $detail->cart->title }}</td>
                    <td>
                        @foreach ($detail->cart->planFeatures as $feature)
                            <li>{{ $feature->feature }}</li>
                        @endforeach
                    </td>
                    <td>
                        @if ($detail->cart->top_point != 0)
                            <li>Quà tặng: {{ number_format($detail->cart->top_point, 0, ',', '.') }} Credits</li>
                        @endif
                    </td>
                    <td>{{ number_format($detail->price, 0, ',', '.') }} {{ $detail->cart->planCurrency->currency }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ number_format($detail->price * $detail->quantity, 0, ',', '.') }} {{ $detail->cart->planCurrency->currency }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="cart-summary">
        <h3>Thông tin thanh toán</h3>
        <p>VAT: {{ $order->vat }}%</p>
        <p>Tổng tiền: {{ number_format($order->total_amount, 0, ',', '.') }} {{ $order->orderDetails->first()->cart->planCurrency->currency }}</p>
        <p>Trạng thái: {{ ucfirst($order->status) }}</p>
    </div>
</div>


@endsection
