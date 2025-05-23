@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>Edit Information</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('admin.info.update', $info->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Các trường hiện tại -->
            <div class="form-group">
                <label for="company_name">Tên công ty</label>
                <input type="text" class="form-control" id="company_name" name="company_name"
                    value="{{ $info->company_name }}" required>
            </div>

            <div class="form-group">
                <label for="business_license_number">Giấy phép kinh doanh</label>
                <input type="text" class="form-control" id="business_license_number" name="business_license_number"
                    value="{{ $info->business_license_number }}" required>
            </div>
            <div class="form-group">
                <label for="regulation">Quy định:</label>
                <textarea name="regulation" id="regulation" rows="6"
                    class="form-control">{{ old('regulation', $info->regulation ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="service_license_number">Giấy phép hoạt động dịch vụ việc làm số</label>
                <input type="text" class="form-control" id="service_license_number" name="service_license_number"
                    value="{{ $info->service_license_number }}" required>
            </div>

            <div class="form-group">
                <label for="headquarter_address">Trụ sở</label>
                <input type="text" class="form-control" id="headquarter_address" name="headquarter_address"
                    value="{{ $info->headquarter_address }}" required>
            </div>

            <div class="form-group">
                <label for="branch_address">Chi nhánh</label>
                <input type="text" class="form-control" id="branch_address" name="branch_address"
                    value="{{ $info->branch_address }}" required>
            </div>

            <div class="form-group">
                <label for="qr_code_image">QR </label>
                @if ($info->qr_code_image)
                    <img src="{{ asset('storage/' . $info->qr_code_image) }}" alt="QR Code" style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="qr_code_image" name="qr_code_image">
            </div>

            <!-- Các trường mới -->
            <div class="form-group">
                <label for="link_website">Link Website</label>
                <input type="text" class="form-control" id="link_website" name="link_website"
                    value="{{ $info->link_website }}">
            </div>

            <div class="form-group">
                <label for="name_website">Tên Website</label>
                <input type="text" class="form-control" id="name_website" name="name_website"
                    value="{{ $info->name_website }}">
            </div>

            <div class="form-group">
                <label for="copyright">Copyright</label>
                <input type="text" class="form-control" id="copyright" name="copyright" value="{{ $info->copyright }}">
            </div>

            <div class="form-group">
                <label for="supporter">Trung tâm hỗ trợ ứng viên</label>
                @if ($info->supporter)
                    <img src="{{ asset('storage/' . $info->supporter) }}" alt="Supporter" style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="supporter" name="supporter">
            </div>


            <div class="form-group">
                <label for="name_supporter">Tên chatbox hỗ trợ ứng viên</label>
                <input type="text" class="form-control" id="name_supporter" name="name_supporter"
                    value="{{ $info->name_supporter }}">
            </div>

            <div class="form-group">
                <label for="title_supporter">Mô tả chatbox hỗ trợ ứng viên</label>
                <input type="text" class="form-control" id="title_supporter" name="title_supporter"
                    value="{{ $info->title_supporter }}">
            </div>

            <div class="form-group">
                <label for="logo">Logo</label>
                @if ($info->logo)
                    <img src="{{ asset('storage/' . $info->logo) }}" alt="Logo" style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="logo" name="logo">
            </div>
            </br>

            <div class="form-group">
                <label for="logo_google_for_startup">Logo Google for Startup</label>
                @if ($info->logo_google_for_startup)
                    <img src="{{ asset('storage/' . $info->logo_google_for_startup) }}" alt="Google Logo"
                        style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="logo_google_for_startup" name="logo_google_for_startup">
            </div>

            <div class="form-group">
                <label for="logo_dmca_com">Logo DMCA.com</label>
                @if ($info->logo_dmca_com)
                    <img src="{{ asset('storage/' . $info->logo_dmca_com) }}" alt="DMCA Logo" style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="logo_dmca_com" name="logo_dmca_com">
            </div>

            <div class="form-group">
                <label for="image_section">Image Section</label>
                @if ($info->image_section)
                    <img src="{{ asset('storage/' . $info->image_section) }}" alt="Image Section" style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="image_section" name="image_section">
            </div>

            <div class="form-group">
                <label for="title_section">Title Section</label>
                <input type="text" class="form-control" id="title_section" name="title_section"
                    value="{{ $info->title_section }}" maxlength="255">
            </div>

            <div class="form-group">
                <label for="title2_section">Title2 Section</label>
                <input type="text" class="form-control" id="title2_section" name="title2_section"
                    value="{{ $info->title2_section }}" maxlength="255">
            </div>

            <div class="form-group">
                <label for="title3_section">Title3 Section</label>
                <input type="text" class="form-control" id="title3_section" name="title3_section"
                    value="{{ $info->title3_section }}" maxlength="255">
            </div>

            <div class="form-group">
                <label for="image_qr_code_download">Image QR Code Download</label>
                @if ($info->image_qr_code_download)
                    <img src="{{ asset('storage/' . $info->image_qr_code_download) }}" alt="Image QR Code Download"
                        style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="image_qr_code_download" name="image_qr_code_download">
            </div>

            <div class="form-group">
                <label for="link_appstore">Link App Store</label>
                <input type="url" class="form-control" id="link_appstore" name="link_appstore"
                    value="{{ $info->link_appstore }}" maxlength="255">
            </div>

            <div class="form-group">
                <label for="image_appstore">Image App Store</label>
                @if ($info->image_appstore)
                    <img src="{{ asset('storage/' . $info->image_appstore) }}" alt="Image App Store" style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="image_appstore" name="image_appstore">
            </div>

            <div class="form-group">
                <label for="link_googleplay">Link Google Play</label>
                <input type="url" class="form-control" id="link_googleplay" name="link_googleplay"
                    value="{{ $info->link_googleplay }}" maxlength="255">
            </div>

            <div class="form-group">
                <label for="image_googleplay">Image Google Play</label>
                @if ($info->image_googleplay)
                    <img src="{{ asset('storage/' . $info->image_googleplay) }}" alt="Image Google Play"
                        style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="image_googleplay" name="image_googleplay">
            </div>
            <!-- New fields -->
            <div class="form-group">
                <label for="recruitment_title_1">Recruitment Title 1</label>
                <input type="text" class="form-control" id="recruitment_title_1" name="recruitment_title_1"
                    value="{{ $info->recruitment_title_1 }}">
            </div>

            <div class="form-group">
                <label for="recruitment_image_1">Recruitment Image 1</label>
                @if ($info->recruitment_image_1)
                    <img src="{{ asset('storage/' . $info->recruitment_image_1) }}" alt="Recruitment Image"
                        style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="recruitment_image_1" name="recruitment_image_1">
            </div>

            <div class="form-group">
                <label for="big_update_title">Big Update Title</label>
                <input type="text" class="form-control" id="big_update_title" name="big_update_title"
                    value="{{ $info->big_update_title }}">
            </div>

            <div class="form-group">
                <label for="big_update_title_1">Big Update Title 1</label>
                <input type="text" class="form-control" id="big_update_title_1" name="big_update_title_1"
                    value="{{ $info->big_update_title_1 }}">
            </div>

            <div class="form-group">
                <label for="big_update_description">Big Update Description</label>
                <textarea class="form-control" id="big_update_description"
                    name="big_update_description">{{ $info->big_update_description }}</textarea>
            </div>

            <div class="form-group">
                <label for="big_update_image">Big Update Image</label>
                @if ($info->big_update_image)
                    <img src="{{ asset('storage/' . $info->big_update_image) }}" alt="Big Update Image"
                        style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="big_update_image" name="big_update_image">
            </div>

            <div class="form-group">
                <label for="ai_in_recruitment">AI in Recruitment</label>
                <input type="text" class="form-control" id="ai_in_recruitment" name="ai_in_recruitment"
                    value="{{ $info->ai_in_recruitment }}">
            </div>

            <div class="form-group">
                <label for="ai_in_recruitment_h1">AI in Recruitment H1</label>
                <input type="text" class="form-control" id="ai_in_recruitment_h1" name="ai_in_recruitment_h1"
                    value="{{ $info->ai_in_recruitment_h1 }}">
            </div>

            <div class="form-group">
                <label for="ai_in_recruitment_h2">AI in Recruitment H2</label>
                <input type="text" class="form-control" id="ai_in_recruitment_h2" name="ai_in_recruitment_h2"
                    value="{{ $info->ai_in_recruitment_h2 }}">
            </div>

            <div class="form-group">
                <label for="ai_in_recruitment_image">AI in Recruitment Image</label>
                @if ($info->ai_in_recruitment_image)
                    <img src="{{ asset('storage/' . $info->ai_in_recruitment_image) }}" alt="AI in Recruitment Image"
                        style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="ai_in_recruitment_image" name="ai_in_recruitment_image">
            </div>

            <div class="form-group">
                <label for="core_functions">Core Functions</label>
                <input type="text" class="form-control" id="core_functions" name="core_functions"
                    value="{{ $info->core_functions }}">
            </div>

            <div class="form-group">
                <label for="smart_recruitment">Smart Recruitment</label>
                <input type="text" class="form-control" id="smart_recruitment" name="smart_recruitment"
                    value="{{ $info->smart_recruitment }}">
            </div>

            <div class="form-group">
                <label for="smart_recruitment_description">Smart Recruitment Description</label>
                <textarea class="form-control" id="smart_recruitment_description"
                    name="smart_recruitment_description">{{ $info->smart_recruitment_description }}</textarea>
            </div>

            <div class="form-group">
                <label for="about_us">About Us</label>
                <input type="text" class="form-control" id="about_us" name="about_us" value="{{ $info->about_us }}">
            </div>

            <div class="form-group">
                <label for="about_us_h1">About Us Description</label>
                <textarea class="form-control" id="summary1" name="about_us_h1">{{ $info->about_us_h1 }}</textarea>
            </div>

            <div class="form-group">
                <label for="about_us_image">About Us Image</label>
                @if ($info->about_us_image)
                    <img src="{{ asset('storage/' . $info->about_us_image) }}" alt="About Us Image" style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="about_us_image" name="about_us_image">
            </div>

            <div class="form-group">
                <label for="bct_url">BCT URL</label>
                <input type="text" class="form-control" id="bct_url" name="bct_url" value="{{ $info->bct_url }}">
            </div>

            <div class="form-group">
                <label for="bct_image">BCT Image</label>
                @if ($info->bct_image)
                    <img src="{{ asset('storage/' . $info->bct_image) }}" alt="BCT Image" style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="bct_image" name="bct_image">
            </div>
            <div class="form-group">
                <label for="vat">VAT</label>
                <input type="number" step="0.01" class="form-control" id="vat" name="vat" value="{{ $info->vat }}" required>
            </div>
            <div class="form-group">
                <label for="logo_recruitment">Logo Recruitment</label>
                @if ($info->logo_recruitment)
                    <img src="{{ asset('storage/' . $info->logo_recruitment) }}" alt="logo_recruitment"
                        style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="logo_recruitment" name="logo_recruitment">
            </div>
            <div class="form-group">
                <label for="company_name">Edit smart_recruitments</label>
                <a href="{{ route('smart_recruitments.index') }}">Edit smart_recruitments
                </a>
            </div>
            <div class="form-group">
                <label for="company_name">Edit recruitment_services
                </label>
                <a href="{{ route('recruitment_services.index') }}">Edit recruitment_services
                </a>
            </div>
            <div class="form-group">
                <label for="company_name">Edit figures</label>
                <a href="{{ route('figures.index') }}">Edit figures
                </a>
            </div>
            <div class="form-group">
                <label for="company_name">Edit values
                </label>
                <a href="{{ route('values.index') }}">Edit values
                </a>
            </div>
            <div class="form-group">
                <label for="company_name">Edit cities
                </label>
                <a href="{{ route('cities.index') }}">Edit cities
                </a>
            </div>
            <div class="form-group">
                <label for="company_name">Manage Ecosystems</label>
                <a href="{{ route('ecosystems.index') }}">Manage Ecosystems</a>
            </div>
            <div class="form-group">
                <label for="hotline_contact">Hotline Contact</label>
                <input type="text" class="form-control" id="hotline_contact" name="hotline_contact"
                    value="{{ $info->hotline_contact }}">
            </div>

            <div class="form-group">
                <label for="email_contact">Email Contact</label>
                <input type="email" class="form-control" id="email_contact" name="email_contact"
                    value="{{ $info->email_contact }}">
            </div>

            <div class="form-group">
                <label for="logo_home">Home Logo</label>
                @if ($info->logo_home)
                    <img src="{{ asset('storage/' . $info->logo_home) }}" alt="Home Logo" style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="logo_home" name="logo_home">
            </div>

            <div class="form-group">
                <label for="about_image_mobile">About Image (Mobile)</label>
                @if ($info->about_image_mobile)
                    <img src="{{ asset('storage/' . $info->about_image_mobile) }}" alt="About Mobile Image"
                        style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="about_image_mobile" name="about_image_mobile">
            </div>

            <div class="form-group">
                <label for="profile_banner_image">Profile Banner Image</label>
                @if ($info->profile_banner_image)
                    <img src="{{ asset('storage/' . $info->profile_banner_image) }}" alt="Profile Banner Image"
                        style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="profile_banner_image" name="profile_banner_image">
            </div>

            <div class="form-group">
                <label for="upload_cv_title">Upload CV Title</label>
                <input type="text" class="form-control" id="upload_cv_title" name="upload_cv_title"
                    value="{{ $info->upload_cv_title }}">
            </div>

            <div class="form-group">
                <label for="upload_cv_subtitle">Upload CV Subtitle</label>
                <input type="text" class="form-control" id="upload_cv_subtitle" name="upload_cv_subtitle"
                    value="{{ $info->upload_cv_subtitle }}">
            </div>

            <div class="form-group">
                <label for="upload_cv_desc">Upload CV Description</label>
                <textarea class="form-control" id="upload_cv_desc"
                    name="upload_cv_desc">{{ $info->upload_cv_desc }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
