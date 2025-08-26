@extends('layouts.app')

@section('title', 'Quản lý Bài viết')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Danh sách Bài viết</h3>
                            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Thêm Bài viết
                            </a>
                        </div>

                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="user-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Hình ảnh</th>
                                            <th>Tiêu đề</th>
                                            <th>Thể loại</th>
                                            <th>Tác giả</th>
                                            <th>Trạng thái</th>
                                            <th>Nổi bật</th>
                                            <th>Ngày tạo</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>
                                                    @if($post->image)
                                                        <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
                                                            class="img-thumbnail"
                                                            style="width: 60px; height: 60px; object-fit: cover;">
                                                    @else
                                                        <span class="text-muted">Không có</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('posts.show', $post) }}" class="text-decoration-none">
                                                        {{ Str::limit($post->title, 50) }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info">{{ $post->genrePost->title }}</span>
                                                </td>
                                                <td>{{ $post->user->name }}</td>
                                                <td>
                                                    @if($post->status)
                                                        <span class="badge bg-success">Đã xuất bản</span>
                                                    @else
                                                        <span class="badge bg-secondary">Nháp</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($post->featured)
                                                        <span class="badge bg-warning">Nổi bật</span>
                                                    @else
                                                        <span class="text-muted">Thường</span>
                                                    @endif
                                                </td>
                                                <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-info">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('posts.edit', $post) }}"
                                                            class="btn btn-sm btn-warning">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                                            class="d-inline"
                                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center">Không có bài viết nào</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="d-flex justify-content-center">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
