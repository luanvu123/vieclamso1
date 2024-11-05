@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">

                    <h1>Job Reports</h1>
                    <table class="table" id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Job Title</th>
                                <th>Nhà tuyển dụng</th>
                                <th>Ứng viên</th>
                                <th>Trạng thái</th>
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
                                        <a href="{{ route('job-reports.show', $jobReport->id) }}"
                                            class="btn btn-info">View</a>
                                        <a href="{{ route('job-reports.edit', $jobReport->id) }}"
                                            class="btn btn-warning">Edit</a>
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
