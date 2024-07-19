@extends('dashboard-employer')

@section('content')
    <!-- Job Posting Details -->
    <div class="job-posting-details">
        <h2>{{ $jobPosting->title }}</h2>
        <p>{{ $jobPosting->description }}</p>
    </div>

    <!-- Applications -->
    <div class="applications-list">
        <h3>Applications for {{ $jobPosting->title }}</h3>
        <ul>
            @forelse($applications as $application)
                <li>{{ $application->candidate->name }} - {{ $application->created_at->format('d/m/Y') }}</li>
            @empty
                <li>No applications yet.</li>
            @endforelse
        </ul>
    </div>

    <!-- Back Button -->
    <a href="{{ route('job-postings.index') }}" class="button">Back to Listings</a>
@endsection
