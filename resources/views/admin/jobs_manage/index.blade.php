@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Job Postings</h2>
        <table class="table table-bordered"id="user-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Employer</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobPostings as $key => $jobPosting)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $jobPosting->title }}</td>
                        <td>{{ $jobPosting->employer->name }}</td>
                        <td>{{ $jobPosting->employer->phone }}</td>
                        <td>{{ $jobPosting->location }}</td>
                        <td>

                              <select id="{{  $jobPosting->id }}"class="jobPosting_choose">
                                    @if ($jobPosting->status == 0)
                                        <option value="1">No active</option>
                                        <option selected value="0">Active</option>
                                    @else
                                        <option selected value="1">No Active</option>
                                        <option value="0">Active</option>
                                    @endif
                                </select>
                        </td>
                        <td>
                            <a href="{{ route('job-postings-manage.show', $jobPosting->id) }}"><i class="fa fa-eye"></i> View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
