@extends('layouts.app')

@section('content')
    <style>
        .container1 {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
            color: #333;
        }

        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tr:hover {
            background-color: #ddd;
        }
    </style>
    <div class="container1">
        <div class="job-details">
            <h2>{{ $jobPosting->title }}</h2>
            <p><strong>Employer:</strong> {{ $jobPosting->employer->name }}</p>

            <div class="description-container">
                <p class="description">
                    <strong>Description:</strong>
                    <span class="full-description-content hidden">
                        {!! $jobPosting->description !!}
                    </span>
                </p>
            </div>
            <h3>Các ứng viên ứng tuyển</h3>
            <table class="table" id="user-table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Ứng Viên</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobPosting->applications as $key => $application)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $application->candidate->fullname_candidate }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
