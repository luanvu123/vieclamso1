@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Salary</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('salaries.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Salary Range Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control" required>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <label for="count">Job Count:</label>
                <input type="number" name="count" class="form-control" value="{{ old('count') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Salary</button>
        </form>
    </div>
@endsection
