@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Danh sách đã góp ý</h1>
        <a href="{{ route('type_feedback.index') }}">Thêm Chủ đề cần góp ý</a>

        <table class="table" id="user-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th><i class="fa fa-comment"></i> Chủ đề cần góp ý</th>
                    <th><i class="fa fa-align-left"></i> Nội dung</th>
                    <th><i class="fa fa-phone"></i> Số điện thoại</th>
                    <th><i class="fa fa-envelope"></i> Email</th>
                    <th><i class="fa-regular fa-face-smile"></i> Mức độ hài lòng</th>
                    <th><i class="fa fa-toggle-on"></i> Trạng thái</th>
                    <th><i class="fa fa-calendar"></i> Ngày tạo</th>
                    <th><i class="fa fa-cog"></i> Hành động</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @forelse($feedbacks as $key => $feedback)
                    <tr>
                        <td scope="row">{{ $key + 1 }}</td>
                        <td>{{ $feedback->typeFeedback->name }}</td>
                        <td>{{ $feedback->content }}</td>
                        <td>{{ $feedback->phone }}</td>
                        <td>{{ $feedback->email }}</td>
                        <td>
                            @php
                                $icons = [
                                    1 => '😠', // Rất tức giận
                                    2 => '😒', // Không hài lòng
                                    3 => '😐', // Bình thường
                                    4 => '🙂', // Hài lòng
                                    5 => '😄', // Rất hài lòng
                                ];
                            @endphp
                            {{ $icons[$feedback->satisfaction] ?? '🤔' }}
                        </td>
                        <td>
                            <select id="{{ $feedback->id }}" class="feedback_choose">
                                <option value="1" {{ $feedback->status === 'pending' ? 'selected' : '' }}>Đang chờ</option>
                                <option value="2" {{ $feedback->status === 'resolved' ? 'selected' : '' }}>Đã xử lý</option>
                                <option value="3" {{ $feedback->status === 'closed' ? 'selected' : '' }}>Đã đóng</option>
                            </select>
                        </td>
                        <td>{{ $feedback->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <a href="{{ route('feedbacks.show.list', $feedback) }}" class="btn btn-info">
                                <i class="fa fa-eye"></i> Xem
                            </a>
                            <a href="javascript:void(0);" class="btn btn-danger" onclick="deleteFeedback({{ $feedback->id }})">
                                <i class="fa fa-trash"></i> Xóa
                            </a>
                        </td>
                        <td>
                            @if ($feedback->created_at > \Carbon\Carbon::now()->subHour())
                                <span class="label label-primary pull-right">Mới</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">Không có góp ý nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        function deleteFeedback(feedbackId) {
            if (confirm('Bạn có chắc chắn muốn xóa góp ý này không?')) {
                $.ajax({
                    url: '/feedbacks/' + feedbackId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('Xóa góp ý thành công.');
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('Không thể xóa góp ý. Vui lòng thử lại.');
                    }
                });
            }
        }
    </script>
@endsection
