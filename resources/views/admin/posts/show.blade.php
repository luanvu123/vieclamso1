@extends('layouts.app')

@section('title', 'Chi tiết Bài viết')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Chi tiết Bài viết</h3>
                        <div>
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Quay lại
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Tiêu đề -->
                                <div class="mb-4">
                                    <h1 class="display-6">{{ $post->title }}</h1>
                                    <div class="text-muted">
                                        <small>
                                            <i class="fas fa-user"></i> {{ $post->user->name }} |
                                            <i class="fas fa-calendar"></i> {{ $post->created_at->format('d/m/Y H:i') }}
                                            @if($post->updated_at != $post->created_at)
                                                | <i class="fas fa-edit"></i> Cập nhật: {{ $post->updated_at->format('d/m/Y H:i') }}
                                            @endif
                                        </small>
                                    </div>
                                </div>

                                <!-- Hình ảnh -->
                                @if($post->image)
                                    <div class="mb-4 text-center">
                                        <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
                                             class="img-fluid rounded shadow" style="max-height: 400px;">
                                    </div>
                                @endif

                                <!-- Mô tả ngắn -->
                                @if($post->detail)
                                    <div class="mb-4">
                                        <h5>Mô tả ngắn:</h5>
                                        <div class="p-3 bg-light rounded">
                                            <p class="mb-0 fst-italic">{{ $post->detail }}</p>
                                        </div>
                                    </div>
                                @endif

                                <!-- Nội dung -->
                                @if($post->content)
                                    <div class="mb-4">
                                        <h5>Nội dung:</h5>
                                        <div class="content-display">
                                            {!! $post->content !!}
                                        </div>
                                    </div>
                                @endif

                                <!-- Website -->
                                @if($post->website)
                                    <div class="mb-4">
                                        <h5>Website liên quan:</h5>
                                        <a href="{{ $post->website }}" target="_blank" rel="noopener" class="btn btn-outline-primary">
                                            <i class="fas fa-external-link-alt"></i> {{ $post->website }}
                                        </a>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <!-- Thông tin chi tiết -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Thông tin chi tiết</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-sm">
                                            <tr>
                                                <td><strong>ID:</strong></td>
                                                <td>{{ $post->id }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Thể loại:</strong></td>
                                                <td>
                                                    <span class="badge bg-info">{{ $post->genrePost->title }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tác giả:</strong></td>
                                                <td>{{ $post->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Trạng thái:</strong></td>
                                                <td>
                                                    @if($post->status)
                                                        <span class="badge bg-success">Đã xuất bản</span>
                                                    @else
                                                        <span class="badge bg-secondary">Nháp</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nổi bật:</strong></td>
                                                <td>
                                                    @if($post->featured)
                                                        <span class="badge bg-warning">Nổi bật</span>
                                                    @else
                                                        <span class="text-muted">Thường</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Ngày tạo:</strong></td>
                                                <td>{{ $post->created_at->format('d/m/Y H:i:s') }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Cập nhật:</strong></td>
                                                <td>{{ $post->updated_at->format('d/m/Y H:i:s') }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <!-- Hành động -->
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Hành động</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-grid gap-2">
                                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">
                                                <i class="fas fa-edit"></i> Sửa bài viết
                                            </a>

                                            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                                  onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger w-100">
                                                    <i class="fas fa-trash"></i> Xóa bài viết
                                                </button>
                                            </form>

                                            @if($post->website)
                                                <a href="{{ $post->website }}" target="_blank" rel="noopener" class="btn btn-outline-info">
                                                    <i class="fas fa-external-link-alt"></i> Xem website
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Thống kê nhanh (có thể mở rộng sau) -->
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Thống kê</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row text-center">
                                            <div class="col-6">
                                                <div class="h4 text-primary mb-0">{{ strlen(strip_tags($post->content ?? '')) }}</div>
                                                <small class="text-muted">Ký tự</small>
                                            </div>
                                            <div class="col-6">
                                                <div class="h4 text-success mb-0">{{ str_word_count(strip_tags($post->content ?? '')) }}</div>
                                                <small class="text-muted">Từ</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .content-display {
            line-height: 1.8;
            font-size: 1.1em;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #007bff;
        }
        .content-display p {
            margin-bottom: 15px;
        }
        .content-display:empty::before {
            content: "Không có nội dung";
            color: #6c757d;
            font-style: italic;
        }
    </style>
@endsection
