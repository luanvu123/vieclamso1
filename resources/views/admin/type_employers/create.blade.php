@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Hạng khách hàng</h1>
        <form action="{{ route('type-employer.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="top_point">Top Point</label>
                <input type="number" name="top_point" class="form-control" value="0" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Tạo</button>
        </form>
    </div>
@endsection
