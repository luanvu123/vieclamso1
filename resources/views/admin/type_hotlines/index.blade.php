@extends('layouts.app')

@section('content')
    <h1>Type of Hotlines</h1>
    <a href="{{ route('type_hotlines.create') }}" class="btn btn-primary">Add Type of Hotline</a>
    <table class="table" id="user-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($typeHotlines as $typeHotline)
                <tr>
                    <td>{{ $typeHotline->name }}</td>
                    <td>{{ $typeHotline->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('type_hotlines.edit', $typeHotline->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('type_hotlines.destroy', $typeHotline->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
