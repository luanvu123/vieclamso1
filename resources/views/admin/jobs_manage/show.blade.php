@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $jobPosting->title }}</h2>
    <p><strong>Employer:</strong> {{ $jobPosting->employer->name }}</p>
    <p><strong>Location:</strong> {{ $jobPosting->location }}</p>
    <p><strong>Description:</strong> {!! $jobPosting->description !!}</p>
    <p><strong>Status:</strong> {{ $jobPosting->status }}</p>
    <h3>Applications</h3>
    <ul>
        @foreach($jobPosting->applications as $application)
        <li>{{ $application->candidate->name }} - {{ $application->status }}</li>
        @endforeach
    </ul>
</div>
@endsection
