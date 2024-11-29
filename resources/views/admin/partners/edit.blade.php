@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cập nhật Khách hàng tiêu biểu và đối tác truyền thông của Vieclamso1</h1>
    <form action="{{ route('partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="type_partner_id">Loại:</label>
            <select name="type_partner_id" class="form-control" required>
                @foreach($typePartners as $typePartner)
                    <option value="{{ $typePartner->id }}" {{ $typePartner->id == $partner->type_partner_id ? 'selected' : '' }}>{{ $typePartner->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" name="name" class="form-control" value="{{ $partner->name }}" required>
        </div>
        <div class="form-group">
            <label for="image">Ảnh:</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}" width="100">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control" required>
                <option value="1" {{ $partner->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$partner->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection
