@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cập nhật mã đơn #{{ $order->id }}</h1>

        <form action="{{ route('ordermanages.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" id="status" class="form-control">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chưa xác nhận</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                    <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Từ chối</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('ordermanages.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
