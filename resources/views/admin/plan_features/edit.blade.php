@extends('layouts.app')

@section('title', 'Edit Plan Feature')

@section('content')
    <h1>Sửa Quyền lợi đặc biệt( báo giá)</h1>

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
        <button type="submit">Lưu</button>
    </form>
@endsection
