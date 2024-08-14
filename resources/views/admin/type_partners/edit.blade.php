<!-- resources/views/type_partners/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Type Partner</h1>
    <form action="{{ route('type-partners.update', $typePartner->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $typePartner->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
