@extends('layout')
@section('content')
<link media="all" type="text/css" rel="stylesheet"
        href="https://vieclam.topgialai.vn/themes/jobbox/plugins/bootstrap/bootstrap.min.css">
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
                                <li><a class="btn btn-border recruitment-icon mb-20"
                                        href="{{route('cv.overview')}}">Tổng quan</a></li>
                                <li><a class="btn btn-border recruitment-icon mb-20"
                                        href="{{ route('experience.index') }}">Kinh nghiệm</a></li>
                                <li><a class="btn btn-border recruitment-icon mb-20 "
                                        href="{{ route('education.index') }}">Giáo dục</a></li>
                                <li><a class="btn btn-border recruitment-icon mb-20" href="{{ route('skills.index') }}">Kĩ
                                        năng</a></li>
                                <li><a class="btn btn-border recruitment-icon mb-20  active"
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


                                <h2>Thêm Chứng Chỉ</h2>

                                <form method="POST" action="{{ route('certificates.store') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="name">Tên chứng chỉ *</label>
                                        <input class="form-control" id="name" type="text" name="name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="issuer">Tổ chức cấp *</label>
                                        <input class="form-control" id="issuer" type="text" name="issuer" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="issue_date">Ngày cấp *</label>
                                        <input class="form-control" id="issue_date" type="date" name="issue_date"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="expiry_date">Ngày hết hạn</label>
                                        <input class="form-control" id="expiry_date" type="date" name="expiry_date">
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-primary" type="submit">Lưu</button>
                                    </div>
                                </form>
                            </div>
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


  



    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('summary1');
    </script>
@endsection
