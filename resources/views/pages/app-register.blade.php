@extends('login-employer')
@section('content')
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .regulations {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            margin-top: 20px;
            background-color: #f9f9f9;
        }

        .regulations-header {
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .regulations-content {
            margin-top: 10px;
        }
    </style>


    <div class="modal" id="chooseRoleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-footer content justify-content-center text-center mx-0">
                    <div class="font-weight-bold desc">
                        Để tối ưu tốt nhất cho trải nghiệm của bạn với Vieclamso1,<br>vui lòng lựa chọn nhóm phù hợp nhất
                        với
                        bạn.
                    </div>
                    <div class="row w-100 d-flex justify-content-between">
                        <!-- Nhà tuyển dụng option -->
                        <div class="col-6 text-center grid">
                            <img src="{{ asset('vieclamso1/app/_nuxt/img/bussiness.efbec2d.png') }}"
                                class="bussiness-image">
                            <br>
                            <a id="employerButton" class="btn btn-primary btn-redirect ml-1">Tôi là nhà tuyển dụng</a>
                        </div>
                        <!-- Ứng viên tìm việc option -->
                        <div class="col-6 text-center grid mb-2">
                            <img src="{{ asset('vieclamso1/app/_nuxt/img/student.c1c39ee.png') }}" class="bussiness-image">
                            <br>
                            <a href="{{ route('candidate.register') }}" class="btn btn-primary btn-redirect ml-1">Tôi là ứng
                                viên tìm việc</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('load', function() {
            $('#chooseRoleModal').modal('show');
        });
        document.getElementById('employerButton').addEventListener('click', function(event) {
            event.preventDefault();
            $('#chooseRoleModal').modal('hide');
        });
    </script>
    <div class="header">
        <h1>
            <a href="{{ route('/') }}" class="cvo-flex cvo-items-center">
                <img src="{{ asset('storage/' . $info->logo) }}" alt="Vieclamso1 tuyen dung tai Vieclamso1"
                    title="Vieclamso1 tuyển dụng tại Vieclamso1 " class="logo" style="width: 200px;">
            </a>
        </h1>
        <h2 class="title">Đăng ký tài khoản Nhà tuyển dụng</h2>
        <div class="text-muted caption">Cùng tạo dựng lợi thế cho doanh nghiệp bằng trải nghiệm công nghệ tuyển dụng ứng
            dụng
            sâu AI & Hiring Funnel.</div>
    </div>
@if ($info->regulation)
    <div class="regulations" id="regulations">
        <div class="regulations-header" onclick="toggleRegulations()">
            <h6 class="title">Quy định</h6>
            <span id="toggle-icon">▼</span>
        </div>
        <div class="regulations-content" style="display: none;">
            {!! $info->regulation !!}
        </div>
    </div>
@endif

    <script>
function toggleRegulations() {
    const content = document.querySelector('.regulations-content');
    const icon = document.getElementById('toggle-icon');
    if (content.style.display === 'none') {
        content.style.display = 'block';
        icon.textContent = '▲';
    } else {
        content.style.display = 'none';
        icon.textContent = '▼';
    }
}
</script>





    </br>
    <h2 class="title">Tài khoản</h2>
    <form method="POST" action="{{ route('employer.register.submit') }}" id="form-register">
        @csrf
        <div class="form-group mb-3">
            <label for="email" class="mb-8">Email</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="Nhập email" aria-label="Nhập email"
                    value="{{ old('email') }}">
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="password" class="mb-8">Mật khẩu</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-shield-keyhole"></i></span>
                </div>
                <input type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu"
                    aria-label="Nhập mật khẩu">
                <div class="input-group-prepend">
                    <button type="button" tabindex="-1" data-input-target="#password"
                        class="input-group-text toggle-password"></button>
                </div>
            </div>
            <ul class="rule-password">
                <li>Mật khẩu từ 6 đến 25 ký tự</li>
                <li>Bao gồm chữ hoa, chữ thường và ký tự số</li>
            </ul>
        </div>

        <div class="form-group mb-3">
            <label for="password_confirmation" class="mb-8">Xác nhận mật khẩu</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-shield-keyhole"></i></span>
                </div>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                    placeholder="Nhập lại mật khẩu" aria-label="Nhập lại mật khẩu">
                <div class="input-group-prepend">
                    <button type="button" tabindex="-1" data-input-target="#password_confirmation"
                        class="input-group-text toggle-password"></button>
                </div>
            </div>
        </div>

        <!-- Employer Information Section -->
        <h3>Thông tin nhà tuyển dụng</h3>

        <!-- Account Information -->
        <div class="form-group mb-3">
            <label for="fullname" class="mb-8">Họ và tên *</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="Nhập họ tên"
                    aria-label="Nhập họ tên" value="{{ old('name') }}" required>
            </div>
        </div>



        <div class="form-group mb-3">
            <label for="company" class="mb-8">Công ty</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-building"></i></span>
                </div>
                <input type="text" name="company" class="form-control" placeholder="Nhập tên công ty"
                    aria-label="Nhập tên công ty" value="{{ old('company') }}" required>
            </div>
        </div>
         <div class="form-group mb-3">
            <label for="gender" class="mb-8">Giới tính: *</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-venus-mars"></i></span>
                </div>
                <select name="gender" class="form-control" required>
                    <option value="">Chọn giới tính</option>
                    <option value="male">Nam</option>
                    <option value="female">Nữ</option>
                </select>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="phone" class="mb-8">Số điện thoại cá nhân *</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                </div>
                <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại"
                    aria-label="Nhập số điện thoại" value="{{ old('phone') }}" required>
            </div>
        </div>
        <!-- Agreement and Submit -->
        <div class="form-group mt-3">
            <div class="d-flex align-items-start gap-2">
                <div class="pdt-2">
                    <input id="agreement" name="agreement" type="checkbox" checked>
                    <label for="agreement"></label>
                </div>
                <p class="agree-term mb-3">
                    <label for="agreement">
                        Tôi đã đọc và đồng ý với <a target="_blank" href="#" class="text-success">Điều
                            khoản dịch vụ</a> và <a target="_blank" href="#" class="text-success">Chính sách
                            bảo
                            mật</a> của Vieclamso1
                    </label>
                </p>
            </div>
            <button type="submit" class="btn btn-sign input-block-level w-100 h-40 btn-primary-hover g-recaptcha">Đăng
                ký</button>
            <p class="or text-center fz-12px">Hoặc đăng nhập bằng</p>
        </div>

        <div class="d-flex justify-content-center mt-3">
            <div class="d-flex align-items-start gap-2">
                <div class="pdt-2">
                    <input id="agreement-social" name="agreement-social" type="checkbox" checked>
                    <label for="agreement-social"></label>
                </div>
                <p class="mb-0">
                    <label for="agreement-social">
                        Bằng việc đăng nhập bằng tài khoản mạng xã hội, tôi đã đọc và đồng ý với <a target="_blank"
                            class="text-success" href="#">Điều khoản dịch vụ</a> và <a target="_blank"
                            class="text-success" href="#">Chính sách bảo mật</a>
                        của Vieclamso1
                    </label>
                </p>
            </div>
        </div>
    </form>

    <div class="mt-3 support text-center">
        <p class="fw-bold mb-0">
            Bạn gặp khó khăn khi tạo tài khoản?
        </p>
        <p class="mb-0">
            Vui lòng gọi tới số <a href="tel:(024) 6680 5588" class="hotline">(024) 6680 5588</a>
            (giờ hành chính).
        </p>
    </div>
    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@endsection
