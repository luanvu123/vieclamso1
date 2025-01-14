@extends('dashboard-employer')

@section('content')
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
    <div class="container-fluid page-content">
        <div class="bg-white shadow-sm rounded">
            <div class="box-image"><img src="{{ asset('images/giai_nhat_-dem_sai_gon.jpg') }}" alt=""
                    class="img-fluid"></div>
            <h4 class="pt-3 px-4">Cập nhật và xác thực số điện thoại</h4>
            <div class="form-phone-verify px-4">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <form action="{{ route('employer.send-otp') }}" method="POST">
                                @csrf
                                <div class="mask-input w-75 float-left">
                                    <input type="text" placeholder="Enter your phone number"
                                        class="form-control padding-suffix form-control-lg hidden-spin-button"
                                        name="phone" value="{{ Auth::guard('employer')->user()->phone }}" readonly>
                                </div>
                                <button type="submit"
                                    class="btn min-width btn-lg btn-primary min-width btn-verify ml-3">Gửi mã xác
                                    thực</button>
                            </form>

                            <form action="{{ route('employer.verify-otp') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="otp">Enter OTP:</label>
                                    <input type="text" name="otp" class="form-control" placeholder="Enter the OTP"
                                        required>
                                </div>
                                <button type="submit" class="btn btn-primary">Verify OTP</button>
                            </form>


                        </div>
                    </div>
                    <div class="col-md-5"></div>
                </div> <!---->
            </div> <!---->
            <div class="box-verify-benefit pt-3 pb-4 px-4">
                <h5 class="mb-4">Lợi ích khi xác thực số điện thoại:</h5>
                <div class="row mb-4">
                    <div class="col-md-6 d-flex align-items-start">
                        <div class="mr-3"><img src="/app/_nuxt/img/icon_benefit_1.c3f867f.png" width="48px"
                                alt="" class="img-fluid"></div>
                        <div>
                            Tăng cường bảo mật tài khoản nhà tuyển dụng, chống kẻ xấu <br> giả mạo và lợi dụng tài
                            khoản.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-flex align-items-start">
                        <div class="mr-3"><img src="/app/_nuxt/img/icon_benefit_3.110c5c5.png" width="48px"
                                alt="" class="img-fluid"></div>
                        <div>
                            Nâng cao mức độ uy tín của thương hiệu tuyển dụng, <br> tăng khả năng hiển thị tin tuyển
                            dụng với ứng viên phù hợp, <br> tăng tỷ lệ hồ sơ ứng tuyển
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-start">
                        <div class="mr-3"><img src="/app/_nuxt/img/icon_benefit_1.c3f867f.png" width="48px"
                                alt="" class="img-fluid"></div>
                        <div>
                            Được đội ngũ TopCV hỗ trợ nhanh chóng qua số điện thoại đã xác thực <br> khi có vấn đề phát
                            sinh, rút ngắn tối đa thời gian xử lý thắc mắc, khiếu nại.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!----> <!----> <!---->
@endsection
