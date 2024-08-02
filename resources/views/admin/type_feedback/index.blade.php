@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Type Feedbacks</h1>
        <a href="{{ route('type_feedback.create') }}" class="btn btn-primary">Create New Type Feedback</a>
        <table class="table" id="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($typeFeedbacks as $typeFeedback)
                    <tr>
                        <td>{{ $typeFeedback->id }}</td>
                        <td>{{ $typeFeedback->name }}</td>
                        <td>
                            <a href="{{ route('type_feedback.show', $typeFeedback->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('type_feedback.edit', $typeFeedback->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('type_feedback.destroy', $typeFeedback->id) }}" method="POST" style="display:inline-block;">
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
