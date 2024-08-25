@extends('dashboard-employer')

@section('content')
    <style>
        h1 {

            margin-bottom: 30px;
            font-size: 2.5rem;
            color: #333;
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
            background-color: #fff;
        }

        .table thead {
            background-color: #4CAF50;
            color: white;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            text-align: center;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .cart-summary {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .cart-summary h3 {
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        .cart-summary p {
            font-size: 1.2rem;
            margin: 5px 0;
        }

        .checkout {
            text-align: right;
            margin-top: 20px;
        }

        .checkout .btn {
            padding: 15px 30px;
            font-size: 1.2rem;
            background-color: #28a745;
        }

        .checkout .btn:hover {
            background-color: #218838;
        }
    </style>
    <div class="container">
        <h1>Your Cart</h1>

        @if ($cartlists->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartlists as $cartlist)
                        <tr>
                            <td>{{ $cartlist->cart->description }}</td>
                            <td>{{ $cartlist->price }} {{ $cartlist->cart->planCurrency->currency }}</td>
                            <td>{{ $cartlist->quantity }}</td>
                            <td>{{ $cartlist->price * $cartlist->quantity }} {{ $cartlist->cart->planCurrency->currency }}
                            </td>
                            <td>

                                <form action="{{ route('cartlist.destroy', $cartlist->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('cartlist.edit', $cartlist->id) }}" class="btn btn-warning">Edit Qty</a>
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="cart-summary">
                <h3>Cart Summary</h3>
                <p>Total Items: {{ $cartlists->sum('quantity') }}</p>
                <p>VAT: {{ $info->vat }}%</p>

                @php
                    $totalCost = $cartlists->sum(function ($cartlist) {
                        return $cartlist->price * $cartlist->quantity;
                    });
                    $vatAmount = $totalCost * ($info->vat / 100);
                    $totalCostWithVAT = $totalCost + $vatAmount;
                @endphp

                <p>Total Cost (Excl. VAT): {{ $totalCost }} {{ $cartlists->first()->cart->planCurrency->currency }}</p>
                <p>Total Cost (Incl. VAT): {{ $totalCostWithVAT }} {{ $cartlists->first()->cart->planCurrency->currency }}
                </p>
            </div>


            <div class="checkout">
                <form action="{{ route('cartlist.storeOrder') }}" method="POST">
                    @csrf
                    <input type="hidden" name="vat" value="{{ $info->vat }}">
                    <button type="submit" class="btn btn-primary">Buy</button>
                </form>
            </div>
        @endif
    </div>
@endsection
