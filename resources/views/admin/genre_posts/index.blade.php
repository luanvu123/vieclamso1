@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">

                    <h1>Cẩm nang nghề nghiệp</h1>

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
                                    <td>{{ $genrePost->icon }}</td>
                                    <td>{{ $genrePost->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>{{ $genrePost->updated_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('genre-posts.show', $genrePost->id) }}"
                                            class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View</a>
                                        <a href="{{ route('genre-posts.edit', $genrePost->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                        {{-- <form action="{{ route('genre-posts.destroy', $genrePost->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form> --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">No genre posts available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
