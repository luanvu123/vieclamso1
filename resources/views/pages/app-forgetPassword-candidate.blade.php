 @extends('login-employer')
 @section('content')
<div class="header">
    <h2 class="title">Nhập email</h2>
    <div class="text-muted caption">Sau khi nhập xong kiểm tra gmail của bạn.</div>
</div>
<div class="login">
    @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <form action="{{ route('candidate.forget.password.post') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
            <div class="col-md-6">
                <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Send Password Reset Link
            </button>
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
</div>
@endsection
