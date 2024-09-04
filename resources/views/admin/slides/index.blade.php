<!-- resources/views/admin/sliders/index.blade.php -->

@extends('layouts.app')

@section('content')
<style>
    /* Add this to your CSS file or in a <style> block in the Blade view */

#user-table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 16px;
    text-align: left;
}

#user-table thead {
    background-color: #f2f2f2;
}

#user-table th, #user-table td {
    border: 1px solid #ddd;
    padding: 8px;
}

#user-table th {
    background-color: #4CAF50;
    color: white;
}

#user-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

#user-table tr:hover {
    background-color: #f1f1f1;
}

#user-table img {
    max-width: 100px; /* Restricts image width */
    max-height: 22px; /* Restricts image height */
    object-fit: cover; /* Ensures the image covers the box without distortion */
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

form button {
    background-color: #f44336; /* Red color for delete button */
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 4px;
}

form button:hover {
    background-color: #e53935; /* Darker red for hover effect */
}

</style>
    <h1>All Sliders</h1>
    <a href="{{ route('slides.create') }}">Create New Slider</a>

    <table id="user-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Status</th>
                <th>Link</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $slider)
                <tr>
                     <td>{{ $slider->id }}</td>
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
