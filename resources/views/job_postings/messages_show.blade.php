
@extends('dashboard-employer')

@section('content')
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Tin nhắn với {{ $candidate->fullname_candidate }}</h2>
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="{{ route('job-postings.dashboard') }}">Home</a></li>
                        <li><a href="{{ route('messages.receive') }}">List Message</a></li>
                        <li>Tin nhắn với {{ $candidate->fullname_candidate }}</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="message-content">
            @foreach ($messages as $message)
                @if ($message->sender_type == 'candidate')
                    <div class="message-bubble">
                        <div class="message-avatar">
                            <img src="{{ $message->candidate->avatar_candidate ? asset('storage/' . $message->candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}"
                                alt="">
                        </div>

                        <div class="message-text">
                            <p>{{ $message->message }}</p>
                            <small class="text-muted">Sent at: {{ $message->created_at->format('d-m-Y H:i A') }}</small>
                        </div>
                    </div>
                @else
                    <div class="message-bubble me">
                        <div class="message-avatar">
                            <img src="{{ $message->employer->company->logo ? asset('storage/' . $message->employer->company->logo) : asset('storage/avatar/avatar-default.jpg') }}"
                                alt="">
                        </div>
                        <div class="message-text">
                            <p>{{ $message->message }}</p>
                            <small class="text-muted">Sent at: {{ $message->created_at->format('d-m-Y H:i A') }}</small>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="clearfix"></div>
            <div class="message-reply">
                <form action="{{ route('messages.reply', $candidate) }}" method="POST">
                    @csrf
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                    <button type="submit" class="button">Send Message</button>
                </form>
            </div>
        </div>
    </div>
@endsection
