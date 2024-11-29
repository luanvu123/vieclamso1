@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mẫu CV</h1>
        <form action="{{ route('cv_templates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Tên CV</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="url" name="url" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">ẢNh</label>
                <input type="file" name="image" class="form-control" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" class="form-control">
                    <option value="1">Ẩn</option>
                    <option value="0">Hiện</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Tạo</button>
        </form>
    </div>
@endsection
