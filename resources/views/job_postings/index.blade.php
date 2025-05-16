@extends('dashboard-employer')

@section('content')
    <!-- Tiêu đề -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý chiến dịch</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Bảng điều khiển</a></li>
                        <li>Quản lý chiến dịch</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Bảng danh sách -->
        <div class="col-lg-12 col-md-12">
            <div class="notification notice">
                Các chiến dịch của bạn hiển thị trong bảng dưới đây. Các chiến dịch hết hạn sẽ tự động bị xóa sau 30 ngày.
            </div>
            <a href="{{ route('job-postings.create') }}" class="button margin-top-30">Thêm chiến dịch</a>
            <div class="dashboard-list-box margin-top-30">
                <div class="dashboard-list-box-content">
                    <!-- Bảng -->
                   <table class="manage-table responsive-table" id="user-table">
    <thead>
        <tr>
            <th>Tiêu đề</th>
            <th>Lượt xem</th>
            <th>Ngày đăng</th>
            <th>Hạn nộp</th>
            <th>Ứng tuyển</th>
            <th>Trạng thái</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jobPostings as $index => $jobPosting)
            @php
                $hasRecentApplication = $jobPosting
                    ->applications()
                    ->where('created_at', '>=', now()->subHours(5))
                    ->exists();
            @endphp

            <tr>

                <td class="title">
                    <a href="{{ route('job-postings.show', $jobPosting->id) }}">
                        {{ $jobPosting->title }}
                    </a>
                    @if ($hasRecentApplication)
                        <span class="new-badge">Mới</span>
                    @endif
                </td>
                <td class="centered">{{ $jobPosting->views }} lượt</td>
                <td>{{ $jobPosting->created_at->format('d/m/Y') }}</td>
                <td>{{ $jobPosting->closing_date ? \Carbon\Carbon::parse($jobPosting->closing_date)->format('d/m/Y') : '-' }}</td>
                <td class="centered">
                    <a href="{{ route('job-postings.show', $jobPosting->id) }}" class="button">
                        Xem ({{ $jobPosting->applications ? $jobPosting->applications->count() : 0 }})
                    </a>
                </td>
                <td>
                    @if($jobPosting->status == 0)
                        <span class="badge badge-success">Đã duyệt</span>
                    @else
                        <span class="badge badge-secondary">Chưa duyệt</span>
                    @endif
                </td>
                <td class="action">
                    <a href="{{ route('job-postings.edit', $jobPosting->id) }}">Sửa</a>
                    <form action="{{ route('job-postings.destroy', $jobPosting->id) }}" method="POST"
                        style="display:inline;"
                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa chiến dịch này không?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button"
                            style="background: none; border: none; color: red; cursor: pointer;">
                            Xóa
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
