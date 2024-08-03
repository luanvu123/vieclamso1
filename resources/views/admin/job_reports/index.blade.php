@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Job Reports</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table" id="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Job Title</th>
                <th>Employer</th>
                <th>Candidate</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobReports as $jobReport)
                <tr>
                    <td>{{ $jobReport->id }}</td>
                    <td>{{ $jobReport->jobPosting->title }}</td>
                    <td>{{ $jobReport->jobPosting->employer->name }}</td>
                    <td>{{ $jobReport->candidate->fullname_candidate }}</td>
                    <td>{{ $jobReport->status }}</td>
                    <td>
                        <a href="{{ route('job-reports.show', $jobReport->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('job-reports.edit', $jobReport->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
