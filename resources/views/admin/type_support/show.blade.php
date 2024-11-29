@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Trung tâm hỗ trợ ứng viên</h1>

    <p><strong>ID:</strong> {{ $typeSupport->id }}</p>
    <p><strong>Name:</strong> {{ $typeSupport->name }}</p>
    <a href="{{ route('type_support.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
