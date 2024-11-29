@extends('layouts.app')

@section('title', 'City Details')

@section('content')
<div class="container">
    <h1>Chi tiết tỉnh thành</h1>
    <p><strong>ID:</strong> {{ $city->id }}</p>
    <p><strong>Tên tỉnh thành:</strong> {{ $city->name }}</p>
    <p><strong>trạng thái:</strong> {{ $city->status ? 'Active' : 'Inactive' }}</p>
    <a href="{{ route('cities.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
