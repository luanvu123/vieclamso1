@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chủ đề cần góp ý</h1>
        <form action="{{ route('type_feedback.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">tạo</button>
        </form>
    </div>
@endsection
