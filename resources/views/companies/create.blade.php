@extends('dashboard-employer')

@section('content')
    <h1>Create New Company</h1>

    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            @error('image')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="logo">Logo:</label>
            <input type="file" id="logo" name="logo">
            @error('logo')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="scale">Scale:</label>
            <input type="text" id="scale" name="scale" value="{{ old('scale') }}">
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}">
        </div>
        <div>
            <label for="map">Map:</label>
            <input type="text" id="map" name="map" value="{{ old('map') }}">
        </div>
        <div>
            <label for="detail">Detail:</label>
            <textarea id="detail" name="detail">{{ old('detail') }}</textarea>
        </div>
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="url">URL:</label>
            <input type="text" id="url" name="url" value="{{ old('url') }}">
        </div>
        <div>
            <label for="website">Website:</label>
            <input type="text" id="website" name="website" value="{{ old('website') }}">
        </div>
        <div>
            <label for="facebook">Facebook:</label>
            <input type="text" id="facebook" name="facebook" value="{{ old('facebook') }}">
        </div>
        <div>
            <label for="twitter">Twitter:</label>
            <input type="text" id="twitter" name="twitter" value="{{ old('twitter') }}">
        </div>
        <div>
            <label for="linkedin">LinkedIn:</label>
            <input type="text" id="linkedin" name="linkedin" value="{{ old('linkedin') }}">
        </div>
        <button type="submit">Create Company</button>
    </form>
@endsection
