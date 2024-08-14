<!-- resources/views/partners/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Partner</h1>
    <form action="{{ route('partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="type_partner_id">Type:</label>
            <select name="type_partner_id" class="form-control" required>
                @foreach($typePartners as $typePartner)
                    <option value="{{ $typePartner->id }}" {{ $typePartner->id == $partner->type_partner_id ? 'selected' : '' }}>{{ $typePartner->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $partner->name }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}" width="100">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control" required>
                <option value="1" {{ $partner->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$partner->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
