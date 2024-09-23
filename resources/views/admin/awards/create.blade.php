@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tạo giải thưởng</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('awards.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Loại giải thưởng</label>
                <input type="text" name="category" class="form-control" value="{{ old('category') }}">
                @error('category')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Ảnh (bắt buộc)</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="website">Website (bắt buộc)</label>
                <input type="text" name="website" class="form-control" value="{{ old('website') }}">
                @error('website')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Ẩn</option>
                    <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Hiện</option>
                </select>
                @error('status')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tạo</button>
        </form>
    </div>
@endsection
