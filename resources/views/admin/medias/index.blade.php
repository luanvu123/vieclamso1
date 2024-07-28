<!-- resources/views/admin/medias/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Media List</h1>
        <a href="{{ route('medias.create') }}" class="btn btn-primary">Add New Media</a>
        @if(session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif
        <table class="table mt-3" id="user-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Website</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medias as $media)
                    <tr>
                        <td>
                            @if($media->image)
                                <img src="{{ asset('storage/' . $media->image) }}" alt="Image" style="width: 100px;">
                            @else
                                No image
                            @endif
                        </td>
                        <td>{{ $media->website }}</td>
                       <td>
                            <select id="{{ $media->id }}" class="media_choose">
                                @if ($media->status == 0)
                                    <option value="1">Show</option>
                                    <option selected value="0">Hidden</option>
                                @else
                                    <option selected value="1">Show</option>
                                    <option value="0">Hidden</option>
                                @endif
                            </select>
                        </td>
                        <td>
                            <a href="{{ route('medias.edit', $media) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('medias.destroy', $media) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('medias.show', $media) }}" class="btn btn-info">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

