@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Titlebar -->
                <div class="row">
   <a href="{{ route('users.create') }}" class="button margin-top-30">Add User</a>
                    <!-- Table -->
                    <table id="user-table" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><i class="fa fa-user"></i> Name</th>
                                <th><i class="fa fa-file-text"></i> Email</th>
                                <th><i class="fa fa-map-marker"></i> Address</th>
                                <th><i class="fa fa-calendar"></i> Registered At</th>
                                <th><i class="fa fa-toggle-on"></i>Status</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td class="title">{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <select id="{{ $user->id }}"class="user_choose">
                                            @if ($user->status == 0)
                                                <option value="1">Hoạt động</option>
                                                <option selected value="0">Ngừng hoạt động</option>
                                            @else
                                                <option selected value="1">Hoạt động</option>
                                                <option value="0">Ngừng hoạt động</option>
                                            @endif
                                        </select>
                                    </td>
                                    <td class="action">
                                        <a href="{{ route('users.edit', $user->id) }}"><i class="fa fa-pencil"></i>
                                            Edit</a>
                                        <a href="{{ route('users.show', $user->id) }}"><i
                                                class="fa fa-eye"></i>
                                            show</a>
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
