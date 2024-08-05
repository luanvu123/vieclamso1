@extends('layout')
@section('content')
   <link media="all" type="text/css" rel="stylesheet" href="{{ asset('vendor/core/plugins/language/css/language-public.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('vendor/core/plugins/cookie-consent/css/cookie-consent.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('themes/jobbox/plugins/bootstrap/bootstrap.min.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('themes/jobbox/css/style.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('vendor/core/plugins/job-board/css/avatar.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('vendor/core/core/base/libraries/tagify/tagify.css') }}">

    <style>
        .navbar-nav {
            --bs-nav-link-padding-x: 0;
            --bs-nav-link-padding-y: 0.5rem;
            --bs-nav-link-font-weight: ;
            --bs-nav-link-color: var(--bs-navbar-color);
            --bs-nav-link-hover-color: var(--bs-navbar-hover-color);
            --bs-nav-link-disabled-color: var(--bs-navbar-disabled-color);
            display: flex;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
            justify-content: center;
            align-content: flex-start;
            flex-wrap: wrap;
            flex-direction: row;
        }
    </style>

    <main class="main crop-avatar user-profile-section">
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-image-single"
                    style="background: url('{{ Auth::guard('candidate')->user()->cover_image ? asset('storage/' . Auth::guard('candidate')->user()->cover_image) : asset('storage/pages/background-cover-candidate.png') }}') center no-repeat">
                </div>
                <div class="box-company-profile">
                    <div class="image-candidate"><img
                            src="{{ asset('storage/' . Auth::guard('candidate')->user()->avatar_candidate) ?? asset('storage/avatar/avatar-default.jpg') }}"
                            alt="{{ Auth::guard('candidate')->user()->fullname_candidate }} "></div>
                    <div class="row mt-30">
                        <div class="col-lg-8 col-md-12">
                            <h5 class="f-18">{{ Auth::guard('candidate')->user()->fullname_candidate }} <span
                                    class="card-location font-regular ml-20"></span></h5>
                            <p class="mt-0 font-md color-text-paragraph-2 mb-15"></p>
                        </div>
                    </div>
                </div>
                <div class="border-bottom pt-10 pb-10"></div>
            </div>
        </section>
        <section class="section-box mt-50 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="box-nav-tabs nav-tavs-profile mb-5">
                            <ul class="nav" role="tablist">
                            <li><a class="btn btn-border aboutus-icon mb-20"
                                        href="{{ route('personal.profile.account') }}">Thông tin tài khoản</a>
                                </li>
                                <li><a class="btn btn-border recruitment-icon mb-20 active"
                                        href="{{route('cv.overview')}}">Tổng quan</a></li>
                                <li><a class="btn btn-border recruitment-icon mb-20 active"
                                        href="{{ route('experience.index') }}">Kinh nghiệm</a></li>
                                <li><a class="btn btn-border recruitment-icon mb-20"
                                        href="{{ route('education.index') }}">Giáo dục</a></li>
                                <li><a class="btn btn-border recruitment-icon mb-20" href="{{ route('skills.index') }}">Kĩ
                                        năng</a></li>
                                <li><a class="btn btn-border recruitment-icon mb-20"
                                        href="{{ route('certificates.index') }}">Chứng chỉ</a></li>
                                <li><a class="btn btn-border recruitment-icon mb-20"
                                        href="{{ route('projects.index') }}">Project</a></li>
                                <li><a class="btn btn-border recruitment-icon mb-20"
                                        href="{{ route('activities.index') }}">Hoạt động</a></li>
                                <li><a class="btn btn-border recruitment-icon mb-20" href="{{ route('hobbies.index') }}">Sở
                                        thích</a></li>
                                <li><a class="btn btn-border recruitment-icon mb-20"
                                        href="{{ route('advisers.index') }}">Người tham chiếu</a></li>
                                <li><a class="btn btn-border recruitment-icon mb-20"
                                        href="{{ route('prizes.index') }}">Giải thưởng</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                        <div class="content-single">
                            <div class="tab-content">

                                <h2>Sửa Kinh Nghiệm</h2>

                                <form method="POST" action="{{ route('experience.update', $experience->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="company" class="form-label">Công ty</label>
                                        <input type="text" id="company" name="company" class="form-control"
                                            value="{{ old('company', $experience->company) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="position" class="form-label">Vị trí</label>
                                        <input type="text" id="position" name="position" class="form-control"
                                            value="{{ old('position', $experience->position) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Mô tả</label>
                                        <textarea id="description" name="description" class="form-control">{{ old('description', $experience->description) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="start_date" class="form-label">Ngày bắt đầu</label>
                                        <input type="date" id="start_date" name="start_date" class="form-control"
                                            value="{{ old('start_date', \Carbon\Carbon::parse($experience->start_date)->format('Y-m-d')) }}"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="end_date" class="form-label">Ngày kết thúc</label>
                                        <input type="date" id="end_date" name="end_date" class="form-control"
                                            value="{{ old('end_date', \Carbon\Carbon::parse($experience->end_date) ? $experience->end_date->format('Y-m-d') : '') }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
        </section>
        <div class="modal fade" id="avatar-modal" tabindex="-1" role="dialog" aria-labelledby="avatar-modal-label"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form class="avatar-form" method="post" action="https://vieclam.topgialai.vn/account/avatar"
                        enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title" id="avatar-modal-label">
                                <strong>Hình ảnh hồ sơ cá nhân</strong>
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">

                            <div class="avatar-body">

                                <!-- Upload image and data -->
                                <div class="avatar-upload">
                                    <input class="avatar-src" name="avatar_src" type="hidden">
                                    <input class="avatar-data" name="avatar_data" type="hidden">
                                    <input type="hidden" name="_token" value="zmj7YfA06f6ilVn8S94JUpEcLWsB8aM1ub8ZEIA1"
                                        autocomplete="off"> <label for="avatarInput">Hình ảnh mới</label>
                                    <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                </div>

                                <div class="loading" tabindex="-1" role="img" aria-label="Đang tải"></div>

                                <!-- Crop and preview -->
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="avatar-wrapper"></div>
                                        <div class="error-message text-danger" style="display: none"></div>
                                    </div>
                                    <div class="col-md-3 avatar-preview-wrapper">
                                        <div class="avatar-preview preview-lg"></div>
                                        <div class="avatar-preview preview-md"></div>
                                        <div class="avatar-preview preview-sm"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-secondary" type="button"
                                data-bs-dismiss="modal">Đóng</button>
                            <button class="btn btn-outline-primary avatar-save" type="submit">Cứu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        'use strict';

        var RV_MEDIA_URL = {
            base: 'https://vieclam.topgialai.vn',
            filebrowserImageBrowseUrl: false,
            media_upload_from_editor: 'https://vieclam.topgialai.vn/ajax/accounts/upload-from-editor'
        }

        function setImageValue(file) {
            $('.mce-btn.mce-open').parent().find('.mce-textbox').val(file);
        }
    </script>
    <iframe id="form_target" name="form_target" style="display:none"></iframe>
    <form id="tinymce_form" action="https://vieclam.topgialai.vn/ajax/accounts/upload-from-editor" target="form_target"
        method="post" enctype="multipart/form-data" style="width:0; height:0; overflow:hidden; display: none;">
        <input type="hidden" name="_token" value="zmj7YfA06f6ilVn8S94JUpEcLWsB8aM1ub8ZEIA1" autocomplete="off">
        <input name="upload" id="upload_file" type="file" onchange="$('#tinymce_form').submit();this.value='';">
        <input type="hidden" value="tinymce" name="upload_type">
    </form>


    </main>


    <script src="https://vieclam.topgialai.vn/themes/jobbox/plugins/modernizr-3.6.0.min.js"></script>
    <script src="https://vieclam.topgialai.vn/themes/jobbox/plugins/jquery-migrate-3.3.0.min.js"></script>
    <script src="https://vieclam.topgialai.vn/themes/jobbox/plugins/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://vieclam.topgialai.vn/themes/jobbox/plugins//waypoints.js"></script>
    <script src="https://vieclam.topgialai.vn/themes/jobbox/plugins//magnific-popup.js"></script>
    <script src="https://vieclam.topgialai.vn/themes/jobbox/plugins/perfect-scrollbar.min.js"></script>
    <script src="https://vieclam.topgialai.vn/themes/jobbox/plugins/select2.min.js"></script>
    <script src="https://vieclam.topgialai.vn/themes/jobbox/plugins/isotope.js"></script>
    <script src="https://vieclam.topgialai.vn/themes/jobbox/plugins/scrollup.js"></script>
    <script src="https://vieclam.topgialai.vn/themes/jobbox/plugins/swiper-bundle.min.js"></script>
    <script src="https://vieclam.topgialai.vn/themes/jobbox/plugins/counterup.js"></script>
    <script src="https://vieclam.topgialai.vn/themes/jobbox/js/main.js?v=1.12.3"></script>
    <script src="https://vieclam.topgialai.vn/themes/jobbox/js/script.js?v=1.12.3"></script>
    <script src="https://vieclam.topgialai.vn/themes/jobbox/js/backend.js?v=1.12.3"></script>
    <script src="https://vieclam.topgialai.vn/vendor/core/plugins/job-board/js/avatar.js"></script>
    <script src="https://vieclam.topgialai.vn/vendor/core/core/base/libraries/ckeditor/ckeditor.js"></script>
    <script src="https://vieclam.topgialai.vn/vendor/core/core/base/js/editor.js"></script>
    <script src="https://vieclam.topgialai.vn/vendor/core/core/base/libraries/tagify/tagify.js"></script>
    <script src="https://vieclam.topgialai.vn/vendor/core/core/base/js/tags.js"></script>
    <script src="https://vieclam.topgialai.vn/vendor/core/plugins/language/js/language-public.js?v=2.2.0"></script>
    <script src="https://vieclam.topgialai.vn/vendor/core/plugins/cookie-consent/js/cookie-consent.js?v=1.0.1"></script>
    <script src="https://vieclam.topgialai.vn/vendor/core/plugins/job-board/libraries/cropper.js"></script>



    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('summary1');
    </script>
@endsection
