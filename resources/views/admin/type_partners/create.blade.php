<!-- resources/views/type_partners/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Type Partner</h1>
    <form action="{{ route('type-partners.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection
