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
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Components</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Candidates</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">User List</h5>
            <table id="user-table" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Trạng thái</th>
                        <th>CVs</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($candidates as $candidate)
                        <tr>
                            <td>{{ $candidate->id }}</td>
                            <td>
                                 <a class="d-flex align-items-center gap-3" href="javascript:;">
                                    <div class="customer-pic">
                                        <img src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}" class="rounded-circle"
                                            width="40" height="40" alt="">
                                    </div>
                                    <p class="mb-0 customer-name fw-bold"> {{ $candidate->fullname_candidate }}</p>
                                </a>
                            </td>
                            <td>{{ $candidate->email }}</td>
                            <td>{{ $candidate->phone_number_candidate }}</td>
                            <td>{{ $candidate->status }}</td>
                            <td>
                                @if ($candidate->cvs->isNotEmpty())
                                    <ul>
                                        @foreach ($candidate->cvs as $cv)
                                            <li><a href="{{ asset('storage/' . $cv->cv_path) }}"
                                                    target="_blank">{{ $cv->cv_name ?? 'CV' }}</a></li>
                                        @endforeach
                                    </ul>
                                @else
                                    Không có CV
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('candidates.show', $candidate->id) }}" class="btn btn-info">Xem</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
