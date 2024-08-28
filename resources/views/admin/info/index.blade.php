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
        <h2>Edit Footer Information</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <li class="{{ Route::is('public_links.index') ? 'active-submenu' : '' }}">
            <a href="{{ route('public_links.index') }}">Edit footer
            </a>
        </li>
        <li class="{{ Route::is('smart_recruitments.index') ? 'active-submenu' : '' }}">
            <a href="{{ route('smart_recruitments.index') }}">Edit smart_recruitments
            </a>
        </li>
        <li class="{{ Route::is('recruitment_services.index') ? 'active-submenu' : '' }}">
            <a href="{{ route('recruitment_services.index') }}">Edit recruitment_services
            </a>
        </li>
        <li class="{{ Route::is('figures.index') ? 'active-submenu' : '' }}">
            <a href="{{ route('figures.index') }}">Edit figures
            </a>
        </li>
        <li class="{{ Route::is('type_feedback.index') ? 'active' : '' }}">
            <a href="{{ route('type_feedback.index') }}">Manage Type feedback</a>
        </li>
        <li class="{{ Route::is('type_support.index') ? 'active' : '' }}">
            <a href="{{ route('type_support.index') }}">Manage Type Support</a>
        </li>
        <li class="{{ Route::is('values.index') ? 'active-submenu' : '' }}">
            <a href="{{ route('values.index') }}">Edit values
            </a>
        </li>
        <li class="{{ Route::is('partners.index') ? 'active-submenu' : '' }}">
            <a href="{{ route('partners.index') }}">Edit partners
            </a>
        </li>
        <li class="{{ Route::is('type-partners.index') ? 'active-submenu' : '' }}">
            <a href="{{ route('type-partners.index') }}">Edit type-partners
            </a>
        </li>
        <li class="{{ Route::is('hotlines.index') ? 'active-submenu' : '' }}">
            <a href="{{ route('hotlines.index') }}">Edit hotlines
            </a>
        </li>
          <li class="{{ Route::is('type-employer.index') ? 'active-submenu' : '' }}">
            <a href="{{ route('type-employer.index') }}">Edit type_employers
            </a>
        </li>
        <li class="{{ Route::is('type_hotlines.index') ? 'active-submenu' : '' }}">
            <a href="{{ route('type_hotlines.index') }}">Edit type_hotlines
            </a>
        </li>
        <li class="{{ Route::is('cities.index') ? 'active-submenu' : '' }}">
            <a href="{{ route('cities.index') }}">Edit cities
            </a>
        </li>
        <li class="{{ Route::is('type-consultations.index') ? 'active-submenu' : '' }}">
            <a href="{{ route('type-consultations.index') }}">Edit type-consultations
            </a>
        </li>
        <li class="{{ Route::is('awards.index') ? 'active' : '' }}">
            <a href="{{ route('awards.index') }}">Manage Awards</a>
        </li>
        <li class="{{ Route::is('ecosystems.index') ? 'active' : '' }}">
            <a href="{{ route('ecosystems.index') }}">Manage Ecosystems</a>
        </li>
        <li class="{{ Route::is('medias.index') ? 'active' : '' }}">
            <a href="{{ route('medias.index') }}">Manage Medias</a>
        </li>
         <li class="{{ Route::is('slides.index') ? 'active' : '' }}">
            <a href="{{ route('slides.index') }}">Manage Sliders</a>
        </li>
        <form action="{{ route('admin.info.update', $info->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Các trường hiện tại -->
            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name"
                    value="{{ $info->company_name }}" required>
            </div>

            <div class="form-group">
                <label for="business_license_number">Business License Number</label>
                <input type="text" class="form-control" id="business_license_number" name="business_license_number"
                    value="{{ $info->business_license_number }}" required>
            </div>

            <div class="form-group">
                <label for="service_license_number">Service License Number</label>
                <input type="text" class="form-control" id="service_license_number" name="service_license_number"
                    value="{{ $info->service_license_number }}" required>
            </div>

            <div class="form-group">
                <label for="headquarter_address">Headquarter Address</label>
                <input type="text" class="form-control" id="headquarter_address" name="headquarter_address"
                    value="{{ $info->headquarter_address }}" required>
            </div>

            <div class="form-group">
                <label for="branch_address">Branch Address</label>
                <input type="text" class="form-control" id="branch_address" name="branch_address"
                    value="{{ $info->branch_address }}" required>
            </div>

            <div class="form-group">
                <label for="qr_code_image">QR Code Image</label>
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
                <label for="name_website">Name Website</label>
                <input type="text" class="form-control" id="name_website" name="name_website"
                    value="{{ $info->name_website }}">
            </div>

            <div class="form-group">
                <label for="copyright">Copyright</label>
                <input type="text" class="form-control" id="copyright" name="copyright"
                    value="{{ $info->copyright }}">
            </div>

            <div class="form-group">
                <label for="supporter">Supporter</label>
                @if ($info->supporter)
                    <img src="{{ asset('storage/' . $info->supporter) }}" alt="Supporter" style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="supporter" name="supporter">
            </div>


            <div class="form-group">
                <label for="name_supporter">Name Supporter</label>
                <input type="text" class="form-control" id="name_supporter" name="name_supporter"
                    value="{{ $info->name_supporter }}">
            </div>

            <div class="form-group">
                <label for="title_supporter">Title Supporter</label>
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
                    <img src="{{ asset('storage/' . $info->image_section) }}" alt="Image Section"
                        style="max-width: 100px;">
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
                    <img src="{{ asset('storage/' . $info->image_appstore) }}" alt="Image App Store"
                        style="max-width: 100px;">
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
                <textarea class="form-control" id="big_update_description" name="big_update_description">{{ $info->big_update_description }}</textarea>
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
                <textarea class="form-control" id="smart_recruitment_description" name="smart_recruitment_description">{{ $info->smart_recruitment_description }}</textarea>
            </div>

            <div class="form-group">
                <label for="about_us">About Us</label>
                <input type="text" class="form-control" id="about_us" name="about_us"
                    value="{{ $info->about_us }}">
            </div>

            <div class="form-group">
                <label for="about_us_h1">About Us H1</label>
                <input type="text" class="form-control" id="about_us_h1" name="about_us_h1"
                    value="{{ $info->about_us_h1 }}">
            </div>

            <div class="form-group">
                <label for="about_us_image">About Us Image</label>
                @if ($info->about_us_image)
                    <img src="{{ asset('storage/' . $info->about_us_image) }}" alt="About Us Image"
                        style="max-width: 100px;">
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
                <input type="number" step="0.01" class="form-control" id="vat" name="vat"
                    value="{{ $info->vat }}" required>
            </div>
             <div class="form-group">
                <label for="logo_recruitment">Logo Recruitment</label>
                @if ($info->logo_recruitment)
                    <img src="{{ asset('storage/' . $info->logo_recruitment) }}" alt="logo_recruitment" style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="logo_recruitment" name="logo_recruitment">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
