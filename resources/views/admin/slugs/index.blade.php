<!-- resources/views/admin/slugs/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Slugs</h1>
        <a href="{{ route('slugs.create') }}" class="btn btn-primary mb-3">Create New Slug</a>
        <table class="table table-bordered" id="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Website</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($slugs as $slug)
                    <tr>
                        <td>{{ $slug->id }}</td>
                        <td>{{ $slug->name }}</td>
                        <td>{{ $slug->website }}</td>
                       <td>
                            <select id="{{ $slug->id }}" class="slug_choose">
                                @if ($slug->status == 0)
                                    <option value="1">Show</option>
                                    <option selected value="0">Hidden</option>
                                @else
                                    <option selected value="1">Show</option>
                                    <option value="0">Hidden</option>
                                @endif
                            </select>
                        </td>
                        <td>
                            <a href="{{ route('slugs.show', $slug) }}" class="btn btn-info">View</a>
                            <a href="{{ route('slugs.edit', $slug) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('slugs.destroy', $slug) }}" method="POST" class="d-inline">
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
