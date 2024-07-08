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
                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row g-3">
        <div class="col-auto">
            <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                <button class="btn btn-filter px-4"><i class="bi bi-box-arrow-right me-2"></i>Export</button>
                <a href="{{ route('users.create') }}" class="btn btn-primary px-4"><i class="bi bi-plus-lg me-2"></i>Add User</a>

            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">User List</h5>
            <table id="user-table" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>
                                <a class="d-flex align-items-center gap-3" href="javascript:;">
                                    <div class="customer-pic">
                                        <img src="{{ asset('storage/' . $user->avatar) }}" class="rounded-circle"
                                            width="40" height="40" alt="">
                                    </div>
                                    <p class="mb-0 customer-name fw-bold"> {{ $user->name }}</p>
                                </a>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->gender == 'Nam')
                                    <span class="badge bg-light text-white">Nam</span>
                                @elseif ($user->gender == 'Nữ')
                                    <span class="badge bg-grd-voilet">Nữ</span>
                                @else
                                    <span class="badge bg-grd-primary">Khác</span>
                                @endif
                            </td>

                            <td>{{ $user->address }}</td>


                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="statusCheckbox_{{ $user->id }}" {{ $user->status == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckDefault1">On</label>
                                    <script>
                                        $(document).ready(function() {
                                            $('.form-check-input').change(function() {
                                                var trangthai_val = $(this).is(':checked') ? '1' :
                                                    '0';
                                                var id = $(this).attr('id').replace('statusCheckbox_',
                                                    '');

                                                $.ajax({
                                                    url: "{{ route('user-choose') }}",
                                                    method: "GET",
                                                    data: {
                                                        trangthai_val: trangthai_val,
                                                        id: id
                                                    },
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                            </td>

                            <td>{{ $user->phone }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
