@extends('layouts.app')

@section('content')
    <h1>Tạo Bài viết</h1>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="genre_post_id">Cẩm nang nghề nghiệp:</label>
            <select name="genre_post_id" id="genre_post_id" class="form-control" required>
                @foreach ($genrePosts as $genrePost)
                    <option value="{{ $genrePost->id }}" {{ old('genre_post_id') == $genrePost->id ? 'selected' : '' }}>
                        {{ $genrePost->title }}
                    </option>
                @endforeach
            </select>
            @error('genre_post_id')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="title">Tiêu đề :</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        <div>
            <label for="detail">CHi tiết:</label>
            <textarea id="detail" name="detail">{{ old('detail') }}</textarea>
        </div>
        <div>
            <label for="website">Website:</label>
            <input type="text" id="website" name="website" value="{{ old('website') }}">
        </div>
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="featured">Bài viết nổi bật?:</label>
            <select name="featured" id="featured" class="form-control">
                <option value="1" {{ old('featured', 1) == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('featured') === '0' ? 'selected' : '' }}>No</option>
            </select>
            @error('featured')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="image">Ảnh:</label>
            <input type="file" id="image" name="image">
            @error('image')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Tạo</button>
    </form>
@endsection

