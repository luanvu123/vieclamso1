@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Figure</h1>
    <form action="{{ route('figures.update', $figure->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $figure->name) }}">
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $figure->title) }}">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ (old('status') ?? $figure->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ (old('status') ?? $figure->status) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
