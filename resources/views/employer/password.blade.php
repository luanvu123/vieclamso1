@extends('dashboard-employer')

@section('content')
    <style>
        #dashboard .row {
            margin-bottom: 14px;
        }
    </style>

    <div data-v-2c0c78b8="" class="breadcrumb-box">
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
    <div data-v-2c0c78b8="" class="container-fluid page-content">
        <div data-v-2c0c78b8="" class="d-flex shadow-sm">
            <div data-v-2c0c78b8="">
                <div data-v-2015c63f="" data-v-2c0c78b8="" class="list-group rounded"><a data-v-2015c63f=""
                        href="{{route('employer.change-password')}}" aria-current="page"
                        class="list-group-item list-group-item-action border-0 nuxt-link-exact-active nuxt-link-active active"><i
                            data-v-2015c63f="" class="fa mr-2 fa-lock"></i> Đổi mật khẩu </a><a data-v-2015c63f=""
                        href="{{route('employer.profile')}}"
                        class="list-group-item list-group-item-action border-0 nuxt-link-active"><i data-v-2015c63f=""
                            class="fa mr-2 fa-user"></i> Thông tin cá nhân </a><a data-v-2015c63f=""
                        href="{{route('employer.gpkd')}}" class="list-group-item list-group-item-action border-0"><i
                            data-v-2015c63f="" class="fa mr-2 fa-file"></i> Giấy đăng ký doanh nghiệp </a><a
                        data-v-2015c63f="" href="{{route('companies.index')}}"
                        class="list-group-item list-group-item-action border-0"><i data-v-2015c63f=""
                            class="fa mr-2 fa-building"></i> Thông tin công ty </a></div>
            </div>
            <div data-v-2c0c78b8="" class="bg-white w-100 rounded">
                <form method="POST" action="{{ route('employer.change-password.post') }}">
                    @csrf
                    <div data-v-2c0c78b8="">
                        <div data-v-2c0c78b8="" class="card-header bg-white font-weight-bold border-0">
                            Thay đổi mật khẩu
                        </div>
                        <div data-v-2c0c78b8="" class="card-body setting-form"><!---->
                            <div data-v-2c0c78b8="" class="form-group row"><label data-v-2c0c78b8=""
                                    class="col-sm-3 col-form-label">Mật khẩu hiện tại</label>
                                <div data-v-2c0c78b8="" class="col-sm-9">
                                    <div data-v-0ec03045="" data-v-2c0c78b8="" class="">
                                        <div data-v-0ec03045="" class="input-container ml-auto position-relative">
                                            <input data-v-0ec03045="" name="current_password" required autocomplete="true"
                                                placeholder="Nhập mật khẩu mới" type="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-v-2c0c78b8="" class="form-group row"><label data-v-2c0c78b8=""
                                    class="col-sm-3 col-form-label">Mật khẩu mới</label>
                                <div data-v-2c0c78b8="" class="col-sm-9">
                                    <div data-v-0ec03045="" data-v-2c0c78b8="" class="">
                                        <div data-v-0ec03045="" class="input-container ml-auto position-relative">
                                            <input data-v-0ec03045="" id="mWXPhQfGQP" autocomplete="true"
                                                placeholder="Nhập mật khẩu mới" type="password" class="form-control"
                                                name="new_password" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-v-2c0c78b8="" class="form-group row"><label data-v-2c0c78b8=""
                                    class="col-sm-3 col-form-label">Nhập lại mật khẩu</label>
                                <div data-v-2c0c78b8="" class="col-sm-9">
                                    <div data-v-0ec03045="" data-v-2c0c78b8="" class="">
                                        <div data-v-0ec03045="" class="input-container ml-auto position-relative">
                                            <input data-v-0ec03045="" id="XFCCeXjeeo" autocomplete="true"
                                                placeholder="Nhập lại mật khẩu mới" type="password" class="form-control"
                                                name="new_password_confirmation" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div data-v-2c0c78b8="" class="form-group row mb-0">
                                <div data-v-2c0c78b8="" class="col-sm-9 offset-sm-3"><!----> <a data-v-2c0c78b8=""
                                        href="{{ route('job-postings.dashboard') }}"
                                        class="btn min-width btn btn-secondary mr-2 btn-lg">
                                        Hủy
                                    </a> <button data-v-2c0c78b8="" type="submit"
                                        class="btn min-width btn btn-primary btn-lg">
                                        Cập nhật


                                    </button></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
