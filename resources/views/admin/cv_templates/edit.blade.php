@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cập nhật mẫu CV</h1>
        <form action="{{ route('cv_templates.update', $template->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $template->name) }}" required>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="url" name="url" class="form-control" value="{{ old('url', $template->url) }}" required>
            </div>
            <div class="form-group">
                <label for="image">Ảnh</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                @if($template->image)
                    <img src="{{ asset('storage/' . $template->image) }}" alt="{{ $template->name }}" width="100" class="mt-2">
                @endif
            </div>

            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $template->status ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ !$template->status ? 'selected' : '' }}>Ẩn</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
        </form>
    </div>
@endsection
