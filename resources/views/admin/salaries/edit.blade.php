@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Salary</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Salary Range Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $salary->name) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control" required>
                    <option value="active" {{ $salary->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $salary->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <label for="count">Job Count:</label>
                <input type="number" name="count" class="form-control" value="{{ old('count', $salary->count) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Salary</button>
        </form>
    </div>
@endsection


