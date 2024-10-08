@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <h1>All Awards</h1>
                    <a href="{{ route('awards.create') }}" class="btn btn-primary mb-3">Create New Award</a>

                    <table class="table table-bordered" id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên giải thưởng</th>
                                <th>Ảnh</th>
                                <th>Thể loại</th>
                                <th>Website</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($awards as $award)
                                <tr>
                                    <td>{{ $award->id }}</td>
                                    <td>{{ $award->name }}</td>
                                    <td>{{ $award->category }}</td>
                                    <td><img src="{{ asset('storage/' . $award->image) }}" alt="{{ $award->name }}" width="50">
                                    </td>
                                    <td>{{ $award->website }}</td>
                                    <td>{{ $award->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('awards.edit', $award->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('awards.destroy', $award->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
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
