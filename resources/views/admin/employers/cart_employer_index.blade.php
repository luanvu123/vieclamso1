@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dịch vụ của: {{ $employer->name }}</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped" id="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cart Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Added By (User)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartEmployers as $cart)
                <tr>
                    <td>{{ $cart->id }}</td>
                    <td>{{ $cart->title }}</td>
                    <td>{{ $cart->pivot->start_date }}</td>
                    <td>{{ $cart->pivot->end_date }}</td>
                    <td>{{ optional($cart->user)->name ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('employers.carts.destroy', [$employer->id, $cart->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('employers.edit', $employer->id) }}" class="btn btn-secondary">Back to Employer</a>
</div>
@endsection
