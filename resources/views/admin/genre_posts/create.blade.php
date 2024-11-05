@extends('layouts.app')

@section('content')
    <h1>Tạo Cẩm nang nghề nghiệp</h1>

    <form action="{{ route('genre-posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" value="{{ old('title') }}" id="slug" onkeyup="ChangeToSlug()" required>
        </div>
        <div>
            <label for="slug">Slug:</label>
            <input type="text" id="convert_slug" name="slug" value="{{ old('slug') }}">
            @error('slug')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
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
            <label for="icon">Icon:</label>
            <input type="text" id="icon" name="icon">
            @error('icon')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="note">Note:</label>
            <textarea id="note" name="note">{{ old('note') }}</textarea>
            @error('note')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Create Genre Post</button>
    </form>
@endsection
