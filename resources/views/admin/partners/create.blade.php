@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Khách hàng tiêu biểu và đối tác truyền thông của Vieclamso1</h1>
    <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="type_partner_id">Loại:</label>
            <select name="type_partner_id" class="form-control" required>
                @foreach($typePartners as $typePartner)
                    <option value="{{ $typePartner->id }}">{{ $typePartner->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Ảnh:</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tạo</button>
    </form>
</div>
@endsection
