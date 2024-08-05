@extends('layouts.app')

@section('content')
    <h1>Edit Public Link</h1>
    <form action="{{ route('public_links.update', $publicLink->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Image</label>
            @if ($publicLink->image)
                <img src="{{ asset('storage/' . $publicLink->image) }}" alt="Image" style="max-width: 100px;">
            @endif
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" class="form-control" id="link" name="link" value="{{ $publicLink->link }}">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="active" {{ $publicLink->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $publicLink->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
