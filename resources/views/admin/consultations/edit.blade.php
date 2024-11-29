

@extends('layouts.app')

@section('title', 'Edit Consultation Status')

@section('content')
<div class="container">
    <h1>Đăng ký nhận tư vấn</h1>
    <form action="{{ route('consultations.update', $consultation) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $consultation->status === 'pending' ? 'selected' : '' }}>Chưa giải quyết</option>
                <option value="approved" {{ $consultation->status === 'approved' ? 'selected' : '' }}>Đã giải quyết</option>
                <option value="rejected" {{ $consultation->status === 'rejected' ? 'selected' : '' }}>Từ chối</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Status</button>
        </div>
    </form>
</div>
@endsection

