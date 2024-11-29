@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sửa gói dịch vụ hỗ trợ</h1>

    <form action="{{ route('type_support.update', $typeSupport) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $typeSupport->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
