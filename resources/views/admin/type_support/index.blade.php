@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Type Supports</h1>
    <a href="{{ route('type_support.create') }}" class="btn btn-primary">Create New Type Support</a>

    <table class="table mt-3" id="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($typeSupports as $typeSupport)
            <tr>
                <td>{{ $typeSupport->id }}</td>
                <td>{{ $typeSupport->name }}</td>
                <td>
                    <a href="{{ route('type_support.show', $typeSupport) }}" class="btn btn-info">View</a>
                    <a href="{{ route('type_support.edit', $typeSupport) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('type_support.destroy', $typeSupport) }}" method="POST" style="display:inline;">
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
