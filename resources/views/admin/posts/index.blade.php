@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>All Posts</h1>
                <style>
                    .table-container {
                        overflow-x: auto;
                        -webkit-overflow-scrolling: touch;
                        /* Hỗ trợ cuộn mượt trên thiết bị cảm ứng */
                    }

                    .table td.detail {
                        max-width: 200px;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                    }
                </style>
                <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

                <div class="table-container">
                    <table class="table table-bordered" id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="detail">Title</th>
                                <th class="detail">Detail</th>
                                <th class="detail">Website</th>
                                <th class="detail">Status</th>
                                <th>Featured</th>
                                <th class="detail">Genre</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td class="detail">{{ $post->title }}</td>
                                    <td class="detail">{{ $post->detail }}</td>
                                    <td class="detail">{{ $post->website }}</td>
                                    <td class="detail">{{ $post->status ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $post->featured ? 'Yes' : 'No' }}</td>
                                    <td class="detail">{{ $post->genrePost->title ?? 'N/A' }}</td>
                                    <td>
                                        @if ($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image"
                                                width="100">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>{{ $post->updated_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11">No posts available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
