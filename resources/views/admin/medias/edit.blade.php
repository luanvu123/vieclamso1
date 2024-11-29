@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa Báo chí nói về Vieclamso1</h1>

        <form action="{{ route('medias.update', $media->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="website">Website (optional)</label>
                <input type="text" name="website" class="form-control" value="{{ old('website', $media->website) }}">
                @error('website')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Logo</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($media->image)
                    <img src="{{ asset('storage/' . $media->image) }}" alt="Image" style="width: 100px; margin-top: 10px;">
                @endif
                @error('image')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">trạng thái</label>
                <select name="status" class="form-control">
                    <option value="1" {{ old('status', $media->status) == 1 ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ old('status', $media->status) == 0 ? 'selected' : '' }}>ẢN </option>
                </select>
                @error('status')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
