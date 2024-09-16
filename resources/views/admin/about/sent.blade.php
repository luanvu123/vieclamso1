@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table" id="user-table">
                        <thead>
                            <tr>  
                                <th scope="col">#</th>
                                <th scope="col">Người nhận</th>
                                <th scope="col">email</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Tệp đính kèm(nếu có)</th>
                                <th scope="col">Ngày gửi</th>
                                <th scope="col">Người phản hồi</th>
                                <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody class="order_position">
                            @foreach ($list as $key => $cate)
                                <tr id="{{ $cate->id }}">
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $cate->support->phone }}</td>
                                    <td>{{ $cate->to }}</td>
                                    <td>{{ $cate->subject }}</td>
                                    <td>{{ $cate->message }}</td>
                                    <td>
                                        <p><a href="{{ asset('storage/' . $cate->attachment) }}">{{ $cate->attachment }}</a>
                                        </p>
                                    </td>

                                    <td>{{ $cate->created_at }}</td>
                                    <td><span class="badge badge-warning">{{ $cate->user->name }}</span></td>
                                    <td>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['about.destroy_sent', $cate->id],
                                            'onsubmit' => 'return confirm("Bạn có chắc muốn xóa?")',
                                        ]) !!}
                                        {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
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
