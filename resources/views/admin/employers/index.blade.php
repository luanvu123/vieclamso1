@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success border-0 bg-grd-success alert-dismissible fade show">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><span class="material-icons-outlined fs-2">check_circle</span>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Success Alerts</h6>
                    <div class="text-white">A simple success alert—check it out!</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Employer List</h5>
            <table id="user-table" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Job Postings</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employers as $employer)
                        <tr>
                            <td>{{ $employer->id }}</td>
                            <td>{{ $employer->name }}</td>
                            <td>{{ $employer->email }}</td>
                            <td>
                                <ul>
                                    @foreach ($employer->jobPostings as $jobPosting)
                                        <li>{{ $jobPosting->title }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a href="{{ route('employers.show', $employer->id) }}" class="btn btn-info">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
