@extends('dashboard-employer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>All Companies</h1>

                <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Create New Company</a>
                <table  id="user-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Logo</th>
                            <th>Scale</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Website</th>
                            <th>Facebook</th>
                            <th>Twitter</th>
                            <th>LinkedIn</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->name }}</td>
                                <td>
                                    @if ($company->image)
                                        <img src="{{ asset('storage/' . $company->image) }}" alt="Company Image"
                                           style="width:100px;" >
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    @if ($company->logo)
                                        <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo"
                                            style="width:100px;" >
                                    @else
                                        No Logo
                                    @endif
                                </td>
                                <td>{{ $company->scale }}</td>
                                <td>{{ $company->address }}</td>
                                <td>{{ $company->status ? 'Active' : 'Inactive' }}</td>
                                <td>{{ $company->website }}</td>
                                <td>
                                    @if ($company->facebook)
                                        <a href="{{ $company->facebook }}" target="_blank">Facebook</a>
                                    @endif
                                </td>
                                <td>
                                    @if ($company->twitter)
                                        <a href="{{ $company->twitter }}" target="_blank">Twitter</a>
                                    @endif
                                </td>
                                <td>
                                    @if ($company->linkedin)
                                        <a href="{{ $company->linkedin }}" target="_blank">LinkedIn</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('companies.show', $company->id) }}"
                                        class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('companies.edit', $company->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
