@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Hotline</h1>
        <form action="{{ route('hotlines.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contact_name">Contact Name</label>
                <input type="text" name="contact_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="type_hotline_id">Type</label>
                <select name="type_hotline_id" class="form-control" required>
                    @foreach($typeHotlines as $typeHotline)
                        <option value="{{ $typeHotline->id }}">{{ $typeHotline->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
