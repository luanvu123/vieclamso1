@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sửa những con số tuyển dụng</h1>
    <form action="{{ route('figures.update', $figure->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Tên những con số tuyển dụng</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $figure->name) }}">
        </div>

        <div class="form-group">
            <label for="title">Tiêu  đề những con số tuyển dụng</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $figure->title) }}">
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select name="status" class="form-control">
                <option value="1" {{ (old('status') ?? $figure->status) == 1 ? 'selected' : '' }}>Hiển thị</option>
                <option value="0" {{ (old('status') ?? $figure->status) == 0 ? 'selected' : '' }}>ẨN</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection
