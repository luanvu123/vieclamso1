@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Trung tâm hỗ trợ ứng viên</h1>
          <a href="{{ route('type_support.index') }}">Thêm Gói dịch vụ hỗ trợ</a>
        <table class="table mt-3" id="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th><i class="fa-duotone fa-solid fa-phone"></i> Số điện thoại</th>
                    <th><i class="fa-regular fa-envelope"></i> Email</th>
                    <th><i class="fa-solid fa-table"></i> Gói dịch vụ</th>
                    <th><i class="fa-solid fa-audio-description"> </i> Nội dung</th>
                    <th><i class="fa-solid fa-toggle-off"> </i>Status</th>
                    <th scope="col"><i class="fa-solid fa-envelope"></i> Gửi email</th>
                    <th scope="col"><i class="fa-solid fa-date"></i> Ngày tạo</th>
                    <th><i class="fa-solid fa-pen-to-square"></i>Hành động</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($supports as $support)
                    <tr>
                        <td>{{ $support->id }}</td>
                        <td>{{ $support->phone }}</td>
                        <td>{{ $support->email }}</td>
                        <td>{{ $support->typeSupport->name }}

                        </td>
                        <td>{{ $support->description }}</td>
                        <td>
                            <select id="{{ $support->id }}" class="support_choose">
                                <option value="1" {{ $support->status === 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="2" {{ $support->status === 'resolved' ? 'selected' : '' }}>Resolved
                                </option>
                                <option value="3" {{ $support->status === 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </td>
                        <td>
                            <button onclick="redirectToEmailPage('{{ $support->id }}', '{{ $support->email }}')"
                                class="btn btn-primary">
                                Gửi Email <i class="fa-solid fa-envelope" style="color: #ffffff;"></i>
                            </button>
                        </td>
                        <td>{{ $support->created_at }}</td>

                        <td>
                            <a href="{{ route('supports.show.list', $support) }}" class="btn btn-info">
                                <i class="fa fa-eye"></i> View
                            </a>
                            <a href="javascript:void(0);" class="btn btn-danger"
                                onclick="deleteSupport({{ $support->id }})">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                        <td>
                            @if ($support->created_at > \Carbon\Carbon::now()->subHour())
                                <span class="label label-primary pull-right">new</span>
                            @endif
                        </td>
                        <script>
                            function deleteSupport(supportId) {
                                if (confirm('Are you sure you want to delete this support request?')) {
                                    $.ajax({
                                        url: '/supports_list/' + supportId, // Sửa URL này cho khớp với route
                                        type: 'DELETE',
                                        data: {
                                            _token: '{{ csrf_token() }}'
                                        },
                                        success: function(response) {
                                            alert('Support request deleted successfully.');
                                            location.reload();
                                        },
                                        error: function(xhr) {
                                            alert('Failed to delete support request. Please try again.');
                                        }
                                    });
                                }
                            }
                        </script>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function redirectToEmailPage(contactId, emailContact) {
            // Chuyển hướng đến trang gửi email và truyền giá trị contact_id và emailContact trong URL
            window.location.href = "{{ route('admin.about.email') }}?contact_id=" + contactId + "&emailContact=" +
                emailContact;
        }
    </script>
@endsection
