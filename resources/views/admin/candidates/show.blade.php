@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chi tiết ứng viên</h1>
    <div class="card">
        <div class="card-header">
            Thông tin ứng viên
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $candidate->id }}</p>
            <p><strong>Họ tên:</strong> {{ $candidate->fullname_candidate }}</p>
            <p><strong>Email:</strong> {{ $candidate->email }}</p>
            <p><strong>Số điện thoại:</strong> {{ $candidate->phone_number_candidate }}</p>
            <p><strong>Trạng thái:</strong> {{ $candidate->status }}</p>
            <p><strong>Avatar:</strong> <img src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}" alt="Avatar" width="100"></p>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            CVs
        </div>
        <div class="card-body">
            @if($candidate->cvs->isEmpty())
                <p>Không có CV nào.</p>
            @else
                <ul>
                    @foreach($candidate->cvs as $cv)
                        <li>
                            <a href="{{ asset('storage/' . $cv->cv_path) }}" target="_blank">{{ $cv->cv_path }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
