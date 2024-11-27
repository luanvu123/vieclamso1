@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Danh sách NTD của Dịch vụ: {{ $cart->title }}</h3>

        <!-- Bảng hiển thị danh sách employers -->
        <table class="table table-bordered" id="user-table">
            <thead>
                <tr>
                    <th>Tên Employer</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->employers as $employer)
                    <tr>
                        <td>{{ $employer->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($employer->pivot->start_date)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($employer->pivot->end_date)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('employers.show', $employer->id) }}" class="btn btn-info btn-sm">Xem chi tiết</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
