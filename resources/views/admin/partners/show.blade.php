<!-- resources/views/partners/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Partner Details</h1>
    <p>ID: {{ $partner->id }}</p>
    <p>Name: {{ $partner->name }}</p>
    <p>Type: {{ $partner->typePartner->name }}</p>
    <p>Status: {{ $partner->status ? 'Active' : 'Inactive' }}</p>
    <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}" width="100">
</div>
@endsection
