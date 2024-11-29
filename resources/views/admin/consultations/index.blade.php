@extends('layouts.app')

@section('title', 'Consultations List')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <h1>Đăng ký nhận tư vấn</h1>
                    <table class="table" id="user-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Nhu cầu tư vấn</th>
                                <th>Trạng thái</th>
                                <th>hành động</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consultations as $key => $consultation)
                                @php
                                    // Kiểm tra nếu created_at của consultation chưa tới 2 giờ kể từ hiện tại
                                    $isNew = $consultation->created_at->diffInHours(now()) < 2;
                                @endphp
                                <tr @if ($isNew) style="font-weight: bold;" @endif>
                                    <td>{{ $key }}</td>
                                    <td>{{ $consultation->fullname }}</td>
                                    <td>{{ $consultation->email }}</td>
                                    <td>{{ $consultation->phone }}</td>
                                    <td>{{ optional($consultation->city)->name ?? 'N/A' }}</td>
                                    <td>{{ optional($consultation->typeConsultation)->name ?? 'N/A' }}
                                        <a href="{{ route('type-consultations.index') }}">Edit</a>
                                    </td>
                                    <td>{{ ucfirst($consultation->status) }}</td>
                                    <td>
                                        <a href="{{ route('consultations.edit', $consultation) }}"><i
                                                class="fa fa-pencil"></i> Edit</a>
                                        {{-- <form action="{{ route('consultations.destroy', $consultation) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form> --}}
                                    </td>
                                    <td>
                                        @if ($consultation->created_at > \Carbon\Carbon::now()->subHour())
                                            <span class="label label-primary pull-right">new</span>
                                        @endif
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
