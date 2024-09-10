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


            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" {{ old('status', $award->status) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $award->status) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>



            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
