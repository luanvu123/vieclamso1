@extends('layouts.app')

@section('title', 'Consultations List')

@section('content')
    <div class="container">
        <h1>Consultations</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table" id="user-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Consultation Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultations as $key => $consultation)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $consultation->fullname }}</td>
                        <td>{{ $consultation->email }}</td>
                        <td>{{ $consultation->phone }}</td>
                        <td>{{ optional($consultation->city)->name ?? 'N/A' }}</td>
                        <td>{{ optional($consultation->typeConsultation)->name ?? 'N/A' }}
                            <a href="{{ route('type-consultations.index') }}">Edit
                            </a>
                        </td>
                        <td>{{ ucfirst($consultation->status) }}</td>
                        <td>
                            <a href="{{ route('consultations.edit', $consultation) }}"><i class="fa fa-pencil"></i> Edit</a>
                            {{-- <form action="{{ route('consultations.destroy', $consultation) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form> --}}
                        </td>
                         <td>
                                        @if ($consultation->created_at > \Carbon\Carbon::now()->subHour())
                                            <span class="label label-primary pull-right">new</span>
                                        @endif
                                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
