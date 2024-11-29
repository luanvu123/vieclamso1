@extends('layouts.app')

@section('title', 'Create City')

@section('content')
<div class="container">
    <h1>Tạo tỉnh thành</h1>
    <form action="{{ route('cities.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">tên tỉnh thành</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Tạo</button>
        </div>
    </form>
</div>
@endsection
