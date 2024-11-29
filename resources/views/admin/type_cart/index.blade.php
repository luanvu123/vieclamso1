@extends('layouts.app')

@section('content')
    <h1>Danh sách Thể loại dịch vụ</h1>
    <a href="{{ route('type_cart.create') }}" class="button margin-top-30">Tạo mới</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered" id="user-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Detail</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($typeCarts as $key => $typeCart)
                <tr>
                    <td>{{ $loop->iteration }}</td> <!-- Sử dụng loop để tạo số thứ tự -->
                    <td>{{ $typeCart->name }}</td>
                    <td>{!! $typeCart->detail !!}</td>
                    <td>{{ $typeCart->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('type_cart.show', $typeCart->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('type_cart.edit', $typeCart->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('type_cart.destroy', $typeCart->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
