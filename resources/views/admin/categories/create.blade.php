<!-- resources/views/categories/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tạo thể loại ngành nghề</h1>

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Tên thể loại ngành nghề</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                    id="slug" onkeyup="ChangeToSlug()">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <h5>Slug</h5>
                <input class="form-control" type="text" name="slug" placeholder="Đường dẫn" id="convert_slug"  required>
            </div>
            <div class="form-group">
                <label for="image">Ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tạo</button>
        </form>
    </div>
@endsection
