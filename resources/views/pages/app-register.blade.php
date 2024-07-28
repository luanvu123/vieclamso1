<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://static.topcv.vn/v4/image/favicon.ico" type="image/x-icon">
    <meta property="fb:app_id" content="1478418029113221" />
    <meta name="csrf-token" content="LicyJlAnIvZsu3qxp6mFVnQMyy0Fqy2DOXxP9U4X">
    <link rel="canonical" href="index.html" />
    <link rel="publisher" href="https://plus.google.com/u/0/+TopcvVn" />
    <title>Đăng ký tài khoản CV Online - Vieclamso1.vn</title>
    <meta name="description"
        content="Tài khoản CV Online giúp bạn tạo CV dễ dàng, tìm kiếm việc làm hiệu quả hơn, tiết kiệm chi phí thời gian và tiền bac.">
    <meta name="keywords"
        content="Tài khoản CV Online giúp bạn tạo CV dễ dàng, tìm kiếm việc làm hiệu quả hơn, tiết kiệm chi phí thời gian và tiền bac.">
    <meta name="twitter:card" content="Đăng ký tài khoản CV Online">
    <meta name="twitter:site" content="TopCV">
    <meta name="twitter:title" content="Đăng ký tài khoản CV Online">
    <meta name="twitter:description" content="">

    <!-- FB -->
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:locale:alternate" content="en_US" />
    <meta name="og:title" content="Đăng ký tài khoản CV Online">
    <meta name="og:description"
        content="Tài khoản CV Online giúp bạn tạo CV dễ dàng, tìm kiếm việc làm hiệu quả hơn, tiết kiệm chi phí thời gian và tiền bac.">
    <meta name="og:site_name" content="TopCV">
    <meta property="og:image" content="https://static.topcv.vn/v4/image/thumbnail/Thumb-Homepage-TopCV.vn.png?v=2.0.3">

    <!-- End ta -->
    <link rel="stylesheet" href="../static.topcv.vn/v4/css/bootstrap.min.3d63d5b22aa2a61cG.css">
    <link rel="stylesheet" href="../static.topcv.vn/v4/css/app.min.644b242d2ff872f5G.css">
    <link rel="stylesheet" href="../static.topcv.vn/v4/css/components/auth/newauth.min.a97d350af50496d0G.css">

    <!--Meta SEO on Bing-->
    <meta name="msvalidate.01" content="968C4303D47877E2B0961793E3E4175E" />
    <!--End Meta SEO on Bing-->
    <script src="../static.topcv.vn/v4/js/common/evaluate-tool-cv-success.0d139f508d292cc9.js" defer></script>
    <script src="../static.topcv.vn/v4/js/helper.e6a97e09a77e1d17.js"></script>

    <script type="text/javascript">
        (function(c, l, a, r, i, t, y) {
            c[a] = c[a] || function() {
                (c[a].q = c[a].q || []).push(arguments)
            };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "k66o5ktonu");
    </script>



</head>

<body>
    <div id="fb-root">
        <div class="wrap-auth-section">
            <div class="auth">
                <div class="auth-inner">
                    <div class="auth-form">
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
                                <input type="text" name="name" class="form-control" placeholder="Nhập họ tên" aria-label="Nhập họ tên" value="{{ old('fullname') }}">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="mb-8">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Nhập email" aria-label="Nhập email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="mb-8">Mật khẩu</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-shield-keyhole"></i></span>
                                </div>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu" aria-label="Nhập mật khẩu">
                                <div class="input-group-prepend">
                                    <button type="button" tabindex="-1" data-input-target="#password" class="input-group-text toggle-password"></button>
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
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu" aria-label="Nhập lại mật khẩu">
                                <div class="input-group-prepend">
                                    <button type="button" tabindex="-1" data-input-target="#password_confirmation" class="input-group-text toggle-password"></button>
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
                                        Tôi đã đọc và đồng ý với <a target="_blank" href="terms-of-service.html" class="text-success">Điều khoản dịch vụ</a> và <a target="_blank" href="dieu-khoan-bao-mat.html" class="text-success">Chính sách bảo mật</a> của TopCV
                                    </label>
                                </p>
                            </div>
                            <button type="submit" class="btn btn-sign input-block-level w-100 h-40 btn-primary-hover g-recaptcha">Đăng ký</button>
                            <p class="or text-center fz-12px">Hoặc đăng nhập bằng</p>
                        </div>
                        <div class="login-social-list">
                            <a href="{{ route('candidate.login.google') }}" class="btn btn-default btn-signin input-block-level h-40 btn-login-social">
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
                                        Bằng việc đăng nhập bằng tài khoản mạng xã hội, tôi đã đọc và đồng ý với <a target="_blank" class="text-success" href="terms-of-service.html">Điều khoản dịch vụ</a> và <a target="_blank" class="text-success" href="dieu-khoan-bao-mat.html">Chính sách bảo mật</a> của Vieclamso1
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
                    </div>

                </div>
                <p class="auth-copy-right">© 2016. All Rights Reserved. Vieclamso1 Vietnam JSC.</p>
            </div>
            <div class="bg-right">
                <div class="bg-right-abs">
                    <a href="index944d.html?ref=you">
                        <img width="160" src="../static.topcv.vn/v4/image/auth/topcv_white.png">
                    </a>
                    <h1 class="mt-4">Tiếp lợi thế<br>Nối thành công</h1>
                    <p>Vieclamso1 - Hệ sinh thái nhân sự tiên phong ứng dụng công nghệ tại Việt Nam</p>
                </div>
                <div class="bg-right-arrow"></div>
                <a class="bg-right-link" href="index944d.html?ref=you"></a>
            </div>
        </div>
    </div>
    <script src="../www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="../static.topcv.vn/v4/js/app.min.b62c219aed21b504.js"></script>
    <script type="text/javascript" src="../static.topcv.vn/v4/js/components/auth/auth.min.c728f26f3af43166.js"></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>


</body>

</html>

