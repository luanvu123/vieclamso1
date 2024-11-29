@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <h1>Danh sách khoảng lương</h1>
                    <a href="{{ route('salaries.create') }}" class="btn btn-primary">Tạo khoảng lương</a>
                    <table class="table" id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Trạng thái</th>
                                <th>Số chiến dịch tuyển dụng</th>
                                <th>hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salaries as $salary)
                                <tr>
                                    <td>{{ $salary->id }}</td>
                                    <td>{{ $salary->name }}</td>
                                    <td>{{ $salary->status }}</td>
                                    <td>{{ $salary->count }}</td>
                                    <td>
                                        <a href="{{ route('salaries.show', $salary->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST"
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
