@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit CV Template</h1>
        <form action="{{ route('cv_templates.update', $template->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $template->name) }}" required>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="url" name="url" class="form-control" value="{{ old('url', $template->url) }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                @if($template->image)
                    <img src="{{ asset('storage/' . $template->image) }}" alt="{{ $template->name }}" width="100" class="mt-2">
                @endif
            </div>
            <div class="form-group" id="color-pickers">
                <label for="colors">Colors</label>
                @php
                    $colors = json_decode($template->colors);
                @endphp
                @foreach($colors as $color)
                    <input type="color" name="colors[]" class="form-control" value="{{ $color }}" required>
                @endforeach
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $template->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$template->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
