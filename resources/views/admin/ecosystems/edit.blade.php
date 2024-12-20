@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>CHỉnh sửa chân trang</h1>

        <form action="{{ route('ecosystems.update', $ecosystem->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $ecosystem->name) }}">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="detail">Chi tiết</label>
                <textarea name="detail" class="form-control">{{ old('detail', $ecosystem->detail) }}</textarea>
                @error('detail')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Ảnh</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                @if ($ecosystem->image)
                    <img src="{{ asset('storage/' . $ecosystem->image) }}" alt="{{ $ecosystem->name }}"
                        class="img-fluid mt-2">
                @endif
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website" class="form-control" value="{{ old('website', $ecosystem->website) }}">
                @error('website')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name_link_website">MÃ màu</label>
                <input type="text" name="name_link_website" class="form-control"
                    value="{{ old('name_link_website', $ecosystem->name_link_website ?? '') }}">
                @error('name_link_website')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image_footer">Ảnh HST footer (optional)</label>
                <input type="file" name="image_footer" class="form-control">
                @error('image_footer')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                @if (isset($ecosystem) && $ecosystem->image_footer)
                    <img src="{{ asset('storage/' . $ecosystem->image_footer) }}" alt="Footer Image"
                        class="img-fluid mt-2">
                @endif
            </div>
            <div class="form-group">
                <label for="status">Ẩn</label>
                <select name="status" class="form-control">
                    <option value="1" {{ old('status', $ecosystem->status) ? 'selected' : '' }}>Hiện</option>
                    <option value="0" {{ old('status', $ecosystem->status) === 0 ? 'selected' : '' }}>ẨN</option>
                </select>
                @error('status')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
