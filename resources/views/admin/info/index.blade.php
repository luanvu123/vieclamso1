@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Footer Information</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

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
                <input type="text" class="form-control" id="copyright" name="copyright" value="{{ $info->copyright }}">
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
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
