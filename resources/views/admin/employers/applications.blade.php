@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Danh sách ứng tuyển cho tin: {{ $jobPosting->title }}</h2>
    <table class="table table-striped" id="user-table">
        <thead>
            <tr>
                <th>ID Ứng tuyển</th>
                <th>Tên Ứng viên</th>
                <th>CV</th>
                <th>CV Ẩn thông tin</th>
                <th>Ngày nộp</th>
                <th>Chỉnh sửa CV Hidden Info</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobPosting->applications as $application)
                <tr>
                    <td>{{ $application->id }}</td>
                    <td>{{ $application->candidate->fullname_candidate }}</td>
                    <td>
                        @if($application->cv)
                            <a href="{{ asset('storage/' . $application->cv->cv_path) }}" target="_blank">Xem CV</a>
                        @else
                            Không có CV
                        @endif
                    </td>
                    <td>
                        @if($application->cv_hidden_info)
                            <a href="{{ asset('storage/' . $application->cv_hidden_info) }}" target="_blank">Xem CV ẩn</a>
                        @else
                            Không có CV ẩn
                        @endif
                    </td>
                    <td>{{ $application->created_at->format('Y-m-d') }}</td>
                    <td>
                        <!-- Nút mở modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $application->id }}">
                            Thêm cv ẩn thông tin
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="editModal{{ $application->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $application->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $application->id }}">Chỉnh sửa CV Hidden Info</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('applications.updateCvHiddenInfo', $application->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="cv_hidden_info">Chọn file PDF</label>
                                                <input type="file" class="form-control" name="cv_hidden_info" accept="application/pdf" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

