<!-- resources/views/admin/sliders/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Slider Details</h1>

    <div>
        <strong>Status:</strong> {{ $slider->status }}
    </div>
    <div>
        <strong>Link:</strong> {{ $slider->link }}
    </div>
    <div>
        <strong>Image:</strong>
        @if($slider->image)
            <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider Image" width="200px" height="44px">
        @else
            No Image
        @endif
    </div>
    <a href="{{ route('slides.edit', $slider->id) }}">Edit</a>
    <form action="{{ route('slides.destroy', $slider->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('sliders.index') }}">Back to List</a>
@endsection
