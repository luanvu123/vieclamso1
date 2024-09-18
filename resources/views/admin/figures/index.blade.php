@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">

                    <h1>Figures</h1>
                    <a href="{{ route('figures.create') }}" class="btn btn-primary">Add New Figure</a>
                    <table class="table mt-4" id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($figures as $figure)
                                <tr>
                                    <td>{{ $figure->id }}</td>
                                    <td>{{ $figure->name }}</td>
                                    <td>{{ $figure->title }}</td>
                                    <td>{{ $figure->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('figures.edit', $figure->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('figures.destroy', $figure->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
