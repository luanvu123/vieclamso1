@extends('layouts.app')

@section('content')
    <h1>Tạo slide</h1>

    <form action="{{ route('slides.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="status">Trạng thái:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="link">Link:</label>
            <input type="text" id="link" name="link" value="{{ old('link') }}" required>
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            @error('image')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Tạo</button>
    </form>
@endsection
