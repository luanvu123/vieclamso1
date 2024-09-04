@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Feedback List</h1>

        <table class="table" id="user-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th><i class="fa fa-comment"></i>Type Feedback</th>
                    <th><i class="fa fa-align-left"></i>Content</th>
                    <th><i class="fa fa-phone"></i>Phone</th>
                    <th><i class="fa fa-envelope"></i>Email</th>
                    <th><i class="fa-regular fa-face-smile"></i>Satisfaction</th>
                    <th><i class="fa fa-toggle-on"></i> Status</th>
                    <th><i class="fa fa-calendar"></i> Created At</th>
                    <th><i class="fa fa-cog"></i> Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($feedbacks as $key => $feedback)
                    <tr>
                        <td scope="row">{{ $key }}</td>
                        <td>{{ $feedback->typeFeedback->name }}</td>
                        <td>{{ $feedback->content }}</td>
                        <td>{{ $feedback->phone }}</td>
                        <td>{{ $feedback->email }}</td>
                        <td>{{ $feedback->satisfaction }}</td>
                        <td>
                            <select id="{{ $feedback->id }}" class="feedback_choose">
                                <option value="1" {{ $feedback->status === 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="2" {{ $feedback->status === 'resolved' ? 'selected' : '' }}>Resolved
                                </option>
                                <option value="3" {{ $feedback->status === 'closed' ? 'selected' : '' }}>Closed
                                </option>
                            </select>
                        </td>
                        <td>{{ $feedback->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <a href="{{ route('feedbacks.show.list', $feedback) }}" class="btn btn-info">
                                <i class="fa fa-eye"></i> View
                            </a>
                            <a href="javascript:void(0);" class="btn btn-danger"
                                onclick="deleteFeedback({{ $feedback->id }})">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>

                        <script>
                            function deleteFeedback(feedbackId) {
                                if (confirm('Are you sure you want to delete this feedback?')) {
                                    $.ajax({
                                        url: '/feedbacks/' + feedbackId,
                                        type: 'DELETE',
                                        data: {
                                            _token: '{{ csrf_token() }}'
                                        },
                                        success: function(response) {
                                            alert('Feedback deleted successfully.');
                                            location.reload();
                                        },
                                        error: function(xhr) {
                                            alert('Failed to delete feedback. Please try again.');
                                        }
                                    });
                                }
                            }
                        </script>


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
