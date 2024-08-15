@extends('layouts.app')

@section('title', 'Create Type Consultation')

@section('content')
<div class="container">
    <h1>Create Type Consultation</h1>
    <form action="{{ route('type-consultations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Type Consultation Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
@endsection
