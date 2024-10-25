@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>List of All Cart Employers</h2>

        <!-- Filter Options -->
        <div class="mb-3">
            <select id="filter" class="form-select">
                <option value="all">Tất cả</option>
                <option value="expired">Dịch vụ hết hạn</option>
                <option value="new">Dịch vụ mới đăng</option>
                <option value="expiring">Dịch vụ sắp hết hạn</option>
            </select>
        </div>

        <table class="table table-striped" id="user-table">
            <thead>
                <tr>
                    <th>Cart ID</th>
                    <th>Employer Name</th>
                    <th>Cart Title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Added By (User)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartEmployers as $cart)
                    @foreach ($cart->employers as $employer)
                        @php
                            $endDate = \Carbon\Carbon::parse($employer->pivot->end_date);
                            $today = \Carbon\Carbon::today();
                            $status = '';
                            if ($endDate->isPast()) {
                                $status = 'expired';
                            } elseif ($today->diffInDays($endDate) <= 2) {
                                $status = 'expiring';
                            } else {
                                $status = 'new';
                            }
                        @endphp
                        <tr class="cart-row" data-status="{{ $status }}">
                            <td>{{ $cart->id }}</td>
                            <td>{{ $employer->name }}</td>
                            <td>{{ $cart->title }}</td>
                            <td>{{ $employer->pivot->start_date }}</td>
                            <td>{{ $employer->pivot->end_date }}</td>
                            <td>
                                @php
                                    $user = \App\Models\User::find($employer->pivot->user_id);
                                @endphp
                                {{ $user ? $user->name : 'Unknown' }}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.getElementById('filter').addEventListener('change', function() {
            const filterValue = this.value;
            const rows = document.querySelectorAll('.cart-row');

            rows.forEach(row => {
                const status = row.getAttribute('data-status');

                if (filterValue === 'all' || status === filterValue) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
