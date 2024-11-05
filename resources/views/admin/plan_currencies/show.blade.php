@extends('layouts.app')

@section('title', 'View Plan Currency')

@section('content')
    <h1>Đơn vị tiền tệ</h1>

    <div>
        <p>ID: {{ $planCurrency->id }}</p>
        <p>Đơn vị tiền tệ: {{ $planCurrency->currency }}</p>
    </div>

    <a href="{{ route('plan-currencies.edit', $planCurrency->id) }}">Edit</a>
    <form action="{{ route('plan-currencies.destroy', $planCurrency->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('plan-currencies.index') }}">Back to List</a>
@endsection
