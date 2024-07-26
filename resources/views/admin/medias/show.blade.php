<!-- resources/views/admin/medias/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Media Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $media->website }}</h5>
                @if ($media->image)
                    <img src="{{ asset('storage/' . $media->image) }}" alt="Image" style="width: 200px;">
                @else
                    <p>No image available.</p>
                @endif
                <p>Status: {{ $media->status ? 'Active' : 'Inactive' }}</p>
                <a href="{{ route('medias.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
