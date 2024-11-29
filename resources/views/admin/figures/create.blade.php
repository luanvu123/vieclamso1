@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tạo những con số tuyển dụng </h1>
    <form action="{{ route('figures.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Tên những con số tuyển dụng</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="title">Tiêu đè những con số tuyển dụng</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select name="status" class="form-control">
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Hiện</option>
                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>ẨN</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">tạo</button>
    </form>
</div>
@endsection
