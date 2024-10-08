@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <h1>Email đã gửi</h1>
                    <table class="table table-striped" id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Người nhận</th>
                                <th>SDT</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Tập tin đính kèm</th>
                                <th>Ngày gửi</th>
                                <th>Người phản hồi</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $email)
                                <tr>
                                    <td>{{ $email->id }}</td>
                                    <td>{{ $email->to }}</td>
                                    <td>{{ $email->candidate->phone_number_candidate }}</td>
                                    <td>{{ $email->subject }}</td>
                                    <td>{{ $email->message }}</td>
                                    <td>
                                        @if ($email->attachment)
                                            <a href="{{ asset('storage/' . $email->attachment) }}" target="_blank">Tải về</a>
                                        @else
                                            Không có
                                        @endif
                                    </td>
                                    <td>{{ $email->created_at }}</td>
                                    <td><span class="badge badge-warning">{{ $email->user->name }}</span></td>
                                    <td>
                                        <form action="{{ route('candidate.destroySentEmail', $email->id) }}" method="POST"
                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa email này?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
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
