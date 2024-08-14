<!-- resources/views/partners/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Partner</h1>
    <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="type_partner_id">Type:</label>
            <select name="type_partner_id" class="form-control" required>
                @foreach($typePartners as $typePartner)
                    <option value="{{ $typePartner->id }}">{{ $typePartner->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection
