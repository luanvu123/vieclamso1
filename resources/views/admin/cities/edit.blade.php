@extends('layouts.app')

@section('title', 'Edit City')

@section('content')
<div class="container">
    <h1>Edit City</h1>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cities.update', $city) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">City Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $city->name) }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="" disabled>Select Status</option>
                <option value="1" {{ old('status', $city->status) === 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $city->status) === 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection


