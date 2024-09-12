<script>
    let currentScroll = 0
    window.addEventListener('scroll', function() {
        const scrollPercentage = (document.documentElement.scrollTop + document.body.scrollTop) / (document
            .documentElement.scrollHeight) * 100;
        if (scrollPercentage >= 50) {
            currentScroll = window.pageYOffset
            showPopup()
        }
    });

    function showPopup() {
        if (!sessionStorage.getItem('hidden_home_popup')) {
            $('#khtt-backdrop').fadeIn(500);
            document.body.style.overflow = 'hidden';
        }
    }

    function hidePopupIcon() {
        $("#khtt-backdrop").fadeOut(500);
        document.body.style.overflow = 'scroll';
        window.scrollTo(0, currentScroll)
        sessionStorage.setItem('hidden_home_popup', true)
    }


    document.getElementById("banner-top").addEventListener("click", function(e) {
        ta('ClickToBannerQuoteTop')
    })
</script>
<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta property="fb:app_id" content="1478418029113221" />
    <meta name="csrf-token" content="9tMEzEyKkPf1mEqyc2WsSK28HqC52gLJAX6Oawmd">

    <meta name="msvalidate.01" content="968C4303D47877E2B0961793E3E4175E" />
    <link rel="preload" as="style" href="{{ asset('build/assets/app.374c2237.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/app.374c2237.css') }}" />
    <title>Đăng tin tuyển dụng miễn phí – Tìm CV ứng viên trên Vieclamso1</title>
    <meta name="description"
        content="Đăng tin tuyển dụng miễn phí, tìm hồ sơ ứng viên xin việc, đăng tin tuyển dụng 24h miễn phí, đăng tin tuyển dụng việc làm nhanh, hiệu quả tiếp cận 2.000.000+ hồ sơ người tìm việc trên Vieclamso1." />
    <link rel="icon" type="image/png" href="https://static.topcv.vn/srp/website/favicon.ico?">
    <link rel="canonical" href="index.html" />
    <link rel="publisher" href="https://plus.google.com/u/0/+TopcvVn" />
    <meta property="og:url" content />
    <meta property="og:title" content="Dịch vụ tuyển dụng nhân sự chất lượng cao" />
    <meta property="og:description"
        content="Đăng tin tuyển dụng miễn phí, tìm hồ sơ ứng viên xin việc, đăng tin tuyển dụng 24h miễn phí, đăng tin tuyển dụng việc làm nhanh, hiệu quả tiếp cận 2.000.000+ hồ sơ người tìm việc trên Vieclamso1." />
    <meta property="og:image" content="https://static.topcv.vn/srp/website/images/thumbnail_home.jpg" />
    <meta property="og:site_name" content="Vieclamso1" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:locale:alternate" content="en_US" />
    <meta name="keywords"
        content="đăng tin tuyển dụng, miễn phí, nhà tuyển dụng, quản lý hồ sơ ứng viên, tìm kiếm hồ sơ ứng viên">
    <meta name="twitter:card" content="Dịch vụ tuyển dụng nhân sự chất lượng cao">
    <meta name="twitter:site" content="Vieclamso1">
    <meta name="twitter:title" content="Dịch vụ tuyển dụng nhân sự chất lượng cao">
    <meta name="twitter:description"
        content="Đăng tin tuyển dụng miễn phí, tìm hồ sơ ứng viên xin việc, đăng tin tuyển dụng 24h miễn phí, đăng tin tuyển dụng việc làm nhanh, hiệu quả tiếp cận 2.000.000+ hồ sơ người tìm việc trên Vieclamso1.">
    <meta property="og:type" content="website" />




    <script src="{{ asset('code.jquery.com/jquery-2.2.4.js')}}"></script>
    <script src="{{ asset('cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js')}}"></script>
    <script src="{{ asset('maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js')}}"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css') }}" />
    <style>
        .slick-dots {
            display: flex !important;
        }
    </style>
    <style>
        html {
            scroll-behavior: smooth !important;
        }
    </style>
    <style>
        .pd-12 {
            padding: 12px;
        }
    </style>
    <style>
        .center-form {
            min-height: 539px;
            max-height: 539px;
            margin-inline: 80px;
            border-radius: 10px !important;
            box-shadow: 0 6px 12px 3px rgba(32, 40, 56, 0.05), 0 4px 8px 2px rgba(32, 40, 56, 0.03);
            height: 27%;
            margin-bottom: 30px;
        }

        #mask-form-lead {
            position: fixed;
            z-index: 200;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            display: none;
            top: 0;
            right: 0;
        }

        #modal-form-lead {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 1000px;
            height: 650px;
        }

        #modal-form-lead>.center-form {
            margin-inline: 0;
        }

        #modal-form-lead .icon-top-form-lead {
            display: block !important;
        }

        #modal-form-lead .suggest-post-job {
            display: block;
        }

        #modal-form-lead-success {
            background: #fff;
            width: 600px;
            height: auto;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 20px;
            box-shadow: 0 6px 16px 0 rgba(0, 0, 0, 0.06);
            padding: 40px;
            display: none;
        }

        .form-lead-success-container {
            display: flex;
            justify-content: center;
        }

        .success-msg {
            font-size: 20px;
            font-style: normal;
            font-weight: 700;
            line-height: 28px;
            /* 140% */
            letter-spacing: -0.2px;
            color: #00B14F;
            text-align: center;
            margin-top: 20px;
        }

        .success-des {
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 24px;
            /* 150% */
            letter-spacing: -0.16px;
            color: #303235;
            text-align: center;
            margin-top: 12px;
        }

        #modal-form-lead-success>.icon-top-form-lead {
            display: block;
        }

        .support-footer-form {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 32px;
        }

        .support-footer-form-item {
            width: 47%;
        }

        @media (max-width: 768px) {
            #left-banner-form {
                display: none;
            }

            #modal-form-lead {
                max-width: 90%;
            }

            .right-banner-form .form-lead-container {
                border-radius: 10px;
            }

            .suggest-post-job {
                display: flex !important;
                flex-direction: column;
            }

            #modal-form-lead-success {
                max-width: 90%;
                height: auto;
            }

            .support-footer-form {
                flex-direction: column;
            }

            .support-footer-form-item {
                width: 90%;
                margin-bottom: 15px;
                justify-content: center;
            }

            .form-lead-success-container svg {
                width: 80px;
                height: 80px;
            }
        }
    </style>
    <style>
        #floating-sp-mkt {
            position: fixed;
            right: 10px;
            bottom: 6%;
            display: none;
            z-index: 97;
        }

        #floating-sp-mkt img {
            cursor: pointer;
        }

        #close-img-sp {
            display: flex;
            justify-content: center;
            cursor: pointer;
        }
    </style>
    <style>
        .banner-form {
            background-image: url(images/background-form.png);
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
        }

        .form-banner-title {
            font-size: 28px;
            font-style: normal;
            font-weight: 700;
            line-height: 125%;
            /* 45px */
            letter-spacing: -0.54px;
            color: #FFF;
            text-align: center;
            margin-top: 50px;
        }

        .form-banner-subtitle {
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: 22px;
            /* 157.143% */
            letter-spacing: 0.14px;
            color: #FFF;
            text-align: center;
            margin-bottom: 35px;
        }

        @media (max-width: 768px) {
            .banner-form {
                height: fit-content;
            }

            .form-banner-title {
                margin-top: 15px;
                padding-inline: 20px;
            }

            .form-banner-subtitle {
                padding-inline: 20px;
            }
        }
    </style>
    <style>
        .left-banner-form {
            background-image: url("images/banner_form_bg.png");
            height: 100%;
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
            border-bottom-left-radius: 10px;
            border-top-left-radius: 10px;
        }

        .center-banner-form {
            background-image: url("images/banner_form_center.png");
            height: 100%;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
        }

        .center-form {
            margin-inline: 80px;
            border-radius: 10px !important;
            box-shadow: 0 6px 12px 3px rgba(32, 40, 56, 0.05), 0 4px 8px 2px rgba(32, 40, 56, 0.03);
            height: 73%;
            margin-bottom: 30px;
        }

        .right-banner-form .form-lead-container {
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
        }

        .left-banner-form-mobile {
            display: none;
        }

        @media (max-width: 768px) {
            .center-form {
                flex-direction: column;
                margin-inline: 20px;
            }

            .left-banner-form-mobile {
                display: block;
                width: 100%;
                height: 350px;
                background-image: url("images/banner_form_bg.png");
                background-size: 100% 100%;
                background-position: center;
                background-repeat: no-repeat;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }

            .right-banner-form {
                border-top-left-radius: 0;
                border-top-right-radius: 0;
                background: #fff;
            }
        }
    </style>
    <style>
        .left-banner-form {
            background-image: url("images/banner_form_bg.png");
            height: 100%;
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
            border-bottom-left-radius: 10px;
            border-top-left-radius: 10px;
        }

        .center-banner-form {
            background-image: url("images/banner_form_center.png");
            height: 100%;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
        }

        .center-form {
            margin-inline: 80px;
            border-radius: 10px !important;
            box-shadow: 0 6px 12px 3px rgba(32, 40, 56, 0.05), 0 4px 8px 2px rgba(32, 40, 56, 0.03);
            height: 73%;
            margin-bottom: 30px;
        }

        .right-banner-form .form-lead-container {
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
        }

        .left-banner-form-mobile {
            display: none;
        }

        @media (max-width: 768px) {
            .center-form {
                flex-direction: column;
                margin-inline: 20px;
            }

            .left-banner-form-mobile {
                display: block;
                width: 100%;
                height: 350px;
                background-image: url("images/banner_form_bg.png");
                background-size: 100% 100%;
                background-position: center;
                background-repeat: no-repeat;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }

            .right-banner-form {
                border-top-left-radius: 0;
                border-top-right-radius: 0;
                background: #fff;
            }
        }
    </style>
    <style>
        .form-lead-container {
            background: #fff;
            padding: 40px;
            position: relative;
        }

        .form-lead-scroll {
            overflow-y: auto;
            height: 400px;
            padding-right: 5px;
        }

        .form-lead-title {
            font-size: 24px;
            font-style: normal;
            font-weight: 700;
            line-height: 32px;
            /* 133.333% */
            letter-spacing: -0.24px;
            color: #00B14F;
            margin-bottom: 12px;
        }

        .form-lead-label {
            font-size: 14px;
            font-style: normal;
            font-weight: 600;
            line-height: 22px;
            /* 157.143% */
            letter-spacing: 0.175px;
            color: #5E6368;
            margin-bottom: 4px;
            margin-top: 12px;
        }

        .form-lead-item {
            border-radius: 4px;
            border: 1px solid #D7DEE4;
            background: #FFF;
            padding: 6px 12px;
            display: flex;
            align-items: center;
        }

        .form-lead-item>i {
            color: #A8AFB6;
            margin-right: 12px;
        }

        .form-lead-item>input,
        select {
            width: 100%;
            height: 24px;
        }

        .form-lead-item>textarea {
            width: 100%;
            resize: none;
        }

        .form-lead-item>input:focus-visible,
        select:focus-visible,
        textarea:focus-visible {
            outline: none;
        }

        .form-lead-item:focus-within {
            border: 1px solid #00B14F;
        }

        .place_holder {
            color: #A8AFB6;
        }

        .form-footer-lead {
            margin-top: 10px;
            margin-bottom: 15px;
            color: #fff;
            text-align: center;
        }

        .form-footer-lead>button {
            padding: 10px 40px;
            background: #00B14F;
            border-radius: 3px;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: 24px;
            /* 150% */
            letter-spacing: -0.16px;
        }

        .form-footer-lead>button:hover {
            background: #008b3e;
        }

        .form-footer-lead>button>i {
            margin-right: 8px;
        }

        .icon-top-form-lead {
            position: absolute;
            right: 20px;
            top: 20px;
            display: none;
        }

        .icon-top-form-lead span {
            cursor: pointer;
            background: #F5F8FA;
            padding: 3px 8px;
            border-radius: 999px
        }

        .suggest-post-job {
            text-align: center;
            display: none;
        }

        .suggest-post-job a {
            color: #00B14F;
            text-decoration: underline;
        }

        .other-consulting {
            display: none;
            margin-bottom: 10px;
        }

        .form-lead-msg {
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            color: #C52E20;
            margin-top: 4px;
        }

        .msg-name,
        .msg-city,
        .msg-email,
        .msg-phone,
        .msg-consulting {}
    </style>
    <style>
        .form-lead-container {
            background: #fff;
            padding: 40px;
            position: relative;
        }

        .form-lead-scroll {
            overflow-y: auto;
            height: 400px;
            padding-right: 5px;
        }

        .form-lead-title {
            font-size: 24px;
            font-style: normal;
            font-weight: 700;
            line-height: 32px;
            /* 133.333% */
            letter-spacing: -0.24px;
            color: #00B14F;
            margin-bottom: 12px;
        }

        .form-lead-label {
            font-size: 14px;
            font-style: normal;
            font-weight: 600;
            line-height: 22px;
            /* 157.143% */
            letter-spacing: 0.175px;
            color: #5E6368;
            margin-bottom: 4px;
            margin-top: 12px;
        }

        .form-lead-item {
            border-radius: 4px;
            border: 1px solid #D7DEE4;
            background: #FFF;
            padding: 6px 12px;
            display: flex;
            align-items: center;
        }

        .form-lead-item>i {
            color: #A8AFB6;
            margin-right: 12px;
        }

        .form-lead-item>input,
        select {
            width: 100%;
            height: 24px;
        }

        .form-lead-item>textarea {
            width: 100%;
            resize: none;
        }

        .form-lead-item>input:focus-visible,
        select:focus-visible,
        textarea:focus-visible {
            outline: none;
        }

        .form-lead-item:focus-within {
            border: 1px solid #00B14F;
        }

        .place_holder {
            color: #A8AFB6;
        }

        .form-footer-lead {
            margin-top: 10px;
            margin-bottom: 15px;
            color: #fff;
            text-align: center;
        }

        .form-footer-lead>button {
            padding: 10px 40px;
            background: #00B14F;
            border-radius: 3px;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: 24px;
            /* 150% */
            letter-spacing: -0.16px;
        }

        .form-footer-lead>button:hover {
            background: #008b3e;
        }

        .form-footer-lead>button>i {
            margin-right: 8px;
        }

        .icon-top-form-lead {
            position: absolute;
            right: 20px;
            top: 20px;
            display: none;
        }

        .icon-top-form-lead span {
            cursor: pointer;
            background: #F5F8FA;
            padding: 3px 8px;
            border-radius: 999px
        }

        .suggest-post-job {
            text-align: center;
            display: none;
        }

        .suggest-post-job a {
            color: #00B14F;
            text-decoration: underline;
        }

        .other-consulting {
            display: none;
            margin-bottom: 10px;
        }

        .form-lead-msg {
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            color: #C52E20;
            margin-top: 4px;
        }

        .msg-name,
        .msg-city,
        .msg-email,
        .msg-phone,
        .msg-consulting {}
    </style>
    <script>
        var BIZ_DOMAIN_BACKEND = 'https://tuyendung-api.topcv.vn/'
    </script>
    <style>
        #khtt-backdrop {
            position: fixed;
            z-index: 200;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            display: none;
            top: 0;
            right: 0;
        }

        #popup-banner-khtt {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #btn-close {
            position: absolute;
            right: 5px;
            cursor: pointer;
            z-index: 250;
        }

        .image-icon-banner {
            width: 430px;
        }

        @media (max-width: 450px) {
            .btn-icon-popup-khtt {
                bottom: -8px;
                width: 162px;
            }

            #btn-close {
                right: 0px;
            }

            #popup-banner-khtt {
                width: 350px;
            }
        }

        #slogan-topcv-popup {
            width: 415px;
            height: auto;
            background: #fff;
            border: 1px solid #00B14F;
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.09);
            border-radius: 10px;
            right: 10px;
            bottom: 10%;
            position: fixed;
            z-index: 197;
            opacity: 1;
            display: none;
        }

        .header-slogan {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .btn-close {
            background: #f1f1f1;
            padding: 2px 8px;
            border-radius: 100px;
            color: #a7a7a7;
            cursor: pointer;
        }

        .video-container {
            margin-top: 12px;
        }

        .video-container>iframe {
            width: 100%;
            height: 219px;
            border-radius: 10px;
        }

        .content-slogan {
            display: flex;
            flex-direction: column;
            margin-top: 12px;
            color: #303235;
        }

        .bg-line {
            background: #EEEEEE;
            height: 1px;
            width: 100%;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .slogan-button {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .slogan-footer {
            display: flex;
            flex-direction: column;
        }

        .container-hidden {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .btn-footer-close {
            color: #303235;
            background: #f5f8fa;
            width: 50%;
            line-height: 1.5;
            border-radius: 0.214rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            height: 33px;
            margin-right: 4px;
        }

        .btn-footer-close:hover {
            color: #212529;
            background-color: #d0dae4;
        }

        .btn-footer-go {
            color: #fff;
            background: #00b14f;
            width: 50%;
            line-height: 1.5;
            border-radius: 0.214rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            height: 33px;
            margin-left: 4px;
        }

        .label-hidden {
            color: #868d94;
        }

        #slogan-hidden {
            border-color: #868d94;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 16px;
            width: 16px;
            border: 1px solid #868d94;
            border-radius: 10%;
        }

        .container-checkbox {
            display: block;
            position: relative;
            padding-left: 25px;
            margin-bottom: 20px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            margin-top: 2px;
        }

        .container-checkbox>input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .checkmark:after {
            content: '';
            position: absolute;
            display: none;
        }

        .container-checkbox:hover input~.checkmark {
            background-color: #fff;
        }

        .container-checkbox input:checked~.checkmark {
            background-color: #00B14F;
            border: unset;
        }

        .container-checkbox input:checked~.checkmark:after {
            display: block;
        }

        .container-checkbox .checkmark:after {
            left: 6px;
            top: 2px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            -webkit-transform: rotate(38deg);
            -ms-transform: rotate(38deg);
            transform: rotate(38deg);
        }

        .container-hidden:hover .checkmark {
            border-color: #00B14F;
        }

        .container-hidden:hover .label-hidden {
            color: #00B14F;
        }

        .font-weight-bolder {
            font-weight: 600;
        }

        #mask-popup {
            display: none;
        }

        @media only screen and (max-device-width: 640px) {
            #slogan-topcv-popup {
                max-width: 92%;
                bottom: unset;
                top: 0;
                left: 0;
                right: 0;
                margin: 50px auto;
            }

            .video-container>iframe {
                height: 195px;
            }

            #mask-popup {
                display: none;
                width: 100%;
                height: 100%;
                background: #1C2835;
                z-index: 190;
                position: fixed;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                opacity: 0.6;
                outline: 0;
            }
        }
    </style>
