@extends('layouts.app')

@section('title', 'Cities')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <h1>Cities</h1>
                    <a href="{{ route('cities.create') }}" class="btn btn-primary">Add New City</a>
                    <table class="table" id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city)
                                <tr>
                                    <td>{{ $city->id }}</td>
                                    <td>{{ $city->name }}</td>
                                    <td>{{ $city->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('cities.show', $city) }}" class="btn btn-info"><i
                                                class="fa fa-eye"></i> View</a>
                                        <a href="{{ route('cities.edit', $city) }}" class="btn btn-warning"><i
                                                class="fa fa-pencil"></i> Edit</a>
                                        {{-- <form action="{{ route('cities.destroy', $city) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}
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
