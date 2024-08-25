@extends('layouts.app')

@section('title', 'View Plan Feature')

@section('content')
    <h1>View Plan Feature</h1>

    <div>
        <p>ID: {{ $planFeature->id }}</p>
        <p>Feature: {{ $planFeature->feature }}</p>
    </div>

    <a href="{{ route('plan-features.edit', $planFeature->id) }}">Edit</a>
    <form action="{{ route('plan-features.destroy', $planFeature->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('plan-features.index') }}">Back to List</a>
@endsection
