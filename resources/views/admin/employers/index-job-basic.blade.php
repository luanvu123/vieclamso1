@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Danh sách Tin Tuyển dụng Cơ bản</h1>

        @if($jobPostings->isEmpty())
            <p>Hiện tại không có tin tuyển dụng cơ bản nào.</p>
        @else
            <table class="table" id="user-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Nhà tuyển dụng</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobPostings as $jobPosting)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jobPosting->title }}
                                @if ($jobPosting->created_at >= \Carbon\Carbon::now()->subHours(2))
                                    <span class="badge badge-danger">New</span>
                                @endif
                            </td>
                            <td>{{ $jobPosting->employer->email }}</td>
                            <td>{{ $jobPosting->created_at->format('M d, Y') }}</td>
                            <td>
    @if($jobPosting->status == 0)
        <span class="badge badge-success">Đã duyệt</span>
    @elseif($jobPosting->status == 1)
        <span class="badge badge-warning">Chưa duyệt</span>
    @else
        <span class="badge badge-danger">Từ chối</span>
    @endif
</td>

                            <td>
                                <a href="{{ route('job-postings-manage.edit', $jobPosting->id) }}" class="btn btn-sm btn-warning">Edit</a>

<form action="{{ route('job-postings-manage.destroy', $jobPosting->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?')">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger">Delete</button>
</form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
