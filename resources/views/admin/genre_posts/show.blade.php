@extends('layouts.app')

@section('content')
    <h1>Chi tiết Cẩm nang nghề nghiệp</h1>

    <div>
        <strong>ID:</strong> {{ $genrePost->id }}
    </div>
    <div>
        <strong>Title:</strong> {{ $genrePost->title }}
    </div>
    <div>
        <strong>Slug:</strong> {{ $genrePost->slug }}
    </div>
    <div>
        <strong>Note:</strong> {{ $genrePost->note }}
    </div>
    <div>
        <strong>Status:</strong> {{ $genrePost->status ? 'Active' : 'Inactive' }}
    </div>
    <div>
        <strong>Icon:</strong>
        @if ($genrePost->icon)
            <img src="{{ asset('storage/' . $genrePost->icon) }}" alt="Icon" width="100">
        @else
            No Icon
        @endif
    </div>
    <div>
        <strong>Created At:</strong> {{ $genrePost->created_at->format('Y-m-d H:i:s') }}
    </div>
    <div>
        <strong>Updated At:</strong> {{ $genrePost->updated_at->format('Y-m-d H:i:s') }}
    </div>

    <a href="{{ route('genre-posts.index') }}" class="btn btn-primary mt-3">Back to List</a>
@endsection
