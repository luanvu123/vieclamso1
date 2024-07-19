@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Employer Details</h5>
            </div>
            <div class="card-body">
                <h6>Name: {{ $employer->name }}</h6>
                <p>Email: {{ $employer->email }}</p>
                <h6>Job Postings:</h6>
                <ul>
                    @foreach ($employer->jobPostings as $jobPosting)
                        <li>{{ $jobPosting->title }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
