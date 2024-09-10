@extends('layouts.app')

@section('content')
    <div class="container">
          @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>All Awards</h1>
        <a href="{{ route('awards.create') }}" class="btn btn-primary mb-3">Create New Award</a>

        <table class="table table-bordered" id="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Website</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($awards as $award)
                    <tr>
                        <td>{{ $award->id }}</td>
                        <td>{{ $award->name }}</td>
                        <td><img src="{{ Storage::url($award->image) }}" alt="{{ $award->name }}" width="50"></td>
                        <td>{{ $award->website }}</td>
                        <td>{{ $award->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('awards.edit', $award->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('awards.destroy', $award->id) }}" method="POST" style="display:inline-block;">
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
