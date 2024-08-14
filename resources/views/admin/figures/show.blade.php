@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Figure Details</h1>
    <div class="card">
        <div class="card-header">
            <h2>{{ $figure->name }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Title:</strong> {{ $figure->title }}</p>
            <p><strong>Status:</strong> {{ $figure->status ? 'Active' : 'Inactive' }}</p>
        </div>
    </div>
    <a href="{{ route('figures.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
