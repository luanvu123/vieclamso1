@extends('layout')
@section('content')


    <link media="all" type="text/css" rel="stylesheet"
        href="https://vieclam.topgialai.vn/themes/jobbox/plugins/bootstrap/bootstrap.min.css">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('vendor/core/plugins/language/css/language-public.css') }}">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('vendor/core/plugins/cookie-consent/css/cookie-consent.css') }}">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('themes/jobbox/plugins/bootstrap/bootstrap.min.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('themes/jobbox/css/style.css') }}">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('vendor/core/plugins/job-board/css/avatar.css') }}">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('vendor/core/core/base/libraries/tagify/tagify.css') }}">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/css/multi-select-tag.css">
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>
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
                                <li><a class="btn btn-border aboutus-icon mb-20 active"
                                        href="{{ route('personal.profile.account') }}">Thông tin tài khoản</a>
                                </li>
                                <li><a class="btn btn-border recruitment-icon mb-20" href="{{ route('cv.overview') }}">Tổng
                                        quan</a></li>
                                <li><a class="btn btn-border recruitment-icon mb-20"
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
                        <div class="content-single ">
                            <div class="tab-content">
                                <div>
                                    <h3 class="mt-0 mb-15 color-brand-1">Tài khoản của tôi</h3>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('update.personal.profile.account') }}"
                                        accept-charset="UTF-8" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mt-35 mb-40 box-info-profile avatar-view d-inline-block">
                                            <div class="image-profile">
                                                <img src="{{ asset('storage/' . Auth::guard('candidate')->user()->avatar_candidate) ?? asset('storage/avatar/avatar-default.jpg') }}"
                                                    id="profile-img">
                                            </div>
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <label class="form-label form-label required" for="fullname">Họ tên</label>
                                            <input class="form-control @error('fullname') is-invalid @enderror"
                                                placeholder="Nhập họ tên " required="required" name="fullname"
                                                type="text"
                                                value="{{ old('fullname', Auth::guard('candidate')->user()->fullname_candidate) }}">
                                            @error('fullname')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 position-relative">
                                            <label class="form-label required" for="level">Cấp bậc hiện tại</label>
                                            <select class="form-select @error('level') is-invalid @enderror"
                                                id="level" name="level" required>
                                                <option value="">Chọn cấp bậc</option>
                                                @foreach (['Quản lý cấp cao', 'Quản lý cấp trung', 'Quản lý nhóm', 'Chuyên gia', 'Nhân viên', 'Cộng tác viên'] as $option)
                                                    <option value="{{ $option }}"
                                                        {{ old('level', Auth::guard('candidate')->user()->level) === $option ? 'selected' : '' }}>
                                                        {{ $option }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('level')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <label class="form-label required" for="desired_level">Cấp bậc mong
                                                muốn</label>
                                            <select class="form-select @error('desired_level') is-invalid @enderror"
                                                id="desired_level" name="desired_level" required>
                                                <option value="">Chọn cấp bậc mong muốn</option>
                                                @foreach (['Quản lý cấp cao', 'Quản lý cấp trung', 'Quản lý nhóm', 'Chuyên gia', 'Nhân viên', 'Cộng tác viên'] as $option)
                                                    <option value="{{ $option }}"
                                                        {{ old('desired_level', Auth::guard('candidate')->user()->desired_level) === $option ? 'selected' : '' }}>
                                                        {{ $option }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('desired_level')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="mb-3 position-relative">
                                            <label class="form-label required" for="desired_salary">Lương mong
                                                muốn</label>
                                            <input type="text"
                                                class="form-control @error('desired_salary') is-invalid @enderror"
                                                id="desired_salary" name="desired_salary"
                                                value="{{ old('desired_salary', Auth::guard('candidate')->user()->desired_salary) }}">
                                            @error('desired_salary')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <label class="form-label required" for="education_level">Trình độ học
                                                vấn</label>
                                            <select class="form-select @error('education_level') is-invalid @enderror"
                                                id="education_level" name="education_level" required>
                                                <option value="">Chọn trình độ học vấn</option>
                                                @foreach (['Trên đại học', 'Đại học', 'Cao đẳng', 'Trung cấp', 'Trung học', 'Chứng chỉ nghề'] as $option)
                                                    <option value="{{ $option }}"
                                                        {{ old('education_level', Auth::guard('candidate')->user()->education_level) === $option ? 'selected' : '' }}>
                                                        {{ $option }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('education_level')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="mb-3 position-relative">
                                            <label class="form-label required" for="years_of_experience">Số năm kinh
                                                nghiệm</label>
                                            <select class="form-select @error('years_of_experience') is-invalid @enderror"
                                                id="years_of_experience" name="years_of_experience" required>
                                                <option value="">Chọn số năm kinh nghiệm</option>
                                                @for ($i = 0; $i <= 10; $i++)
                                                    <option value="{{ $i }}"
                                                        {{ old('years_of_experience', Auth::guard('candidate')->user()->years_of_experience) == $i ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                            @error('years_of_experience')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="mb-3 position-relative">
                                            <label class="form-label required" for="working_form">Hình thức làm
                                                việc</label>
                                            <select class="form-select @error('working_form') is-invalid @enderror"
                                                id="working_form" name="working_form" required>
                                                <option value="">Chọn hình thức làm việc</option>
                                                @foreach (['Fulltime', 'Part time', 'Thực tập sinh', 'Freelance'] as $option)
                                                    <option value="{{ $option }}"
                                                        {{ old('working_form', Auth::guard('candidate')->user()->working_form) === $option ? 'selected' : '' }}>
                                                        {{ $option }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('working_form')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="cities">Địa điểm làm việc</label>
                                            <select name="cities[]" id="cities" class="form-control chosen-select"
                                                multiple>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ Auth::guard('candidate')->user()->cities &&Auth::guard('candidate')->user()->cities->contains($city->id)? 'selected': '' }}>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="categories">Ngành nghề</label>
                                            <select name="categories[]" id="categories" class="form-control" multiple>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ Auth::guard('candidate')->user()->categories &&Auth::guard('candidate')->user()->categories->contains($category->id)? 'selected': '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="phone">Điện thoại</label>
                                            <input class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Nhập số điện thoại" name="phone" type="text"
                                                value="{{ old('phone', Auth::guard('candidate')->user()->phone_number_candidate) }}">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <label for="dob" class="form-label">Ngày sinh</label>
                                            <input class="form-control @error('dob') is-invalid @enderror" name="dob"
                                                type="date" id="dob"
                                                value="{{ old('dob', Auth::guard('candidate')->user()->dob) }}">
                                            @error('dob')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="gender">Giới tính</label>
                                            <select class="form-control form-select @error('gender') is-invalid @enderror"
                                                name="gender">
                                                <option value="male"
                                                    {{ old('gender', Auth::guard('candidate')->user()->gender) == 'male' ? 'selected' : '' }}>
                                                    Male</option>
                                                <option value="female"
                                                    {{ old('gender', Auth::guard('candidate')->user()->gender) == 'female' ? 'selected' : '' }}>
                                                    Female</option>
                                                <option value="other"
                                                    {{ old('gender', Auth::guard('candidate')->user()->gender) == 'other' ? 'selected' : '' }}>
                                                    Other</option>
                                            </select>
                                            @error('gender')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="address">Địa chỉ</label>
                                            <input class="form-control @error('address') is-invalid @enderror"
                                                placeholder="Nhập địa chỉ" name="address" type="text"
                                                value="{{ old('address', Auth::guard('candidate')->user()->address) }}">
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="favorite_skills">Kỹ năng làm việc yêu
                                                thích</label>
                                            <input
                                                class="form-control tags @error('favorite_skills') is-invalid @enderror"
                                                name="favorite_skills" type="text"
                                                value="{{ old('favorite_skills', Auth::guard('candidate')->user()->skill) }}">
                                            @error('favorite_skills')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="favorite_tags">Vị trí yêu thích</label>
                                            <input class="form-control tags @error('favorite_tags') is-invalid @enderror"
                                                name="favorite_tags" type="text"
                                                value="{{ old('favorite_tags', Auth::guard('candidate')->user()->position) }}">
                                            @error('favorite_tags')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <h5 class="fs-17 fw-semibold mb-3">Hồ sơ</h5>
                                        <div class="mb-3 position-relative">
                                            <label class="form-check form-switch ">
                                                <input name="is_public_profile" type="hidden" value="0" />
                                                <input
                                                    class="form-check-input @error('is_public_profile') is-invalid @enderror"
                                                    name="is_public_profile" type="checkbox" value="1"
                                                    id="is_public_profile"
                                                    {{ old('is_public_profile', Auth::guard('candidate')->user()->is_public) ? 'checked' : '' }}>
                                                <span class="form-check-label">Công khai hồ sơ của bạn?</span>
                                                @error('is_public_profile')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </label>
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <label class="form-check form-switch ">
                                                <input name="hide_cv" type="hidden" value="0" />
                                                <input class="form-check-input @error('hide_cv') is-invalid @enderror"
                                                    name="hide_cv" type="checkbox" value="1" id="hide_cv"
                                                    {{ old('hide_cv', Auth::guard('candidate')->user()->cv_public) ? 'checked' : '' }}>
                                                <span class="form-check-label">Ẩn CV của bạn?</span>
                                                @error('hide_cv')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </label>
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="description">Mô tả</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3">{{ old('description', Auth::guard('candidate')->user()->story) }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="linkedin">LinkedIn</label>
                                            <input class="form-control @error('linkedin') is-invalid @enderror"
                                                placeholder="Nhập LinkedIn" name="linkedin" type="text"
                                                value="{{ old('linkedin', Auth::guard('candidate')->user()->linkedin) }}">
                                            @error('linkedin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="avatar">Ảnh đại diện hiện tại:</label>
                                            <div>
                                                <img src="{{ Auth::guard('candidate')->user()->avatar_candidate
                                                    ? asset('storage/' . Auth::guard('candidate')->user()->avatar_candidate)
                                                    : asset('storage/avatar/avatar-default.jpg') }}"
                                                    alt="Ảnh đại diện"
                                                    style="width: 100px; height: 100px; object-fit: cover;">
                                            </div>
                                            <label class="form-label" for="avatar">Thay đổi ảnh đại diện:</label>
                                            <input class="form-control @error('avatar') is-invalid @enderror"
                                                name="avatar" type="file" accept="image/*">
                                            @error('avatar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        @if (Auth::guard('candidate')->user()->cv_path)
                                            <div class="mb-3 position-relative">
                                                <label class="form-label" for="resume">CV hiện tại:</label>
                                                <div>
                                                    <a href="{{ asset('storage/' . Auth::guard('candidate')->user()->cv_path) }}"
                                                        target="_blank">Xem CV</a>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="resume">Tải lên CV mới:</label>
                                            <input class="form-control @error('resume') is-invalid @enderror"
                                                name="resume" type="file" accept=".pdf,.doc,.docx">
                                            @error('resume')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        @if (Auth::guard('candidate')->user()->cover_letter)
                                            <div class="mb-3 position-relative">
                                                <label class="form-label" for="cover_letter">Thư xin việc hiện
                                                    tại:</label>
                                                <div>
                                                    <a href="{{ asset('storage/' . Auth::guard('candidate')->user()->cover_letter) }}"
                                                        target="_blank">Xem Thư xin việc</a>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="cover_letter">Tải lên thư xin việc mới:</label>
                                            <input class="form-control @error('cover_letter') is-invalid @enderror"
                                                name="cover_letter" type="file" accept=".pdf,.doc,.docx">
                                            @error('cover_letter')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        @if (Auth::guard('candidate')->user()->cover_image)
                                            <div class="mb-3 position-relative">
                                                <label class="form-label" for="cover_image">Ảnh bìa hiện tại:</label>
                                                <div>
                                                    <img src="{{ asset('storage/' . Auth::guard('candidate')->user()->cover_image) }}"
                                                        alt="Ảnh bìa"
                                                        style="width: 100%; max-height: 200px; object-fit: cover;">
                                                </div>
                                            </div>
                                        @endif

                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="cover_image">Thay đổi ảnh bìa:</label>
                                            <input class="form-control @error('cover_image') is-invalid @enderror"
                                                name="cover_image" type="file" accept="image/*">
                                            @error('cover_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>



                                        <button type="submit" class="btn btn-primary">Cập nhật hồ sơ</button>
                                    </form>


                                </div>
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
                                        autocomplete="off">
                                    <label for="avatarInput">Hình ảnh mới</label>
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

    <iframe id="form_target" name="form_target" style="display:none"></iframe>
    <script>
        new MultiSelectTag('categories') // id
        new MultiSelectTag('cities')
    </script>

@endsection
