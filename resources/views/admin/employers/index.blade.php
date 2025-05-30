@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Nhà tuyển dụng</h1>
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
                        <option value="active">Hoạt đọng</option>
                        <option value="inactive">Ngưng hoạt động</option>
                    </select>

                    @if (Auth::user()->roles()->where('id', 1)->exists())
                        <!-- Bộ lọc theo tên người dùng -->
                        <label for="userFilter" class="ml-3">Lọc theo người dùng:</label>
                        <select id="userFilter" class="form-select" style="width: auto; display: inline-block;">
                            <option value="">Tất cả</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->name }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>

                <div class="table-responsive">
                    <table id="user-table" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th></th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th></th>
                                <th>Giới tính</th>
                                <th>Điểm xét hạng</th>
                                <th>SDT</th>
                                <th>Trạng thái</th>
                                <th>Nhân viên chăm sóc khách hàng</th>
                                <th>Ngày tạo</th>
                                <th>Hành động</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employers as $key=> $employer)
                                <tr data-created="{{ $employer->created_at->format('Y-m-d') }}"
                                    data-status="{{ $employer->status == 0 ? 'inactive' : 'active' }}">
                                    <td>{{ $key +1 }}</td>
                                    <td>
                                        <div class="message-avatar">
                                            <img src="{{ $employer->avatar ? asset('storage/' . $employer->avatar) : asset('storage/avatar/avatar-default.jpg') }}"
                                                alt="">
                                        </div>
                                    </td>
                                    <td>{{ $employer->name }}</td>
                                    <td>{{ $employer->email }}</td>

                                    <td>
                                        <button
                                            onclick="redirectToEmailPage('{{ $employer->id }}', '{{ $employer->email }}')"
                                            class="btn btn-primary">
                                           <i class="fa-solid fa-envelope" style="color: #ffffff;"></i>
                                        </button>
                                    </td>
                                    <td>{{ ucfirst($employer->gender) }}</td>
                                    <td><span class="point">{{ $employer->credit }}</span> </td>
                                    <td>{{ $employer->phone }}</td>
                                    <td>
                                        <select id="{{ $employer->id }}" class="employer_choose">
                                            <option value="1" {{ $employer->status == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ $employer->status == 0 ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                    </td>
                                    <td>
                                        @if (Auth::user()->roles()->where('id', 1)->exists())
                                            <select id="user_{{ $employer->id }}" class="employer_user_choose">
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ $employer->user_id == $user->id ? 'selected' : '' }}>
                                                        {{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @else
                                            <select id="user_{{ $employer->id }}" class="employer_user_choose" disabled>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ $employer->user_id == $user->id ? 'selected' : '' }}>
                                                        {{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </td>


                                    <td>{{ $employer->created_at }}</td>
                                   <td class="text-center">
    <a href="{{ route('employers.show', $employer->id) }}" class="btn btn-sm btn-info" title="Xem chi tiết">
        <i class="fa fa-eye"></i>
    </a>

    <a href="{{ route('employers.edit', $employer->id) }}" class="btn btn-sm btn-warning" title="Chỉnh sửa cấp độ">
        <i class="fa fa-pencil"></i>
    </a>

    <a href="{{ route('employers.job-postings', $employer->id) }}" class="btn btn-sm btn-primary" title="Tin tuyển dụng">
        <i class="fa fa-briefcase"></i>
    </a>

    <form action="{{ route('employers.destroy', $employer->id) }}" method="POST" class="d-inline"
        onsubmit="return confirm('Bạn có chắc chắn muốn xóa nhà tuyển dụng này?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" title="Xóa">
            <i class="fa fa-trash"></i>
        </button>
    </form>
</td>

                                    <td>
                                        @if ($employer->created_at > \Carbon\Carbon::now()->subHour())
                                            <span class="label label-primary pull-right">new</span>
                                        @endif
                                    </td>
                                    <script>
                                        function redirectToEmailPage(employerId, emailEmployer) {
                                            window.location.href = "{{ route('admin.employer.email') }}?employer_id=" + employerId + "&emailEmployer=" +
                                                emailEmployer;
                                        }
                                    </script>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateFilter = document.getElementById('dateFilter');
            const statusFilter = document.getElementById('statusFilter');
            const userFilter = document.getElementById('userFilter');
            const rows = document.querySelectorAll('#user-table tbody tr');

            function filterTable() {
                const dateValue = dateFilter.value;
                const statusValue = statusFilter.value;
                const userValue = userFilter.value.toLowerCase();
                const today = new Date().toISOString().slice(0, 10);
                const yesterday = new Date(Date.now() - 86400000).toISOString().slice(0, 10);
                const startOfWeek = new Date();
                startOfWeek.setDate(startOfWeek.getDate() - startOfWeek.getDay());

                rows.forEach(row => {
                    const rowDate = row.getAttribute('data-created');
                    const rowStatus = row.getAttribute('data-status');
                    const rowUserName = row.querySelector('.employer_user_choose option:checked')
                        .textContent.toLowerCase();

                    const dateMatch = !dateValue ||
                        (dateValue === 'today' && rowDate === today) ||
                        (dateValue === 'yesterday' && rowDate === yesterday) ||
                        (dateValue === 'this_week' && new Date(rowDate) >= startOfWeek);

                    const statusMatch = !statusValue || rowStatus === statusValue;
                    const userMatch = !userValue || rowUserName.includes(userValue);

                    row.style.display = dateMatch && statusMatch && userMatch ? '' : 'none';
                });
            }

            dateFilter.addEventListener('change', filterTable);
            statusFilter.addEventListener('change', filterTable);
            userFilter.addEventListener('change', filterTable);
        });
    </script>
    <script>
        $('.employer_user_choose').change(function() {
            var userId = $(this).val();
            var employerId = $(this).attr('id').split('_')[1]; // Extract employer ID from the ID attribute
            $.ajax({
                url: "{{ route('employer-user-choose') }}",
                method: "GET",
                data: {
                    user_id: userId,
                    employer_id: employerId
                },
                success: function(data) {
                    alert('Thay đổi người quản trị thành công!');
                }
            });
        });
    </script>
@endsection
