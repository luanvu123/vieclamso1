<!-- resources/views/admin/sliders/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Slider</h1>

    <form action="{{ route('slides.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active" {{ $slider->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $slider->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="link">Link:</label>
            <input type="text" id="link" name="link" value="{{ old('link', $slider->link) }}" required>
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            @if($slider->image)
                <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider Image" width="200px" height="44px">
            @endif
            @error('image')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Update Slider</button>
    </form>
@endsection
