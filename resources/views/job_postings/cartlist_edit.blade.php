@extends('dashboard-employer')

@section('content')
    <div class="container">
        <h1>Thêm số lượng</h1>

        <form action="{{ route('cartlist.update', $cartlist->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $cartlist->quantity }}" min="1" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('cartlist.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
