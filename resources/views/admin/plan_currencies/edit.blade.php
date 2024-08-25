@extends('layouts.app')

@section('title', 'Edit Plan Currency')

@section('content')
    <h1>Edit Plan Currency</h1>

    <form action="{{ route('plan-currencies.update', $planCurrency->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="currency">Currency:</label>
            <input type="text" id="currency" name="currency" value="{{ old('currency', $planCurrency->currency) }}" required>
            @error('currency')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
