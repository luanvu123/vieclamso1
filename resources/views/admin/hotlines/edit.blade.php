@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Hotline</h1>
        <form action="{{ route('hotlines.update', $hotline->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" value="{{ $hotline->phone_number }}" required>
            </div>
            <div class="form-group">
                <label for="contact_name">Contact Name</label>
                <input type="text" name="contact_name" class="form-control" value="{{ $hotline->contact_name }}">
            </div>
            <div class="form-group">
                <label for="type_hotline_id">Type</label>
                <select name="type_hotline_id" class="form-control" required>
                    @foreach($typeHotlines as $typeHotline)
                        <option value="{{ $typeHotline->id }}" {{ $hotline->type_hotline_id == $typeHotline->id ? 'selected' : '' }}>{{ $typeHotline->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="1" {{ $hotline->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$hotline->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
