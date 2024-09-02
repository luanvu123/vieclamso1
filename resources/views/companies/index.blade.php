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
                    @if ($company)
                        <!-- Listing -->
                        <a href="{{ route('companies.edit', $company->id) }}" class="listing full-time">
                            <div class="listing-logo">
                                <img src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('storage/avatar/avatar-default.jpg') }}"
                                    alt="">
                            </div>
                            <div class="listing-title">
                                <h4>{{ $company->name }} <span
                                        class="listing-type">{{ $company->status ? 'Active' : 'Inactive' }}</span>
                                </h4>
                                <ul class="listing-icons">
                                    <li><i class="ln ln-icon-Management"></i> {{ $company->website }}</li>
                                    <li><i class="ln ln-icon-Map2"></i> {{ $company->address }}</li>
                                    <li><i class="ln ln-icon-Globe"></i> {{ $company->scale }} Nhân viên</li>
                                </ul>
                            </div>
                        </a>
                    @else
                        <p>Bạn chưa tạo công ty nào.</p>
                        <a href="{{ route('companies.create') }}" class="btn btn-primary">Tạo công ty mới</a>
                        <!-- Thêm liên kết tạo công ty -->
                    @endif
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
    </div>
@endsection
