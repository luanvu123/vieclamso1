@extends('dashboard-employer')

@section('content')
    <main data-v-179375b4="" class="page-container">
        <div data-v-179375b4="" class="breadcrumb-box">
            <h6 class="breadcrumb-title d-flex">
                <div><span>Cài đặt tài khoản</span> </div>
            </h6>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
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
        <div data-v-179375b4="" class="container-fluid page-content">
            <div data-v-179375b4="" class="d-flex shadow-sm">
                <div data-v-179375b4="">
                    <div data-v-2015c63f="" data-v-179375b4="" class="list-group rounded"><a data-v-2015c63f=""
                            href="{{ route('employer.change-password') }}"
                            class="list-group-item list-group-item-action border-0"><i data-v-2015c63f=""
                                class="fa mr-2 fa-lock"></i> Đổi mật khẩu </a><a data-v-2015c63f=""
                            href="{{ route('employer.profile') }}" aria-current="page"
                            class="list-group-item list-group-item-action border-0 nuxt-link-exact-active nuxt-link-active active"><i
                                data-v-2015c63f="" class="fa mr-2 fa-user"></i> Thông tin cá nhân </a><a data-v-2015c63f=""
                            href="{{ route('employer.gpkd') }}" class="list-group-item list-group-item-action border-0"><i
                                data-v-2015c63f="" class="fa mr-2 fa-file"></i> Giấy đăng ký doanh nghiệp </a><a
                            data-v-2015c63f="" href="{{ route('companies.index') }}"
                            class="list-group-item list-group-item-action border-0"><i data-v-2015c63f=""
                                class="fa mr-2 fa-building"></i> Thông tin công ty </a></div>
                </div>
                <div data-v-179375b4="" class="bg-white w-100 rounded">
                    <div data-v-179375b4="" class="card-body setting-form mt-3 radius-4">
                        <div data-v-209c16fc="" data-v-179375b4="">
                            <div data-v-209c16fc="" class="authen-level">
                                <div data-v-209c16fc="" class="title px-3 pt-3">
                                    Tài khoản xác thực: <span data-v-209c16fc="" class="text-primary">Cấp
                                        {{ $employer->level }}/3</span></div>
                                <div data-v-209c16fc="" class="p-3 border-bottom-modal">
                                    <div data-v-209c16fc="" class="d-flex mb-3 align-items-center">
                                        <div data-v-209c16fc="" class="mr-3"><img data-v-209c16fc=""
                                                src="https://tuyendung.topcv.vn/app/_nuxt/img/star.7ca212d.png"
                                                width="40"></div>
                                        <div data-v-209c16fc="" class="pl-0">
                                            @if ($employer->level == 1)
                                                <div>
                                                    Nâng cấp tài khoản lên <span class="text-primary"
                                                        style="font-weight: 600 !important;">cấp 2/3</span>
                                                    để nhận <span class="text-primary font-weight-bold"
                                                        style="font-weight: 600 !important;">
                                                        100 lượt xem CV ứng viên từ công cụ tìm kiếm CV
                                                    </span>.
                                                </div>
                                            @elseif ($employer->level == 2)
                                                <div>
                                                    Nâng cấp tài khoản lên <span class="text-primary"
                                                        style="font-weight: 600 !important;">cấp 3/3</span>
                                                    để nhận <span class="text-primary font-weight-bold"
                                                        style="font-weight: 600 !important;">
                                                        Đăng tin ứng tuyển
                                                    </span>.
                                                </div>
                                            @elseif ($employer->level == 3)
                                                <div>
                                                    Nâng cấp tài khoản <span class="text-primary"
                                                        style="font-weight: 600 !important;">thành công</span>
                                                    có thể <span class="text-primary font-weight-bold"
                                                        style="font-weight: 600 !important;">
                                                        Đăng tin ứng tuyển
                                                    </span>.
                                                </div>
                                            @else
                                                <div>
                                                    Nâng cấp tài khoản lên <span class="text-primary"
                                                        style="font-weight: 600 !important;">cấp 1/3</span>
                                                    để nhận <span class="text-primary font-weight-bold"
                                                        style="font-weight: 600 !important;">
                                                        100 lượt xem CV ứng viên từ công cụ tìm kiếm CV
                                                    </span>.
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div data-v-209c16fc="" class="verify-step-title">Vui lòng thực hiện các bước xác thực
                                        dưới đây:</div>
                                    <div data-v-9b2a1ab0="" data-v-209c16fc="" class="verify-content">
                                        <div data-v-9b2a1ab0="" class="verify-content__progress">
                                            <div data-v-9b2a1ab0="" class="d-flex justify-content-between">
                                                <span data-v-9b2a1ab0="" class="verify-content__progress__title">Xác thực
                                                    thông tin</span>
                                                <span data-v-9b2a1ab0="">
                                                    Hoàn thành
                                                    <span data-v-9b2a1ab0=""
                                                        class="text-primary verify-content__progress__percentage">
                                                        @switch($employer->level)
                                                            @case(1)
                                                                33%
                                                            @break

                                                            @case(2)
                                                                66%
                                                            @break

                                                            @case(3)
                                                                100%
                                                            @break

                                                            @default
                                                                0%
                                                        @endswitch
                                                    </span>
                                                </span>
                                            </div>

                                            <div data-v-9b2a1ab0="" class="progress">
                                                @php
                                                    // Tính toán phần trăm dựa trên giá trị của level
                                                    $progress = 0;
                                                    switch ($employer->level) {
                                                        case 1:
                                                            $progress = 33;
                                                            break;
                                                        case 2:
                                                            $progress = 66;
                                                            break;
                                                        case 3:
                                                            $progress = 100;
                                                            break;
                                                        default:
                                                            $progress = 0;
                                                            break;
                                                    }
                                                @endphp
                                                <div data-v-9b2a1ab0="" role="progressbar"
                                                    aria-valuenow="{{ $progress }}" aria-valuemin="0"
                                                    aria-valuemax="100" class="progress-bar"
                                                    style="width: {{ $progress }}%;"></div>
                                            </div>

                                        </div>
                                        <div data-v-9b2a1ab0=""
                                            class="verify-item {{ $employer->isVerify ? 'finished' : 'not-verified' }}">
                                            <a href="{{ route('employer.phone') }}" class="d-flex align-items-center">
                                                <i data-v-9b2a1ab0=""
                                                    class="text-20 step-icon {{ $employer->isVerify ? 'fa-solid fa-check-circle step-icon__finish' : 'fa-light fa-circle' }}">
                                                </i>
                                                <div data-v-9b2a1ab0="" class="ml-2 font-weight-600 verify-item-title"
                                                    style="position: relative;">
                                                    <span data-v-9b2a1ab0="">Xác thực số điện thoại</span>
                                                </div>
                                            </a>
                                            <span data-v-9b2a1ab0="" class="text-primary btn-to-verify">
                                                <i data-v-9b2a1ab0="" class="fa-regular fa-arrow-right"></i>
                                            </span>
                                        </div>

                                        <div data-v-9b2a1ab0=""
                                            class="verify-item {{ $employer->isVerifyCompany ? 'finished' : 'not-verified' }}">
                                            <a href="{{ route('companies.index') }}" class="d-flex align-items-center">
                                                <i data-v-9b2a1ab0=""
                                                    class="text-20 step-icon {{ $employer->isVerifyCompany ? 'fa-solid fa-check-circle step-icon__finish' : 'fa-light fa-circle' }}">
                                                </i>
                                                <div data-v-9b2a1ab0="" class="ml-2 font-weight-600 verify-item-title"
                                                    style="position: relative;">
                                                    <span data-v-9b2a1ab0="">Cập nhật thông tin công ty</span>
                                                </div>
                                            </a>
                                            <span data-v-9b2a1ab0="" class="text-primary btn-to-verify">
                                                <i data-v-9b2a1ab0="" class="fa-regular fa-arrow-right"></i>
                                            </span>
                                        </div>

                                        <div data-v-9b2a1ab0=""
                                            class="verify-item {{ $employer->isVerify_license ? 'finished' : 'not-verified' }}">
                                            <a href="{{ route('employer.gpkd') }}" class="d-flex align-items-center">
                                                <i data-v-9b2a1ab0=""
                                                    class="text-20 step-icon {{ $employer->isVerify_license ? 'fa-solid fa-check-circle step-icon__finish' : 'fa-light fa-circle' }}">
                                                </i>
                                                <div data-v-9b2a1ab0="" class="ml-2 font-weight-600 verify-item-title"
                                                    style="position: relative;">
                                                    <span data-v-9b2a1ab0="">Xác thực Giấy đăng ký doanh nghiệp</span>
                                                </div>
                                            </a>
                                            <span data-v-9b2a1ab0="" class="text-primary btn-to-verify">
                                                <i data-v-9b2a1ab0="" class="fa-regular fa-arrow-right"></i>
                                            </span>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!---->
                    <form action="{{ route('employer.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div data-v-179375b4="" class="card-body setting-form mt-3 radius-4">
                            <div data-v-179375b4="" class="font-weight-600 mb-3">
                                Cập nhật thông tin cá nhân
                            </div>
                            <div data-v-179375b4="" class="row">
                                <div data-v-179375b4="" class="form-group col-md-6">
                                    <div data-v-179375b4="" class="d-flex align-items-center"><label data-v-179375b4=""
                                            class="col-form-label mr-2">Avatar</label>
                                        <div data-v-2a31697a="" data-v-179375b4="" class="mr-2  avatar"
                                            style="width: 40px; height: 40px; flex: 0 0 40px; background-image: url(&quot;/app/_nuxt/img/noavatar-2.18f0212.svg&quot;);">
                                        </div>
                                        <div class="edit-profile-photo">
                                            <img src="{{ $employer->avatar ? asset('storage/' . $employer->avatar) : asset('storage/avatar/avatar-default.jpg') }}"
                                                alt="">
                                            <div class="change-photo-btn">
                                                <div class="photoUpload">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" class="upload" id="avatar" name="avatar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-v-179375b4="" class="row">
                                <div data-v-179375b4="" class="form-group col-md-6"><label data-v-179375b4="">Họ và
                                        tên</label>
                                    <div data-v-0ec03045="" data-v-179375b4="" class="">
                                        <div data-v-0ec03045="" class="input-container ml-auto position-relative">
                                            <input value="{{ $employer->name }}" type="text"id="name" name="name">
                                        </div> <!---->
                                    </div>
                                </div>
                                <div data-v-179375b4="" class="form-group col-md-6"><label data-v-179375b4="">Giới
                                        tính</label>
                                    <div data-v-06dceb24="" data-v-179375b4="">
                                        <div class="form"><select class="chosen-select-no-single" id="gender"
                                                name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="male"
                                                    {{ $employer->gender == 'male' ? 'selected' : '' }}>
                                                    Male</option>
                                                <option value="female"
                                                    {{ $employer->gender == 'female' ? 'selected' : '' }}>Female
                                                </option>
                                                <option value="other"
                                                    {{ $employer->gender == 'other' ? 'selected' : '' }}>Other
                                                </option>
                                            </select></div>
                                    </div>
                                </div>
                            </div>
                            <div data-v-179375b4="" class="row">
                                <div data-v-179375b4="" class="form-group col-md-6">
                                    <div data-v-179375b4="" class="d-flex justify-content-between"><label
                                            data-v-179375b4="">Số điện thoại</label>
                                        <div data-v-179375b4="">

                                            <a data-v-179375b4="" href="{{ route('employer.phone') }}"
                                                class="pl-2 text-primary">Xác thực </a>
                                        </div>
                                    </div>
                                    <div data-v-4c25145f="" data-v-179375b4="" class="mask-input"> <input id="phone"
                                            name="phone" value="{{ $employer->phone }}" type="text"></div>
                                </div>
                                <div data-v-179375b4="" class="form-group col-md-6"><label
                                        data-v-179375b4="">Email:</label>
                                    <div data-v-0ec03045="" data-v-179375b4="" class="">
                                        <div data-v-0ec03045="" class="input-container ml-auto position-relative">
                                            <input id="email" name="email"
                                                value="{{ $employer->email }}"type="email">
                                        </div> <!---->
                                    </div>
                                </div>
                            </div>
                            <hr data-v-179375b4="">
                            <div data-v-179375b4="" class="form-group mb-0 text-right"><a data-v-179375b4=""
                                    href="/app/dashboard" class="btn min-width btn btn-secondary mr-2 btn-lg">Hủy </a>
                                <button data-v-179375b4="" type="submit"
                                    class="btn min-width btn btn-primary btn-lg"><!---->
                                    Lưu


                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
