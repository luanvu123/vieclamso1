@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">

                    <h2>Job Postings</h2>
                    <table class="table table-bordered"id="user-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Employer</th>
                                <th>Phone</th>
                                <th>Location</th>
                                <th>Created_at</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobPostings as $key => $jobPosting)
                                @php
                                    // Kiểm tra nếu created_at chưa tới 2 giờ kể từ hiện tại
                                    $isNew = $jobPosting->created_at->diffInHours(now()) < 2;
                                @endphp
                                <tr>
                                    <td @if ($isNew) style="font-weight: bold;" @endif>
                                        {{ $key }}</td>
                                    <td @if ($isNew) style="font-weight: bold;" @endif>
                                        {{ $jobPosting->title }}</td>
                                    <td @if ($isNew) style="font-weight: bold;" @endif>
                                        {{ $jobPosting->employer->name }}</td>
                                    <td @if ($isNew) style="font-weight: bold;" @endif>
                                        {{ $jobPosting->employer->phone }}</td>
                                    <td @if ($isNew) style="font-weight: bold;" @endif>
                                        {{ $jobPosting->location }}</td>
                                    <td @if ($isNew) style="font-weight: bold;" @endif>
                                        {{ $jobPosting->created_at }}</td>
                                    <td>
                                        <select id="{{ $jobPosting->id }}" class="jobPosting_choose">
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
                                        <a href="{{ route('job-postings-manage.show', $jobPosting->id) }}"><i
                                                class="fa fa-eye"></i> View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
