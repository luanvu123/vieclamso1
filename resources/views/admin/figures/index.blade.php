@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">

                    <h1>Những con số tuyển dụng</h1>
                    <a href="{{ route('figures.create') }}" class="btn btn-primary">Tạo những con số tuyển dụng</a>
                    <table class="table mt-4" id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên những con số tuyển dụng</th>
                                <th>Tiêu đề những con số tuyển dụng</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($figures as $figure)
                                <tr>
                                    <td>{{ $figure->id }}</td>
                                    <td>{{ $figure->name }}</td>
                                    <td>{{ $figure->title }}</td>
                                    <td>{{ $figure->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('figures.edit', $figure->id) }}"
                                            class="btn btn-sm btn-warning">SỬa</a>
                                        <form action="{{ route('figures.destroy', $figure->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
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
