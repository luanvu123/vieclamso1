@extends('layouts.app')

@section('content')
    <h1>Sửa Cẩm nang nghề nghiệp</h1>

    <form action="{{ route('genre-posts.update', $genrePost->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" value="{{ old('title', $genrePost->title) }}" id="slug"
                onkeyup="ChangeToSlug()" required>
            @error('title')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="slug">Slug:</label>
            <input type="text" name="slug" value="{{ old('slug', $genrePost->slug) }}"
                id="convert_slug" required>
            @error('slug')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="1" {{ old('status', $genrePost->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $genrePost->status) === '0' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>



        <div>
            <label for="icon">Icon:</label>
            <input type="text" id="icon" name="icon" value="{{ old('icon', $genrePost->icon) }}" >
            @error('icon')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="note">Note:</label>
            <textarea id="note" name="note">{{ old('note', $genrePost->note) }}</textarea>
            @error('note')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Update Genre Post</button>
    </form>
@endsection
