@extends('layouts.app')

@section('content')
    <h1>Edit Type of Hotline</h1>
    <form action="{{ route('type_hotlines.update', $typeHotline->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $typeHotline->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
