@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chi tiết Hạng khách hàng</h1>
        <p>Name: {{ $typeEmployer->name }}</p>
        <p>Top Point: {{ $typeEmployer->top_point }}</p>
        <p>Status: {{ $typeEmployer->status }}</p>
        <img src="{{ asset('storage/' . $typeEmployer->image) }}" alt="{{ $typeEmployer->name }}">
    </div>
@endsection
