@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Job Postings</h1>
    <a href="{{ route('job-postings.create') }}" class="btn btn-primary">Create Job Posting</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobPostings as $jobPosting)
                <tr>
                    <td>{{ $jobPosting->title }}</td>
                    <td>{{ $jobPosting->description }}</td>
                    <td>
                        <a href="{{ route('job-postings.show', $jobPosting->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('job-postings.edit', $jobPosting->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('job-postings.destroy', $jobPosting->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
