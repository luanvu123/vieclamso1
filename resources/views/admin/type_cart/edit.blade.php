@extends('layouts.app')

@section('content')
    <h1>Chỉnh sửa Thể loại dịch vụ</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('type_cart.update', $typeCart->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $typeCart->name }}">
        </div>
        <div>
            <label for="detail">Detail:</label>
            <textarea class="WYSIWYG" name="detail" cols="80" rows="6" id="summary5" spellcheck="true">{!! $typeCart->detail !!}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $typeCart->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$typeCart->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection
