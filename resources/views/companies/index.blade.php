@extends('dashboard-employer')
@section('content')
    <h1>All Companies</h1>

    <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Create New Company</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Scale</th>
                <th>Address</th>
                <th>Website</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->scale }}</td>
                    <td>{{ $company->address }}</td>
                    <td>{{ $company->website }}</td>
                    <td>{{ $company->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('companies.show', $company->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No companies available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
