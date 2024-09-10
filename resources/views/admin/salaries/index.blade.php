@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Salary List</h1>
        <a href="{{ route('salaries.create') }}" class="btn btn-primary">Add New Salary</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salaries as $salary)
                    <tr>
                        <td>{{ $salary->id }}</td>
                        <td>{{ $salary->name }}</td>
                        <td>{{ $salary->status }}</td>
                        <td>{{ $salary->count }}</td>
                        <td>
                            <a href="{{ route('salaries.show', $salary->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" style="display:inline;">
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
