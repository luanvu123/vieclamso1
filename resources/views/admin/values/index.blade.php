@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">

                    <div class="d-flex justify-content-between mb-3">
                        <h2>Đối với Doanh nghiệp - Đối với Nhà tuyển dụng</h2>
                        <a href="{{ route('values.create') }}" class="btn btn-primary">Tạo mới </a>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered" id="user-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($values as $value)
                                <tr>
                                    <td>{{ $value->name }}</td>
                                    <td><img src="{{ asset('storage/' . $value->image) }}" width="100"></td>
                                    <td>{{ $value->description }}</td>
                                    <td>{{ $value->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('values.edit', $value->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('values.destroy', $value->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
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