</head>

<body class="min-h-screen font-body bg-[#F4F5F5] pt-[68px] md:pt-[80px] text-color-default font-alexandria">
    <div id="page-container" class="page-container">
        <div class="min-h-screen">
            <div class="bg-white fixed w-full top-0 right-0 z-[100] md:border-b">
                <div class="w-container">
                    <div class="md:flex md:items-center md:h-[80px]">
                        <div class="relative h-[68px] md:h-auto flex items-center justify-center md:pr-[30px]">
                            <a href="{{ route('/') }}" class="business-image">
                                <img src="{{ asset('storage/' . $info->logo_home) }}"
                                    class="max-w-[200px] md:mb-[-10px]" alt="topcv logo">
                            </a>
                            <div class="md:hidden absolute top-0 right-0">
                                <button class="md:hidden h-[68px] w-[68px] flex items-center justify-center"
                                    id="mb-menu-btn">
                                    <i class="fa-solid fa-bars"></i>
                                </button>
                            </div>
                        </div>
                        <div id="mb-menu" class="hidden w-full md:flex">
                            <ul class="p-0 m-0 list-none flex flex-col md:flex-row text-sm" id="navbar-menu">
                                <li>
                                    <a class="text-primary hover:text-primary block pd-12 md:py-5 text-center font-medium"
                                        href="#">
                                        Giới thiệu
                                    </a>
                                </li>
                                <li>
                                    <a class="hover:text-primary block pd-12 md:py-5 text-center font-medium"
                                        href="#">
                                        Dịch vụ
                                    </a>
                                </li>
                                <li>
                                    <a class="hover:text-primary block pd-12 md:py-5 text-center font-medium"
                                        href="#" target="_blank">
                                        Báo giá
                                    </a>
                                </li>
                                <li>
                                    <a class="hover:text-primary block pd-12 md:py-5 text-center font-medium"
                                        href="#" target="_blank">Hỗ trợ</a>
                                </li>
                                <li>
                                    <a class="hover:text-primary block pd-12 md:py-5 text-center font-medium"
                                        href="#" target="_blank">
                                        Blog tuyển dụng
                                    </a>
                                </li>
                            </ul>
                            <div class="py-[40px] md:flex md:items-center md:justify-end md:py-0 md:!ml-auto">
                                <div class="mb-[35px] p-0 flex justify-center md:mb-0 md:mr-[30px]">
                                    <div class="ml-1 border border-gray-100">
                                        <a href="#">
                                            <img style="width: 27px; height: 16px"
                                                src="{{ asset('static.topcv.vn/srp/website/images/flags/uk.jpg') }}"
                                                alt="us flag">
                                        </a>
                                    </div>
                                    <div class="ml-1 border border-gray-100">
                                        <a href="#">
                                            <img style="width: 27px; height: 16px"
                                                src="{{ asset('static.topcv.vn/srp/website/images/flags/vietnam.png') }}"
                                                alt="vi flag">
                                        </a>
                                    </div>
                                    <div class="ml-1 border border-gray-100">
                                        <a href="#">
                                            <img style="width: 27px; height: 16px"
                                                src="{{ asset('static.topcv.vn/srp/website/images/flags/japan.png') }}"
                                                alt="jp flag">
                                        </a>
                                    </div>
                                </div>
                                <div id="login-box" class="flex items-center justify-center">
                                    <div class="grid grid-cols-2 gap-[12px]">
                                        <a href="{{ route('employer.login') }}"
                                            class="bg-white border border-primary py-[14px] px-[13px] rounded block  text-primary text-center min-w-[104px]">Đăng
                                            nhập</a>
                                        <a href="{{ route('employer.register') }}"
                                            class="bg-primary border border-primary py-[14px] px-[13px] rounded block text-white text-center min-w-[104px]">Đăng
                                            ký</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                @media (max-width: 1024px) {
                    .px-3 {
                        padding-right: 12px !important;
                    }
                }

                .custom-header {
                    border-radius: 100px;
                    border: 1px solid #0DB14B;
                    background: linear-gradient(90deg, #213142 0.62%, #0A9C4B 99.38%);
                    color: #fff;
                    padding: 6px;
                    margin-top: 6px;
                }

                .custom-header:hover {
                    color: #fff;
                }
            </style>
            @yield('content')
            <footer>
                <div class="border-t border-[#E0E6ED] bg-white text-[15px] p-[20px] md:p-[40px]">
                    <div class="w-container">
                        <div class="md:flex md:items-start md:justify-between">
                            <div class="md:w-1/3 md:mr-[115px]">
                                <a class="flex py-5 justify-center md:justify-start" href="{{ route('/') }}">
                                    <img class="max-w-[200px]" src="{{ asset('storage/' . $info->logo) }}"
                                        alt="topcv logo">
                                </a>
                                <div class="flex flex-row justify-between mb-[35px]">
                                    <a class="align-middle basis-5/12 order-1" href="#">
                                        <img src="{{ asset('storage/' . $info->logo_google_for_startup) }}"
                                            class="logo max-h-[33px]" alt="Google">
                                    </a>
                                    <div class="align-middle basis-1/12 order-2">
                                        <img src="{{ asset('storage/' . $info->logo_dmca_com) }}"
                                            class="logo max-h-[48px]" alt="DMCA.com Protection Status">
                                    </div>
                                    <a class="align-middle basis-4/12 order-3" href="{{ $info->bct }}">
                                        <img src="{{ asset('storage/' . $info->bct_image) }}"
                                            class="logo max-h-[41px]" alt="bct confirmation">
                                    </a>
                                </div>
                                <h5 class="font-medium text-color-default mb-[24px] text-[18px]">Ứng dụng tải xuống
                                </h5>
                                <p class="flex items-center justify-start mb-[36px]">
                                    <a class="block mr-[16px]" target="_blank" href="{{ $info->link_appstore }}">
                                        <img class="max-h-[50px]"
                                            src="{{ asset('storage/' . $info->image_appstore) }}" alt="app store">
                                    </a>
                                    <a class="block" target="_blank" href="{{ $info->link_googleplay }}">
                                        <img class="max-h-[50px]"
                                            src="{{ asset('storage/' . $info->image_googleplay) }}"
                                            alt="google play store">
                                    </a>
                                </p>
                                <div class="grid grid-cols-2">
                                </div>
                            </div>
                            <div class="md:w-2/3 md:flex md:flex-nowrap">
                                <div class="grid grid-cols-2 gap-[16px]">
                                    <div>
                                        <h5 class="font-semibold text-[18px] text-color-default mb-[16px]">Về
                                            Vieclamso1
                                        </h5>
                                        <ul>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="#" target="_blank">Giới thiệu</a>
                                            </li>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="#" target="_blank">Tuyển dụng</a>
                                            </li>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="#" target>Liên hệ</a>
                                            </li>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="#" target="_blank">Góc
                                                    báo chí</a>
                                            </li>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="#" target="_blank">Chính
                                                    sách bảo mật</a>
                                            </li>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="#" target="_blank">Điều khoản dịch
                                                    vụ</a>
                                            </li>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="#" target="_blank">Quy chế hoạt
                                                    động</a>
                                            </li>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="#" target="_blank">Chương trình Vieclamso1
                                                    Rewards</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-[18px] text-color-default mb-[16px]">Ứng viên
                                        </h5>
                                        <ul>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="#" target="_blank">Tìm việc
                                                    làm</a>
                                            </li>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="#" target="_blank">Khoá học</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-[16px] md:grid-cols-1">
                                    <div>
                                        <h5 class="font-semibold text-[18px] text-color-default mb-[16px]">Đối tác</h5>
                                        <ul>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="#" target="_blank">Doanh
                                                    nghiệp</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div>
                                        <div
                                            class="social-icons text-color-default flex items-center justify-around md:items-start">

                                            @foreach ($publiclink_layout as $publicLink)
                                                <a class="text-[26px] mr-[10px]" target="_blank"
                                                    href="{{ $publicLink->link }}">
                                                    <img class="img-responsive"
                                                        src="{{ asset('storage/' . $publicLink->image) }}">
                                                </a>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-t border-[#E0E6ED] bg-white p-[20px]">
                    <div class="w-container">
                        <div class="grid md:grid-cols-7 text-[13px] mb-[32px]">
                            <div class="md:col-span-5 my-2">
                                <h3 class="text-[18px] md:text-[24px] font-medium text-color-default mb-[16px]">
                                    {{ $info->company_name }}</h3>
                                <ul>
                                    <li class="xl:inline mt-2.5 mr-1">
                                        <img class="inline" src="{{ asset('images/icons/tax.svg') }}"
                                            style="vertical-align: text-bottom !important;" alt="Item icon" />
                                        <span class="text-[12px] md:text-[14px] text-color-light font-light">Giấy phép
                                            đăng ký kinh doanh
                                            số:</span>
                                        <span
                                            class="text-[12px] md:text-[14px] font-medium text-color-default">{{ $info->business_license_number }}</span>
                                    </li>
                                    <li class="xl:inline mt-2.5 mr-1">
                                        <img class="inline" src="{{ asset('images/icons/paper.svg') }}"
                                            style="vertical-align: text-bottom !important;" alt="Item icon" />
                                        <span class="text-[12px] md:text-[14px] text-color-light font-light">Giấy phép
                                            hoạt động dịch vụ
                                            việc làm số:</span>
                                        <span
                                            class="text-[12px] md:text-[14px] font-medium text-color-default">{{ $info->service_license_number }}
                                        </span>
                                    </li>
                                    <li class=" mt-2.5 mr-1">
                                        <img class="inline" src="{{ asset('images/icons/location.svg') }}"
                                            style="vertical-align: text-bottom !important;" alt="Item icon" />
                                        <span class="text-[12px] md:text-[14px] text-color-light font-light">Trụ sở HN:
                                        </span>
                                        <span
                                            class="text-[12px] md:text-[14px] font-medium text-color-default">{{ $info->headquarter_address }}</span>
                                    </li>
                                    <li class=" mt-2.5 mr-1">
                                        <img class="inline" src="{{ asset('images/icons/location.svg') }}"
                                            style="vertical-align: text-bottom !important;" alt="Item icon" />
                                        <span class="text-[12px] md:text-[14px] text-color-light font-light">Chi nhánh
                                            HCM:</span>
                                        <span
                                            class="text-[12px] md:text-[14px] font-medium text-color-default">{{ $info->branch_address }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="md:col-span-2 ">
                                <div class="hidden sm:grid">
                                    <div class="grid justify-center md:justify-end">
                                        <img class="img-responsive" style="width: 170px;"
                                            src="{{ asset('storage/' . $info->qr_code_image) }}">
                                        <a href="{{ $info->link_website }}">{{ $info->name_website }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-[14px] font-medium text-color-default text-center md:text-left mb-[17px]">
                                Hệ sinh thái HR Tech của Vieclamso1
                            </h3>
                            <div class="flex justify-center md:justify-between flex-row my-2">
                                @foreach ($ecosystems_layout as $ecosystem_layout)
                                    <div class="flex">
                                        <a href="{{ $ecosystem_layout->website }}"
                                            class="{{ $ecosystem_layout->name_link_website }}">
                                            <img src="{{ asset('storage/' . $ecosystem_layout->image_footer) }}"
                                                class="max-h-[83px] hidden md:block"
                                                alt="{{ $ecosystem_layout->name }}"
                                                title="{{ $ecosystem_layout->name }}">
                                            <span>{{ $ecosystem_layout->detail }}</span>
                                        </a>
                                    </div>
                                @endforeach


                            </div>

                        </div>
                    </div>
                </div>
                <div class="bg-white flex justify-center " style="height: 50px">
                    <div class="text-[12px] md:text-[14px] text-color-light"> {{ $info->copyright }}
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div id="khtt-backdrop">
        <div id="popup-banner-khtt">
            <img src="{{ asset('images/icon-banner/Icon-btn-close.png') }}" alt="close btn" id="btn-close"
                onclick="hidePopupIcon()">
            <a href="app/login.html" target="_blank">
                <img src="{{ asset('images/csbh/2024/06/home_popup.png') }}" id="landing-popup-image"
                    alt="sales campaign banner" class="image-icon-banner">
            </a>
        </div>
    </div>
    <script src="{{ asset('ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}"></script>
    <link rel="modulepreload" href="{{ asset('build/assets/header.d1ee4fe5.js')}}" />
    <script type="module" src="{{ asset('build/assets/header.d1ee4fe5.js')}}"></script>
    <script>
        document.getElementById("mb-menu-btn").addEventListener("click", function() {
            const isShow = document.getElementById("mb-menu").style.display && document.getElementById("mb-menu")
                .style
                .display !== 'none'
            if (isShow) {
                document.getElementById("mb-menu").style.display = 'none'
            } else {
                document.getElementById("mb-menu").style.display = 'block'
            }
        });
    </script>
</body>

</html>
