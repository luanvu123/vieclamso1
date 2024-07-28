@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Course</h1>
    <form action="{{ route('courses.update', $course) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $course->name }}" required>
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" class="form-control" id="website" name="website" value="{{ $course->website }}">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($course->image)
                <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}"  style="width: 100px;">
            @endif
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1" {{ $course->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$course->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

