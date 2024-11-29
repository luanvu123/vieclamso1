@extends('layouts.app')

@section('content')
    <h1>Loại Hotline</h1>
    <form action="{{ route('type_hotlines.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
