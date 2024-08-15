@extends('layouts.app')

@section('title', 'Type Consultation Details')

@section('content')
<div class="container">
    <h1>Type Consultation Details</h1>
    <p><strong>ID:</strong> {{ $typeConsultation->id }}</p>
    <p><strong>Name:</strong> {{ $typeConsultation->name }}</p>
    <p><strong>Status:</strong> {{ $typeConsultation->status ? 'Active' : 'Inactive' }}</p>
    <a href="{{ route('type-consultations.edit', $typeConsultation) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('type-consultations.destroy', $typeConsultation) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('type-consultations.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
