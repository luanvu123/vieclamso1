@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Khách hàng tiêu biểu - Đối tác truyền thông</h1>
    <p>ID: {{ $typePartner->id }}</p>
    <p>Name: {{ $typePartner->name }}</p>
</div>
@endsection
