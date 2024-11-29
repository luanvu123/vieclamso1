@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa Chủ đề cần góp ý</h1>
        <form action="{{ route('type_feedback.update', $typeFeedback->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $typeFeedback->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
