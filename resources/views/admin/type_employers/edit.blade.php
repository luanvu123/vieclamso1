@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa Hạng khách hàng</h1>
        <form action="{{ route('type-employer.update', $typeEmployer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $typeEmployer->name }}" required>
            </div>
            <div class="form-group">
                <label for="top_point">Top Point</label>
                <input type="number" name="top_point" class="form-control" value="{{ $typeEmployer->top_point }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control">
                <img src="{{ asset('storage/' . $typeEmployer->image) }}" alt="{{ $typeEmployer->name }}" width="100">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="active" {{ $typeEmployer->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $typeEmployer->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
        </form>
    </div>
@endsection
