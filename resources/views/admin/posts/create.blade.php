@extends('layouts.app')

@section('title', 'Thêm Bài viết')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Thêm Bài viết mới</h3>
                        <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                    </div>

                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Tiêu đề <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                               id="title" name="title" value="{{ old('title') }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="detail" class="form-label">Mô tả ngắn</label>
                                        <textarea class="form-control @error('detail') is-invalid @enderror"
                                                  id="detail" name="detail" rows="3">{{ old('detail') }}</textarea>
                                        @error('detail')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="content" class="form-label">Nội dung</label>
                                        <textarea class="form-control @error('content') is-invalid @enderror"
                                                  id="content" name="content" rows="10">{{ old('content') }}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="website" class="form-label">Website</label>
                                        <input type="url" class="form-control @error('website') is-invalid @enderror"
                                               id="website" name="website" value="{{ old('website') }}"
                                               placeholder="https://example.com">
                                        @error('website')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="genre_post_id" class="form-label">Thể loại <span class="text-danger">*</span></label>
                                        <select class="form-select @error('genre_post_id') is-invalid @enderror"
                                                id="genre_post_id" name="genre_post_id" required>
                                            <option value="">-- Chọn thể loại --</option>
                                            @foreach($genrePosts as $genrePost)
                                                <option value="{{ $genrePost->id }}" {{ old('genre_post_id') == $genrePost->id ? 'selected' : '' }}>
                                                    {{ $genrePost->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('genre_post_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Hình ảnh</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                               id="image" name="image" accept="image/*">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="status" name="status"
                                                   value="1" {{ old('status', 1) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status">
                                                Xuất bản
                                            </label>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="featured" name="featured"
                                                   value="1" {{ old('featured', 1) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="featured">
                                                Nổi bật
                                            </label>
                                        </div>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Lưu Bài viết
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CKEditor 5 CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize CKEditor
            ClassicEditor
                .create(document.querySelector('#content'), {
                    toolbar: [
                        'heading', '|',
                        'bold', 'italic', 'underline', '|',
                        'link', 'bulletedList', 'numberedList', '|',
                        'outdent', 'indent', '|',
                        'insertTable', 'blockQuote', '|',
                        'undo', 'redo'
                    ],
                    heading: {
                        options: [
                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                        ]
                    }
                })
                .then(editor => {
                    window.contentEditor = editor;
                    console.log('CKEditor initialized successfully');
                })
                .catch(error => {
                    console.error('Error initializing CKEditor:', error);
                });

            // Preview image before upload
            document.getElementById('image').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        let preview = document.getElementById('image-preview');
                        if (!preview) {
                            preview = document.createElement('img');
                            preview.id = 'image-preview';
                            preview.className = 'img-thumbnail mt-2';
                            preview.style.maxWidth = '200px';
                            document.getElementById('image').parentNode.appendChild(preview);
                        }
                        preview.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>

    <style>
        .ck-editor__editable {
            min-height: 300px !important;
        }
        .ck.ck-editor {
            width: 100%;
        }
        .ck-content {
            font-size: 14px;
            line-height: 1.6;
        }
    </style>
@endsection
