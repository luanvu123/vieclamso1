@extends('layouts.app')

@section('title', 'Create Plan Currency')

@section('content')
    <h1>Create Plan Currency</h1>

    <form action="{{ route('plan-currencies.store') }}" method="POST">
        @csrf
        <div>
            <label for="currency">Currency:</label>
            <input type="text" id="currency" name="currency" value="{{ old('currency') }}" required>
            @error('currency')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
