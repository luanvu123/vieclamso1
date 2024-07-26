@extends('layouts.app')

@section('content')
    <h1>All Genre Posts</h1>

    <a href="{{ route('genre-posts.create') }}" class="btn btn-primary mb-3">Create New Genre Post</a>

    <table class="table table-bordered" id="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Note</th>
                <th>Status</th>
                <th>Icon</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($genrePosts as $genrePost)
                <tr>
                    <td>{{ $genrePost->id }}</td>
                    <td>{{ $genrePost->title }}</td>
                    <td>{{ $genrePost->slug }}</td>
                    <td>{{ Str::limit($genrePost->note, 50) }}</td>
                    <td>{{ $genrePost->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        @if ($genrePost->icon)
                            <img src="{{ asset('storage/' . $genrePost->icon) }}" alt="Icon" width="100">
                        @else
                            No Icon
                        @endif
                    </td>
                    <td>{{ $genrePost->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $genrePost->updated_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <a href="{{ route('genre-posts.show', $genrePost->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('genre-posts.edit', $genrePost->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('genre-posts.destroy', $genrePost->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">No genre posts available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

