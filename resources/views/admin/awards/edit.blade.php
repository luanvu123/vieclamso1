@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Award</h1>

        <form action="{{ route('awards.update', $award->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Award Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $award->name) }}">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Award Image (optional)</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="website">Website (optional)</label>
                <input type="text" name="website" class="form-control" value="{{ old('website', $award->website) }}">
                @error('website')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group form-check">
                <input type="checkbox" name="status" class="form-check-input" id="status" {{ old('status', $award->status) ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Active</label>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
