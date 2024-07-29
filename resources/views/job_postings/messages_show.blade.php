<!-- resources/views/job_postings/messages_show.blade.php -->

@extends('dashboard-employer')

@section('content')
    <div class="container">
        <h2 class="mb-4">Tin nhắn với {{ $candidate->fullname_candidate }}</h2>
        <div class="card">
            <div class="card-body">
                @foreach ($messages as $message)
                    <div class="media mb-3">
                        @if ($message->sender_type == 'candidate')
                            <img src="{{ $message->candidate->avatar_candidate ? asset('storage/' . $message->candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}" class="mr-3 rounded-circle" alt="Avatar" style="width: 50px; height: 50px;">
                            <div class="media-body">
                                <h5 class="mt-0">{{ $message->candidate->fullname_candidate }}</h5>
                                <p>{{ $message->message }}</p>
                                <small class="text-muted">Sent at: {{ $message->created_at->format('d-m-Y H:i A') }}</small>
                            </div>
                        @else
                            <img src="{{ $message->employer->avatar ? asset('storage/' . $message->employer->avatar) : asset('storage/avatar/avatar-default.jpg') }}" class="mr-3 rounded-circle" alt="Avatar" style="width: 50px; height: 50px;">
                            <div class="media-body">
                                <h5 class="mt-0">{{ $message->employer->name }}</h5>
                                <p>{{ $message->message }}</p>
                                <small class="text-muted">Sent at: {{ $message->created_at->format('d-m-Y H:i A') }}</small>
                            </div>
                        @endif
                    </div>
                    <hr>
                @endforeach
                <form action="{{ route('messages.reply', $candidate) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="message">Reply</label>
                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
