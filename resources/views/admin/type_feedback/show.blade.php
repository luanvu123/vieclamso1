@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Type Feedback Details</h1>
        <div class="card">
            <div class="card-header">
                {{ $typeFeedback->name }}
            </div>
            <div class="card-body">
                <p><strong>ID: </strong>{{ $typeFeedback->id }}</p>
                <p><strong>Name: </strong>{{ $typeFeedback->name }}</p>
            </div>
        </div>
        <a href="{{ route('type_feedback.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
@endsection
