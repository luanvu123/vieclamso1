@extends('layouts.app')

@section('title', 'My Carts')

@section('content')
    <h1>My Carts</h1>
    <a href="{{ route('carts.create') }}">Add New Cart</a>

    <table id="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Plan Currency</th>
                <th>Value</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carts as $cart)
                <tr>
                    <td>{{ $cart->id }}</td>
                    <td>{{ $cart->planCurrency->currency }}</td>
                    <td>{{ $cart->value }}</td>
                    <td>{{ $cart->description }}</td>
                    <td>{{ $cart->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('carts.show', $cart->id) }}">View</a>
                        <a href="{{ route('carts.edit', $cart->id) }}">Edit</a>
                        <form action="{{ route('carts.destroy', $cart->id) }}" method="POST" style="display:inline;">
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