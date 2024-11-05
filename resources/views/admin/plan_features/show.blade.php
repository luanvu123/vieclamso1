@extends('layouts.app')

@section('title', 'View Plan Feature')

@section('content')
    <h1>Chi tiết Quyền lợi đặc biệt( báo giá)</h1>

    <div>
        <p>ID: {{ $planFeature->id }}</p>
        <p>Quyền lợi đặc biệt: {{ $planFeature->feature }}</p>
    </div>

    <a href="{{ route('plan-features.edit', $planFeature->id) }}">Edit</a>
    <form action="{{ route('plan-features.destroy', $planFeature->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Xóa</button>
    </form>
    <a href="{{ route('plan-features.index') }}">Quay lại</a>
@endsection
