@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $jobPosting->title }}</h1>
    <p>{{ $jobPosting->description }}</p>

    <h2>Applications</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Candidate</th>
                <th>CV</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobPosting->applications as $application)
                <tr>
                    <td>{{ $application->candidate->fullname_candidate }}</td>
                    <td><a href="{{ asset('storage/' . $application->cv->cv_path) }}" target="_blank">View CV</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
