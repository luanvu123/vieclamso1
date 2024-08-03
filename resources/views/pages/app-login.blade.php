 @extends('login-employer')
 @section('content')
     <div class="header">
         <h2 class="title">Nếu bạn là nhà tuyển dụng đăng nhập bên dưới</h2>
         <div class="text-muted caption">Tìm ứng viên nhanh và phù hợp với Vieclamso1</div>
     </div>
     <div class="login">
         <form method="POST" action="{{ route('employer.login.submit') }}" id="form-login">
             @csrf
             <div class="form-group mb-24">
                 <label for="email" class="mb-1">Email</label>
                 <div class="input-group">
                     <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                     </div>
                     <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email"
                         value="{{ old('email') }}">
                 </div>
             </div>
             <div class="form-group mb-20">
                 <label for="password" class="mb-1">Password</label>
                 <div class="input-group">
                     <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa-solid fa-shield-keyhole"></i></span>
                     </div>
                     <input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu"
                         aria-label="Mật khẩu">
                     <div class="input-group-prepend">
                         <button type="button" tabindex="-1" data-input-target="#password"
                             class="input-group-text toggle-password"></button>
                     </div>
                 </div>
             </div>
             <div class="form-group mb-24 wrap-forgot-password">
                 <a href="{{ route('forget.password.get') }}">Quên mật khẩu</a>
             </div>
             <div class="form-group mt-3">
                 <button class="btn btn-sign input-block-level w-100 h-40 btn-primary-hover g-recaptcha" type="submit">Đăng
                     nhập</button>
                 <p class="or text-center fz-12px">Hoặc đăng nhập bằng</p>
             </div>
             <div class="login-social-list">
                 <a href=""
                     class="btn btn-default btn-signin input-block-level h-40 btn-login-social">
                     <i class="fa-brands fa-google"></i>
                     <span class="ml-2">Google</span>
                 </a>
                 <div class="d-none" id="login-google-render"></div>
             </div>
             <div class="d-flex justify-content-center mt-3">
                 <div class="d-flex align-items-start gap-2">
                     <div class="pdt-2">
                         <input id="agreement-social-login" name="agreement-social" type="checkbox" checked>
                         <label for="agreement-social-login"></label>
                     </div>
                     <p class="mb-0">
                         <label for="agreement-social-login">
                             Bằng việc đăng nhập bằng tài khoản mạng xã hội, tôi đã đọc và đồng ý với <a target="_blank"
                                 class="text-success" href="terms-of-service.html">Điều khoản dịch vụ</a> và <a
                                 target="_blank" class="text-success" href="dieu-khoan-bao-mat.html">Chính sách bảo mật</a>
                             của TopCV
                         </label>
                     </p>
                 </div>
             </div>
         </form>

         <div class="mt-3 d-flex justify-content-around option-auth">
             <div>
                 <span>Bạn chưa có tài khoản?</span>
                 <a class="text-success" href="{{ route('employer.register') }}">
                     Đăng ký ngay
                 </a>
             </div>

         </div>
         <div class="mt-3 support text-center">
             <p class="fw-bold mb-0">
                 Bạn gặp khó khăn khi tạo tài khoản?
             </p>
             <p class="mb-0">
                 Vui lòng gọi tới số <a href="tel:(024) 6680 5588" class="hotline">(024) 6680 5588</a>
                 (giờ
                 hành chính).
             </p>
         </div>
     </div>
 @endsection
