
@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">

                    <h1>Đổi quà</h1>

                    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tạo quà mới</a>

                    @if ($products->count())
                        <table class="table table-bordered" id="user-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Công ty</th>
                                    <th>Thời hạn sử dụng</th>
                                    <th>Số lần sử dụng</th>
                                    <th>Top Point</th>
                                    <th>Thể loại</th>
                                    <th>Trạng thái</th>
                                    <th>Ảnh</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->company }}</td>
                                        <td>{{ $product->number_day }}</td>
                                        <td>{{ $product->usage_count }}</td>
                                        <td>{{ $product->top_point }}</td>
                                        <td>{{ ucfirst($product->type_product) }}</td>
                                        <td>{{ ucfirst($product->status) }}</td>
                                        <td>
                                            @if ($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                                    style="width: 70px;">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('products.show', $product->id) }}"><i class="fa fa-eye"></i>
                                                View</a>
                                            <a href="{{ route('products.edit', $product->id) }}"><i
                                                    class="fa fa-pencil"></i> Edit</a>
                                            {{-- <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No products available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
