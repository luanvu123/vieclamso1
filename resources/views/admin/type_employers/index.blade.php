@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Type Employers</h1>
        <a href="{{ route('type-employer.create') }}" class="btn btn-primary">Create New Type Employer</a>
        <table class="table" id="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Top Point</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($typeEmployers as $typeEmployer)
                    <tr>
                        <td>{{ $typeEmployer->id }}</td>
                        <td>{{ $typeEmployer->name }}</td>
                        <td>{{ $typeEmployer->top_point }}</td>
                        <td>{{ $typeEmployer->status }}</td>
                        <td>
                            <a href="{{ route('type-employer.edit', $typeEmployer->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                            {{-- <form action="{{ route('type-employer.destroy', $typeEmployer->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
