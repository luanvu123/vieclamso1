@extends('layouts.app')

@section('title', 'Cities')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <h1>Tỉnh thành</h1>
                    <a href="{{ route('cities.create') }}"class="button margin-top-30">Thêm tỉnh thành</a>
                    <table class="table" id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên tỉnh thành</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city)
                                <tr>
                                    <td>{{ $city->id }}</td>
                                    <td>{{ $city->name }}</td>
                                    <td>{{ $city->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('cities.show', $city) }}" class="btn btn-info"><i
                                                class="fa fa-eye"></i> Xem</a>
                                        <a href="{{ route('cities.edit', $city) }}" class="btn btn-warning"><i
                                                class="fa fa-pencil"></i> Sửa</a>
                                        {{-- <form action="{{ route('cities.destroy', $city) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}
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
