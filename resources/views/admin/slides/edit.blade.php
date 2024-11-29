@extends('layouts.app')

@section('content')
    <h1>Sửa slide</h1>

    <form action="{{ route('slides.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active" {{ $slide->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $slide->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="link">Link:</label>
            <input type="text" id="link" name="link" value="{{ old('link', $slide->link) }}" required>
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            @if($slide->image)
                <img src="{{ asset('storage/' . $slide->image) }}" alt="Slider Image" width="200px" height="44px">
            @endif
            @error('image')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Lưu</button>
    </form>
@endsection
