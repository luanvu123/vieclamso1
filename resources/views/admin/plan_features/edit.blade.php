@extends('layouts.app')

@section('title', 'Edit Plan Feature')

@section('content')
    <h1>Edit Plan Feature</h1>

    <form action="{{ route('plan-features.update', $planFeature->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="feature">Feature:</label>
            <input type="text" id="feature" name="feature" value="{{ old('feature', $planFeature->feature) }}" required>
            @error('feature')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
