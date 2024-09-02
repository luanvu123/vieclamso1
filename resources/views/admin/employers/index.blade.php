@extends('layouts.app')

@section('content')
    <style>
        /* General container styling */
        .container {
            margin-top: 20px;
        }

        /* Table styling */
        .table-container {
            margin-top: 20px;
            overflow-x: auto;
        }

        #user-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        #user-table th,
        #user-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        #user-table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        #user-table tbody tr:hover {
            background-color: #f9f9f9;
        }

        /* Avatar styling */
        .message-avatar img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Point and status styling */
        .point {
            font-weight: bold;
            color: #3490dc;
        }

        td {
            vertical-align: middle;
        }

        #user-table td ul {
            list-style: none;
            padding-left: 0;
        }

        #user-table td ul li {
            margin-bottom: 5px;
        }

        /* Button styling */
        .btn-info {
            background-color: #3490dc;
            border-color: #3490dc;
            color: #fff;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn-info:hover {
            background-color: #2176bd;
            border-color: #2176bd;
            color: #fff;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>All Employer</h1>
                <div class="table-container">
                    <table id="user-table" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Điểm xếp hạng </th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Job Postings</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employers as $employer)
                                <tr>
                                    <td>{{ $employer->id }}</td>
                                    <td>
                                        <div class="message-avatar">
                                            <img src=" {{ $employer->avatar ? asset('storage/' . $employer->avatar) : asset('storage/avatar/avatar-default.jpg') }}"
                                                alt="">
                                        </div>
                                    </td>
                                    <td>{{ $employer->name }}</td>
                                    <td>{{ $employer->email }}</td>
                                    <td>{{ ucfirst($employer->gender) }}</td>
                                    <td> <span data-v-69ab245a="" class="point">{{ $employer->credit }}</span>
                                    <td>{{ $employer->phone }}</td>
                                    <td>
                                        <select id="{{ $employer->id }}"class="employer_choose">
                                            @if ($employer->status == 0)
                                                <option value="1">Hoạt động</option>
                                                <option selected value="0">Ngừng hoạt động</option>
                                            @else
                                                <option selected value="1">Hoạt động</option>
                                                <option value="0">Ngừng hoạt động</option>
                                            @endif
                                        </select>
                                    </td>

                                    <td>
                                        <ul>
                                            @foreach ($employer->jobPostings as $jobPosting)
                                                <li>{{ $jobPosting->title }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="{{ route('employers.show', $employer->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('employers.edit', $employer->id) }}"
                                            class="btn btn-danger">Edit</a>
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
