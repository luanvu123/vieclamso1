@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Recruitment Services</h2>
    <a href="{{ route('recruitment_services.create') }}" class="btn btn-primary mb-3">Add New Service</a>
    <table class="table" id="user-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Image</th>
                <th>Position Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->title }}</td>
                <td>{!! $service->description !!}</td>
                <td>{{ $service->status ? 'Active' : 'Inactive' }}</td>
                <td>
                    @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" style="max-width: 100px;">
                    @endif
                </td>
                <td>{{ ucfirst($service->position_image) }}</td>
                <td>
                    <a href="{{ route('recruitment_services.edit', $service->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('recruitment_services.destroy', $service->id) }}" method="POST" class="d-inline">
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
