@extends('layouts.app')

@section('title', 'Create Plan Feature')

@section('content')
    <h1>Create Plan Feature</h1>

    <form action="{{ route('plan-features.store') }}" method="POST">
        @csrf
        <div>
            <label for="feature">Feature:</label>
            <input type="text" id="feature" name="feature" value="{{ old('feature') }}" required>
            @error('feature')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
