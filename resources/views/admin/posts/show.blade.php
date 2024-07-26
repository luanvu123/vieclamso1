@extends('layouts.app')

@section('content')
    <h1>Post Details</h1>

    <div>
        <strong>ID:</strong> {{ $post->id }}
    </div>
    <div>
        <strong>User ID:</strong> {{ $post->user_id }}
    </div>
    <div>
        <strong>Genre Post ID:</strong> {{ $post->genre_post_id }}
    </div>
    <div>
        <strong>Title:</strong> {{ $post->title }}
    </div>
    <div>
        <strong>Detail:</strong> {{ $post->detail }}
    </div>
    <div>
        <strong>Website:</strong> {{ $post->website }}
    </div>
    <div>
        <strong>Status:</strong> {{ $post->status ? 'Active' : 'Inactive' }}
    </div>
    <div>
        <strong>Featured:</strong> {{ $post->featured ? 'Yes' : 'No' }}
    </div>

    <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('posts.index') }}">Back to Posts</a>
@endsection
