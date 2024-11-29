@extends('layouts.app')

@section('content')
    <h1>Chi tiết Footer MXH</h1>
    <p><strong>Admin tạo:</strong> {{ $publicLink->user->name }}</p>
    <p><strong>Image:</strong></p>
    @if ($publicLink->image)
        <img src="{{ asset('storage/' . $publicLink->image) }}" alt="Image" style="max-width: 100px;">
    @endif
    <p><strong>Link:</strong> <a href="{{ $publicLink->link }}" target="_blank">Link</a></p>
    <p><strong>Status:</strong> {{ $publicLink->status }}</p>
    <a href="{{ route('public_links.edit', $publicLink->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('public_links.destroy', $publicLink->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
