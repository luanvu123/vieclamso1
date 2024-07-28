@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $course->name }}</h1>
    <p>Website: <a href="{{ $course->website }}" target="_blank">{{ $course->website }}</a></p>
    <div class="mb-3">
        @if($course->image)
            <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}" width="200">
        @endif
    </div>
    <p>Status: {{ $course->status ? 'Active' : 'Inactive' }}</p>
    <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
