@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Danh sách Tin Tuyển dụng Đặc biệt</h1>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($jobPostings->isEmpty())
                    <p>Hiện tại không có tin tuyển dụng đặc biệt nào.</p>
                @else
                    <table class="table table-bordered" id="user-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tiêu đề</th>
                                <th>Nhà tuyển dụng</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobPostings as $jobPosting)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $jobPosting->title }}
                                        @if ($jobPosting->created_at >= \Carbon\Carbon::now()->subHours(2))
                                            <span class="badge badge-danger">New</span>
                                        @endif
                                    </td>
                                    <td>{{ $jobPosting->employer->email }}</td>
                                    <td>{{ $jobPosting->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $jobPosting->updated_at->format('d/m/Y') }}</td>
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
                                        <!-- Edit -->
                                        <a href="{{ route('job-postings-manage.edit', $jobPosting->id) }}"
                                            class="btn btn-sm btn-warning" title="Chỉnh sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Làm mới -->
                                        <form action="{{ route('job-postings-manage.refresh', $jobPosting->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-sm btn-info" title="Làm mới tin">
                                                <i class="fas fa-sync-alt"></i>
                                            </button>
                                        </form>

                                        <!-- Xoá -->
                                        <form action="{{ route('job-postings-manage.destroy', $jobPosting->id) }}" method="POST"
                                            style="display:inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xoá?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" title="Xoá tin">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
