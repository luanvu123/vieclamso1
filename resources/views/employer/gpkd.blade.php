@extends('dashboard-employer')

@section('content')
    <style>

    </style>
    <div data-v-6b4def55="" class="breadcrumb-box">
        <h6 class="breadcrumb-title d-flex">
            <div><span>Cài đặt tài khoản</span> </div>
        </h6>
    </div>
    <div data-v-6b4def55="" class="container-fluid page-content">
        <div data-v-6b4def55="" class="d-flex shadow-sm">
            <div data-v-6b4def55="">
                <div data-v-2015c63f="" data-v-6b4def55="" class="list-group rounded"><a data-v-2015c63f=""
                        href="{{route('employer.change-password')}}"
                        class="list-group-item list-group-item-action border-0"><i data-v-2015c63f=""
                            class="fa mr-2 fa-lock"></i> Đổi mật khẩu </a><a data-v-2015c63f="" href="{{route('employer.profile')}}"
                        class="list-group-item list-group-item-action border-0 nuxt-link-active"><i data-v-2015c63f=""
                            class="fa mr-2 fa-user"></i> Thông tin cá nhân </a><a data-v-2015c63f=""
                        href="{{route('employer.gpkd')}}" aria-current="page"
                        class="list-group-item list-group-item-action border-0 nuxt-link-exact-active nuxt-link-active active"><i
                            data-v-2015c63f="" class="fa mr-2 fa-file"></i> Giấy đăng ký doanh nghiệp </a><a
                        data-v-2015c63f="" href="{{route('companies.index')}}"
                        class="list-group-item list-group-item-action border-0"><i data-v-2015c63f=""
                            class="fa mr-2 fa-building"></i> Thông tin công ty </a></div>
            </div>
            <div data-v-6b4def55="" class="bg-white w-100 rounded">
                <form action="{{ route('employer.updateCertificate') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="business_license">Giấy phép kinh doanh</label>
                        <input type="file" name="business_license" id="business_license" class="form-control"
                            accept=".jpg,.jpeg,.png,.pdf">
                        @if ($employer->business_license)
                            @if (Str::endsWith($employer->business_license, ['.jpg', '.jpeg', '.png']))
                                <img src="{{ asset('storage/' . $employer->business_license) }}" alt="Giấy phép kinh doanh"
                                    class="img-fluid mt-2"style="width: 500px;">
                            @elseif (Str::endsWith($employer->business_license, '.pdf'))
                                <a href="{{ asset('storage/' . $employer->business_license) }}" target="_blank"
                                    class="btn btn-secondary mt-2">Xem PDF</a>
                            @endif
                        @endif
                        @error('business_license')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="commission">Giấy ủy quyền</label>
                        <input type="file" name="commission" id="commission" class="form-control"
                            accept=".jpg,.jpeg,.png,.pdf">
                        @if ($employer->commission)
                            @if (Str::endsWith($employer->commission, ['.jpg', '.jpeg', '.png']))
                                <img src="{{ asset('storage/' . $employer->commission) }}" alt="Giấy ủy quyền"
                                    class="img-fluid mt-2"style="width: 500px;">
                            @elseif (Str::endsWith($employer->commission, '.pdf'))
                                <a href="{{ asset('storage/' . $employer->commission) }}" target="_blank"
                                    class="btn btn-secondary mt-2">Xem PDF</a>
                            @endif
                        @endif
                        @error('commission')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="identification_card">Mặt trước CMND/CCCD</label>
                        <input type="file" name="identification_card" id="identification_card" class="form-control"
                            accept=".jpg,.jpeg,.png,.pdf">
                        @if ($employer->identification_card)
                            @if (Str::endsWith($employer->identification_card, ['.jpg', '.jpeg', '.png']))
                                <img src="{{ asset('storage/' . $employer->identification_card) }}"
                                    alt="Mặt trước CMND/CCCD" class="img-fluid mt-2"style="width: 300px;">
                            @elseif (Str::endsWith($employer->identification_card, '.pdf'))
                                <a href="{{ asset('storage/' . $employer->identification_card) }}" target="_blank"
                                    class="btn btn-secondary mt-2">Xem PDF</a>
                            @endif
                        @endif
                        @error('identification_card')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="identification_card_behind">Mặt sau CMND/CCCD</label>
                        <input type="file" name="identification_card_behind" id="identification_card_behind"
                            class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                        @if ($employer->identification_card_behind)
                            @if (Str::endsWith($employer->identification_card_behind, ['.jpg', '.jpeg', '.png']))
                                <img src="{{ asset('storage/' . $employer->identification_card_behind) }}"
                                    alt="Mặt sau CMND/CCCD" class="img-fluid mt-2" style="width: 300px;">
                            @elseif (Str::endsWith($employer->identification_card_behind, '.pdf'))
                                <a href="{{ asset('storage/' . $employer->identification_card_behind) }}" target="_blank"
                                    class="btn btn-secondary mt-2">Xem PDF</a>
                            @endif
                        @endif
                        @error('identification_card_behind')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>

                @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif


            </div>
        </div>
    </div>
@endsection
