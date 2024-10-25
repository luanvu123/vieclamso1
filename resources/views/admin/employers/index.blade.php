@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>All Employer</h1>
                <div class="table-responsive">
                    <table id="user-table" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th></th>
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
                                    <td>
                                        <button
                                            onclick="redirectToEmailPage('{{ $employer->id }}', '{{ $employer->email }}')"
                                            class="btn btn-primary">
                                            Gửi Email <i class="fa-solid fa-envelope" style="color: #ffffff;"></i>
                                        </button>

                                    </td>
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
                                        <a href="{{ route('employers.add-cart', $employer->id) }}"
                                            class="btn btn-success">Add Cart</a>
                                        <a href="{{ route('employers.carts.index', $employer->id) }}"
                                            class="btn btn-info">Dịch vụ</a>


                                    </td>
                                    <td>
                                        @if ($employer->created_at > \Carbon\Carbon::now()->subHour())
                                            <span class="label label-primary pull-right">new</span>
                                        @endif
                                    </td>
                                    <script>
                                        function redirectToEmailPage(employerId, emailEmployer) {
                                            window.location.href = "{{ route('admin.employer.email') }}?employer_id=" + employerId + "&emailEmployer=" +
                                                emailEmployer;
                                        }
                                    </script>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
