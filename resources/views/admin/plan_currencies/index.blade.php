@extends('layouts.app')

@section('title', 'Plan Currencies')

@section('content')
    <h1>Plan Currencies</h1>
    <a href="{{ route('plan-currencies.create') }}">Add New Plan Currency</a>

    <table id="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Currency</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($planCurrencies as $planCurrency)
                <tr>
                    <td>{{ $planCurrency->id }}</td>
                    <td>{{ $planCurrency->currency }}</td>
                    <td>
                        <a href="{{ route('plan-currencies.show', $planCurrency->id) }}">View</a>
                        <a href="{{ route('plan-currencies.edit', $planCurrency->id) }}">Edit</a>
                        <form action="{{ route('plan-currencies.destroy', $planCurrency->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
