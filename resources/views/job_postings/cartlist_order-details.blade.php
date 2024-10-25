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
        <h1>Order Details - Order #{{ $order->id }}</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Detail</th>
                     <th>Point</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
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
                                <li>Quà tặng: {{ $detail->cart->top_point }} Credits</li>
                            @endif
                        </td>
                        <td>{{ $detail->price }} {{ $detail->cart->planCurrency->currency }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ $detail->price * $detail->quantity }} {{ $detail->cart->planCurrency->currency }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="cart-summary">
            <h3>Order Summary</h3>
            <p>VAT: {{ $order->vat }}%</p>
            <p>Total Amount: {{ $order->total_amount }} {{ $order->orderDetails->first()->cart->planCurrency->currency }}
            </p>
            <p>Status: {{ ucfirst($order->status) }}</p>
        </div>
    </div>
@endsection
