@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tạo Hotline</h1>
        <form action="{{ route('hotlines.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="phone_number">Số đt</label>
                <input type="text" name="phone_number" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contact_name">Tên liên hệ </label>
                <input type="text" name="contact_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="type_hotline_id">Vùng miền</label>
                <select name="type_hotline_id" class="form-control" required>
                    @foreach($typeHotlines as $typeHotline)
                        <option value="{{ $typeHotline->id }}">{{ $typeHotline->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" class="form-control" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tạo</button>
        </form>
    </div>
@endsection
