@extends('layouts.app')

@section('title', 'Type Consultations')

@section('content')
<div class="container">
    <h1>Type Consultations</h1>
    <a href="{{ route('type-consultations.create') }}" class="btn btn-primary">Add New Type Consultation</a>
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
            @foreach($typeConsultations as $typeConsultation)
                <tr>
                    <td>{{ $typeConsultation->id }}</td>
                    <td>{{ $typeConsultation->name }}</td>
                    <td>{{ $typeConsultation->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('type-consultations.show', $typeConsultation) }}" class="btn btn-info"><i class="fa fa-eye"></i> View</a>
                        <a href="{{ route('type-consultations.edit', $typeConsultation) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                        {{-- <form action="{{ route('type-consultations.destroy', $typeConsultation) }}" method="POST" style="display:inline;">
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
@endsection
