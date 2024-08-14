@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>Values</h2>
        <a href="{{ route('values.create') }}" class="btn btn-primary">Create Value</a>
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
            @foreach($values as $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td><img src="{{ asset('storage/' . $value->image) }}" width="100"></td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->status ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('values.edit', $value->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('values.destroy', $value->id) }}" method="POST" style="display:inline-block;">
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
