@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chi tiết hỗ trợ </h1>
    <div class="card mt-3">
        <div class="card-header">
            Mã hỗ trợ #{{ $support->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Gói dịch vụ: {{ $support->typeSupport->name }}</h5>
            <p class="card-text"><strong>Phone:</strong> {{ $support->phone }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $support->email }}</p>
            <p class="card-text"><strong>Mô tả:</strong> {{ $support->description }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $support->status }}</p>
            <a href="{{ route('supports.index.list') }}" class="btn btn-primary">Back to List</a>
            <form action="{{ route('supports.destroy.list', $support) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
