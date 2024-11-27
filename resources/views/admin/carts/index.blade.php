@extends('layouts.app')

@section('title', 'My Carts')

@section('content')
    <style>
        .button-container {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }
    </style>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <h1>Dịch vụ</h1>
                    <div class="button-container">
                        <a href="{{ route('carts.create') }}" class="button margin-top-30">Thêm dịch vụ</a>
                        <a href="{{ route('type_cart.create') }}" class="button margin-top-30">Thêm thể loại</a>
                    </div>

                    <table id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tiêu đề</th> <!-- Thêm cột Title -->
                                <th>Đơn vị</th>
                                <th>Giá tiền</th>
                                <th>Mô tả </th>
                                <th>Top Point</th>
                                <th>Loại Dịch vụ</th>
                                <th>Số ngày chạy dịch vụ</th> <!-- Thêm cột Validity -->
                                <th>Ảnh nền</th> <!-- Thêm cột Background Image -->
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                                <tr>
                                    <td>{{ $cart->id }}</td>
                                    <td>{{ $cart->title }}</td> <!-- Hiển thị Title -->
                                    <td>{{ $cart->planCurrency->currency }}</td>
                                    <td>{{ $cart->value }}</td>
                                    <td>
                                        {{ $cart->description_home }}
                                    </td>
                                    <td>
                                        @if ($cart->top_point != 0)
                                            <li>Quà tặng: {{ $cart->top_point }} Credits</li>
                                        @endif
                                    </td>
                                    <td>{{ $cart->typeCart->name ?? 'N/A' }}</td>
                                    <td>{{ $cart->validity }} ngày</td> <!-- Hiển thị Validity -->
                                    <td>
                                        @if ($cart->background_image)
                                            <img src="{{ asset('storage/' . $cart->background_image) }}"
                                                alt="Background Image" style="width: 50px; height: auto;">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $cart->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('carts.show', $cart->id) }}"><i class="fa fa-eye"></i> View</a>
                                        <a href="{{ route('carts.edit', $cart->id) }}"><i class="fa fa-pencil"></i>
                                            Edit</a>

                                        <a href="{{ route('carts.showEmployer', $cart->id) }}"
                                            class="btn btn-primary btn-sm">NTD đã mua DV</a>

                                        <form action="{{ route('carts.destroy', $cart->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
