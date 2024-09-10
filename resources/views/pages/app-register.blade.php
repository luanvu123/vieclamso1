 @extends('login-employer')
 @section('content')
     <div class="header">
         <h2 class="title">Chào mừng bạn đến với Vieclamso1</h2>
         <div class="text-muted caption">Cùng xây dựng một hồ sơ nổi bật và nhận được các cơ hội sự
             nghiệp lý tưởng</div>
     </div>
     <form method="POST" action="{{ route('employer.register.submit') }}" id="form-register">
         @csrf

         <div class="form-group mb-3">
             <label for="fullname" class="mb-8">Họ và tên</label>
             <div class="input-group">
                 <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                 </div>
                 <input type="text" name="name" class="form-control" placeholder="Nhập họ tên"
                     aria-label="Nhập họ tên" value="{{ old('fullname') }}">
             </div>
         </div>

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

         <div class="form-group mt-3">
             <div class="d-flex align-items-start gap-2">
                 <div class="pdt-2">
                     <input id="agreement" name="agreement" type="checkbox" checked>
                     <label for="agreement"></label>
                 </div>
                 <p class="agree-term mb-3">
                     <label for="agreement">
                         Tôi đã đọc và đồng ý với <a target="_blank" href="#" class="text-success">Điều
                             khoản dịch vụ</a> và <a target="_blank" href="#"
                             class="text-success">Chính sách bảo mật</a> của  Vieclamso1
                     </label>
                 </p>
             </div>
             <button type="submit" class="btn btn-sign input-block-level w-100 h-40 btn-primary-hover g-recaptcha">Đăng
                 ký</button>
             <p class="or text-center fz-12px">Hoặc đăng nhập bằng</p>
         </div>
         <div class="login-social-list">
             <a href="{{ route('candidate.login.google') }}"
                 class="btn btn-default btn-signin input-block-level h-40 btn-login-social">
                 <i class="fa-brands fa-google"></i>
                 <span class="ml-2">Google</span>
             </a>
             <div class="d-none" id="login-google-render"></div>
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
                             class="text-success" href="#">Điều khoản dịch vụ</a> và <a
                             target="_blank" class="text-success" href="#">Chính sách bảo mật</a>
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
             (giờ
             hành chính).
         </p>
     </div>
 @endsection
