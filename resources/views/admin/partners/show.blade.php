@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Khách hàng tiêu biểu và đối tác truyền thông của Vieclamso1</h1>
    <p>ID: {{ $partner->id }}</p>
    <p>tên: {{ $partner->name }}</p>
    <p>Loại: {{ $partner->typePartner->name }}</p>
    <p>Status: {{ $partner->status ? 'Active' : 'Inactive' }}</p>
    <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}" width="100">
</div>
@endsection
