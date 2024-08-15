@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Hotlines</h1>
        <a href="{{ route('hotlines.create') }}" class="btn btn-primary">Add Hotline</a>
        <table class="table" id="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Phone Number</th>
                    <th>Contact Name</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotlines as $hotline)
                    <tr>
                        <td>{{ $hotline->id }}</td>
                        <td>{{ $hotline->phone_number }}</td>
                        <td>{{ $hotline->contact_name }}</td>
                        <td>{{ $hotline->typeHotline->name }}</td>
                        <td>{{ $hotline->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('hotlines.edit', $hotline->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('hotlines.destroy', $hotline->id) }}" method="POST" style="display:inline;">
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
