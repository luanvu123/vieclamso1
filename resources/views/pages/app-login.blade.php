<!DOCTYPE html>
<html lang="vi">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://static.topcv.vn/v4/image/favicon.ico" type="image/x-icon">
    <meta property="fb:app_id" content="1478418029113221" />
    <meta name="csrf-token" content="LicyJlAnIvZsu3qxp6mFVnQMyy0Fqy2DOXxP9U4X">
    <link rel="canonical" href="index.html" />
    <link rel="publisher" href="https://plus.google.com/u/0/+TopcvVn" />
    <title>Đăng nhập tài khoản CV Online - TopCV.vn</title>
    <meta name="description" content="Đăng nhập tài khoản cá nhân để nhận thêm nhiều hỗ trợ từ TopCV">
    <meta name="keywords" content="">
    <meta name="twitter:card" content="Đăng nhập tài khoản cá nhân để nhận thêm nhiều hỗ trợ từ TopCV">
    <meta name="twitter:site" content="TopCV">
    <meta name="twitter:title" content="Đăng nhập tài khoản CV Online">
    <meta name="twitter:description" content="Đăng nhập tài khoản cá nhân để nhận thêm nhiều hỗ trợ từ TopCV">

    <!-- FB -->
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:locale:alternate" content="en_US" />
    <meta name="og:title" content="Đăng nhập tài khoản CV Online">
    <meta name="og:description" content="Đăng nhập tài khoản cá nhân để nhận thêm nhiều hỗ trợ từ TopCV">
    <meta name="og:site_name" content="TopCV">
    <meta property="og:image" content="https://static.topcv.vn/v4/image/thumbnail/Thumb-Homepage-TopCV.vn.png?v=2.0.3">
    <!-- ta -->
    <script>
        window.header = {
            referer: 'http://www.topcv.vn/'
        }

        window.trackingSource = '';
        localStorage.setItem('ta_source', window.trackingSource);
    </script>
    <script type="text/javascript">
        let taVersion = '1.1.0';
        let doImpression = true;
        (function(w, d, v, i) {
            w['ta'] = w['ta'] || function() {
                (w['ta'].q = w['ta'].q || []).push([...arguments])
            }
            var po = d.createElement('script');
            po.type = 'text/javascript';
            po.async = true;
            po.src = '../ta.toprework.vn/dist/browser-platform/index3181.js?id=topcv_vn&amp;version=' + v + (i ?
                '&impression=true' : '');
            var s = d.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(po, s);
        })(window, document, taVersion, doImpression);
    </script>
    <!-- End ta -->
    <link rel="stylesheet" href="../static.topcv.vn/v4/css/bootstrap.min.3d63d5b22aa2a61cG.css">
    <link rel="stylesheet" href="../static.topcv.vn/v4/css/app.min.644b242d2ff872f5G.css">
    <link rel="stylesheet" href="../static.topcv.vn/v4/css/components/auth/newauth.min.a97d350af50496d0G.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-823531084"></script>
</head>

<body>
    <div id="fb-root"></div>
    <div class="wrap-auth-section">
        <div class="auth">
            <div class="auth-inner">
                <div class="auth-form">
                    <div class="header">
                        <h2 class="title">Chào mừng bạn đã quay trở lại</h2>
                        <div class="text-muted caption">Cùng xây dựng một hồ sơ nổi bật và nhận được các cơ hội sự
                            nghiệp lý tưởng</div>
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
                                <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group mb-20">
                            <label for="password" class="mb-1">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-shield-keyhole"></i></span>
                                </div>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu" aria-label="Mật khẩu">
                                <div class="input-group-prepend">
                                    <button type="button" tabindex="-1" data-input-target="#password" class="input-group-text toggle-password"></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-24 wrap-forgot-password">
                            <a href="{{route('employer.password.request')}}">Quên mật khẩu</a>
                        </div>
                        <div class="form-group mt-3">
                            <button class="btn btn-sign input-block-level w-100 h-40 btn-primary-hover g-recaptcha" type="submit">Đăng nhập</button>
                            <p class="or text-center fz-12px">Hoặc đăng nhập bằng</p>
                        </div>
                        <div class="login-social-list">
                            <a href="{{ route('candidate.google') }}" class="btn btn-default btn-signin input-block-level h-40 btn-login-social">
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
                                        Bằng việc đăng nhập bằng tài khoản mạng xã hội, tôi đã đọc và đồng ý với <a target="_blank" class="text-success" href="terms-of-service.html">Điều khoản dịch vụ</a> và <a target="_blank" class="text-success" href="dieu-khoan-bao-mat.html">Chính sách bảo mật</a> của TopCV
                                    </label>
                                </p>
                            </div>
                        </div>
                    </form>

                        <div class="mt-3 d-flex justify-content-around option-auth">
                            <div>
                                <span>Bạn chưa có tài khoản?</span>
                                <a class="text-success" href="{{route('employer.register')}}">
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
                </div>
            </div>
            <p class="auth-copy-right">© 2016. All Rights Reserved. TopCV Vietnam JSC.</p>
        </div>
        <div class="bg-right">
            <div class="bg-right-abs">
                <a href="index944d.html?ref=you">
                    <img width="160" src="../static.topcv.vn/v4/image/auth/topcv_white.png">
                </a>
                <h1 class="mt-4">Tiếp lợi thế<br>Nối thành công</h1>
                <p>TopCV - Hệ sinh thái nhân sự tiên phong ứng dụng công nghệ tại Việt Nam</p>
            </div>
            <div class="bg-right-arrow"></div>
            <a class="bg-right-link" href="index944d.html?ref=you"></a>
        </div>
    </div>
    <script src="../www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="../static.topcv.vn/v4/js/app.min.b62c219aed21b504.js"></script>
    <script type="text/javascript" src="../static.topcv.vn/v4/js/components/auth/auth.min.c728f26f3af43166.js"></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</body>
</html>
