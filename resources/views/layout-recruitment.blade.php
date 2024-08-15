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
    <title>Đăng tin tuyển dụng miễn phí – Tìm CV ứng viên trên TopCV</title>
    <meta name="description"
        content="Đăng tin tuyển dụng miễn phí, tìm hồ sơ ứng viên xin việc, đăng tin tuyển dụng 24h miễn phí, đăng tin tuyển dụng việc làm nhanh, hiệu quả tiếp cận 2.000.000+ hồ sơ người tìm việc trên TopCV." />
    <link rel="icon" type="image/png" href="https://static.topcv.vn/srp/website/favicon.ico?">
    <link rel="canonical" href="index.html" />
    <link rel="publisher" href="https://plus.google.com/u/0/+TopcvVn" />
    <meta property="og:url" content />
    <meta property="og:title" content="Dịch vụ tuyển dụng nhân sự chất lượng cao" />
    <meta property="og:description"
        content="Đăng tin tuyển dụng miễn phí, tìm hồ sơ ứng viên xin việc, đăng tin tuyển dụng 24h miễn phí, đăng tin tuyển dụng việc làm nhanh, hiệu quả tiếp cận 2.000.000+ hồ sơ người tìm việc trên TopCV." />
    <meta property="og:image" content="https://static.topcv.vn/srp/website/images/thumbnail_home.jpg" />
    <meta property="og:site_name" content="TopCV" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:locale:alternate" content="en_US" />
    <meta name="keywords"
        content="đăng tin tuyển dụng, miễn phí, nhà tuyển dụng, quản lý hồ sơ ứng viên, tìm kiếm hồ sơ ứng viên">
    <meta name="twitter:card" content="Dịch vụ tuyển dụng nhân sự chất lượng cao">
    <meta name="twitter:site" content="TopCV">
    <meta name="twitter:title" content="Dịch vụ tuyển dụng nhân sự chất lượng cao">
    <meta name="twitter:description"
        content="Đăng tin tuyển dụng miễn phí, tìm hồ sơ ứng viên xin việc, đăng tin tuyển dụng 24h miễn phí, đăng tin tuyển dụng việc làm nhanh, hiệu quả tiếp cận 2.000.000+ hồ sơ người tìm việc trên TopCV.">
    <meta property="og:type" content="website" />




    <script src="code.jquery.com/jquery-2.2.4.js"></script>
    <script src="cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
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
                            <a href="{{route("/")}}" class="business-image">
                                <img src="{{ asset('storage/' . $info->logo) }}" class="max-w-[200px] md:mb-[-10px]"
                                    alt="topcv logo">
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
                                        href="index944d.html?ref=you">
                                        Giới thiệu
                                    </a>
                                </li>
                                <li>
                                    <a class="hover:text-primary block pd-12 md:py-5 text-center font-medium"
                                        href="index.html?ref=you#service">
                                        Dịch vụ
                                    </a>
                                </li>
                                <li>
                                    <a class="hover:text-primary block pd-12 md:py-5 text-center font-medium"
                                        href="bang-gia-dich-vu.html?ref=you" target="_blank">
                                        Báo giá
                                    </a>
                                </li>
                                <li>
                                    <a class="hover:text-primary block pd-12 md:py-5 text-center font-medium"
                                        href="help/index.html" target="_blank">Hỗ trợ</a>
                                </li>
                                <li>
                                    <a class="hover:text-primary block pd-12 md:py-5 text-center font-medium"
                                        href="bai-viet/index.html" target="_blank">
                                        Blog tuyển dụng
                                    </a>
                                </li>
                            </ul>
                            <div class="py-[40px] md:flex md:items-center md:justify-end md:py-0 md:!ml-auto">
                                <div class="mb-[35px] p-0 flex justify-center md:mb-0 md:mr-[30px]">
                                    <div class="ml-1 border border-gray-100">
                                        <a href="en944d.html?ref=you">
                                            <img style="width: 27px; height: 16px"
                                                src="{{ asset('static.topcv.vn/srp/website/images/flags/uk.jpg') }}"
                                                alt="us flag">
                                        </a>
                                    </div>
                                    <div class="ml-1 border border-gray-100">
                                        <a href="index.html?ref=you">
                                            <img style="width: 27px; height: 16px"
                                                src="{{ asset('static.topcv.vn/srp/website/images/flags/vietnam.png') }}"
                                                alt="vi flag">
                                        </a>
                                    </div>
                                    <div class="ml-1 border border-gray-100">
                                        <a href="jp944d.html?ref=you">
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
                                    <a class="align-middle basis-4/12 order-3"
                                        href="{{$info->bct}}">
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
                                                    href="#" target="_blank">Chương trình TopCV
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
                                Hệ sinh thái HR Tech của TopCV
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
    <div id="mask-form-lead">
        <div id="modal-form-lead">
            <div class="md:flex md:items-start md:justify-between mr-[118px] center-form">
                <div class="md:w-1/2 left-banner-form" id="left-banner-form">
                    <div class="center-banner-form">
                    </div>
                </div>
                <div class="left-banner-form-mobile">
                    <div class="center-banner-form">
                    </div>
                </div>
                <div class="md:w-1/2 right-banner-form" id="right-banner-form">
                    <div class="form-lead-container">
                        <div class="icon-top-form-lead"><span class="btn-close-form-lead"><i
                                    class="fa-regular fa-xmark"></i></span>
                        </div>
                        <div class="form-lead-title">Đăng ký nhận tư vấn</div>
                        <div class="d-flex form-lead-scroll" id="form-lead-scroll-1">
                            <div class="form-lead-label">Họ và tên</div>
                            <div class="form-lead-item form-item-name">
                                <i class="fa-regular fa-user"></i>
                                <input type="text" required id="fullname-1" placeholder="Họ và tên" />
                            </div>
                            <div class="form-lead-msg msg-name"></div>
                            <div class="form-lead-label">Email</div>
                            <div class="form-lead-item form-item-email">
                                <i class="fa-regular fa-envelope"></i>
                                <input type="email" required id="email-1" placeholder="Email" />
                            </div>
                            <div class="form-lead-msg msg-email"></div>
                            <div class="form-lead-label">Số điện thoại</div>
                            <div class="form-lead-item form-item-phone">
                                <i class="fa-regular fa-mobile-notch"></i>
                                <input type="text" maxlength="10" id="phone-1" required
                                    placeholder="Số điện thoại" />
                            </div>
                            <div class="form-lead-msg msg-phone"></div>
                            <div class="form-lead-label">Tỉnh/Thành phố</div>
                            <div class="form-lead-item form-item-city">
                                <i class="fa-regular fa-building"></i>
                                <select id="city-id-1" class="place_holder dropdown_select" required>
                                    <option value hidden>Chọn Tỉnh/Thành phố</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="2">Hồ Chí Minh</option>
                                    <option value="3">Bình Dương</option>
                                    <option value="4">Bắc Ninh</option>
                                    <option value="5">Đồng Nai</option>
                                    <option value="6">Hưng Yên</option>
                                    <option value="7">Hải Dương</option>
                                    <option value="8">Đà Nẵng</option>
                                    <option value="9">Hải Phòng</option>
                                    <option value="10">An Giang</option>
                                    <option value="11">Bà Rịa-Vũng Tàu</option>
                                    <option value="12">Bắc Giang</option>
                                    <option value="13">Bắc Kạn</option>
                                    <option value="14">Bạc Liêu</option>
                                    <option value="15">Bến Tre</option>
                                    <option value="16">Bình Định</option>
                                    <option value="17">Bình Phước</option>
                                    <option value="18">Bình Thuận</option>
                                    <option value="19">Cà Mau</option>
                                    <option value="20">Cần Thơ</option>
                                    <option value="21">Cao Bằng</option>
                                    <option value="22">Cửu Long</option>
                                    <option value="23">Đắk Lắk</option>
                                    <option value="24">Đắc Nông</option>
                                    <option value="25">Điện Biên</option>
                                    <option value="26">Đồng Tháp</option>
                                    <option value="27">Gia Lai</option>
                                    <option value="28">Hà Giang</option>
                                    <option value="29">Hà Nam</option>
                                    <option value="30">Hà Tĩnh</option>
                                    <option value="31">Hậu Giang</option>
                                    <option value="32">Hoà Bình</option>
                                    <option value="33">Khánh Hoà</option>
                                    <option value="34">Kiên Giang</option>
                                    <option value="35">Kon Tum</option>
                                    <option value="36">Lai Châu</option>
                                    <option value="37">Lâm Đồng</option>
                                    <option value="38">Lạng Sơn</option>
                                    <option value="39">Lào Cai</option>
                                    <option value="40">Long An</option>
                                    <option value="41">Miền Bắc</option>
                                    <option value="42">Miền Nam</option>
                                    <option value="43">Miền Trung</option>
                                    <option value="44">Nam Định</option>
                                    <option value="45">Nghệ An</option>
                                    <option value="46">Ninh Bình</option>
                                    <option value="47">Ninh Thuận</option>
                                    <option value="48">Phú Thọ</option>
                                    <option value="49">Phú Yên</option>
                                    <option value="50">Quảng Bình</option>
                                    <option value="51">Quảng Nam</option>
                                    <option value="52">Quảng Ngãi</option>
                                    <option value="53">Quảng Ninh</option>
                                    <option value="54">Quảng Trị</option>
                                    <option value="55">Sóc Trăng</option>
                                    <option value="56">Sơn La</option>
                                    <option value="57">Tây Ninh</option>
                                    <option value="58">Thái Bình</option>
                                    <option value="59">Thái Nguyên</option>
                                    <option value="60">Thanh Hoá</option>
                                    <option value="61">Thừa Thiên Huế</option>
                                    <option value="62">Tiền Giang</option>
                                    <option value="63">Toàn Quốc</option>
                                    <option value="64">Trà Vinh</option>
                                    <option value="65">Tuyên Quang</option>
                                    <option value="66">Vĩnh Long</option>
                                    <option value="67">Vĩnh Phúc</option>
                                    <option value="68">Yên Bái</option>
                                    <option value="100">Nước Ngoài</option>
                                </select>
                            </div>
                            <div class="form-lead-msg msg-city"></div>
                            <div class="form-lead-label">Nhu cầu tư vấn</div>
                            <div class="form-lead-item form-item-consulting">
                                <i class="fa-regular fa-square-question"></i>
                                <select id="consulting-type-1" class="place_holder dropdown_select" required>
                                    <option value hidden>Chọn nhu cầu tư vấn</option>
                                    <option value="1">Tôi muốn được đăng tin miễn phí</option>
                                    <option value="2">Tôi muốn được tìm hiểu thêm về các gói dịch vụ</option>
                                    <option value="3">Tôi muốn được biết thêm về các chương trình ưu đãi</option>
                                    <option value="4">Tôi muốn được hướng dẫn đăng ký tài khoản</option>
                                    <option value="5">Khác</option>
                                </select>
                            </div>
                            <div class="form-lead-item mt-3 other-consulting" id="other-consulting-1">
                                <textarea id="consulting-text-1" placeholder="Nhập nhu cầu tư vấn..." rows="3"></textarea>
                            </div>
                            <div class="form-lead-msg msg-consulting"></div>
                        </div>
                        <div class="form-footer-lead">
                            <button id="created-lead-1"><i class="fa-solid fa-paper-plane-top"></i>Gửi yêu cầu tư
                                vấn
                            </button>
                        </div>
                        <div class="suggest-post-job">
                            Bạn cần tuyển dụng gấp?
                            <a href="{{ route('job-postings.index') }}" target="_blank"
                                class="btn-post-job-free">Đăng tin miễn phí ngay</a>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    const heightForm = $(".right-banner-form").height();
                    if (heightForm) {
                        $(".left-banner-form").height(heightForm);
                    }
                });
            </script>
        </div>
        <div id="modal-form-lead-success">
            <div class="icon-top-form-lead"><span class="btn-close-form-lead"><i
                        class="fa-regular fa-xmark"></i></span></div>
            <div class="form-lead-success-container">
                <svg xmlns="http://www.w3.org/2000/svg" width="124" height="124" viewBox="0 0 124 124"
                    fill="none">
                    <g clip-path="url(#clip0_3204_98360)">
                        <circle opacity="0.3" cx="62" cy="62" r="62"
                            fill="url(#paint0_linear_3204_98360)" />
                        <circle cx="62" cy="62" r="48" fill="#00B14F" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M79.1081 49.9144C80.2973 51.1336 80.2973 53.1104 79.1081 54.3296L59.8378 74.0856C58.6487 75.3046 56.7209 75.3048 55.5316 74.0861L45.8924 64.2081C44.7029 62.9891 44.7025 61.0124 45.8915 59.7929C47.0805 58.5734 49.0086 58.573 50.1981 59.7919L57.684 67.4633L74.8014 49.9144C75.9907 48.6952 77.9188 48.6952 79.1081 49.9144Z"
                            fill="white" />
                    </g>
                    <defs>
                        <linearGradient id="paint0_linear_3204_98360" x1="62" y1="0" x2="62"
                            y2="124" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#59CA87" />
                            <stop offset="1" stop-color="#35AB65" stop-opacity="0" />
                        </linearGradient>
                        <clipPath id="clip0_3204_98360">
                            <rect width="124" height="124" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="success-msg">Đăng ký thành công!</div>
            <div class="success-des">
                TopCV sẽ liên hệ để tư vấn bạn trong thời gian sớm nhất. Nếu bạn cần hỗ trợ ngay, vui lòng liên hệ
                Hotline chăm
                sóc khách hàng.
            </div>
            <div class="support-footer-form">
                <div class="support-footer-form-item"
                    style="display: flex; align-items: center; border: 1px solid #D7DEE4; border-radius: 100px; padding: 12px 24px;">
                    <i class="fa-solid fa-phone" style="color: #00B14F; margin-right: 8px"></i>
                    <span>Hỗ trợ</span>
                    <a style="color: #00B14F; font-weight: 600; margin-left: 8px" href="tel:02471079799">(024)
                        71079799</a>
                </div>
                <div class="support-footer-form-item"
                    style="display: flex; align-items: center; border: 1px solid #D7DEE4; ; border-radius: 100px; padding: 12px 24px;">
                    <i class="fa-solid fa-phone" style="color: #00B14F; margin-right: 8px"></i>
                    <span>Hỗ trợ</span>
                    <a style="color: #00B14F; font-weight: 600; margin-left: 8px" href="tel:0862691929">0862
                        691929</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showPopupLead() {
            $("#mask-form-lead").fadeIn(500);
            document.body.style.overflow = 'hidden';
            const heightForm = $("#modal-form-lead .right-banner-form").height();
            if (heightForm) {
                $("#modal-form-lead .left-banner-form").height(heightForm);
            }
        }

        function hidePopupLead() {
            $("#mask-form-lead").fadeOut(500);
            document.body.style.overflow = 'scroll';
            $('#modal-form-lead').fadeIn(2000);
            $('#modal-form-lead-success').fadeOut();
        }
        $(document).ready(function() {
            $(".btn-close-form-lead").click(function(e) {
                e.preventDefault();
                hidePopupLead();
            });

            $('.show-modal-create-lead').click(function(e) {
                e.preventDefault();
                showPopupLead();
                window.ta?.('ClickGetAFreeConsultation')
            });
        });
    </script>
    <div id="floating-sp-mkt">
        <img id="close-img-sp-banner" src="{{ asset('images/mkt/floating_marketing.webp') }}" width="210" alt />
        <div id="close-img-sp">
            <img id="close-img-sp-icon" src="{{ asset('images/mkt/close_floating_support_mkt.webp') }}"
                width="24" alt />
        </div>
    </div>
    <script src="{{ asset('ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}"></script>
    <link rel="modulepreload" href="build/assets/header.d1ee4fe5.js" />
    <script type="module" src="build/assets/header.d1ee4fe5.js"></script>
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
