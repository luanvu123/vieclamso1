@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chỉnh sửa giải thưởng</h1>

        <form action="{{ route('awards.update', $award->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $award->name) }}">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Loại giải thưởng</label>
                <input type="text" name="category" class="form-control" value="{{ old('category', $award->category) }}">
                @error('category')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website" class="form-control" value="{{ old('website', $award->website) }}">
                @error('website')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" {{ old('status', $award->status) == 1 ? 'selected' : '' }}>Ẩn</option>
                    <option value="0" {{ old('status', $award->status) == 0 ? 'selected' : '' }}>Hiện</option>
                </select>
            </div>



            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
