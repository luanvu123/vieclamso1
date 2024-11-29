@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Đối với Doanh nghiệp - Đối với Nhà tuyển dụng</h2>
    <form action="{{ route('values.update', $value->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $value->name }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="{{ asset('storage/' . $value->image) }}" width="100" class="mt-2">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" cols="40" id="summary3"  name="description" rows="3" required>{{ $value->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1" {{ $value->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$value->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
