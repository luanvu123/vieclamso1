<!-- resources/views/job_postings/messages.blade.php -->
@extends('dashboard-employer')

@section('content')
    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Messages</h2>
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="{{ route('job-postings.dashboard') }}">Home</a></li>
                        <li><a href="{{ route('messages.receive') }}">List Message</a></li>
                        <li>Messages</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="messages-container-inner">
        <div class="messages-inbox">
            <ul>
                 @foreach ($candidates as $candidate)
                @php
                    $latestMessage = $candidate->latestMessage;
                @endphp
                <li class="active-message">
                    <a href="{{ route('messages.show', $candidate) }}">
                        <div class="message-avatar">
                            <img src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}"
                                alt="">
                        </div>
                        <div class="message-by">
                            <div class="message-by-headline">
                                <h5>{{ $candidate->fullname_candidate }}
                                    @if ($latestMessage && !$latestMessage->is_read)
                                        <i>Unread</i>
                                    @endif
                                </h5>
                                @if ($latestMessage)
                                    <span>{{ $latestMessage->created_at->diffForHumans() }}</span>
                                @else
                                    <span>No messages</span>
                                @endif
                            </div>
                            <p @if ($latestMessage && !$latestMessage->is_read) style="font-weight: bold;" @endif>
                                {{ $latestMessage->message ?? 'No messages' }}
                            </p>
                        </div>
                    </a>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
@endsection
