@extends('dashboard-employer')

@section('content')
<div class="container">
    <div class="mb-3">
        <button class="btn btn-primary" onclick="filterCarts('all')">Tất cả</button>
        <button class="btn btn-success" onclick="filterCarts('active')">Dịch vụ đang mở</button>
        <button class="btn btn-warning" onclick="filterCarts('expiring')">Dịch vụ sắp hết hạn</button>
        <button class="btn btn-danger" onclick="filterCarts('expired')">Dịch vụ hết hạn</button>
    </div>

    <table class="table table-striped" id="cart-table">
        <thead>
            <tr>
                <th>Cart ID</th>
                <th>Cart Title</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            @php
                $today = \Carbon\Carbon::today();
            @endphp
            @foreach ($cartEmployers as $cart)
                @php
                    $endDate = \Carbon\Carbon::parse($cart->pivot->end_date);
                    $status = '';

                    if ($endDate->isFuture()) {
                        if ($endDate->diffInDays($today) <= 3) {
                            $status = 'expiring';
                        } else {
                            $status = 'active';
                        }
                    } else {
                        $status = 'expired';
                    }
                @endphp
                <tr class="cart-row" data-status="{{ $status }}">
                    <td>{{ $cart->id }}</td>
                    <td>{{ $cart->title }}</td>
                    <td>{{ $cart->pivot->start_date }}</td>
                    <td>{{ $cart->pivot->end_date }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function filterCarts(status) {
        const rows = document.querySelectorAll('.cart-row');
        rows.forEach(row => {
            if (status === 'all' || row.dataset.status === status) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>
@endsection

