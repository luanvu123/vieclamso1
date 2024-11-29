@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">

                    <h1>Khách hàng tiêu biểu và đối tác truyền thông của Vieclamso1</h1>
                    <a href="{{ route('partners.create') }}" class="btn btn-primary">Thêm</a>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table" id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Loại</th>
                                <th>ẢNh</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($partners as $partner)
                                <tr>
                                    <td>{{ $partner->id }}</td>
                                    <td>{{ $partner->name }}</td>
                                    <td>{{ $partner->typePartner->name }}
                                        <a href="{{ route('type-partners.index') }}">Edit type-partners
                                        </a>
                                    </td>
                                    <td><img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}"
                                            width="100">
                                    </td>
                                    <td>{{ $partner->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('partners.show', $partner->id) }}" class="btn btn-info">Xem</a>
                                        <a href="{{ route('partners.edit', $partner->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{ route('partners.destroy', $partner->id) }}" method="POST"
                                            style="display:inline;">
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
