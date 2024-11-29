
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Khách hàng tiêu biểu - Đối tác truyền thông</h1>
    <a href="{{ route('type-partners.create') }}" class="btn btn-primary">Thêm</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table" id="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($typePartners as $typePartner)
                <tr>
                    <td>{{ $typePartner->id }}</td>
                    <td>{{ $typePartner->name }}</td>
                    <td>
                        <a href="{{ route('type-partners.show', $typePartner->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('type-partners.edit', $typePartner->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('type-partners.destroy', $typePartner->id) }}" method="POST" style="display:inline;">
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
@endsection
