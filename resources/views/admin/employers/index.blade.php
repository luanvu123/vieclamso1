@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box margin-top-30">
                <div class="dashboard-list-box-content">
                    <h1>All Employer</h1>

                    <table id="user-table" class="manage-table responsive-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Điểm xếp hạng</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Job Postings</th>
                                <th>Actions</th>
                                <th></th>
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
                                        <a href="{{ route('type-employer.index') }}">Edit
                                        </a>
                                    </td>
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
   <td>{{ $employer->created_at }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($employer->jobPostings as $jobPosting)
                                                <li>{{ $jobPosting->title }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="{{ route('employers.show', $employer->id) }}"><i
                                                class="fa fa-eye"></i>View</a>
                                        <a href="{{ route('employers.edit', $employer->id) }}"><i
                                                class="fa fa-pencil"></i>Edit</a>
                                    </td>
                                    <td>
                                        @if ($employer->created_at > \Carbon\Carbon::now()->subHour())
                                            <span class="label label-primary pull-right">new</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    @endsection
