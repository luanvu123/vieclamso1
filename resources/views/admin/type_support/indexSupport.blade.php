@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Support Requests</h1>
        <table class="table mt-3" id="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Type of Support</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($supports as $support)
                    <tr>
                        <td>{{ $support->id }}</td>
                        <td>{{ $support->phone }}</td>
                        <td>{{ $support->email }}</td>
                        <td>{{ $support->typeSupport->name }}</td>
                        <td>{{ $support->description }}</td>
                        <td>
                            <select id="{{ $support->id }}" class="support_choose">
                                <option value="1" {{ $support->status === 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="2" {{ $support->status === 'resolved' ? 'selected' : '' }}>Resolved
                                </option>
                                <option value="3" {{ $support->status === 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </td>


                        <td>
                            <a href="{{ route('supports.show.list', $support) }}" class="btn btn-info">View</a>
                            <form action="{{ route('supports.destroy.list', $support) }}" method="POST"
                                style="display:inline;">
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