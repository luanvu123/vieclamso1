@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $award->name }}</h1>
         <h1>{{ $award->category }}</h1>
        <p><strong>User ID:</strong> {{ $award->user_id }}</p>
        <p><strong>Image:</strong> <img src="{{ asset('storage/' . $award->image) }}" alt="{{ $award->name }}" width="100"></p>
        <p><strong>Website:</strong> <a href="{{ $award->website }}">{{ $award->website }}</a></p>
        <p><strong>Status:</strong> {{ $award->status ? 'Active' : 'Inactive' }}</p>
    </div>
@endsection

