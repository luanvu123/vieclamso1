@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sửa những con số tuyển dụng</h1>
    <div class="card">
        <div class="card-header">
            <h2>{{ $figure->name }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Tiêu đề những con số tuyển dụng:</strong> {{ $figure->title }}</p>
            <p><strong>Trạng thái:</strong> {{ $figure->status ? 'Active' : 'Inactive' }}</p>
        </div>
    </div>
    <a href="{{ route('figures.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
</div>
@endsection
