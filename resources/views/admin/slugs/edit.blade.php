@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa Tags chân trang</h1>

        <form action="{{ route('slugs.update', $slug) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $slug->name) }}">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="website">Website (optional)</label>
                <input type="text" name="website" class="form-control" value="{{ old('website', $slug->website) }}">
                @error('website')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ old('status', $slug->status) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $slug->status) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
