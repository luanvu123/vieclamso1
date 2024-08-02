@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Type Support Details</h1>

    <p><strong>ID:</strong> {{ $typeSupport->id }}</p>
    <p><strong>Name:</strong> {{ $typeSupport->name }}</p>

    <a href="{{ route('type_support.edit', $typeSupport) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('type_support.destroy', $typeSupport) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('type_support.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
