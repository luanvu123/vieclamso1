<!-- resources/views/admin/ecosystems/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Ecosystems</h1>
        <a href="{{ route('ecosystems.create') }}" class="btn btn-primary mb-3">Create New Ecosystem</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table" id="user-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Detail</th>
                    <th>Website</th>
                    <th>Name Link Website</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Footer Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ecosystems as $ecosystem)
                    <tr>
                        <td>{{ $ecosystem->name }}</td>
                        <td>{{ $ecosystem->detail }}</td>
                        <td>{{ $ecosystem->website }}</td>
                        <td>{{ $ecosystem->name_link_website }}</td>
                        <td>{{ $ecosystem->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            @if($ecosystem->image)
                                <img src="{{ asset('storage/' . $ecosystem->image) }}" alt="Image" style="width: 100px;">
                            @endif
                        </td>
                        <td>
                            @if($ecosystem->image_footer)
                                <img src="{{ asset('storage/' . $ecosystem->image_footer) }}" alt="Footer Image" style="width: 100px;">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('ecosystems.show', $ecosystem) }}" class="btn btn-info">View</a>
                            <a href="{{ route('ecosystems.edit', $ecosystem) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('ecosystems.destroy', $ecosystem) }}" method="POST" style="display:inline;">
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
