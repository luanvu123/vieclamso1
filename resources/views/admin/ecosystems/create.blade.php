@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Quản lý footer</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ecosystems.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Tên hệ sinh thái</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="detail">Chi tiết</label>
                <textarea name="detail" class="form-control">{{ old('detail') }}</textarea>
                @error('detail')
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
                <input type="text" name="website" class="form-control" value="{{ old('website') }}">
                @error('website')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
  <div class="form-group">
                <label for="name_link_website">Mã màu</label>
                <input type="text" name="name_link_website" class="form-control" value="{{ old('name_link_website') }}">
                @error('name_link_website')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image_footer"> Ảnh hệ sinh thái chân trang</label>
                <input type="file" name="image_footer" class="form-control">
                @error('image_footer')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">ẨN</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Ẩn</option>
                </select>
                @error('status')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tạo</button>
        </form>
    </div>
@endsection
