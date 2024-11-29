@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $slug->name }}</h1>
        <p>Website: <a href="{{ $slug->website }}">{{ $slug->website }}</a></p>
        <p>Status: {{ $slug->status ? 'Active' : 'Inactive' }}</p>
    </div>
@endsection
