@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="table-responsive">
                <h2>Job Postings</h2>

                <!-- Date and Status Filter Controls -->
                <div class="filter-controls mb-3">
                    <label for="dateFilter">Filter by Date:</label>
                    <select id="dateFilter" class="form-select" style="width: auto; display: inline-block;">
                        <option value="">All</option>
                        <option value="today">Today</option>
                        <option value="yesterday">Yesterday</option>
                        <option value="this_week">This Week</option>
                    </select>

                    <label for="statusFilter" class="ml-3">Filter by Status:</label>
                    <select id="statusFilter" class="form-select" style="width: auto; display: inline-block;">
                        <option value="">All</option>
                        <option value="active">Active</option>
                        <option value="no_active">No Active</option>
                    </select>
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
                            <th>Trạng thái</th>
                             <th>Hiển thị trang chủ</th>
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
                                <td @if ($isNew) style="font-weight: bold;" @endif>{{ $key }}</td>
                                <td @if ($isNew) style="font-weight: bold;" @endif>{{ $jobPosting->title }}</td>
                                <td @if ($isNew) style="font-weight: bold;" @endif>{{ $jobPosting->employer->name }}</td>
                                <td @if ($isNew) style="font-weight: bold;" @endif>{{ $jobPosting->employer->phone }}</td>
                                <td @if ($isNew) style="font-weight: bold;" @endif>{{ $jobPosting->location }}</td>
                                <td @if ($isNew) style="font-weight: bold;" @endif>{{ $jobPosting->created_at }}</td>
                                <td>
                                    <select id="{{ $jobPosting->id }}" class="jobPosting_choose">
                                        @if ($jobPosting->status == 0)
                                            <option value="1">No active</option>
                                            <option selected value="0">Active</option>
                                        @else
                                            <option selected value="1">No Active</option>
                                            <option value="0">Active</option>
                                        @endif
                                    </select>
                                </td>
                                <td>
    <select id="isHot_{{ $jobPosting->id }}" class="isHot_choose">
        <option value="1" {{ $jobPosting->isHot == '1' ? 'selected' : '' }}>Hot</option>
        <option value="0" {{ $jobPosting->isHot == '0' ? 'selected' : '' }}>Not Hot</option>
    </select>
</td>

                                <td>
                                    <a href="{{ route('job-postings-manage.show', $jobPosting->id) }}"><i class="fa fa-eye"></i> View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
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
                   (dateValue === 'this_week' && new Date(rowDate) >= new Date(new Date().setDate(new Date().getDate() - new Date().getDay())))) {
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

