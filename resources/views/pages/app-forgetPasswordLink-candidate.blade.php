 @extends('login-employer')
 @section('content')
     <div class="header">
         <h2 class="title">Chào mừng bạn đã quay trở lại</h2>
         <div class="text-muted caption">Cùng xây dựng một hồ sơ nổi bật và nhận được các cơ hội sự
             nghiệp lý tưởng</div>
     </div>
     <div class="login">
         <form action="{{ route('candidate.reset.password.post') }}" method="POST">
             @csrf
             <input type="hidden" name="token" value="{{ $token }}">

             <div class="form-group mb-3">
                 <label for="email" class="mb-8">Email</label>
                 <div class="input-group">
                     <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                     </div>
                     <input type="email" name="email" class="form-control" placeholder="Nhập email"
                         aria-label="Nhập email" value="{{ old('email') }}">
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

             <div class="col-md-6 offset-md-4">
                 <button type="submit" class="btn btn-primary">
                     Reset Password
                 </button>
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
