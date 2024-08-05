@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Feedback List</h1>

    <table class="table" id="user-table">
        <thead>
            <tr>
                 <th scope="col">#</th>
                <th>Type Feedback</th>
                <th>Content</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Satisfaction</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($feedbacks as $key => $feedback)
                <tr>
                    <td scope="row">{{$key}}</td>
                    <td>{{ $feedback->typeFeedback->name }}</td>
                    <td>{{ $feedback->content }}</td>
                    <td>{{ $feedback->phone }}</td>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ $feedback->satisfaction }}</td>
                       <td>
                            <select id="{{$feedback->id}}" class="feedback_choose">
                                <option value="1" {{ $feedback->status === 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="2" {{ $feedback->status === 'resolved' ? 'selected' : '' }}>Resolved
                                </option>
                                <option value="3" {{ $feedback->status === 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </td>
                    <td>{{ $feedback->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                    <a href="{{ route('feedbacks.show.list', $feedback) }}" class="btn btn-info">View</a>
                    <form action="{{ route('feedbacks.destroy.list', $feedback) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No feedbacks available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
