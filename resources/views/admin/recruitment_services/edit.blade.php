@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Recruitment Service</h2>
    <form action="{{ route('recruitment_services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $service->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="summary2" name="description" required>{{ $service->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1" {{ $service->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$service->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($service->image)
            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" style="max-width: 100px;">
            @endif
        </div>
        <div class="form-group">
            <label for="position_image">Position Image</label>
            <select class="form-control" id="position_image" name="position_image" required>
                <option value="left" {{ $service->position_image == 'left' ? 'selected' : '' }}>Left</option>
                <option value="right" {{ $service->position_image == 'right' ? 'selected' : '' }}>Right</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
