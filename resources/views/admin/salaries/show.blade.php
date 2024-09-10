@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Salary Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $salary->name }}</h5>
                <p class="card-text">
                    <strong>Status:</strong> {{ ucfirst($salary->status) }}<br>
                    <strong>Job Count:</strong> {{ $salary->count }}
                </p>
                <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
