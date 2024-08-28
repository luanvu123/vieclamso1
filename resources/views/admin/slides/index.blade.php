<!-- resources/views/admin/sliders/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>All Sliders</h1>
    <a href="{{ route('slides.create') }}">Create New Slider</a>

    <table id="user-table">
        <thead>
            <tr>
                <th>Status</th>
                <th>Link</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $slider)
                <tr>
                    <td>{{ $slider->status }}</td>
                    <td>{{ $slider->link }}</td>
                    <td>
                        @if($slider->image)
                            <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider Image" width="100px" height="22px">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('slides.show', $slider->id) }}">View</a>
                        <a href="{{ route('slides.edit', $slider->id) }}">Edit</a>
                        <form action="{{ route('slides.destroy', $slider->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
