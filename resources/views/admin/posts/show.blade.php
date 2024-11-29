@extends('layouts.app')

@section('content')
    <h1>Chi tiết Bài viết</h1>

    <div>
        <strong>ID:</strong> {{ $post->id }}
    </div>
    <div>
        <strong>Tiêu đề:</strong> {{ $post->title }}
    </div>
    <div>
        <strong>Chi tiết:</strong> {{ $post->detail }}
    </div>
    <div>
        <strong>Website:</strong> {{ $post->website }}
    </div>
    <div>
        <strong>Status:</strong> {{ $post->status ? 'Active' : 'Inactive' }}
    </div>
    <div>
        <strong>Bài viết nổi bật:</strong> {{ $post->featured ? 'Yes' : 'No' }}
    </div>

    <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('posts.index') }}">Quay lại</a>
@endsection
