@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
               <div class="table-responsive">
    <h2>Danh sách tin tuyển dụng</h2>

    <!-- Bộ lọc ngày và trạng thái -->
    <div class="filter-controls mb-3">
        <label for="dateFilter">Lọc theo ngày:</label>
        <select id="dateFilter" class="form-select" style="width: auto; display: inline-block;">
            <option value="">Tất cả</option>
            <option value="today">Hôm nay</option>
            <option value="yesterday">Hôm qua</option>
            <option value="this_week">Tuần này</option>
        </select>

        <label for="statusFilter" class="ml-3">Lọc theo trạng thái:</label>
        <select id="statusFilter" class="form-select" style="width: auto; display: inline-block;">
            <option value="">Tất cả</option>
            <option value="active">Đã duyệt</option>
            <option value="no_active">Chưa duyệt</option>
        </select>
    </div>
</div>


                    <table class="table table-bordered" id="user-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tiêu đề</th>
                                <th>Nhà tuyẻn dụng</th>
                                <th>SDT</th>
                                <th>Địa điểm</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobPostings as $key => $jobPosting)
                                @php
                                    // Check if created_at is within the last 2 hours
                                    $isNew = $jobPosting->created_at->diffInHours(now()) < 2;
                                @endphp
                                <tr data-created="{{ $jobPosting->created_at->format('Y-m-d') }}"
                                    data-status="{{ $jobPosting->status == 0 ? 'active' : 'no_active' }}">
                                    <td @if ($isNew) style="font-weight: bold;" @endif>
                                        {{ $key }}</td>
                                    <td @if ($isNew) style="font-weight: bold;" @endif>
                                        {{ $jobPosting->title }}</td>
                                    <td @if ($isNew) style="font-weight: bold;" @endif>
                                        {{ $jobPosting->employer->email }}</td>
                                    <td @if ($isNew) style="font-weight: bold;" @endif>
                                        {{ $jobPosting->employer->phone }}</td>
                                    <td @if ($isNew) style="font-weight: bold;" @endif>
                                        {{ $jobPosting->location }}</td>
                                  <td @if ($isNew) style="font-weight: bold;" @endif>
    {{ $jobPosting->created_at->format('d/m/Y') }}
</td>
<td>
    {{ $jobPosting->updated_at->format('d/m/Y') }}
</td>

                                    <td>
                                        <select id="{{ $jobPosting->id }}" class="jobPosting_choose">
                                            @if ($jobPosting->status == 0)
                                                <option value="1">Chưa duyệt</option>
                                                <option selected value="0">Đã duyệt</option>
                                            @else
                                                <option selected value="1">Chưa duyệt</option>
                                                <option value="0">Đã duyệt</option>
                                            @endif
                                        </select>
                                    </td>


                                  <td>
    <!-- Xem chi tiết -->
    <a href="{{ route('job-postings-manage.show', $jobPosting->id) }}" class="btn btn-sm btn-primary" title="Xem chi tiết">
        <i class="fa fa-eye"></i>
    </a>

    <!-- Chỉnh sửa -->
    <a href="{{ route('job-postings-manage.edit', $jobPosting->id) }}" class="btn btn-sm btn-warning" title="Chỉnh sửa">
        <i class="fa fa-edit"></i>
    </a>

    <!-- Làm mới tin (cập nhật updated_at) -->
    <form action="{{ route('job-postings-manage.refresh', $jobPosting->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('PATCH')
        <button class="btn btn-sm btn-info" title="Làm mới tin">
            <i class="fa fa-sync-alt"></i>
        </button>
    </form>

    <!-- Xoá -->
    <form action="{{ route('job-postings-manage.destroy', $jobPosting->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xoá?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger" title="Xoá">
            <i class="fa fa-trash"></i>
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


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateFilter = document.getElementById('dateFilter');
            const statusFilter = document.getElementById('statusFilter');
            const rows = document.querySelectorAll('#user-table tbody tr');

            function filterTable() {
                const dateValue = dateFilter.value;
                const statusValue = statusFilter.value;
                const today = new Date().toISOString().slice(0, 10);
                const yesterday = new Date(Date.now() - 86400000).toISOString().slice(0, 10);

                rows.forEach(row => {
                    const rowDate = row.getAttribute('data-created');
                    const rowStatus = row.getAttribute('data-status');

                    let dateMatch = false;
                    if (!dateValue ||
                        (dateValue === 'today' && rowDate === today) ||
                        (dateValue === 'yesterday' && rowDate === yesterday) ||
                        (dateValue === 'this_week' && new Date(rowDate) >= new Date(new Date().setDate(
                            new Date().getDate() - new Date().getDay())))) {
                        dateMatch = true;
                    }

                    const statusMatch = !statusValue || rowStatus === statusValue;

                    row.style.display = dateMatch && statusMatch ? '' : 'none';
                });
            }

            dateFilter.addEventListener('change', filterTable);
            statusFilter.addEventListener('change', filterTable);
        });
    </script>
@endsection
