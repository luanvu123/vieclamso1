@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chỉnh sửa thể loại ngành nghề</h1>

        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
             <div class="form-group">
                <label for="name">Tên thể loại ngành nghề</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}"
                    id="slug" onkeyup="ChangeToSlug()">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <h5>Slug</h5>
                <input class="form-control" type="text" name="slug" placeholder="Đường dẫn" id="convert_slug"value="{{ old('name', $category->slug) }}">
            </div>
            <div class="form-group">
                <label for="image">Ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                @if ($category->image)
                    <div class="mt-2">
                        @if ($category->image)
                                            <img src="{{ asset('public/storage/' . $category->image) }}" style="width: 30px;">
                                        @else
                                            No Image
                                        @endif
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
