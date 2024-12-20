@extends('dashboard-employer')

@section('content')
    <div data-v-34354262="" class="breadcrumb-box">
        <h6 class="breadcrumb-title d-flex">
            <div><span>Cài đặt tài khoản</span> </div>
        </h6>
    </div>
    <div data-v-34354262="" class="container-fluid page-content">
        <div data-v-34354262="" class="card shadow-none border-0">
            <div data-v-34354262="" class="d-flex shadow-sm">
                <div data-v-34354262="">
                    <div data-v-2015c63f="" data-v-34354262="" class="list-group rounded"><a data-v-2015c63f=""
                            href="{{ route('employer.change-password') }}"
                            class="list-group-item list-group-item-action border-0"><i data-v-2015c63f=""
                                class="fa mr-2 fa-lock"></i> Đổi mật khẩu </a><a data-v-2015c63f=""
                            href="{{ route('employer.profile') }}"
                            class="list-group-item list-group-item-action border-0 nuxt-link-active"><i data-v-2015c63f=""
                                class="fa mr-2 fa-user"></i> Thông tin cá nhân </a><a data-v-2015c63f=""
                            href="{{ route('employer.gpkd') }}" class="list-group-item list-group-item-action border-0"><i
                                data-v-2015c63f="" class="fa mr-2 fa-file"></i> Giấy đăng ký doanh nghiệp </a><a
                            data-v-2015c63f="" href="{{ route('companies.index') }}" aria-current="page"
                            class="list-group-item list-group-item-action border-0 nuxt-link-exact-active nuxt-link-active active"><i
                                data-v-2015c63f="" class="fa mr-2 fa-building"></i> Thông tin công ty </a></div>
                </div>
                <div data-v-34354262="" class="bg-white content rounded">
                    <form action="{{ route('companies.update', $company->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div data-v-7805af9a="">
                            <div data-v-7805af9a="" class="card-header bg-white font-weight-bold border-0">
                                Cập nhật thông tin công ty
                            </div>
                            <div data-v-7805af9a="" class="card-body pt-1">
                                <div data-v-7805af9a="" class="border p-3">
                                    <div data-v-7805af9a="" class="row" style="padding: 15px;">
                                        <div data-v-7805af9a="" class="warning-message d-flex align-items-center w-100"><i
                                                data-v-7805af9a="" class="fa-solid fa-triangle-exclamation mr-3"
                                                style="color: rgb(229, 181, 0);"></i>
                                            <div data-v-7805af9a="" class="content-text"><span data-v-7805af9a="">Vui
                                                    lòng nhập đúng <span data-v-7805af9a="" class="font-weight-600">Mã số
                                                        thuế doanh nghiệp</span> trên
                                                    <span data-v-7805af9a="" class="font-weight-600">Giấy phép đăng ký
                                                        kinh doanh.</span><br data-v-7805af9a=""><span
                                                        data-v-7805af9a="">Bạn có thể tra cứu Mã số thuế doanh nghiệp
                                                        <a data-v-7805af9a=""
                                                            href="https://tracuunnt.gdt.gov.vn/tcnnt/mstdn.jsp"
                                                            target="_blank" class="text-primary">Tại
                                                            đây</a>.</span></span></div>
                                        </div>
                                    </div>
                                    <div data-v-7805af9a="" class="row">
                                        <div data-v-7805af9a="" class="col-md-6">
                                            <div>
                                                <label for="name">Tên công ty:</label>
                                                <input type="text" id="name" name="name"
                                                    value="{{ old('name', $company->name) }}" required>
                                            </div>
                                            <div>
                                                <label for="mst">Mã số thuế:</label>
                                                <input type="text" id="mst" name="mst"
                                                    value="{{ old('mst', $company->mst) }}" required>
                                            </div>
                                            <div class="form">
                                                <div class="select">
                                                    <h5>Thể loại ngành nghề</h5>
                                                    <select name="category[]" data-placeholder="Choose Categories"
                                                        class="chosen-select" multiple>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ in_array($category->id, $selectedCategories) ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="image">Ảnh nền:</label>
                                                <input type="file" id="image" name="image">
                                                @if ($company->image)
                                                    <img src="{{ asset('storage/' . $company->image) }}"
                                                        alt="Company Image" width="100">
                                                @endif
                                                @error('image')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="logo">Logo:</label>
                                                <input type="file" id="logo" name="logo">
                                                @if ($company->logo)
                                                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo"
                                                        width="100">
                                                @endif
                                                @error('logo')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="scale">Qui mô:</label>
                                                <input type="text" id="scale" name="scale"
                                                    value="{{ old('scale', $company->scale) }}">
                                            </div>
                                            <div>
                                                <label for="address">Địa chỉ công ty:</label>
                                                <input type="text" id="address" name="address"
                                                    value="{{ old('address', $company->address) }}">
                                            </div>
                                        </div>
                                        <div data-v-7805af9a="" class="col-md-6">
                                            <div>
                                                <label for="map">Nhập api bản đồ:</label>
                                                <input type="text" id="map" name="map"
                                                    value="{{ old('map', $company->map) }}">
                                            </div>
                                            <div>
                                                <label for="detail">Mô tả công ty:</label>
                                                <textarea id="detail" name="detail">{{ old('detail', $company->detail) }}</textarea>
                                            </div>
                                            <div>
                                                <label for="url">URL:</label>
                                                <input type="text" id="url" name="url"
                                                    value="{{ old('url', $company->url) }}">
                                            </div>
                                            <div>
                                                <label for="website">Website:</label>
                                                <input type="text" id="website" name="website"
                                                    value="{{ old('website', $company->website) }}">
                                            </div>
                                            <div>
                                                <label for="facebook">Facebook:</label>
                                                <input type="text" id="facebook" name="facebook"
                                                    value="{{ old('facebook', $company->facebook) }}">
                                            </div>
                                            <div>
                                                <label for="twitter">Twitter:</label>
                                                <input type="text" id="twitter" name="twitter"
                                                    value="{{ old('twitter', $company->twitter) }}">
                                            </div>
                                            <div>
                                                <label for="linkedin">LinkedIn:</label>
                                                <input type="text" id="linkedin" name="linkedin"
                                                    value="{{ old('linkedin', $company->linkedin) }}">
                                            </div>
                                        </div>
                                        <div data-v-7805af9a="" class="col-md-12 d-flex justify-content-end"><button
                                                data-v-7805af9a="" type="button"
                                                class="btn min-width btn btn-secondary mr-2 border-0"><!---->
                                                Huỷ


                                            </button> <button data-v-7805af9a=""type="submit"
                                                class="btn min-width btn btn-primary btn-lg"><!---->
                                                Lưu


                                            </button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
