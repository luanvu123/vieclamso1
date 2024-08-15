@extends('layouts.app')

@section('title', 'City Details')

@section('content')
<div class="container">
    <h1>City Details</h1>
    <p><strong>ID:</strong> {{ $city->id }}</p>
    <p><strong>Name:</strong> {{ $city->name }}</p>
    <p><strong>Status:</strong> {{ $city->status ? 'Active' : 'Inactive' }}</p>
    <a href="{{ route('cities.edit', $city) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('cities.destroy', $city) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('cities.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
