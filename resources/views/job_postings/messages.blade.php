<!-- resources/views/job_postings/messages.blade.php -->
@extends('dashboard-employer')

@section('content')
    <div class="container">
        <h2 class="mb-4">Tin nhắn từ ứng viên</h2>
        <div class="list-group">
            @foreach ($candidates as $candidate)
                <a href="{{ route('messages.show', $candidate) }}" class="list-group-item list-group-item-action">
                    <div class="media">
                        <img src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}" class="mr-3 rounded-circle" alt="Avatar" style="width: 50px; height: 50px;">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $candidate->fullname_candidate }}</h5>
                            <p>Click to view messages</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
