@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">

                    <h1>Hotlines</h1>
                        <a href="{{ route('hotlines.create') }}" class="button margin-top-30">Thêm Hotline</a>
                         <a href="{{ route('type_hotlines.index') }}" class="button margin-top-30">Danh sách vùng</a>
                    <table class="table" id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>SDT</th>
                                <th>Tên liên hệ </th>
                                <th>Vùng</th>
                                <th>Trạng thái</th>
                                <th>hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hotlines as $hotline)
                                <tr>
                                    <td>{{ $hotline->id }}</td>
                                    <td>{{ $hotline->phone_number }}</td>
                                    <td>{{ $hotline->contact_name }}</td>
                                    <td>{{ $hotline->typeHotline->name }}
                                    </td>
                                    <td>{{ $hotline->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('hotlines.edit', $hotline->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('hotlines.destroy', $hotline->id) }}" method="POST"
                                            style="display:inline;">
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
