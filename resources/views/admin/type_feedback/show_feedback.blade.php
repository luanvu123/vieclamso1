@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chi tiết client gửi góp ý</h1>
    <div class="card mt-3">
        <div class="card-header">
            Feedback #{{ $feedback->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Chủ đề cần góp ý: {{ $feedback->typeFeedback->name }}</h5>
            <p class="card-text"><strong>Số điện thoại:</strong> {{ $feedback->phone }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $feedback->email }}</p>
            <p class="card-text"><strong>Content:</strong> {{ $feedback->content }}</p>
            <p class="card-text"><strong>trạng thái:</strong> {{ $feedback->satisfaction }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $feedback->status }}</p>
            <a href="{{ route('feedbacks.index.list') }}" class="btn btn-primary">Back to List</a>
            <form action="{{ route('feedbacks.destroy.list', $feedback) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
