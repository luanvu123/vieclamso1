@extends('layout-recruitment')
@section('content')
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
        .container-service {
            display: flex;
            flex-direction: column;
        }

        .container-service-right {
            width: 100%;
            padding: 20px 0;
        }

        .container-service-left {
            width: 100%;
            padding: 20px 0;
            margin-left: 1px;
        }

        .top-job {
            display: grid;
            grid-gap: 20px;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-columns: 1fr;
        }

        .standard-plus {
            display: grid;
            grid-gap: 20px;
            grid-template-columns: repeat(2, 1fr);
            grid-auto-columns: 1fr;

            .item-standard {
                border-radius: 8px;
                box-shadow: 0 8px 16px 0 rgba(1, 18, 34, 0.06);
                background: #FFF;

                .header-item {
                    background: transparent;
                    color: #000;
                }

                .item-content {
                    display: grid;
                    grid-gap: 20px;
                    grid-template-columns: repeat(2, 1fr);
                    grid-auto-columns: 1fr;

                    .right {
                        .benefit-content {
                            margin-top: 0;
                        }
                    }
                }
            }
        }

        .top-job-item {
            background: #fff;
            box-shadow: 0 8px 16px 0 rgba(1, 18, 34, 0.06);
            border-radius: 8px;
        }

        .header-item {
            background: #212F3F;
            color: #fff;
            padding: 8px 20px 8px 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            line-height: 28px;
            letter-spacing: -0.18px;
            display: flex;
            position: relative;
            height: 48px;
        }

        .border-item-max {
            border-top: 4px solid #02833C;
        }

        .border-item-max-plus {
            border-top: 4px solid transparent;
            background: linear-gradient(#212F3F, #212F3F) padding-box,
                linear-gradient(to right, #1A6F8A, #0ACF4D) border-box;

            &>span {
                font-weight: bold;
                background: linear-gradient(276deg, #0ACF4D 4.03%, #19AFDF 93.14%);
                background-clip: text;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
        }

        .border-item-pro {
            border-top: 4px solid #3972F5;
        }

        .border-item-eco {
            border-top: 4px solid #FAB836;
        }

        .border-item-standard-combo {
            border-top: 4px solid #F7D377;
        }

        .border-item-standard {
            border-top: 4px solid #D7DEE4;
        }

        .item-standard {
            .border-item-standard-combo {
                border-top: 8px solid #F7D377;
            }

            .border-item-standard {
                border-top: 8px solid #D7DEE4;
            }

            .header-item {
                padding: 12px 20px 8px 20px;
            }
        }

        .item-content {
            padding: 14px 20px 32px 20px;
        }

        .text-price {
            color: #00b14f;
            font-size: 24px;
            font-weight: 600;
        }

        .text-vat {
            color: #5E6368;
            font-size: 12px;
            font-weight: 400;
        }

        .btn-contact {
            padding: 9px 16px;
            height: 40px;
            border-radius: 5px;
            border: 1px solid #00B14F;
            color: #00b14f;
            text-align: center;
            font-weight: 600;
            line-height: 22px;
            letter-spacing: 0.175px;
            margin-top: 20px;
            cursor: pointer;

            &:hover {
                background-color: #E5F7ED;
            }
        }

        .btn-contact-vip {
            color: #fff;
            background: #00b14f;
            border: 1px solid transparent;

            &:hover {
                background-color: #19B961;
            }
        }

        .benefit-content {
            margin-top: 16px;
        }

        .label-benefit {
            color: #5E6368;
            line-height: 22px;
            letter-spacing: 0.14px;
            text-transform: uppercase;
            font-weight: 300;
        }

        .text-benefit {
            color: #303235;
            font-weight: 400;
            line-height: 22px;
            letter-spacing: 0.14px;
        }

        .highlight-benefit {
            font-weight: 600;
            letter-spacing: 0.175px;
        }

        .top-job-title {
            color: #086A2F;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: -0.24px;
            line-height: 32px;
        }

        .top-job-subtitle {
            color: #086A2F;
            font-weight: 400;
            line-height: 150%;
            letter-spacing: 0.154px;
        }

        .img-benefit {
            height: 16px;
            width: 16px;
            margin-top: 3px;
        }

        .standard-title {
            color: #966D05;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: -0.24px;
            line-height: 32px;
        }

        .standard-subtitle {
            color: #966D05;
            font-weight: 400;
            line-height: 150%;
            letter-spacing: 0.154px;
        }

        .badge-vip {
            width: 45px;
            height: 22px;
            position: absolute;
            right: 0;
            top: 10px;
        }

        .badge-new {
            width: 37px;
            height: 22px;
            position: absolute;
            right: 0;
            top: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #F70;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            color: #fff;
        }

        .quantity-service {
            color: #868D94;
            font-weight: 600;
            line-height: 22px;
            letter-spacing: 0.175px;
            font-size: 14px;
        }

        @media only screen and (max-width: 414px) {
            .container-service {
                flex-direction: column;
            }

            .container-service-right {
                width: 100%;
                padding: 0 20px;
            }

            .top-job {
                grid-template-columns: 1fr;
                grid-auto-columns: 1fr;
            }

            .container-service-left {
                width: 100%;
                margin-left: unset;
                margin-top: 20px;
                padding: 0 20px;
            }
        }

        @media (max-width: 414px) or (max-width: 540px) or (max-width: 768px) {
            .container-service {
                flex-direction: column;
            }

            .container-service-right {
                width: 100%;
                padding: 0 20px;
            }

            .top-job {
                &> :nth-child(2) {
                    order: -1;
                }
            }

            .top-job,
            .standard-plus {
                grid-template-columns: 1fr;
                grid-auto-columns: 1fr;
            }

            .container-service-left {
                width: 100%;
                margin-left: unset;
                margin-top: 20px;
                padding: 0 20px;

                .standard-plus {
                    .item-standard {
                        .item-content {
                            display: block;

                            .right {
                                .benefit-content {
                                    margin-top: 16px;
                                }
                            }
                        }
                    }
                }
            }
        }

        #btn-compare-benefit {
            padding: 10px 36px;
            border-radius: 5px;
            border: 1px solid #00B14F;
            color: #00B14F;
            cursor: pointer;
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
        .compare-benefits {
            display: none;
        }

        .compare-benefits tr {
            border: 1px solid #FFFFFF;
        }

        .compare-benefits tbody tr:hover {
            border: 1px solid #00B14F;
            background: linear-gradient(90deg, #E5F7ED 0%, #FFF 100%);
        }

        .compare-benefits tbody tr:hover td {
            border-top: 1px solid #00B14F;
        }

        .compare-benefits tr>td {
            border-left: 1px solid #E8EDF2;
        }

        .compare-benefits tr>td:last-child {
            border-right: 1px solid #E8EDF2;
        }

        .compare-benefits tbody tr:hover>td:first-child {
            border-left: none;
        }

        .compare-benefits tbody tr:hover>td:last-child {
            border-right: none;
        }

        .benefit-slick-shadow .slick-dots,
        .benefit-slick-content .slick-dots {
            top: 180px;
        }

        .benefit-slick-shadow .slick-list,
        .benefit-slick-content .slick-list {
            margin-top: 0;
        }

        .benefit-slick-shadow .slick-dots {
            display: none !important;
        }

        .compare-benefits .icon-slide-gift {
            top: 255px !important;
        }

        .clone-header {
            position: fixed;
            z-index: 100;
            width: 100%;
            top: 68px;
            left: 0;
            right: 0;
            margin: auto;
            display: block;
        }

        .clone-header .reward-title {
            border-radius: unset;
        }

        .top-max-plus {
            border-top: 4px solid transparent !important;
            background: linear-gradient(#212F3F, #212F3F) padding-box,
                linear-gradient(to right, #1A6F8A, #0ACF4D) border-box !important;

            &>span {
                font-weight: bold;
                background: linear-gradient(276deg, #0ACF4D 4.03%, #19AFDF 93.14%);
                background-clip: text;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
        }

        #modal-addon-visual-mask {
            position: fixed;
            z-index: 200;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            /*display: none;*/
            top: 0;
            right: 0;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        #modal-addon-visual {
            position: relative;
        }
    </style>
    <style>
        .left-banner-form {
            background-image: url("https://tuyendung.topcv.vn/images/banner_form_bg.png");
            height: 100%;
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
            border-bottom-left-radius: 10px;
            border-top-left-radius: 10px;
        }

        .center-banner-form {
            background-image: url("https://tuyendung.topcv.vn/images/banner_form_center.png");
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
                background-image: url("https://tuyendung.topcv.vn/images/banner_form_bg.png");
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


    <script>
        document.getElementById("mb-menu-btn").addEventListener("click", function() {
            const isShow = document.getElementById("mb-menu").classList.contains('block');

            if (isShow) {
                document.getElementById("mb-menu").classList.remove('block');
                document.getElementById("mb-menu").classList.add('hidden');
                document.querySelector('.language-switcher-mobile').classList.add('hidden');
                document.querySelector('.language-switcher-mobile').classList.remove('block');
            } else {
                document.getElementById("mb-menu").classList.remove('hidden');
                document.getElementById("mb-menu").classList.add('block');
                document.querySelector('.language-switcher-mobile').classList.add('block');
                document.querySelector('.language-switcher-mobile').classList.remove('hidden');
            }
        });
    </script>

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
    <div class="bg-primary bg-cover bg-center text-white">
        <a href="https://tuyendung.topcv.vn/app/coupons" id="banner-top">
            <img id="banner-cskh-10" class="w-full" src-pc=" https://static.topcv.vn/banners/kwWBMZ24FrXEdZ5FMwtg.jpg"
                src-mb=" https://static.topcv.vn/banners/AX5jOGEBALxHh5Wvzjo1.jpg" title=""
                alt="sales campaign banner" />
        </a>
    </div>
    <script>
        const $bannerCSKH = document.getElementById("banner-cskh-10");

        function reponsiveBanner(maxWith) {
            if (maxWith.matches) {
                $bannerCSKH.setAttribute("src", $bannerCSKH.getAttribute('src-mb'));
            } else {
                $bannerCSKH.setAttribute("src", $bannerCSKH.getAttribute('src-pc'));
            }
        }
        let RpsBanner = window.matchMedia("(max-width: 767px)");
        reponsiveBanner(RpsBanner);
        RpsBanner.addListener(reponsiveBanner);

        document.getElementById("banner-top").addEventListener("click", function(e) {
            ta('ClickToBannerQuoteTop')
        })
    </script>
    <div class="bg-primary hidden bg-cover bg-center text-white"
        style="background-image: url(https://static.topcv.vn/srp/website/images/pricing_page/bao-gia-top-banner.png);">
        <div class="md:py-20 lg:px-0 px-3 py-5 w-container bg-repeat-x relative">
            <div>
                <div class="uppercase mb-3 text-[15px]">smart recruitment Platform</div>
                <div class="mb-3 md:text-[30px] text-[19px] font-medium">Bảng giá dịch vụ tuyển dụng</div>
                <div class="md:text-[19px] text-[15px] font-light">Mang đến trải nghiệm công nghệ tuyển dụng
                    &amp; dịch vụ đáng tin cậy cho doanh nghiệp</div>
            </div>
            <div class="absolute bottom-0 right-0 hidden md:block">
                <img src="https://static.topcv.vn/srp/website/images/pricing_page/hong.png" alt="pg with laptop"
                    style="width: 247px;" />
            </div>
        </div>
    </div>
    <div class="bg-white md:py-10 lg:px-0 py-5">
        <div class="w-container mx-auto">
            <div class="px-[20px] lg:px-0">
                <div class="uppercase mb-3 text-gray-600"><span class="text-primary font-normal md:font-light">TOP JOBS
                        &amp; STANDARD PLUS</span>
                </div>
                <div class="mb-[10px] text-[14px] md:text-[24px] border-l-4 border-primary px-2"><span
                        class="font-semibold">Đăng tin tuyển dụng</span></div>
                <div class="md:text-[14px] font-light mb-[28px] text-color-light">Cộng hưởng sức mạnh công nghệ
                    tạo ra hiệu quả đột phá cho tin tuyển dụng của Doanh nghiệp</div>
            </div>
            <div class="container-service">
                <div class="container-service-right">
                    <div style="padding-bottom: 20px">
                        <div class="top-job-title">Top Jobs</div>
                        <div class="top-job-subtitle">Đăng tin tuyển dụng Hiệu suất cao</div>
                    </div>
                    <div class="top-job">
                        <div class="top-job-item item-job">
                            <div class="header-item border-item-max">
                                <span>TOP MAX</span>
                                <img class="badge-vip" src="https://tuyendung.topcv.vn/images/badge/vip.png"
                                    alt="badge" />
                            </div>
                            <div class="item-content">
                                <div>
                                    <span class="text-price">7,500,000</span>
                                    <span class="text-primary font-weight-700">VNĐ</span>
                                </div>
                                <div class="text-vat">* Giá trên chưa bao gồm VAT</div>
                                <div class="btn-contact ">
                                    Liên hệ tư vấn
                                </div>
                                <div class="benefit-content">
                                    <div class="label-benefit">Quyền lợi đặc biệt</div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit">Hiển thị trong <span class="highlight-benefit">Box
                                                Việc làm tốt nhất</span></span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit">Ưu tiên hiển thị trong <span
                                                class="highlight-benefit">tất cả danh sách việc
                                                làm</span></span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit"><span class="highlight-benefit">07 lần
                                                đẩy TOP</span> khung giờ vàng</span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit"><span class="highlight-benefit">Đề
                                                xuất CV</span> bởi AI</span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit"><span class="highlight-benefit">Thông
                                                báo việc làm phù hợp </span> với ứng viên</span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit"><span class="highlight-benefit">Được
                                                bảo hành dịch vụ</span> với nhiều quyền lợi ưu tiên</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="top-job-item item-job">
                            <div class="header-item border-item-max-plus">
                                <span>TOP MAX PLUS</span>
                                <img class="badge-vip" src="https://tuyendung.topcv.vn/images/badge/vip_plus.png"
                                    alt="badge" />
                            </div>
                            <div class="item-content">
                                <div>
                                    <span class="text-price">9,650,000</span>
                                    <span class="text-primary font-weight-700">VNĐ</span>
                                </div>
                                <div class="text-vat">* Giá trên chưa bao gồm VAT</div>
                                <div class="btn-contact btn-contact-vip">
                                    Liên hệ tư vấn
                                </div>
                                <div class="benefit-content">
                                    <div class="label-benefit">Quyền lợi đặc biệt</div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit">Hiển thị trong <span class="highlight-benefit">Box
                                                Việc làm tốt nhất</span></span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit">Ưu tiên hiển thị trong <span
                                                class="highlight-benefit">tất cả danh sách việc
                                                làm</span></span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit"><span class="highlight-benefit">14 lần
                                                đẩy TOP</span> khung giờ vàng</span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit"><span class="highlight-benefit">Đề
                                                xuất CV</span> bởi AI</span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit"><span class="highlight-benefit">Thông
                                                báo việc làm phù hợp </span> với ứng viên</span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit"><span class="highlight-benefit">Được
                                                bảo hành dịch vụ</span> với nhiều quyền lợi ưu tiên</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="top-job-item item-job">
                            <div class="header-item border-item-pro">
                                <span>TOP PRO</span>
                            </div>
                            <div class="item-content">
                                <div>
                                    <span class="text-price">5,440,000</span>
                                    <span class="text-primary font-weight-700">VNĐ</span>
                                </div>
                                <div class="text-vat">* Giá trên chưa bao gồm VAT</div>
                                <div class="btn-contact ">
                                    Liên hệ tư vấn
                                </div>
                                <div class="benefit-content">
                                    <div class="label-benefit">Quyền lợi đặc biệt</div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit">Hiển thị trong <span class="highlight-benefit">Box
                                                Việc làm hấp dẫn</span></span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit">Ưu tiên hiển thị trong <span
                                                class="highlight-benefit">Top đề xuất việc làm</span></span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit"><span class="highlight-benefit">03 lần
                                                đẩy TOP</span> khung giờ vàng</span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit"><span class="highlight-benefit">Đề
                                                xuất CV</span> bởi AI</span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit"><span class="highlight-benefit">Thông
                                                báo việc làm phù hợp </span> với ứng viên</span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit"><span class="highlight-benefit">Được
                                                bảo hành dịch vụ</span> với nhiều quyền lợi</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="top-job-item item-job">
                            <div class="header-item border-item-eco">
                                <span>TOP ECO PLUS</span>
                            </div>
                            <div class="item-content">
                                <div>
                                    <span class="text-price">4,400,000</span>
                                    <span class="text-primary font-weight-700">VNĐ</span>
                                </div>
                                <div class="text-vat">* Giá trên chưa bao gồm VAT</div>
                                <div class="btn-contact ">
                                    Liên hệ tư vấn
                                </div>
                                <div class="benefit-content">
                                    <div class="label-benefit">Quyền lợi đặc biệt</div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit">Ưu tiên hiển thị trong <span
                                                class="highlight-benefit">Top Việc làm liên quan</span></span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit"><span class="highlight-benefit">01 lần
                                                đẩy TOP</span> khung giờ vàng</span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit"><span class="highlight-benefit">Đề
                                                xuất CV</span> bởi AI</span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit"><span class="highlight-benefit">Thông
                                                báo việc làm phù hợp </span> với ứng viên</span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 12px">
                                        <img class="img-benefit" src="https://tuyendung.topcv.vn/images/icons/check.png"
                                            alt="icon" />
                                        <span class="ml-2 text-benefit"><span class="highlight-benefit">Được
                                                bảo hành dịch vụ</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-service-left">
                    <div style="padding-bottom: 20px">
                        <div class="standard-title">Standard Plus</div>
                        <div class="standard-subtitle">Đăng tin tuyển dụng Tiết kiệm</div>
                    </div>
                    <div class="standard-plus">
                        <div class="item-standard">
                            <div class="header-item border-item-standard-combo">
                                <div style="position: absolute;">
                                    <span>STANDARD PLUS COMBO</span>
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="left">
                                    <div>
                                        <span class="text-price">1,800,000</span>
                                        <span class="text-primary font-weight-700">VNĐ</span>
                                        <span class="quantity-service">/ 3 tin</span>
                                        <div class="text-vat">* Giá trên chưa bao gồm VAT</div>

                                    </div>
                                    <div class="btn-contact">
                                        Liên hệ tư vấn
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="benefit-content">
                                        <div class="label-benefit">Quyền lợi đặc biệt</div>
                                        <div class="d-flex" style="margin-top: 12px">
                                            <img class="img-benefit"
                                                src="https://tuyendung.topcv.vn/images/icons/check.png" alt="icon" />
                                            <span class="ml-2 text-benefit"><span class="highlight-benefit">Ưu
                                                    tiên hiển thị trên Tin Standard</span> (dưới tin Top Jobs)
                                                trên các danh sách việc làm</span>
                                        </div>
                                        <div class="d-flex" style="margin-top: 12px">
                                            <img class="img-benefit"
                                                src="https://tuyendung.topcv.vn/images/icons/check.png" alt="icon" />
                                            <span class="ml-2 text-benefit"><span class="highlight-benefit">Đề
                                                    xuất CV</span> bởi AI</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-[40px] mx-[20px]">
                <div id="btn-compare-benefit" class="md:inline-block md:w-[268px] hover:bg-[#E5F7ED]">So sánh
                    quyền lợi <i id="icon-compare-benefit" class="fas fa-chevron-down ml-1"></i></div>
            </div>
            <div id="compare-benefits">
                <div class="compare-benefits bg-white md:py-10 pl-[20px] pr-0 lg:px-0 py-5">
                    <div class="w-container mx-auto ">
                        <div class="mb-[40px] text-[24px] border-l-4 border-primary px-2 compare-benefits-name">
                            <span class="font-semibold">So sánh quyền lợi</span>
                        </div>
                        <table class="font-semibold w-full text-left hidden md:block text-[14px] shadow-xs">
                            <thead>
                                <tr>
                                    <td scope="col" class="px-5 py-4"></td>
                                    <td scope="col" class="px-[12px] w-[160px] pb-[16px]">
                                        <div class="text-center">
                                            <div class="relative my-[8px] overflow-hidden">
                                                <div class="top-max-plus relative rounded-[8px] h-[56px] flex items-center justify-center"
                                                    style="
                    background-color: #212F3F;
                    border-top: 4px solid #0BD261;
                    border-bottom: none;
                    border-left: none;
                    border-right: none;
                    ">
                                                    <span class="text-[14px] leading-[22px]" style="color: #FFFFFF">TOP
                                                        MAX PLUS </span>
                                                </div>
                                            </div>
                                            <div
                                                class="text-[16px] mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                <span style="color: #00B14F">9,650,000 VNĐ</span>
                                            </div>
                                            <button type="button"
                                                class="contact-now bg-primary text-[14px] py-[9px] text-[#FFF] border-solid border-[1px] border-transparent rounded-[5px] w-full hover:bg-[#19B961]">
                                                Liên hệ ngay
                                            </button>
                                        </div>
                                    </td>
                                    <td scope="col" class="px-[12px] w-[160px] pb-[16px]">
                                        <div class="text-center">
                                            <div class="relative my-[8px] overflow-hidden">
                                                <div class=" relative rounded-[8px] h-[56px] flex items-center justify-center"
                                                    style="
                    background-color: #212F3F;
                    border-top: 4px solid #0BD261;
                    border-bottom: none;
                    border-left: none;
                    border-right: none;
                    ">
                                                    <span class="text-[14px] leading-[22px]" style="color: #FFFFFF">TOP
                                                        MAX</span>
                                                </div>
                                            </div>
                                            <div
                                                class="text-[16px] mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                <span style="color: #00B14F">7,500,000 VNĐ</span>
                                            </div>
                                            <button type="button"
                                                class="contact-now text-[14px] py-[9px] text-[#00B14F] border-solid border-[1px] border-[#00B14F] rounded-[5px] w-full hover:bg-[#E5F7ED]">
                                                Liên hệ ngay
                                            </button>
                                        </div>
                                    </td>
                                    <td scope="col" class="px-[12px] w-[160px] pb-[16px]">
                                        <div class="text-center">
                                            <div class="relative my-[8px] overflow-hidden">
                                                <div class=" relative rounded-[8px] h-[56px] flex items-center justify-center"
                                                    style="
                    background-color: #212F3F;
                    border-top: 4px solid #3974F9;
                    border-bottom: none;
                    border-left: none;
                    border-right: none;
                    ">
                                                    <span class="text-[14px] leading-[22px]" style="color: #FFFFFF">TOP
                                                        PRO</span>
                                                </div>
                                            </div>
                                            <div
                                                class="text-[16px] mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                <span style="color: #00B14F">5,440,000 VNĐ</span>
                                            </div>
                                            <button type="button"
                                                class="contact-now text-[14px] py-[9px] text-[#00B14F] border-solid border-[1px] border-[#00B14F] rounded-[5px] w-full hover:bg-[#E5F7ED]">
                                                Liên hệ ngay
                                            </button>
                                        </div>
                                    </td>
                                    <td scope="col" class="px-[12px] w-[160px] pb-[16px]">
                                        <div class="text-center">
                                            <div class="relative my-[8px] overflow-hidden">
                                                <div class=" relative rounded-[8px] h-[56px] flex items-center justify-center"
                                                    style="
                    background-color: #212F3F;
                    border-top: 4px solid #FAB835;
                    border-bottom: none;
                    border-left: none;
                    border-right: none;
                    ">
                                                    <span class="text-[14px] leading-[22px]" style="color: #FFFFFF">TOP
                                                        ECO PLUS</span>
                                                </div>
                                            </div>
                                            <div
                                                class="text-[16px] mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                <span style="color: #00B14F">4,400,000 VNĐ</span>
                                            </div>
                                            <button type="button"
                                                class="contact-now text-[14px] py-[9px] text-[#00B14F] border-solid border-[1px] border-[#00B14F] rounded-[5px] w-full hover:bg-[#E5F7ED]">
                                                Liên hệ ngay
                                            </button>
                                        </div>
                                    </td>
                                    <td scope="col" class="px-[12px] w-[160px] pb-[16px]">
                                        <div class="text-center">
                                            <div class="relative my-[8px] overflow-hidden">
                                                <div class=" relative rounded-[8px] h-[56px] flex items-center justify-center"
                                                    style="
                    background-color: #212F3F;
                    border-top: 4px solid #F7D377;
                    border-bottom: none;
                    border-left: none;
                    border-right: none;
                    ">
                                                    <span class="text-[14px] leading-[22px]"
                                                        style="color: #FFFFFF">STANDARD PLUS COMBO</span>
                                                </div>
                                            </div>
                                            <div
                                                class="text-[16px] mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                <span style="color: #00B14F; white-space: nowrap">1,800,000
                                                    VNĐ</span><span
                                                    style="font-size: 12px; color: #868D94; line-height: 16px; white-space: nowrap">/
                                                    3 tin</span>
                                            </div>
                                            <button type="button"
                                                class="contact-now text-[14px] py-[9px] text-[#00B14F] border-solid border-[1px] border-[#00B14F] rounded-[5px] w-full hover:bg-[#E5F7ED]">
                                                Liên hệ ngay
                                            </button>
                                        </div>
                                    </td>
                                    <td scope="col" class="px-[12px] w-[160px] pb-[16px]">
                                        <div class="text-center">
                                            <div class="relative my-[8px] overflow-hidden">
                                                <div class=" relative rounded-[8px] h-[56px] flex items-center justify-center"
                                                    style="
                    background-color: #FFFFFF;
                    border-top: 4px solid #D7DEE4;
                    border-bottom: 1px solid #D7DEE4;
                    border-left: 1px solid #D7DEE4;
                    border-right: 1px solid #D7DEE4;
                    ">
                                                    <span class="text-[14px] leading-[22px]"
                                                        style="color: #303235">STANDARD</span>
                                                </div>
                                            </div>
                                            <div
                                                class="text-[16px] mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                <span style="color: #868D94">Miễn phí</span>
                                            </div>
                                            <button type="button"
                                                class="contact-now text-[14px] py-[9px] text-[#00B14F] border-solid border-[1px] border-[#00B14F] rounded-[5px] w-full hover:bg-[#E5F7ED]">
                                                Liên hệ ngay
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">Thời gian hiển
                                        thị tin</td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">30 ngày</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">30 ngày</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">30 ngày</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">30 ngày</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">30 ngày</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">30 ngày</span></td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">Thời gian hiệu
                                        lực của dịch vụ</td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">02 tuần</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">02 tuần</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">02 tuần</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">02 tuần</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">02 tuần</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] text-[16px] text-[#00B14F]">Quyền lợi</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">Tặng Credits</td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">500 Credits</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">500 Credits</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">300 Credits</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">200 Credits</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">Box việc làm nổi
                                        bật</td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">Việc làm tốt nhất</span>
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">Việc làm tốt nhất</span>
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">Việc làm hấp dẫn</span>
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] text-[16px] text-[#00B14F]">Vị trí hiển thị
                                        ưu tiên/ Top Impression</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">Hiển thị trong
                                        TOP đề xuất việc làm phù hợp</td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #00B14F; font-weight: 600">Nền xanh</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #00B14F; font-weight: 600">Nền xanh</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">Hiển thị trong
                                        TOP đề xuất việc làm theo CV</td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #00B14F; font-weight: 600">Nền xanh</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #00B14F; font-weight: 600">Nền xanh</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #00B14F; font-weight: 600">Nền xanh</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">Hiển thị trong
                                        TOP đề xuất việc làm liên quan</td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #00B14F; font-weight: 600">Nền xanh</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #00B14F; font-weight: 600">Nền xanh</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #00B14F; font-weight: 600">Nền xanh</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #00B14F; font-weight: 600">Nền xanh</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">
                                        <div style="color: #D99F0D; font-weight: 600">Nền vàng</div>
                                        <div style="font-weight: 400; font-size: 12px; color: #303235">(Dưới
                                            Nền xanh)</div>
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">Hiển thị trong
                                        TOP kết quả tìm kiếm việc làm có nền nổi bật</td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #00B14F; font-weight: 600">Nền xanh</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #00B14F; font-weight: 600">Nền xanh</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #00B14F; font-weight: 600">Nền xanh</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #00B14F; font-weight: 600">Nền xanh</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">
                                        <div style="color: #D99F0D; font-weight: 600">Nền vàng</div>
                                        <div style="font-weight: 400; font-size: 12px; color: #303235">(Dưới
                                            Nền xanh)</div>
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] text-[16px] text-[#00B14F]">Đẩy top tự động
                                        hàng tuần/ Re-Top</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">Đẩy top khung giờ
                                        vàng</td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">14 lần</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">7 lần</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">3 lần</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">1 lần</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">Đẩy top khung giờ
                                        thường</td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">14 lần</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">7 lần</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">5 lần</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            style="color: #303235; font-weight: 600">3 lần</span></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] text-[16px] text-[#00B14F]">
                                        <div>
                                            Thông báo việc làm/ Top Job Alert
                                            <div class="group relative md:inline-block">
                                                <i class="fa-light fa-circle-info btn-info-notify"
                                                    style="font-size: 14px; color: #5E6368; cursor: pointer"></i>
                                                <div class="hidden group-hover:grid absolute shadow-lg rounded-lg w-[224px] z-[50] md:left-[-101px] left-[-30px]"
                                                    style="padding: 8px; background: #000; color: #fff; font-size: 12px; font-weight: 400; bottom: 25px;">
                                                    Tin tuyển dụng được nằm trong danh sách đề xuất gửi thông
                                                    báo tới ứng viên tiềm năng qua email / ứng dụng di động
                                                    TopCV (hệ thống AI tự động gửi theo danh sách đề xuất nếu
                                                    tin tuyển dụng phù hợp với ứng viên)
                                                    <span class="absolute md:left-0 left-[-70px]" style="bottom: -5px">
                                                        <svg width="215" height="6" viewBox="0 0 215 6"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M107.5 6L101.5 -1.04907e-06L113.5 0L107.5 6Z"
                                                                fill="black" fill-opacity="0.9" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center text-[#A8AFB6] font-medium"><i class="fas fa-check fa-fw"
                                            style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center text-[#A8AFB6] font-medium"><i class="fas fa-check fa-fw"
                                            style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center text-[#A8AFB6] font-medium"><i class="fas fa-check fa-fw"
                                            style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center text-[#A8AFB6] font-medium"><i class="fas fa-check fa-fw"
                                            style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center text-[#A8AFB6] font-medium">--</td>
                                    <td class="text-center text-[#A8AFB6] font-medium">--</td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] text-[16px] text-[#00B14F]">Tính năng</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">Tính năng CV đề
                                        xuất bởI AI</td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">Kích hoạt dịch vụ
                                        cộng thêm Top Add-ons</td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">Tiêu đề tin nâng
                                        cao</td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">
                                        <div>
                                            Add-on visual
                                            <div class='group relative md:inline-block'>
                                                <i class='fa-light fa-circle-info add-on-visual-tooltip'
                                                    style='font-size: 14px; color: #5E6368; cursor: pointer'></i>
                                                <div class='hidden md:group-hover:grid bg-white absolute shadow-lg rounded-lg md:w-[380px] w-[350px] z-[50] top-[-159px] md:left-[20px] left-[-17px]'
                                                    style='padding: 16px; box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.10);'>
                                                    <div class='flex flex-col mb-[8px]'>
                                                        <p class='font-bold text-[16px]' style='color: #000'>
                                                            Add-on Visual</p>
                                                        <p style='font-size: 14px; font-weight: 400'>Bổ sung
                                                            Hình ảnh/Video giúp thông tin công ty được hiển thị
                                                            chuyên nghiệp hơn</p>
                                                        <a class='text-[14px] text-primary' target='_blank'
                                                            href='https://tuyendung.topcv.vn/help/cac-cau-hoi-thuong-gap/goi-dich-vu-add-on-visual-la-gi-loi-ich-khi-su-dung-dich-vu-add-on-visual/'>Xem
                                                            chi tiết <i class='fa-light fa-chevron-right'></i></a>
                                                    </div>
                                                    <a><img src='https://tuyendung.topcv.vn/images/banner_addon.png'
                                                            style='width: 100%' alt='banner' /></a>
                                                    <span class='absolute hidden lg:block'
                                                        style='top: 163px; left: -6px;'>
                                                        <svg xmlns='http://www.w3.org/2000/svg' width='6'
                                                            height='12' viewBox='0 0 6 12' fill='none'>
                                                            <path d='M4.52987e-07 6L6 4.52987e-07L6 12L4.52987e-07 6Z'
                                                                fill='white' />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] text-[16px] text-[#00B14F]">Bảo hành dịch vụ
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]"><span
                                            class="font-bold underline underline-offset-2">Điều kiện:</span>
                                        Tin đăng chạy dịch vụ có dưới X lượt ứng tuyển trong thời gian chạy dịch
                                        vụ</td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            class="text-black font-light">Dưới <span class="font-bold">15</span></span>
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            class="text-black font-light">Dưới <span class="font-bold">15</span></span>
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            class="text-black font-light">Dưới <span class="font-bold">12</span></span>
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><span
                                            class="text-black font-light">Dưới <span class="font-bold">10</span></span>
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">Hiển thị trong
                                        TOP kết quả tìm kiếm việc làm có nền xanh và hình ảnh nổi bật trong 2
                                        tuần</td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">
                                        <p>Kích hoạt Top Add-on trong 2 tuần</p>
                                        <p class="text-[12px] font-light">(nếu tin đăng có sử dụng Top Add-on
                                            ngay trước đó)</p>
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">Kích hoạt CV đề
                                        xuất trong 1 tuần</td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-[16px] py-[8px] font-medium text-[#5E6368]">Tặng 350 Credits
                                        vào tài khoản khuyến mãi</td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium"><i
                                            class="fas fa-check fa-fw" style="font-size: 20px; color: #00B14F"></i></td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                    <td class="text-center px-[16px] py-[8px] text-[#A8AFB6] font-medium">--
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="main_reward shadow-xs md:hidden">
                            <div id="clone-pricing-box" class="content clone-header pl-[20px] pr-[6px]">
                                <div class="flex" style="background: #fff">
                                    <div class="reward-title shadow-xs">
                                        <div class="img-reward" style="height: 205px">
                                        </div>
                                    </div>
                                    <div class="reward-content">
                                        <div class="benefit-slick-shadow">
                                            <div>
                                                <div class="px-[12px] pb-[16px] pt-[8px] mb-[20px]">
                                                    <div class="text-center">
                                                        <div class="relative rounded-[8px] overflow-hidden">
                                                            <div class="top-max-plus relative h-[56px] flex items-center justify-center"
                                                                style="
                            background-color: #212F3F;
                            border-top: 4px solid #0BD261;
                            border-bottom: none;
                            border-left: none;
                            border-right: none;
                            border-radius: 0;
                            padding-inline: 4px;
                            ">
                                                                <span class="text-[14px]" style="color: #FFFFFF">TOP MAX
                                                                    PLUS </span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-[16px] mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                            <span style="color: #00B14F">9,650,000 VNĐ</span>
                                                        </div>
                                                        <button type="button"
                                                            class="contact-now text-[14px] py-[9px] border-solid border-[1px] border-[#00B14F] rounded-[5px] w-full  bg-[#00B14F] text-[#FFFFFF] ">
                                                            Liên hệ ngay
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="px-[12px] pb-[16px] pt-[8px] mb-[20px]">
                                                    <div class="text-center">
                                                        <div class="relative rounded-[8px] overflow-hidden">
                                                            <div class=" relative h-[56px] flex items-center justify-center"
                                                                style="
                            background-color: #212F3F;
                            border-top: 4px solid #0BD261;
                            border-bottom: none;
                            border-left: none;
                            border-right: none;
                            border-radius: 0;
                            padding-inline: 4px;
                            ">
                                                                <span class="text-[14px]" style="color: #FFFFFF">TOP
                                                                    MAX</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-[16px] mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                            <span style="color: #00B14F">7,500,000 VNĐ</span>
                                                        </div>
                                                        <button type="button"
                                                            class="contact-now text-[14px] py-[9px] border-solid border-[1px] border-[#00B14F] rounded-[5px] w-full  bg-white text-[#00B14F] ">
                                                            Liên hệ ngay
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="px-[12px] pb-[16px] pt-[8px] mb-[20px]">
                                                    <div class="text-center">
                                                        <div class="relative rounded-[8px] overflow-hidden">
                                                            <div class=" relative h-[56px] flex items-center justify-center"
                                                                style="
                            background-color: #212F3F;
                            border-top: 4px solid #3974F9;
                            border-bottom: none;
                            border-left: none;
                            border-right: none;
                            border-radius: 0;
                            padding-inline: 4px;
                            ">
                                                                <span class="text-[14px]" style="color: #FFFFFF">TOP
                                                                    PRO</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-[16px] mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                            <span style="color: #00B14F">5,440,000 VNĐ</span>
                                                        </div>
                                                        <button type="button"
                                                            class="contact-now text-[14px] py-[9px] border-solid border-[1px] border-[#00B14F] rounded-[5px] w-full  bg-white text-[#00B14F] ">
                                                            Liên hệ ngay
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="px-[12px] pb-[16px] pt-[8px] mb-[20px]">
                                                    <div class="text-center">
                                                        <div class="relative rounded-[8px] overflow-hidden">
                                                            <div class=" relative h-[56px] flex items-center justify-center"
                                                                style="
                            background-color: #212F3F;
                            border-top: 4px solid #FAB835;
                            border-bottom: none;
                            border-left: none;
                            border-right: none;
                            border-radius: 0;
                            padding-inline: 4px;
                            ">
                                                                <span class="text-[14px]" style="color: #FFFFFF">TOP ECO
                                                                    PLUS</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-[16px] mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                            <span style="color: #00B14F">4,400,000 VNĐ</span>
                                                        </div>
                                                        <button type="button"
                                                            class="contact-now text-[14px] py-[9px] border-solid border-[1px] border-[#00B14F] rounded-[5px] w-full  bg-white text-[#00B14F] ">
                                                            Liên hệ ngay
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="px-[12px] pb-[16px] pt-[8px] mb-[20px]">
                                                    <div class="text-center">
                                                        <div class="relative rounded-[8px] overflow-hidden">
                                                            <div class=" relative h-[56px] flex items-center justify-center"
                                                                style="
                            background-color: #212F3F;
                            border-top: 4px solid #F7D377;
                            border-bottom: none;
                            border-left: none;
                            border-right: none;
                            border-radius: 0;
                            padding-inline: 4px;
                            ">
                                                                <span class="text-[14px]" style="color: #FFFFFF">STANDARD
                                                                    PLUS
                                                                    COMBO</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-[16px] mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                            <span style="color: #00B14F; white-space: nowrap">1,800,000
                                                                VNĐ</span><span
                                                                style="font-size: 12px; color: #868D94; line-height: 16px; white-space: nowrap">/
                                                                3 tin</span>
                                                        </div>
                                                        <button type="button"
                                                            class="contact-now text-[14px] py-[9px] border-solid border-[1px] border-[#00B14F] rounded-[5px] w-full  bg-white text-[#00B14F] ">
                                                            Liên hệ ngay
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="px-[12px] pb-[16px] pt-[8px] mb-[20px]">
                                                    <div class="text-center">
                                                        <div class="relative rounded-[8px] overflow-hidden">
                                                            <div class=" relative h-[56px] flex items-center justify-center"
                                                                style="
                            background-color: #FFFFFF;
                            border-top: 4px solid #D7DEE4;
                            border-bottom: 1px solid #D7DEE4;
                            border-left: 1px solid #D7DEE4;
                            border-right: 1px solid #D7DEE4;
                            border-radius: 8px;
                            padding-inline: 4px;
                            ">
                                                                <span class="text-[14px]"
                                                                    style="color: #303235">STANDARD</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="text-[16px] mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                            <span style="color: #868D94">Miễn phí</span>
                                                        </div>
                                                        <button type="button"
                                                            class="contact-now text-[14px] py-[9px] border-solid border-[1px] border-[#00B14F] rounded-[5px] w-full  bg-white text-[#00B14F] ">
                                                            Liên hệ ngay
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="pricing-box" class="content">
                                <div class="flex">
                                    <div class="reward-title shadow-xs">
                                        <div class="img-reward" style="height: 205px">
                                        </div>
                                        <div class="list font-normal">
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 60px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        Thời gian hiển thị tin
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 60px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        Thời gian hiệu lực của dịch vụ
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 60px; align-items: center">
                                                    <div class="text-primary font-semibold leading-[22px]">
                                                        Quyền lợi
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 60px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        Tặng Credits
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 60px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        Box việc làm nổi bật
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 60px; align-items: center">
                                                    <div class="text-primary font-semibold leading-[22px]">
                                                        Vị trí hiển thị ưu tiên/ Top Impression
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 80px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        Hiển thị trong TOP đề xuất việc làm phù hợp
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 80px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        Hiển thị trong TOP đề xuất việc làm theo CV
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 80px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        Hiển thị trong TOP đề xuất việc làm liên quan
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 100px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        Hiển thị trong TOP kết quả tìm kiếm việc làm có nền nổi
                                                        bật
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 60px; align-items: center">
                                                    <div class="text-primary font-semibold leading-[22px]">
                                                        Đẩy top tự động hàng tuần/ Re-Top
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 60px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        Đẩy top khung giờ vàng
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 60px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        Đẩy top khung giờ thường
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 100px; align-items: center">
                                                    <div class="text-primary font-semibold leading-[22px]">
                                                        <div>
                                                            Thông báo việc làm/ Top Job Alert
                                                            <div class="group relative md:inline-block">
                                                                <i class="fa-light fa-circle-info btn-info-notify"
                                                                    style="font-size: 14px; color: #5E6368; cursor: pointer"></i>
                                                                <div class="hidden group-hover:grid absolute shadow-lg rounded-lg w-[224px] z-[50] md:left-[-101px] left-[-30px]"
                                                                    style="padding: 8px; background: #000; color: #fff; font-size: 12px; font-weight: 400; bottom: 25px;">
                                                                    Tin tuyển dụng được nằm trong danh sách đề
                                                                    xuất gửi thông báo tới ứng viên tiềm năng
                                                                    qua email / ứng dụng di động TopCV (hệ thống
                                                                    AI tự động gửi theo danh sách đề xuất nếu
                                                                    tin tuyển dụng phù hợp với ứng viên)
                                                                    <span class="absolute md:left-0 left-[-70px]"
                                                                        style="bottom: -5px">
                                                                        <svg width="215" height="6"
                                                                            viewBox="0 0 215 6" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M107.5 6L101.5 -1.04907e-06L113.5 0L107.5 6Z"
                                                                                fill="black" fill-opacity="0.9" />
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 60px; align-items: center">
                                                    <div class="text-primary font-semibold leading-[22px]">
                                                        Tính năng
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 60px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        Tính năng CV đề xuất bởI AI
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 80px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        Kích hoạt dịch vụ cộng thêm Top Add-ons
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 60px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        Tiêu đề tin nâng cao
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 60px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        <div>
                                                            Add-on visual
                                                            <div class='group relative md:inline-block'>
                                                                <i class='fa-light fa-circle-info add-on-visual-tooltip'
                                                                    style='font-size: 14px; color: #5E6368; cursor: pointer'></i>
                                                                <div class='hidden md:group-hover:grid bg-white absolute shadow-lg rounded-lg md:w-[380px] w-[350px] z-[50] top-[-159px] md:left-[20px] left-[-17px]'
                                                                    style='padding: 16px; box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.10);'>
                                                                    <div class='flex flex-col mb-[8px]'>
                                                                        <p class='font-bold text-[16px]'
                                                                            style='color: #000'>Add-on Visual
                                                                        </p>
                                                                        <p style='font-size: 14px; font-weight: 400'>
                                                                            Bổ sung Hình ảnh/Video giúp thông
                                                                            tin công ty được hiển thị chuyên
                                                                            nghiệp hơn</p>
                                                                        <a class='text-[14px] text-primary'
                                                                            target='_blank'
                                                                            href='https://tuyendung.topcv.vn/help/cac-cau-hoi-thuong-gap/goi-dich-vu-add-on-visual-la-gi-loi-ich-khi-su-dung-dich-vu-add-on-visual/'>Xem
                                                                            chi tiết <i
                                                                                class='fa-light fa-chevron-right'></i></a>
                                                                    </div>
                                                                    <a><img src='https://tuyendung.topcv.vn/images/banner_addon.png'
                                                                            style='width: 100%' alt='banner' /></a>
                                                                    <span class='absolute hidden lg:block'
                                                                        style='top: 163px; left: -6px;'>
                                                                        <svg xmlns='http://www.w3.org/2000/svg'
                                                                            width='6' height='12'
                                                                            viewBox='0 0 6 12' fill='none'>
                                                                            <path
                                                                                d='M4.52987e-07 6L6 4.52987e-07L6 12L4.52987e-07 6Z'
                                                                                fill='white' />
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 40px; align-items: center">
                                                    <div class="text-primary font-semibold leading-[22px]">
                                                        Bảo hành dịch vụ
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 130px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        <span class="font-bold underline underline-offset-2">Điều
                                                            kiện:</span> Tin đăng chạy dịch vụ có dưới X lượt
                                                        ứng tuyển trong thời gian chạy dịch vụ
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 130px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        Hiển thị trong TOP kết quả tìm kiếm việc làm có nền xanh
                                                        và hình ảnh nổi bật trong 2 tuần
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 100px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        <p>Kích hoạt Top Add-on trong 2 tuần</p>
                                                        <p class="text-[12px] font-light">(nếu tin đăng có sử
                                                            dụng Top Add-on ngay trước đó)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 80px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        Kích hoạt CV đề xuất trong 1 tuần
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block">
                                                <div class="d-flex py-[12px] px-[16px]"
                                                    style="height: 80px; align-items: center">
                                                    <div class="text-[#5E6368] leading-[22px]">
                                                        Tặng 350 Credits vào tài khoản khuyến mãi
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="reward-content">
                                        <img class="icon-slide-gift" src="https://tuyendung.topcv.vn/images/gift-icon.gif"
                                            alt="icon gift">
                                        <div class="benefit-slick-content">
                                            <div>
                                                <div class="px-[12px] pb-[16px] pt-[8px] mb-[20px]" style="height: 185px">
                                                    <div class="text-center">
                                                        <div class="relative rounded-[8px] overflow-hidden">
                                                            <div class="top-max-plus relative h-[56px] flex items-center justify-center"
                                                                style="
                            background-color: #212F3F;
                            border-top: 4px solid #0BD261;
                            border-bottom: none;
                            border-left: none;
                            border-right: none;
                            border-radius: 0;
                            padding-inline: 4px;
                            ">
                                                                <span class="text-[14px]" style="color: #FFFFFF">TOP MAX
                                                                    PLUS
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class=" mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                            <span style="color: #00B14F">9,650,000 VNĐ</span>
                                                        </div>
                                                        <div
                                                            class="contact-now text-[14px] py-[9px] border-solid border-[1px] border-[#00B14F] rounded-[5px] w-full  btn-contact-vip ">
                                                            Liên hệ ngay
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="reward-list">
                                                    <div class="list">
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">30
                                                                        ngày</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">02
                                                                        tuần</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">500
                                                                        Credits</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">Việc
                                                                        làm tốt nhất</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #00B14F; font-weight: 600">Nền
                                                                        xanh</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #00B14F; font-weight: 600">Nền
                                                                        xanh</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #00B14F; font-weight: 600">Nền
                                                                        xanh</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #00B14F; font-weight: 600">Nền
                                                                        xanh</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">14
                                                                        lần</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">14
                                                                        lần</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 40px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 130px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        class="text-black font-light">Dưới
                                                                        <span class="font-bold">15</span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 130px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="px-[12px] pb-[16px] pt-[8px] mb-[20px]"
                                                    style="height: 185px">
                                                    <div class="text-center">
                                                        <div class="relative rounded-[8px] overflow-hidden">
                                                            <div class=" relative h-[56px] flex items-center justify-center"
                                                                style="
                            background-color: #212F3F;
                            border-top: 4px solid #0BD261;
                            border-bottom: none;
                            border-left: none;
                            border-right: none;
                            border-radius: 0;
                            padding-inline: 4px;
                            ">
                                                                <span class="text-[14px]" style="color: #FFFFFF">TOP
                                                                    MAX</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class=" mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                            <span style="color: #00B14F">7,500,000 VNĐ</span>
                                                        </div>
                                                        <div
                                                            class="contact-now text-[14px] py-[9px] border-solid border-[1px] border-[#00B14F] rounded-[5px] w-full ">
                                                            Liên hệ ngay
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="reward-list">
                                                    <div class="list">
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">30
                                                                        ngày</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">02
                                                                        tuần</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">500
                                                                        Credits</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">Việc
                                                                        làm tốt nhất</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #00B14F; font-weight: 600">Nền
                                                                        xanh</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #00B14F; font-weight: 600">Nền
                                                                        xanh</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #00B14F; font-weight: 600">Nền
                                                                        xanh</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #00B14F; font-weight: 600">Nền
                                                                        xanh</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">7
                                                                        lần</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">7
                                                                        lần</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 40px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 130px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        class="text-black font-light">Dưới
                                                                        <span class="font-bold">15</span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 130px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="px-[12px] pb-[16px] pt-[8px] mb-[20px]"
                                                    style="height: 185px">
                                                    <div class="text-center">
                                                        <div class="relative rounded-[8px] overflow-hidden">
                                                            <div class=" relative h-[56px] flex items-center justify-center"
                                                                style="
                            background-color: #212F3F;
                            border-top: 4px solid #3974F9;
                            border-bottom: none;
                            border-left: none;
                            border-right: none;
                            border-radius: 0;
                            padding-inline: 4px;
                            ">
                                                                <span class="text-[14px]" style="color: #FFFFFF">TOP
                                                                    PRO</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class=" mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                            <span style="color: #00B14F">5,440,000 VNĐ</span>
                                                        </div>
                                                        <div
                                                            class="contact-now text-[14px] py-[9px] border-solid border-[1px] border-[#00B14F] rounded-[5px] w-full ">
                                                            Liên hệ ngay
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="reward-list">
                                                    <div class="list">
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">30
                                                                        ngày</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">02
                                                                        tuần</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">300
                                                                        Credits</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">Việc
                                                                        làm hấp dẫn</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #00B14F; font-weight: 600">Nền
                                                                        xanh</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #00B14F; font-weight: 600">Nền
                                                                        xanh</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #00B14F; font-weight: 600">Nền
                                                                        xanh</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">3
                                                                        lần</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">5
                                                                        lần</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 40px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 130px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        class="text-black font-light">Dưới
                                                                        <span class="font-bold">12</span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 130px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="px-[12px] pb-[16px] pt-[8px] mb-[20px]"
                                                    style="height: 185px">
                                                    <div class="text-center">
                                                        <div class="relative rounded-[8px] overflow-hidden">
                                                            <div class=" relative h-[56px] flex items-center justify-center"
                                                                style="
                            background-color: #212F3F;
                            border-top: 4px solid #FAB835;
                            border-bottom: none;
                            border-left: none;
                            border-right: none;
                            border-radius: 0;
                            padding-inline: 4px;
                            ">
                                                                <span class="text-[14px]" style="color: #FFFFFF">TOP ECO
                                                                    PLUS</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class=" mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                            <span style="color: #00B14F">4,400,000 VNĐ</span>
                                                        </div>
                                                        <div
                                                            class="contact-now text-[14px] py-[9px] border-solid border-[1px] border-[#00B14F] rounded-[5px] w-full ">
                                                            Liên hệ ngay
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="reward-list">
                                                    <div class="list">
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">30
                                                                        ngày</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">02
                                                                        tuần</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">200
                                                                        Credits</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #00B14F; font-weight: 600">Nền
                                                                        xanh</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #00B14F; font-weight: 600">Nền
                                                                        xanh</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">1
                                                                        lần</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">3
                                                                        lần</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 40px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 130px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        class="text-black font-light">Dưới
                                                                        <span class="font-bold">10</span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 130px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="px-[12px] pb-[16px] pt-[8px] mb-[20px]"
                                                    style="height: 185px">
                                                    <div class="text-center">
                                                        <div class="relative rounded-[8px] overflow-hidden">
                                                            <div class=" relative h-[56px] flex items-center justify-center"
                                                                style="
                            background-color: #212F3F;
                            border-top: 4px solid #F7D377;
                            border-bottom: none;
                            border-left: none;
                            border-right: none;
                            border-radius: 0;
                            padding-inline: 4px;
                            ">
                                                                <span class="text-[14px]"
                                                                    style="color: #FFFFFF">STANDARD PLUS
                                                                    COMBO</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class=" mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                            <span style="color: #00B14F; white-space: nowrap">1,800,000
                                                                VNĐ</span><span
                                                                style="font-size: 12px; color: #868D94; line-height: 16px; white-space: nowrap">/
                                                                3 tin</span>
                                                        </div>
                                                        <div
                                                            class="contact-now text-[14px] py-[9px] border-solid border-[1px] border-[#00B14F] rounded-[5px] w-full ">
                                                            Liên hệ ngay
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="reward-list">
                                                    <div class="list">
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">30
                                                                        ngày</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">02
                                                                        tuần</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px">
                                                                    <div style="color: #D99F0D; font-weight: 600">
                                                                        Nền vàng</div>
                                                                    <div
                                                                        style="font-weight: 400; font-size: 12px; color: #303235">
                                                                        (Dưới Nền xanh)</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px">
                                                                    <div style="color: #D99F0D; font-weight: 600">
                                                                        Nền vàng</div>
                                                                    <div
                                                                        style="font-weight: 400; font-size: 12px; color: #303235">
                                                                        (Dưới Nền xanh)</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><i
                                                                        class="fas fa-check fa-fw"
                                                                        style="font-size: 20px; color: #00B14F"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 40px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 130px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 130px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="px-[12px] pb-[16px] pt-[8px] mb-[20px]"
                                                    style="height: 185px">
                                                    <div class="text-center">
                                                        <div class="relative rounded-[8px] overflow-hidden">
                                                            <div class=" relative h-[56px] flex items-center justify-center"
                                                                style="
                            background-color: #FFFFFF;
                            border-top: 4px solid #D7DEE4;
                            border-bottom: 1px solid #D7DEE4;
                            border-left: 1px solid #D7DEE4;
                            border-right: 1px solid #D7DEE4;
                            border-radius: 8px;
                            padding-inline: 4px;
                            ">
                                                                <span class="text-[14px]"
                                                                    style="color: #303235">STANDARD</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class=" mt-[8px] h-[56px] flex items-center justify-center font-bold font-Inter">
                                                            <span style="color: #868D94">Miễn phí</span>
                                                        </div>
                                                        <div
                                                            class="contact-now text-[14px] py-[9px] border-solid border-[1px] border-[#00B14F] rounded-[5px] w-full ">
                                                            Liên hệ ngay
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="reward-list">
                                                    <div class="list">
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"><span
                                                                        style="color: #303235; font-weight: 600">30
                                                                        ngày</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 60px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 40px; align-items: center">
                                                                <div style="line-height: 22px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 130px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 130px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 100px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                        <div class="block justify-center">
                                                            <div class="d-flex py-[12px] align-items-center"
                                                                style="height: 80px; align-items: center">
                                                                <div style="line-height: 22px">--</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" px-[20px] md:flex md:justify-center mt-[24px]">
                        <div class="relative flex md:gap-[12px] gap-[8px] items-center md:flex-row  flex-col ">
                            <div
                                class="bg-white rounded text-primary text-center font-[14px] md:leading-[24px] leading-[22px] font-semibold md:px-[24px] md:py-[10px] px-[16px] py-[9px] border-[1px] border-primary show-modal-create-lead hover:bg-[#E5F7ED] hover:cursor-pointer w-full md:w-fit">
                                Tư vấn tuyển dụng
                            </div>
                            <a href="https://tuyendung.topcv.vn/app/register" target="_blank"
                                class="bg-primary md:px-[24px] md:py-[10px] px-[16px] py-[9px] rounded text-white text-center border-[1px] border-primary font-[14px] md:leading-[24px] leading-[22px] font-semibold hover:bg-[#19B961] w-full md:w-fit btn-post-job-free">
                                Đăng tin miễn phí
                            </a>
                        </div>
                    </div>
                </div>

                <div id="modal-addon-visual-mask" style="display: none">
                    <div id="modal-addon-visual">
                        <div class="close absolute top-[10px] right-[12px] cursor-pointer w-[16px] h-[16px]">
                            <i class="fa-light fa-times fa-fw"></i>
                        </div>
                        <div class='bg-white shadow-lg rounded-lg md:w-[380px] w-[350px] z-[50] top-[-159px] md:left-[20px] left-[-17px]'
                            style='padding: 16px; box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.10);'>
                            <div class='flex flex-col mb-[8px]'>
                                <p class='font-bold text-[16px]' style='color: #000'>Add-on Visual</p>
                                <p style='font-size: 14px; font-weight: 400'>Bổ sung Hình ảnh/Video giúp thông
                                    tin công ty được hiển thị chuyên nghiệp hơn</p>
                                <a class='text-[14px] text-primary' target='_blank'
                                    href='https://tuyendung.topcv.vn/help/cac-cau-hoi-thuong-gap/goi-dich-vu-add-on-visual-la-gi-loi-ich-khi-su-dung-dich-vu-add-on-visual/'>Xem
                                    chi tiết <i class='fa-light fa-chevron-right'></i></a>
                            </div>
                            <a><img src='https://tuyendung.topcv.vn/images/banner_addon.png' style='width: 100%'
                                    alt='banner' /></a>
                        </div>
                    </div>
                </div>


                <script>
                    const slickShadow = $('.benefit-slick-shadow').slick({
                        infinite: true,
                        speed: 300,
                        slidesToShow: 1,
                        adaptiveHeight: true,
                        prevArrow: false,
                        nextArrow: false,
                    }).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                        const tmp = nextSlide - currentSlide
                        if (tmp === 1 || tmp < -1) {
                            slickContent.slick('slickNext')
                        }
                        if (tmp === -1 || tmp > 1) {
                            slickContent.slick('slickPrev')
                        }
                    });

                    const slickContent = $('.benefit-slick-content').slick({
                        dots: true,
                        infinite: true,
                        speed: 300,
                        slidesToShow: 1,
                        adaptiveHeight: false,
                        prevArrow: false,
                        nextArrow: false,
                    }).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                        const tmp = nextSlide - currentSlide
                        if (tmp === 1 || tmp < -1) {
                            slickShadow.slick('slickNext')
                        }
                        if (tmp === -1 || tmp > 1) {
                            slickShadow.slick('slickPrev')
                        }
                    });

                    $(document).ready(function() {
                        $(this).scroll(function() {
                            const element = $('#pricing-box');
                            const distanceFromTop = element?.offset()?.top - $(window).scrollTop();

                            const distanceFromBottom = distanceFromTop + element.height();
                            if (distanceFromTop <= 68 && distanceFromBottom >= 68 + 185) {
                                $("#clone-pricing-box").css("display", "block")
                                slickShadow.slick('refresh')
                            } else {
                                $("#clone-pricing-box").css("display", "none")
                            }
                        });
                    })

                    $('.add-on-visual-tooltip').on('touchstart', function(e) {
                        e.stopPropagation();
                        e.preventDefault();
                        $('#modal-addon-visual-mask').show();
                    });

                    $('#modal-addon-visual-mask .close').click(function() {
                        $('#modal-addon-visual-mask').hide();
                    });

                    $('.contact-now').click(function(event) {
                        event.preventDefault()
                        window.open('https://tuyendung.topcv.vn/app/dashboard?show_contact=1', '_blank')
                    })
                </script>
            </div>
            <a href="https://tuyendung.topcv.vn/app/coupons">
                <div class="mt-[50px] container-banner-combo">
                    <img class="w-full" src="https://static.topcv.vn/banners/TjGj6eKQ9nixcjaPT1kx.jpg"
                        alt="Discount combo banner">
                </div>
            </a>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.btn-contact').click(function(event) {
                event.preventDefault()
                window.open('https://tuyendung.topcv.vn/app/dashboard?show_contact=1', '_blank')
            })

            $('#btn-compare-benefit').click(function(event) {
                event.preventDefault()
                const isHidden = $('#icon-compare-benefit').hasClass('fas fa-chevron-down ml-1')
                if (isHidden) {
                    $('#icon-compare-benefit').attr('class', 'fas fa-chevron-up ml-1')
                    $('.compare-benefits').show()
                    slickContent.slick('refresh')
                } else {
                    $('#icon-compare-benefit').attr('class', 'fas fa-chevron-down ml-1')
                    $('.compare-benefits').hide()
                }
            })
        });

        $(document).ready(function() {
            const hash = window.location.hash;

            if (hash.includes('#compare-benefits')) {
                $('#icon-compare-benefit').attr('class', 'fas fa-chevron-up ml-1')
                $('.compare-benefits').show()
                slickContent.slick('refresh')
                $('#compare-benefits')[0].scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    </script>
    <div class="bg-white p-[20px]" id="top-credit">
        <div class="w-container mx-auto">
            <div class="md:hidden">
                <div class="uppercase mb-3 text-gray-600"><span class="text-primary font-normal md:font-light">TOP
                        Credit</span></div>
                <div class="mb-[10px] text-[18px] md:text-[24px] border-l-4 border-primary px-2"><span
                        class="font-semibold">Nạp Credit mở hồ sơ ứng viên</span> </div>
                <div class="md:text-[14px] font-light mb-[28px] text-color-light">Chủ động kết nối trực tiếp
                    với ứng viên tài năng, gia tăng cơ hội tuyển dụng thành công</div>
            </div>

            <div class="grid md:grid-cols-3 md:gap-10 grid-cols-1 gap-6 md:mt-12">
                <div class="md:block flex items-center justify-center py-3 md:py-0">
                    <img class="block max-w-[218px] md:max-w-full" src="https://tuyendung.topcv.vn/images/credit.png"
                        alt="top credit">
                </div>

                <div class="md:col-span-2 grid content-center">
                    <div class="hidden md:block">
                        <div class="uppercase mb-3 text-gray-600"><span class="text-primary font-light">TOP
                                Credit</span></div>
                        <div class="mb-3 text-[24px] border-l-4 border-primary px-2"><span class="font-semibold">Nạp
                                Credit mở hồ sơ ứng viên</span> </div>
                        <div class="md:text-[14px] font-light mb-[28px] text-color-light">Chủ động kết nối
                            trực tiếp với ứng viên tài năng, gia tăng cơ hội tuyển dụng thành công</div>
                    </div>

                    <div class="grid md:grid-cols-2 md:gap-[40px] md:pb-6 grid-cols-1 gap-[20px] pt-[48px]">
                        <div
                            class="bg-white flex flex-col items-center rounded-[16px] md:rounded-[8px] relative p-[24px] shadow-2xl">
                            <p class="absolute top-[-4px] w-[217px] h-[8px] bg-[#DA6500] rounded-lg"></p>
                            <div class="flex text-[18px]">
                                <p class="font-semibold">1000 Credit</p>
                                <div class='ml-4 group relative hidden md:inline-block'>
                                    <i class='fa-solid text-zinc-400 fa-circle-question'></i>
                                    <div
                                        class='hidden group-hover:grid bg-white absolute shadow-lg rounded-lg h-[525px] w-[435px] z-50'>
                                        <img src=https://static.topcv.vn/srp/website/images/pricing_page/credit_1000.png
                                            alt='Credit 1000'>
                                        <div class='p-5'>
                                            <div class='flex items-center mt-[8px]'>
                                                <img class='w-[16px] h-[16px]'
                                                    src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                                    alt='Credit 1000'>
                                                <p class='text-[14px] ml-3'>Nạp <span class='font-bold'>1000</span>
                                                    credit</p>
                                            </div>
                                            <div class='flex items-center mt-[8px]'>
                                                <img class='w-[16px] h-[16px]'
                                                    src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                                    alt='Credit 1000'>
                                                <p class='text-[14px] ml-3'>Mỗi lượt mở hồ sơ tiêu tốn số
                                                    credit tương ứng theo chất
                                                    lượng hồ sơ</p>
                                            </div>
                                            <div class='flex items-center mt-[8px]'>
                                                <img class='w-[16px] h-[16px]'
                                                    src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                                    alt='Credit 1000'>
                                                <p class='text-[14px] ml-3'>Tặng kèm Công cụ Search CV Pro</p>
                                            </div>
                                            <div class='flex items-center mt-[8px]'>
                                                <img class='w-[16px] h-[16px]'
                                                    src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                                    alt='Credit 1000'>
                                                <p class='text-[14px] ml-3'>Hỗ trợ tài liệu HR</p>
                                            </div>
                                            <div class='flex items-center mt-[8px]'>
                                                <img class='w-[16px] h-[16px]'
                                                    src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                                    alt='Credit 1000'>
                                                <p class='text-[14px] ml-3'>Livechat & Hotline 24/7</p>
                                            </div>
                                            <div class='flex items-center mt-[8px]'>
                                                <img class='w-[16px] h-[16px]'
                                                    src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                                    alt='Credit 1000'>
                                                <p class='text-[14px] ml-3'>Hoàn 100% điểm credit đã dùng với
                                                    hồ sơ bị sai thông tin
                                                    liên hệ</p>
                                            </div>
                                            <div class='flex items-center mt-[8px]'>
                                                <img class='w-[16px] h-[16px]'
                                                    src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                                    alt='Credit 1000'>
                                                <p class='text-[14px] ml-3'>Hoàn 50% điểm credit đã dùng với
                                                    hồ sơ bị sai trạng thái
                                                    tìm việc</p>
                                            </div>
                                            <div class='flex items-center mt-[8px]'>
                                                <a class='text-[14px] ml-3 text-primary' target='_blank'
                                                    href='https://tuyendung.topcv.vn/help/cac-cau-hoi-thuong-gap/goi-dich-vu-1000-credit-la-gi/ '>Xem
                                                    chi tiết <i class='fa-light fa-angles-right'></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="pt-3 font-semibold"><span class="text-lg text-[24px] text-primary">
                                    3,000,000 VNĐ
                                </span> / <span class="font-semibold text-[16px]">04 tuần</span></p>
                            <p class="mt-[8px] text-[12px] font-light">( Giá trên chưa bao gồm VAT )</p>
                            <a class="mt-[16px] text-center  underline text-primary font-semibold"
                                href="https://tuyendung.topcv.vn/help/cac-cau-hoi-thuong-gap/quy-dinh-bu-hoan-diem-xem-o-dau/"
                                target="_blank">Có cơ chế hoàn điểm</a>
                        </div>
                        <div
                            class="bg-white flex flex-col items-center rounded-[16px] md:rounded-[8px] relative p-[24px] shadow-2xl">
                            <p class="absolute top-[-4px] w-[217px] h-[8px] bg-[#00B850] rounded-lg"></p>
                            <div class="flex text-[18px]">
                                <p class="font-semibold">3000 Credit</p>
                                <div class='ml-4 group relative hidden md:inline-block'>
                                    <i class='fa-solid text-zinc-400 fa-circle-question'></i>
                                    <div
                                        class='hidden group-hover:grid bg-white absolute right-0 shadow-lg rounded-lg h-[525px] w-[435px] z-50'>
                                        <img src=https://static.topcv.vn/srp/website/images/pricing_page/credit_1000.png
                                            alt='Credit 3000'>
                                        <div class='p-5'>
                                            <div class='flex items-center mt-[8px]'>
                                                <img class='w-[16px] h-[16px]'
                                                    src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                                    alt='Credit 3000'>
                                                <p class='text-[14px] ml-3'>Nạp <span class='font-bold'>3000</span>
                                                    credit</p>
                                            </div>
                                            <div class='flex items-center mt-[8px]'>
                                                <img class='w-[16px] h-[16px]'
                                                    src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                                    alt='Credit 3000'>
                                                <p class='text-[14px] ml-3'>Mỗi lượt mở hồ sơ tiêu tốn số
                                                    credit tương ứng theo chất
                                                    lượng hồ sơ</p>
                                            </div>
                                            <div class='flex items-center mt-[8px]'>
                                                <img class='w-[16px] h-[16px]'
                                                    src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                                    alt='Credit 3000'>
                                                <p class='text-[14px] ml-3'>Tặng kèm Công cụ Search CV Pro</p>
                                            </div>
                                            <div class='flex items-center mt-[8px]'>
                                                <img class='w-[16px] h-[16px]'
                                                    src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                                    alt='Credit 3000'>
                                                <p class='text-[14px] ml-3'>Hỗ trợ tài liệu HR</p>
                                            </div>
                                            <div class='flex items-center mt-[8px]'>
                                                <img class='w-[16px] h-[16px]'
                                                    src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                                    alt='Credit 3000'>
                                                <p class='text-[14px] ml-3'>Livechat & Hotline 24/7</p>
                                            </div>
                                            <div class='flex items-center mt-[8px]'>
                                                <img class='w-[16px] h-[16px]'
                                                    src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                                    alt='Credit 3000'>
                                                <p class='text-[14px] ml-3'>Hoàn 100% điểm credit đã dùng với
                                                    hồ sơ bị sai thông tin
                                                    liên hệ</p>
                                            </div>
                                            <div class='flex items-center mt-[8px]'>
                                                <img class='w-[16px] h-[16px]'
                                                    src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                                    alt='Credit 3000'>
                                                <p class='text-[14px] ml-3'>Hoàn 50% điểm credit đã dùng với
                                                    hồ sơ bị sai trạng thái
                                                    tìm việc</p>
                                            </div>
                                            <div class='flex items-center mt-[8px]'>
                                                <a class='text-[14px] ml-3 text-primary' target='_blank'
                                                    href='https://tuyendung.topcv.vn/help/cac-cau-hoi-thuong-gap/goi-dich-vu-3000-credit-la-gi/'>Xem
                                                    chi tiết <i class='fa-light fa-angles-right'></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="pt-3 font-semibold"><span class="text-lg text-[24px] text-primary">
                                    6,000,000 VNĐ
                                </span> / <span class="font-semibold text-[16px]">12 tuần</span></p>
                            <p class="mt-[8px] text-[12px] font-light">( Giá trên chưa bao gồm VAT )</p>
                            <a class="mt-[16px] text-center  underline text-primary font-semibold"
                                href="https://tuyendung.topcv.vn/help/cac-cau-hoi-thuong-gap/quy-dinh-bu-hoan-diem-xem-o-dau/"
                                target="_blank">Có cơ chế hoàn điểm</a>
                        </div>
                    </div>
                    <div class="mt-[24px]">
                        <div class="relative flex md:gap-[12px] gap-[8px] items-center md:flex-row  flex-col ">
                            <div
                                class="bg-white rounded text-primary text-center font-[14px] md:leading-[24px] leading-[22px] font-semibold md:px-[24px] md:py-[10px] px-[16px] py-[9px] border-[1px] border-primary show-modal-create-lead hover:bg-[#E5F7ED] hover:cursor-pointer w-full md:w-fit">
                                Tư vấn tuyển dụng
                            </div>
                            <a href="https://tuyendung.topcv.vn/app/register" target="_blank"
                                class="bg-primary md:px-[24px] md:py-[10px] px-[16px] py-[9px] rounded text-white text-center border-[1px] border-primary font-[14px] md:leading-[24px] leading-[22px] font-semibold hover:bg-[#19B961] w-full md:w-fit btn-post-job-free">
                                Đăng tin miễn phí
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-[#F4F5F5] p-[20px] md:p-[40px]" id="top-add-on">
        <div class="w-container mx-auto">
            <div class="uppercase mb-3 text-gray-600"><span class="text-primary font-normal md:font-light">Top
                    add-on</span></div>
            <div class="mb-[10px] text-[18px] md:text-[24px] border-l-4 border-primary px-2"><span
                    class="font-semibold">Dịch vụ cộng thêm</span> </div>
            <div class="md:text-[14px] font-light mb-[28px] text-color-light">Thêm tùy chọn giúp tin tuyển
                dụng nổi bật hơn với ứng viên</div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-[20px] mb-[32px] md:gap-[40px]">
                <div class="bg-white flex flex-col items-center rounded-[8px] p-[1.55rem] shadow-2xl relative">
                    <p class="absolute top-[-4px] w-[155px] h-[8px] bg-[#0EA5E9] rounded-lg"></p>
                    <div class="text-[18px]">
                        <span class="font-semibold">Add-on Value</span>
                        <div class='ml-4 group relative hidden md:inline-block'>
                            <i class='fa-solid text-zinc-400 fa-circle-question'></i>
                            <div class='hidden group-hover:grid bg-white absolute shadow-lg rounded-lg w-[400px] z-50'>
                                <img src=https://static.topcv.vn/srp/website/images/pricing_page/addon_value.png
                                    alt='Add-on Value'>
                                <div class='p-5'>
                                    <div class='flex items-center mt-[8px]'>
                                        <p class='font-bold text-[14px] ml-3'>Add-on Value</p>
                                    </div>
                                    <div class='flex items-center mt-[8px]'>
                                        <a class='text-[14px] ml-3 text-primary' target='_blank'
                                            href='https://tuyendung.topcv.vn/help/cac-cau-hoi-thuong-gap/goi-dich-vu-add-on-value-la-gi-loi-ich-khi-su-dung-dich-vu-add-on-value/'>Xem
                                            chi tiết <i class='fa-light fa-angles-right'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="pt-3 pb-1 text-lg text-[24px] font-semibold text-primary">2,000,000 VNĐ</p>
                    <p class="mt-[8px] text-[12px] font-light">( Giá trên chưa bao gồm VAT )</p>
                    <p class="mt-[16px] text-center md:text-[14px] font-light">Hiển thị 3 lý do để apply vào
                        job trên box tin của khách hàng tại trang tìm kiếm việc làm và trên đầu trang chi tiết
                        việc làm</p>
                </div>
                <div class="bg-white flex flex-col items-center rounded-[8px] p-[1.55rem] shadow-2xl relative">
                    <p class="absolute top-[-4px] w-[155px] h-[8px] bg-[#3B82F6] rounded-lg"></p>
                    <div class="text-[18px]">
                        <span class="font-semibold">Add-on Label: Gấp</span>
                        <div class='ml-4 group relative hidden md:inline-block'>
                            <i class='fa-solid text-zinc-400 fa-circle-question'></i>
                            <div class='hidden group-hover:grid bg-white absolute shadow-lg rounded-lg w-[400px] z-50'>
                                <img src=https://static.topcv.vn/srp/website/images/pricing_page/addon-label-gap.png
                                    alt='Add-on Label: Gấp'>
                                <div class='p-5'>
                                    <div class='flex items-center mt-[8px]'>
                                        <p class='font-bold text-[14px] ml-3'>Add-on Label: Gấp</p>
                                    </div>
                                    <div class='flex items-center mt-[8px]'>
                                        <a class='text-[14px] ml-3 text-primary' target='_blank'
                                            href='https://tuyendung.topcv.vn/help/cac-cau-hoi-thuong-gap/goi-dich-vu-add-on-label-gap-la-gi/'>Xem
                                            chi tiết <i class='fa-light fa-angles-right'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="pt-3 pb-1 text-lg text-[24px] font-semibold text-primary">1,000,000 VNĐ</p>
                    <p class="mt-[8px] text-[12px] font-light">( Giá trên chưa bao gồm VAT )</p>
                    <p class="mt-[16px] text-center md:text-[14px] font-light">Tin tuyển dụng được gắn nhãn
                        <span class="font-semibold">GẤP</span> vào tiêu đề tin
                    </p>
                </div>
                <div class="bg-white flex flex-col items-center rounded-[8px] p-[1.55rem] shadow-2xl relative">
                    <p class="absolute top-[-4px] w-[155px] h-[8px] bg-[#EAB308] rounded-lg"></p>
                    <div class="text-[18px]">
                        <span class="font-semibold">Add-on Label: Hot</span>
                        <div class='ml-4 group relative hidden md:inline-block'>
                            <i class='fa-solid text-zinc-400 fa-circle-question'></i>
                            <div class='hidden group-hover:grid bg-white absolute shadow-lg rounded-lg w-[400px] z-50'>
                                <img src=https://static.topcv.vn/srp/website/images/pricing_page/addon-label-hot.png
                                    alt='Add-on Label: Hot'>
                                <div class='p-5'>
                                    <div class='flex items-center mt-[8px]'>
                                        <p class='font-bold text-[14px] ml-3'>Add-on Label: Hot</p>
                                    </div>
                                    <div class='flex items-center mt-[8px]'>
                                        <a class='text-[14px] ml-3 text-primary' target='_blank'
                                            href='https://tuyendung.topcv.vn/help/cac-cau-hoi-thuong-gap/goi-dich-vu-add-on-label-hot-la-gi/'>Xem
                                            chi tiết <i class='fa-light fa-angles-right'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="pt-3 pb-1 text-lg text-[24px] font-semibold text-primary">1,000,000 VNĐ</p>
                    <p class="mt-[8px] text-[12px] font-light">( Giá trên chưa bao gồm VAT )</p>
                    <p class="mt-[16px] text-center md:text-[14px] font-light">Tin tuyển dụng được gắn nhãn
                        <span class="font-semibold">HOT</span> vào tiêu đề tin
                    </p>
                </div>
                <div class="bg-white flex flex-col items-center rounded-[8px] p-[1.55rem] shadow-2xl relative">
                    <p class="absolute top-[-4px] w-[155px] h-[8px] bg-[#DC2626] rounded-lg"></p>
                    <div class="text-[18px]">
                        <span class="font-semibold">Add-on Tittle: Red</span>
                        <div class='ml-4 group relative hidden md:inline-block'>
                            <i class='fa-solid text-zinc-400 fa-circle-question'></i>
                            <div
                                class='hidden group-hover:grid bg-white absolute right-0 shadow-lg rounded-lg w-[400px] z-50'>
                                <img src=https://static.topcv.vn/srp/website/images/pricing_page/addon-label-red.png
                                    alt='Add-on Tittle: Red'>
                                <div class='p-5'>
                                    <div class='flex items-center mt-[8px]'>
                                        <p class='font-bold text-[14px] ml-3'>Add-on Tittle: Red</p>
                                    </div>
                                    <div class='flex items-center mt-[8px]'>
                                        <a class='text-[14px] ml-3 text-primary' target='_blank'
                                            href='https://tuyendung.topcv.vn/help/cac-cau-hoi-thuong-gap/goi-dich-vu-add-on-title-red-la-gi/'>Xem
                                            chi tiết <i class='fa-light fa-angles-right'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="pt-3 pb-1 text-lg text-[24px] font-semibold text-primary">1,000,000 VNĐ</p>
                    <p class="mt-[8px] text-[12px] font-light">( Giá trên chưa bao gồm VAT )</p>
                    <p class="mt-[16px] text-center md:text-[14px] font-light">Tin tuyển dụng hiển thị ở tất
                        cả các trang sẽ có tiêu đề tin <span class="font-semibold">MÀU ĐỎ</span></p>
                </div>
            </div>

            <ul class="list-disc">
                <li class="ml-4 font-light md:text-[14px]">Top add-on này cần phải gắn với tin tuyển dụng chạy
                    dịch vụ Top Jobs</li>
                <li class="ml-4 font-light md:text-[14px]">Thời hạn sử dụng: tối đa 2 tuần / tin tuyển dụng
                    chạy dịch vụ Top Jobs / lần kích hoạt </li>
                <li class="ml-4 font-light md:text-[14px]">Dịch vụ cộng thêm sẽ kết thúc vào thời điểm tin
                    tuyển dụng chạy dịch vụ Top Jobs kết thúc</li>
            </ul>
            <div class="mt-[24px]">
                <div class="relative flex md:gap-[12px] gap-[8px] items-center md:flex-row  flex-col ">
                    <div
                        class="bg-white rounded text-primary text-center font-[14px] md:leading-[24px] leading-[22px] font-semibold md:px-[24px] md:py-[10px] px-[16px] py-[9px] border-[1px] border-primary show-modal-create-lead hover:bg-[#E5F7ED] hover:cursor-pointer w-full md:w-fit">
                        Tư vấn tuyển dụng
                    </div>
                    <a href="https://tuyendung.topcv.vn/app/register" target="_blank"
                        class="bg-primary md:px-[24px] md:py-[10px] px-[16px] py-[9px] rounded text-white text-center border-[1px] border-primary font-[14px] md:leading-[24px] leading-[22px] font-semibold hover:bg-[#19B961] w-full md:w-fit btn-post-job-free">
                        Đăng tin miễn phí
                        <i class="fa-solid fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white p-[20px] md:p-[40px]" id="top-branding">
        <div class="w-container mx-auto">
            <div class="uppercase   mb-3 text-gray-600"><span class="text-primary font-normal md:font-light">Top
                    Employer Branding</span></div>
            <div class="mb-[10px] text-[18px] md:text-[24px] border-l-4 border-primary px-2"><span
                    class="font-semibold">Truyền thông thương hiệu tuyển dụng</span> </div>
            <div class="md:text-[14px] font-light mb-[28px] text-color-light">Xây dựng hình ảnh thương hiệu
                tuyển dụng uy tín, nâng cao hiệu quả hoạt động tuyển dụng</div>


            <div class="grid lg:grid-cols-3 gap-[20px] lg:gap-[40px]">
                <div class="bg-white flex flex-col items-center rounded-[8px] p-[24px] shadow-2xl relative">
                    <p class="absolute top-[-4px] w-[155px] h-[8px] bg-[#2D7CF1] rounded-lg"></p>
                    <div class="flex text-[18px]">
                        <p class="font-semibold">Spotlight Company - SCP</p>
                        <div class='ml-4 group relative hidden md:inline-block'>
                            <i class='fa-solid text-zinc-400 fa-circle-question'></i>
                            <div
                                class='hidden md:group-hover:grid grid-cols-3 bg-white absolute md:left-[50%] shadow-lg rounded-lg md:w-[572px] md:h-[284px] p-2 md:p-[20px] z-50'>
                                <img src=https://static.topcv.vn/srp/website/images/pricing_page/SCP.png
                                    class='w-[163px] md:h-[240px]' alt='Spotlight Company - SCP'>
                                <div class='col-span-2'>
                                    <div class='font-bold text-[19px] text-zinc-700 mb-2'>
                                        Spotlight Company - SCP
                                    </div>
                                    <div class='flex mt-3'>
                                        <img class='w-[16px] h-[16px] mt-1'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='Spotlight Company - SCP'>
                                        <p class='text-[14px] ml-3'>Tên công ty và các vị trí đang tuyển dụng
                                            sẽ được <br> hiển thị cố định bên phải của tất cả các trang <br> Tìm
                                            kiếm việc làm </p>
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <img class='w-[16px] h-[16px]'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='Spotlight Company - SCP'>
                                        <p class='text-[14px] ml-3'>Mỗi trang tìm kiếm hiển thị ngẫu nhiên 01
                                            công ty</p>
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <img class='w-[16px] h-[16px]'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='Spotlight Company - SCP'>
                                        <p class='text-[14px] ml-3'>Cơ chế: 6 khách hàng / thời điểm</p>
                                    </div>
                                    <div class='flex items-center mt-[8px]'>
                                        <a class='text-[14px] ml-3 text-primary' target='_blank'
                                            href='https://tuyendung.topcv.vn/help/cac-cau-hoi-thuong-gap/goi-dich-vu-spotlight-company-scp-la-gi/'>Xem
                                            chi tiết <i class='fa-light fa-angles-right'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <p class="pt-3">
                        <span class="text-lg text-[24px] font-semibold text-primary">
                            5,000,000 VNĐ
                        </span> / <span class="font-semibold text-[18px]">04 tuần</span>
                    </p>

                    <p class="mt-[8px] text-[12px] font-light">( Giá trên chưa bao gồm VAT )</p>
                    <p class="mt-[16px] text-start md:text-[14px] text-center font-light">Tên công ty và các
                        vị trí đang tuyển dụng sẽ được hiển thị cố định bên phải của tất cả các trang Tìm kiếm
                        việc làm</p>
                </div>
                <div class="bg-white flex flex-col items-center rounded-[8px] p-[24px] shadow-2xl relative">
                    <p class="absolute top-[-4px] w-[155px] h-[8px] bg-[#083A82] rounded-lg"></p>
                    <div class="flex text-[18px]">
                        <p class="font-semibold">Banner T1</p>
                        <div class='ml-4 group relative hidden md:inline-block'>
                            <i class='fa-solid text-zinc-400 fa-circle-question'></i>
                            <div
                                class='hidden group-hover:grid bg-white absolute shadow-lg rounded-lg w-[376px] h-[293px] z-50'>
                                <img src=https://static.topcv.vn/srp/website/images/pricing_page/banner_t1.png
                                    alt='Banner T1'>
                                <div class='p-5'>
                                    <div class='font-bold text-[19px] text-zinc-700 mb-2'>
                                        Banner T1
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <img class='w-[16px] h-[16px]'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='Banner T1'>
                                        <p class='text-[14px] ml-3'>Vị trí: Trên đầu Trang chủ việc làm</p>
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <img class='w-[16px] h-[16px]'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='Banner T1'>
                                        <p class='text-[14px] ml-3'>Kích thước: 1100 x 220 (px)</p>
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <img class='w-[16px] h-[16px]'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='Banner T1'>
                                        <p class='text-[14px] ml-3'>Cơ chế: 6 khách hàng / thời điểm</p>
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <a class='text-[14px] ml-3 text-primary' target='_blank'
                                            href='https://tuyendung.topcv.vn/help/cac-cau-hoi-thuong-gap/goi-dich-vu-banner-t1-la-gi/'>Xem
                                            chi tiết <i class='fa-light fa-angles-right'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <p class="pt-3">
                        <span class="text-lg text-[24px] font-semibold text-primary">
                            30,000,000 VNĐ
                        </span> / <span class="font-semibold text-[18px]">04 tuần</span>
                    </p>

                    <p class="mt-[8px] text-[12px] font-light">( Giá trên chưa bao gồm VAT )</p>
                    <p class="mt-[16px] text-start md:text-[14px] text-center font-light">Banner trên đầu
                        trang chủ việc làm</p>
                </div>
                <div class="bg-white flex flex-col items-center rounded-[8px] p-[24px] shadow-2xl relative">
                    <p class="absolute top-[-4px] w-[155px] h-[8px] bg-[#C52E20] rounded-lg"></p>
                    <div class="flex text-[18px]">
                        <p class="font-semibold">Banner R1</p>
                        <div class='ml-4 group relative hidden md:inline-block'>
                            <i class='fa-solid text-zinc-400 fa-circle-question'></i>
                            <div
                                class='hidden group-hover:grid bg-white absolute right-0 shadow-lg rounded-lg w-[376px] h-[293px] z-50'>
                                <img src=https://static.topcv.vn/srp/website/images/pricing_page/banner_r1.png
                                    alt='Banner R1'>
                                <div class='p-5'>
                                    <div class='font-bold text-[19px] text-zinc-700 mb-2'>
                                        Banner R1
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <img class='w-[16px] h-[16px]'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='Banner R1'>
                                        <p class='text-[14px] ml-3'>Vị trí: Phía bên cạnh Box Việc làm hấp dẫn
                                        </p>
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <img class='w-[16px] h-[16px]'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='Banner R1'>
                                        <p class='text-[14px] ml-3'>Kích thước: 346 x 577 (px)</p>
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <img class='w-[16px] h-[16px]'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='Banner R1'>
                                        <p class='text-[14px] ml-3'>Cơ chế: 6 khách hàng / thời điểm</p>
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <a class='text-[14px] ml-3 text-primary' target='_blank'
                                            href='https://tuyendung.topcv.vn/help/cac-cau-hoi-thuong-gap/goi-dich-vu-banner-r1-la-gi/'>Xem
                                            chi tiết <i class='fa-light fa-angles-right'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <p class="pt-3">
                        <span class="text-lg text-[24px] font-semibold text-primary">
                            20,000,000 VNĐ
                        </span> / <span class="font-semibold text-[18px]">04 tuần</span>
                    </p>

                    <p class="mt-[8px] text-[12px] font-light">( Giá trên chưa bao gồm VAT )</p>
                    <p class="mt-[16px] text-start md:text-[14px] text-center font-light">Banner phía bên cạnh
                        Box Việc làm hấp dẫn</p>
                </div>
                <div class="bg-white flex flex-col items-center rounded-[8px] p-[24px] shadow-2xl relative">
                    <p class="absolute top-[-4px] w-[155px] h-[8px] bg-[#FF7700] rounded-lg"></p>
                    <div class="flex text-[18px]">
                        <p class="font-semibold">Banner C1</p>
                        <div class='ml-4 group relative hidden md:inline-block'>
                            <i class='fa-solid text-zinc-400 fa-circle-question'></i>
                            <div
                                class='hidden group-hover:grid bg-white absolute shadow-lg rounded-lg w-[376px] h-[293px] z-50'>
                                <img src=https://static.topcv.vn/srp/website/images/pricing_page/banner_c1.png
                                    alt='Banner C1'>
                                <div class='p-5'>
                                    <div class='font-bold text-[19px] text-zinc-700 mb-2'>
                                        Banner C1
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <img class='w-[16px] h-[16px]'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='Banner C1'>
                                        <p class='text-[14px] ml-3'>Vị trí: Phía bên dưới Box Việc làm hấp dẫn
                                        </p>
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <img class='w-[16px] h-[16px]'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='Banner C1'>
                                        <p class='text-[14px] ml-3'>Kích thước: 900 x 500 (px)</p>
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <img class='w-[16px] h-[16px]'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='Banner C1'>
                                        <p class='text-[14px] ml-3'>Cơ chế: 9 khách hàng / thời điểm</p>
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <a class='text-[14px] ml-3 text-primary' target='_blank'
                                            href='https://tuyendung.topcv.vn/help/cac-cau-hoi-thuong-gap/goi-dich-vu-banner-c1-la-gi/'>Xem
                                            chi tiết <i class='fa-light fa-angles-right'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <p class="pt-3">
                        <span class="text-lg text-[24px] font-semibold text-primary">
                            11,000,000 VNĐ
                        </span> / <span class="font-semibold text-[18px]">04 tuần</span>
                    </p>

                    <p class="mt-[8px] text-[12px] font-light">( Giá trên chưa bao gồm VAT )</p>
                    <p class="mt-[16px] text-start md:text-[14px] text-center font-light">Banner phía dưới Box
                        Việc làm tốt nhất</p>
                </div>
                <div class="bg-white flex flex-col items-center rounded-[8px] p-[24px] shadow-2xl relative">
                    <p class="absolute top-[-4px] w-[155px] h-[8px] bg-[#FFCA00] rounded-lg"></p>
                    <div class="flex text-[18px]">
                        <p class="font-semibold">Banner B1</p>
                        <div class='ml-4 group relative hidden md:inline-block'>
                            <i class='fa-solid text-zinc-400 fa-circle-question'></i>
                            <div
                                class='hidden group-hover:grid bg-white absolute shadow-lg rounded-lg w-[376px] h-[340px] z-50'>
                                <img src=https://static.topcv.vn/srp/website/images/pricing_page/banner_b1.png
                                    alt='Banner B1'>
                                <div class='p-5'>
                                    <div class='font-bold text-[19px] text-zinc-700 mb-2'>
                                        Banner B1
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <img class='w-[16px] h-[16px]'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='Banner B1'>
                                        <p class='text-[14px] ml-3'>Vị trí: Banner dọc bên trái của Popup Tải
                                            CV </p>
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <img class='w-[16px] h-[16px]'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='Banner B1'>
                                        <p class='text-[14px] ml-3'>Kích thước: 150 x 510 (px)</p>
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <img class='w-[16px] h-[16px]'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='Banner B1'>
                                        <p class='text-[14px] ml-3'>Cơ chế: 6 khách hàng / thời điểm</p>
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <a class='text-[14px] ml-3 text-primary' target='_blank'
                                            href='https://tuyendung.topcv.vn/help/cac-cau-hoi-thuong-gap/goi-dich-vu-banner-b1-la-gi/'>Xem
                                            chi tiết <i class='fa-light fa-angles-right'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <p class="pt-3">
                        <span class="text-lg text-[24px] font-semibold text-primary">
                            8,000,000 VNĐ
                        </span> / <span class="font-semibold text-[18px]">04 tuần</span>
                    </p>

                    <p class="mt-[8px] text-[12px] font-light">( Giá trên chưa bao gồm VAT )</p>
                    <p class="mt-[16px] text-start md:text-[14px] text-center font-light">Banner dọc bên trái
                        của Popup Tải CV</p>
                </div>
                <div class="bg-white flex flex-col items-center rounded-[8px] p-[24px] shadow-2xl relative">
                    <p class="absolute top-[-4px] w-[155px] h-[8px] bg-[#00E664] rounded-lg"></p>
                    <div class="flex text-[18px]">
                        <p class="font-semibold">Chuyên trang tuyển dụng - EBP</p>
                        <div class='ml-4 group relative hidden md:inline-block'>
                            <i class='fa-solid text-zinc-400 fa-circle-question'></i>
                            <div
                                class='hidden group-hover:grid grid-cols-3 bg-white absolute right-0 shadow-lg rounded-lg w-[572px] h-[325px] p-[20px] z-50'>
                                <img src=https://static.topcv.vn/srp/website/images/pricing_page/EBP.png
                                    class='w-[163px] h-[240px]' alt='EBP'>
                                <div class='col-span-2'>
                                    <div class='font-bold text-[19px] text-zinc-700 mb-2'>
                                        EBP
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <img class='w-[16px] h-[16px]'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='EBP'>
                                        <p class='text-[14px] ml-3'>Link tham khảo: <a
                                                href='https://www.topcv.vn/brand/topcv' class='underline'
                                                target='_blank'>https://www.topcv.vn/brand/topcv</a></p>
                                    </div>
                                    <div class='flex mt-3'>
                                        <img class='w-[16px] h-[16px] mt-1'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='EBP'>
                                        <p class='text-[14px] ml-3'>Có giao diện riêng Không hiển thị quảng
                                            cáo tin <br> tuyển dụng của doanh nghiệp khác</p>
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <img class='w-[16px] h-[16px]'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='EBP'>
                                        <p class='text-[14px] ml-3'>Tuỳ chỉnh màu sắc thương hiệu</p>
                                    </div>
                                    <div class='flex mt-3'>
                                        <img class='w-[16px] h-[16px] mt-1'
                                            src=https://static.topcv.vn/srp/website/images/pricing_page/check.png
                                            alt='EBP'>
                                        <p class='text-[14px] ml-3'>Tăng kết quả tìm kiếm trên Google về
                                            thương hiệu <br> công ty (SEO Google)</p>
                                    </div>
                                    <div class='flex items-center mt-3'>
                                        <a class='text-[14px] ml-3 text-primary' target='_blank'
                                            href='https://tuyendung.topcv.vn/help/cac-cau-hoi-thuong-gap/goi-dich-vu-chuyen-trang-tuyen-dung-ebp-la-gi/'>Xem
                                            chi tiết <i class='fa-light fa-angles-right'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <p class="pt-3">
                        <span class="text-lg text-[24px] font-semibold text-primary">
                            5,000,000 VNĐ
                        </span> / <span class="font-semibold text-[18px]">53 tuần</span>
                    </p>

                    <p class="mt-[8px] text-[12px] font-light">( Giá trên chưa bao gồm VAT )</p>
                    <p class="mt-[16px] text-start md:text-[14px] text-center font-light">Giao diện hiển thị
                        riêng khác biệt</p>
                </div>
            </div>
        </div>
        <div class=" px-[20px] md:flex md:justify-center mt-[24px]">
            <div class="relative flex md:gap-[12px] gap-[8px] items-center md:flex-row  flex-col ">
                <div
                    class="bg-white rounded text-primary text-center font-[14px] md:leading-[24px] leading-[22px] font-semibold md:px-[24px] md:py-[10px] px-[16px] py-[9px] border-[1px] border-primary show-modal-create-lead hover:bg-[#E5F7ED] hover:cursor-pointer w-full md:w-fit">
                    Tư vấn tuyển dụng
                </div>
                <a href="https://tuyendung.topcv.vn/app/register" target="_blank"
                    class="bg-primary md:px-[24px] md:py-[10px] px-[16px] py-[9px] rounded text-white text-center border-[1px] border-primary font-[14px] md:leading-[24px] leading-[22px] font-semibold hover:bg-[#19B961] w-full md:w-fit btn-post-job-free">
                    Đăng tin miễn phí
                </a>
            </div>
        </div>
    </div>
    <div class="bg-[#F4F5F5] p-[20px]">
        <div class="w-container mx-auto">
            <div class="md:hidden">
                <div class="uppercase mb-3 text-gray-600"><span class="text-primary font-normal md:font-light">Top
                        Developer API</span></div>
                <div class="mb-[10px] text-[18px] md:text-[24px] border-l-4 border-primary px-2"><span
                        class="font-semibold">Dịch vụ dành cho nhà phát triển</span> </div>
                <div class="md:text-[18px] font-light mb-[28px] text-color-light">Tích hợp các nền tảng quản
                    trị tuyển dụng phổ biến tại Việt Nam.</div>
            </div>
            <div class="grid md:grid-cols-3 md:gap-10 grid-cols-1 gap-6 md:mt-12">
                <div class="md:block flex items-center justify-center py-3 md:py-0">
                    <img class="block max-w-[218px] md:max-w-full"
                        src="https://tuyendung.topcv.vn/images/top-developer-api.png" alt="top develop api">
                </div>

                <div class="md:col-span-2 grid content-center">
                    <div class="hidden md:block">
                        <div class="uppercase mb-3 text-gray-600"><span class="text-primary font-light">Top
                                Developer API</span></div>
                        <div class="mb-3 md:text-[24px] border-l-4 border-primary px-2"><span
                                class="font-semibold ">Dịch vụ dành cho nhà phát triển</span> </div>
                        <div class="mb-2 md:text-[14px] font-light">Tích hợp các nền tảng quản trị tuyển dụng
                            phổ biến tại Việt Nam.</div>
                    </div>

                    <div class="grid md:grid-cols-2 md:gap-[2.5rem] md:pb-6 grid-cols-1 gap-6 pt-[48px]">
                        <div class="lg:col-span-5 grid md:grid-cols-2">
                            <div class="bg-white flex flex-col items-center rounded-[8px] p-[24px] shadow-2xl relative">
                                <p class="absolute top-[-4px] w-[217px] h-[8px] bg-[#553BF6] rounded-lg"></p>
                                <p class="font-semibold text-[18px]">Dịch vụ API</p>
                                <p class="pt-3"><span
                                        class="text-lg text-[19px] md:text-[24px] font-semibold text-primary">
                                        <span class="text-[24px]">
                                            3,000,000 VNĐ
                                        </span>
                                    </span> / <span class=" text-[18px] font-semibold">6 Tháng</span> <br>
                                <p class="mt-[8px] text-[12px] font-light">( Giá trên chưa bao gồm VAT )</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-[24px]">
                        <div class="relative flex md:gap-[12px] gap-[8px] items-center md:flex-row  flex-col ">
                            <div
                                class="bg-white rounded text-primary text-center font-[14px] md:leading-[24px] leading-[22px] font-semibold md:px-[24px] md:py-[10px] px-[16px] py-[9px] border-[1px] border-primary show-modal-create-lead hover:bg-[#E5F7ED] hover:cursor-pointer w-full md:w-fit">
                                Tư vấn tuyển dụng
                            </div>
                            <a href="https://tuyendung.topcv.vn/app/register" target="_blank"
                                class="bg-primary md:px-[24px] md:py-[10px] px-[16px] py-[9px] rounded text-white text-center border-[1px] border-primary font-[14px] md:leading-[24px] leading-[22px] font-semibold hover:bg-[#19B961] w-full md:w-fit btn-post-job-free">
                                Đăng tin miễn phí
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-green-18" id="top_deal">
        <a href="https://tuyendung.topcv.vn/app/coupons" id="banner-quote-center" target="_blank">
            <img id="image-top_deal" class="w-full" src-mb="https://static.topcv.vn/banners/ll3qIczMwwhl3HE4xBY1.jpg"
                src-pc="https://static.topcv.vn/banners/kPiyQV6yGBDPPiWy1U1b.jpg" title="TopCV Insight"
                alt="top deal">
        </a>
    </div>
    <script>
        const $imgTopDeal = document.getElementById("image-top_deal");

        function reponsiveImage(maxWith) {
            if (maxWith.matches) {
                $imgTopDeal.setAttribute("src", $imgTopDeal.getAttribute('src-mb'));
            } else {
                $imgTopDeal.setAttribute("src", $imgTopDeal.getAttribute('src-pc'));
            }
        }
        let RpsImg = window.matchMedia("(max-width: 767px)");
        reponsiveImage(RpsImg);
        RpsImg.addListener(reponsiveImage);
        document.getElementById("banner-quote-center").addEventListener("click", function(e) {
            ta('ClickToBannerQuoteCenter')
        })
    </script>
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <style>
        .box-image img {
            position: relative;
            z-index: 2;
        }

        .box-image .bg-light {
            position: absolute;
            z-index: 0;
            width: 110%;
            top: 0;
            left: -10px;
            height: max-content;
        }

        .box-image .bg-light img {
            left: -5px;
        }
    </style>
    <div class="bg-white p-[20px]  " id="rank-employer">
        <div class="w-container mx-auto">
            <div class="uppercase mb-3 text-gray-600"><span class="text-primary font-normal md:font-light">TOP
                    REWARDS</span>
            </div>
            <div class="mb-[10px] text-[18px] md:text-[24px] border-l-4 border-primary px-2"><span
                    class="font-semibold">Chương trình TopCV Rewards</span></div>
            <div class="md:text-[14px] font-light mb-[28px]">
                Điều kiện & quà tặng khi đạt hạng khách hàng <br>Khi tham gia chương trình TopCV Rewards và đạt
                hạng khách hàng Bạc trở lên, khách hàng sẽ nhận được bộ quà tặng tương ứng dựa trên thứ hạng đạt
                được và không mất điểm để quy đổi như dưới đây</div>
            <div class="main_reward flex shadow-xs md:hidden ">
                <div class="content d-flex">
                    <div class="reward-title">
                        <div class="img-reward">
                            <img src="https://tuyendung.topcv.vn/images/arrow-4.png" alt="arrow 4" class="">
                        </div>
                        <div class="block-slide"></div>
                        <div class="list">
                            <div class="block-tittle-mobile block-title-0">
                                <span class="font-rose txt-green">VOUCHER ƯU ĐÃI GIẢM GIÁ VÀ QUYỀN LỢI GIA
                                    TĂNG RIÊNG BIỆT</span>
                            </div>
                            <div class="block-mobile block-highlight">
                                <span class="font-weight-300">Voucher <span class="font-weight-700">giảm
                                        giá</span></span>
                            </div>
                            <div class="block-mobile ">
                                <span class="font-weight-300">Yêu cầu gia hạn <span class="font-weight-700">kích hoạt
                                        dịch vụ</span></span>
                            </div>
                            <div class="block-mobile block-highlight">
                                <span class="font-weight-300">Logo Nhà tuyển dụng <span class="font-weight-700">nổi bật
                                        hiển thị</span> tại <a href="https://topcv.vn/viec-lam"
                                        class="font-weight-700 txt-green" target="_blank">trang chủ việc làm</a></span>
                            </div>
                            <div class="block-mobile ">
                                <span class="font-weight-300">Chuyên trang tuyển dụng cao cấp</span>
                            </div>
                            <div class="block-tittle-mobile block-title-1">
                                <span class="font-rose txt-green">GIA TĂNG HIỆU QUẢ TIN TUYỂN DỤNG</span>
                            </div>
                            <div class="block-mobile block-highlight">
                                <span class="font-weight-300">Tin đăng được thiết kế <span class="font-weight-700">huy
                                        hiệu nổi bật</span> với ứng viên trên
                                    website <a href="https://topcv.vn" class="font-weight-700 txt-green"
                                        target="_blank">Topcv.vn</a></span>
                            </div>
                            <div class="block-mobile ">
                                <span class="font-weight-300"><span class="font-weight-700">Hiển thị tiêu đề
                                        tin cơ bản</span> có tiêu chí tương đương tiêu đề tin trả phí/ tin Top
                                    job</span>
                            </div>
                            <div class="block-tittle-mobile block-title-2">
                                <span class="font-rose txt-green">HOẠT ĐỘNG TRI ÂN VÀ VÉ MỜI THAM DỰ CÁC
                                    CHƯƠNG TRÌNH SỰ KIỆN CÙNG TOPCV</span>
                            </div>
                            <div class="block-mobile block-highlight">
                                <span class="font-weight-300"><span class="font-weight-700">Vé mời VIP tham
                                        dự chương trình HR TECH</span> - Sự kiện nhân sự lớn nhất trong
                                    năm</span>
                            </div>
                            <div class="block-mobile ">
                                <span class="font-weight-300"><span class="font-weight-700">Quyền lợi tham
                                        dự Talkshow & Workshop</span> đào tạo, chia sẻ kiến thức chuyên
                                    môn</span>
                            </div>
                            <div class="block-mobile block-highlight">
                                <span class="font-weight-300"><span class="font-weight-700">Hoạt động chúc
                                        mừng, tri ân</span> nhân dịp lễ tết / ngày kỷ niệm</span>
                            </div>
                            <div class="block-tittle-mobile block-title-3">
                                <span class="font-rose txt-green">ƯU ĐÃI TỪ HỆ SINH THÁI SẢN PHẨM HR TECH
                                    (HAPPYTIME, TESTCENTER, SHIRING)</span>
                            </div>
                            <div class="block-mobile block-highlight">
                                <span class="font-weight-300">Gói quà tặng trải nghiệm miễn phí các sản phẩm
                                    trong hệ sinh thái số <span class="font-weight-700">HappyTime, TestCenter,
                                        SHiring</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="reward-content">
                        <img class="icon-slide-gift" src="https://tuyendung.topcv.vn/images/gift-icon.gif"
                            alt="icon gift">
                        <div class="one-time">
                            <div>
                                <div class="height-box">
                                    <img src="https://tuyendung.topcv.vn/images/rewards/member.png" alt="reward Tagcard"
                                        class="">
                                    <div class="inner-mobile mt-[20px]">
                                        <span class="tt">Tổng tích luỹ</span>
                                        <span class="font-weight-300">Từ <span class="txt-green">0</span>
                                            đến dưới</span>
                                        <span class="txt-green">30.000.000</span>
                                        <span class="tt">Điểm tương ứng</span>
                                        <span class="txt-green">0 đến <300<br> Top Point</span>
                                    </div>
                                </div>
                                <div class="block-slide"></div>
                                <div class="reward-list">
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item reward-item-end"></div>
                                </div>
                            </div>
                            <div>
                                <div class="height-box">
                                    <img src="https://tuyendung.topcv.vn/images/rewards/silver.png" alt="reward Tagcard"
                                        class="">
                                    <div class="inner-mobile mt-[20px]">
                                        <span class="tt">Tổng tích luỹ</span>
                                        <span class="font-weight-300">Từ <span
                                                class="txt-green">30.000.000</span></span>
                                        <span class="font-weight-300">đến dưới <span
                                                class="txt-green">80.000.000</span></span>
                                        <span class="tt">Điểm tương ứng</span>
                                        <span class="txt-green">300 đến <800<br> Top Point</span>
                                    </div>
                                </div>
                                <div class="block-slide"></div>
                                <div class="reward-list">
                                    <div class="reward-item "></div>
                                    <div class="reward-item ">10%</div>
                                    <div class="reward-item ">1 lần</div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item ">1 gói 3 tháng</div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item ">
                                        <img src="https://tuyendung.topcv.vn/images/khtt/circle-check.svg"
                                            class="w-[18px] h-[28px]" alt="check" />
                                    </div>
                                    <div class="reward-item ">
                                        <img src="https://tuyendung.topcv.vn/images/khtt/circle-check.svg"
                                            class="w-[18px] h-[28px]" alt="check" />
                                    </div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item reward-item-end"><span class="font-weight-300">2
                                            tháng trải nghiệm miễn phí các sản phẩm trong hệ sinh thái số <span
                                                class="font-weight-700">HappyTime, TestCenter,
                                                SHiring</span></span></div>
                                </div>
                            </div>
                            <div>
                                <div class="height-box">
                                    <img src="https://tuyendung.topcv.vn/images/rewards/gold.png" alt="reward Tagcard"
                                        class="">
                                    <div class="inner-mobile mt-[20px]">
                                        <span class="tt">Tổng tích luỹ</span>
                                        <span class="font-weight-300">Từ <span
                                                class="txt-green">80.000.000</span></span>
                                        <span class="font-weight-300">đến dưới <span
                                                class="txt-green">150.000.000</span></span>
                                        <span class="tt">Điểm tương ứng</span>
                                        <span class="txt-green">800 đến <1500<br> Top Point</span>
                                    </div>
                                </div>
                                <div class="block-slide"></div>
                                <div class="reward-list">
                                    <div class="reward-item "></div>
                                    <div class="reward-item ">20%</div>
                                    <div class="reward-item ">2 lần</div>
                                    <div class="reward-item ">3 tháng</div>
                                    <div class="reward-item ">3 tháng</div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item ">1 gói 6 tháng</div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item ">1 vé</div>
                                    <div class="reward-item ">
                                        <img src="https://tuyendung.topcv.vn/images/khtt/circle-check.svg"
                                            class="w-[18px] h-[28px]" alt="check" />
                                    </div>
                                    <div class="reward-item ">
                                        <img src="https://tuyendung.topcv.vn/images/khtt/circle-check.svg"
                                            class="w-[18px] h-[28px]" alt="check" />
                                    </div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item reward-item-end"><span class="font-weight-300">2
                                            tháng trải nghiệm miễn phí các sản phẩm trong hệ sinh thái số <span
                                                class="font-weight-700">HappyTime, TestCenter,
                                                SHiring</span></span></div>
                                </div>
                            </div>
                            <div>
                                <div class="height-box">
                                    <img src="https://tuyendung.topcv.vn/images/rewards/platinum.png"
                                        alt="reward Tagcard" class="">
                                    <div class="inner-mobile mt-[20px]">
                                        <span class="tt">Tổng tích luỹ</span>
                                        <span class="font-weight-300">Từ <span
                                                class="txt-green">150.000.000</span></span>
                                        <span class="font-weight-300">đến dưới <span
                                                class="txt-green">250.000.000</span></span>
                                        <span class="tt">Điểm tương ứng</span>
                                        <span class="txt-green">1500 đến <2500<br> Top Point</span>
                                    </div>
                                </div>
                                <div class="block-slide"></div>
                                <div class="reward-list">
                                    <div class="reward-item "></div>
                                    <div class="reward-item ">25%</div>
                                    <div class="reward-item ">3 lần</div>
                                    <div class="reward-item ">6 tháng</div>
                                    <div class="reward-item ">6 tháng</div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item ">1 gói 9 tháng</div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item ">1 vé</div>
                                    <div class="reward-item ">
                                        <img src="https://tuyendung.topcv.vn/images/khtt/circle-check.svg"
                                            class="w-[18px] h-[28px]" alt="check" />
                                    </div>
                                    <div class="reward-item ">
                                        <img src="https://tuyendung.topcv.vn/images/khtt/circle-check.svg"
                                            class="w-[18px] h-[28px]" alt="check" />
                                    </div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item reward-item-end"><span class="font-weight-300">2
                                            tháng trải nghiệm miễn phí các sản phẩm trong hệ sinh thái số <span
                                                class="font-weight-700">HappyTime, TestCenter,
                                                SHiring</span></span></div>
                                </div>
                            </div>
                            <div>
                                <div class="height-box">
                                    <img src="https://tuyendung.topcv.vn/images/rewards/diamond.png"
                                        alt="reward Tagcard" class="">
                                    <div class="inner-mobile mt-[20px]">
                                        <span class="tt">Tổng tích luỹ</span>
                                        <span class="font-weight-300">Từ <span
                                                class="txt-green">250.000.000</span></span>
                                        <span class="font-weight-300">trở lên</span>
                                        <span class="tt">Điểm tương ứng</span>
                                        <span class="txt-green">2500 Top Point<br> trở lên</span>
                                    </div>
                                </div>
                                <div class="block-slide"></div>
                                <div class="reward-list">
                                    <div class="reward-item "></div>
                                    <div class="reward-item ">30%</div>
                                    <div class="reward-item ">4 lần</div>
                                    <div class="reward-item ">12 tháng</div>
                                    <div class="reward-item ">12 tháng</div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item ">
                                        <img src="https://tuyendung.topcv.vn/images/khtt/circle-check.svg"
                                            class="w-[18px] h-[28px]" alt="check" />
                                    </div>
                                    <div class="reward-item ">1 gói 12 tháng</div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item ">2 vé</div>
                                    <div class="reward-item ">
                                        <img src="https://tuyendung.topcv.vn/images/khtt/circle-check.svg"
                                            class="w-[18px] h-[28px]" alt="check" />
                                    </div>
                                    <div class="reward-item ">
                                        <img src="https://tuyendung.topcv.vn/images/khtt/circle-check.svg"
                                            class="w-[18px] h-[28px]" alt="check" />
                                    </div>
                                    <div class="reward-item "></div>
                                    <div class="reward-item reward-item-end"><span class="font-weight-300">2
                                            tháng trải nghiệm miễn phí các sản phẩm trong hệ sinh thái số <span
                                                class="font-weight-700">HappyTime, TestCenter,
                                                SHiring</span></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main_reward md:shadow-xs pb-[30px] hidden md:block ">
                <div class="head">

                    <div class="head_l">
                        <img src="https://tuyendung.topcv.vn/images/khtt/arrow.png" alt="arrow " class="">
                    </div>
                    <div class="head_r">
                        <div class="item">
                            <img src="https://tuyendung.topcv.vn/images/rewards/member.png" alt="Reward Tagcard"
                                class="">
                            <div class="inner">
                                <span class="tt">Tổng tích luỹ</span>
                                <span class="font-weight-300">Từ <span class="txt-green">0</span> đến
                                    dưới</span>
                                <span class="txt-green">30.000.000</span>
                                <span class="tt">Điểm tương ứng</span>
                                <span class="txt-green">0 đến <300<br> Top Point</span>
                            </div>
                        </div>
                        <div class="item">
                            <img src="https://tuyendung.topcv.vn/images/rewards/silver.png" alt="Reward Tagcard"
                                class="">
                            <div class="inner">
                                <span class="tt">Tổng tích luỹ</span>
                                <span class="font-weight-300">Từ <span class="txt-green">30.000.000</span></span>
                                <span class="font-weight-300">đến dưới <span class="txt-green">80.000.000</span></span>
                                <span class="tt">Điểm tương ứng</span>
                                <span class="txt-green">300 đến <800<br> Top Point</span>
                            </div>
                        </div>
                        <div class="item">
                            <img src="https://tuyendung.topcv.vn/images/rewards/gold.png" alt="Reward Tagcard"
                                class="">
                            <div class="inner">
                                <span class="tt">Tổng tích luỹ</span>
                                <span class="font-weight-300">Từ <span class="txt-green">80.000.000</span></span>
                                <span class="font-weight-300">đến dưới <span class="txt-green">150.000.000</span></span>
                                <span class="tt">Điểm tương ứng</span>
                                <span class="txt-green">800 đến <1500<br> Top Point</span>
                            </div>
                        </div>
                        <div class="item">
                            <img src="https://tuyendung.topcv.vn/images/rewards/platinum.png" alt="Reward Tagcard"
                                class="">
                            <div class="inner">
                                <span class="tt">Tổng tích luỹ</span>
                                <span class="font-weight-300">Từ <span class="txt-green">150.000.000</span></span>
                                <span class="font-weight-300">đến dưới <span class="txt-green">250.000.000</span></span>
                                <span class="tt">Điểm tương ứng</span>
                                <span class="txt-green">1500 đến <2500<br> Top Point</span>
                            </div>
                        </div>
                        <div class="item">
                            <img src="https://tuyendung.topcv.vn/images/rewards/diamond.png" alt="Reward Tagcard"
                                class="">
                            <div class="inner">
                                <span class="tt">Tổng tích luỹ</span>
                                <span class="font-weight-300">Từ <span class="txt-green">250.000.000</span></span>
                                <span class="font-weight-300">trở lên</span>
                                <span class="tt">Điểm tương ứng</span>
                                <span class="txt-green">2500 Top Point<br> trở lên</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list text-[14px]">
                    <div class="block-tittle">
                        <span class="font-rose txt-green">VOUCHER ƯU ĐÃI GIẢM GIÁ VÀ QUYỀN LỢI GIA TĂNG RIÊNG
                            BIỆT</span>
                    </div>
                    <div class="block  block-highlight">
                        <div class="block_l">
                            <span class="font-weight-300">Voucher <span class="font-weight-700">giảm
                                    giá</span></span>
                        </div>
                        <div class="block_r d-flex align-items-center">
                            <div class="item">

                            </div>
                            <div class="item">
                                10%
                            </div>
                            <div class="item">
                                20%
                            </div>
                            <div class="item">
                                25%
                            </div>
                            <div class="item">
                                30%
                            </div>
                        </div>
                    </div>
                    <div class="block  ">
                        <div class="block_l">
                            <span class="font-weight-300">Yêu cầu gia hạn <span class="font-weight-700">kích
                                    hoạt dịch vụ</span></span>
                        </div>
                        <div class="block_r d-flex align-items-center">
                            <div class="item">

                            </div>
                            <div class="item">
                                1 lần
                            </div>
                            <div class="item">
                                2 lần
                            </div>
                            <div class="item">
                                3 lần
                            </div>
                            <div class="item">
                                4 lần
                            </div>
                        </div>
                    </div>
                    <div class="block  block-highlight">
                        <div class="block_l">
                            <span class="font-weight-300">Logo Nhà tuyển dụng <span class="font-weight-700">nổi bật hiển
                                    thị</span> tại <a href="https://topcv.vn/viec-lam" class="font-weight-700 txt-green"
                                    target="_blank">trang chủ việc làm</a></span>
                        </div>
                        <div class="block_r d-flex align-items-center">
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>
                            <div class="item">
                                3 tháng
                            </div>
                            <div class="item">
                                6 tháng
                            </div>
                            <div class="item">
                                12 tháng
                            </div>
                        </div>
                    </div>
                    <div class="block block-end ">
                        <div class="block_l">
                            <span class="font-weight-300">Chuyên trang tuyển dụng cao cấp</span>
                        </div>
                        <div class="block_r d-flex align-items-center">
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>
                            <div class="item">
                                3 tháng
                            </div>
                            <div class="item">
                                6 tháng
                            </div>
                            <div class="item">
                                12 tháng
                            </div>
                        </div>
                    </div>
                    <div class="block-tittle">
                        <span class="font-rose txt-green">GIA TĂNG HIỆU QUẢ TIN TUYỂN DỤNG</span>
                    </div>
                    <div class="block  block-highlight">
                        <div class="block_l">
                            <span class="font-weight-300">Tin đăng được thiết kế <span class="font-weight-700">huy hiệu
                                    nổi bật</span> với ứng viên trên website
                                <a href="https://topcv.vn" class="font-weight-700 txt-green"
                                    target="_blank">Topcv.vn</a></span>
                        </div>
                        <div class="block_r d-flex align-items-center">
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>
                            <div class="item">
                                <img src=https://tuyendung.topcv.vn/images/khtt/circle-check.svg alt='check' />
                            </div>
                        </div>
                    </div>
                    <div class="block block-end ">
                        <div class="block_l">
                            <span class="font-weight-300"><span class="font-weight-700">Hiển thị tiêu đề tin
                                    cơ bản</span> có tiêu chí tương đương tiêu đề tin trả phí/ tin Top
                                job</span>
                        </div>
                        <div class="block_r d-flex align-items-center">
                            <div class="item">

                            </div>
                            <div class="item">
                                1 gói 3 tháng
                            </div>
                            <div class="item">
                                1 gói 6 tháng
                            </div>
                            <div class="item">
                                1 gói 9 tháng
                            </div>
                            <div class="item">
                                1 gói 12 tháng
                            </div>
                        </div>
                    </div>
                    <div class="block-tittle">
                        <span class="font-rose txt-green">HOẠT ĐỘNG TRI ÂN VÀ VÉ MỜI THAM DỰ CÁC CHƯƠNG TRÌNH
                            SỰ KIỆN CÙNG TOPCV</span>
                    </div>
                    <div class="block  block-highlight">
                        <div class="block_l">
                            <span class="font-weight-300"><span class="font-weight-700">Vé mời VIP tham dự
                                    chương trình HR TECH</span> - Sự kiện nhân sự lớn nhất trong năm</span>
                        </div>
                        <div class="block_r d-flex align-items-center">
                            <div class="item">

                            </div>
                            <div class="item">

                            </div>
                            <div class="item">
                                1 vé
                            </div>
                            <div class="item">
                                1 vé
                            </div>
                            <div class="item">
                                2 vé
                            </div>
                        </div>
                    </div>
                    <div class="block  ">
                        <div class="block_l">
                            <span class="font-weight-300"><span class="font-weight-700">Quyền lợi tham dự
                                    Talkshow & Workshop</span> đào tạo, chia sẻ kiến thức chuyên môn</span>
                        </div>
                        <div class="block_r d-flex align-items-center">
                            <div class="item">

                            </div>
                            <div class="item">
                                <img src=https://tuyendung.topcv.vn/images/khtt/circle-check.svg alt='check' />
                            </div>
                            <div class="item">
                                <img src=https://tuyendung.topcv.vn/images/khtt/circle-check.svg alt='check' />
                            </div>
                            <div class="item">
                                <img src=https://tuyendung.topcv.vn/images/khtt/circle-check.svg alt='check' />
                            </div>
                            <div class="item">
                                <img src=https://tuyendung.topcv.vn/images/khtt/circle-check.svg alt='check' />
                            </div>
                        </div>
                    </div>
                    <div class="block block-end block-highlight">
                        <div class="block_l">
                            <span class="font-weight-300"><span class="font-weight-700">Hoạt động chúc mừng,
                                    tri ân</span> nhân dịp lễ tết / ngày kỷ niệm</span>
                        </div>
                        <div class="block_r d-flex align-items-center">
                            <div class="item">

                            </div>
                            <div class="item">
                                <img src=https://tuyendung.topcv.vn/images/khtt/circle-check.svg alt='check' />
                            </div>
                            <div class="item">
                                <img src=https://tuyendung.topcv.vn/images/khtt/circle-check.svg alt='check' />
                            </div>
                            <div class="item">
                                <img src=https://tuyendung.topcv.vn/images/khtt/circle-check.svg alt='check' />
                            </div>
                            <div class="item">
                                <img src=https://tuyendung.topcv.vn/images/khtt/circle-check.svg alt='check' />
                            </div>
                        </div>
                    </div>
                    <div class="block-tittle">
                        <span class="font-rose txt-green">ƯU ĐÃI TỪ HỆ SINH THÁI SẢN PHẨM HR TECH (HAPPYTIME,
                            TESTCENTER, SHIRING)</span>
                    </div>
                    <div class="block block-end block-highlight">
                        <div class="block_l">
                            <span class="font-weight-300">Gói quà tặng trải nghiệm miễn phí các sản phẩm trong
                                hệ sinh thái số <span class="font-weight-700">HappyTime, TestCenter,
                                    SHiring</span></span>
                        </div>
                        <div class="block_r d-flex align-items-center">
                            <div class="item">

                            </div>
                            <div class="item">
                                <span class="font-weight-300">2 tháng trải nghiệm miễn phí các sản phẩm trong
                                    hệ sinh thái số <span class="font-weight-700">HappyTime, TestCenter,
                                        SHiring</span></span>
                            </div>
                            <div class="item">
                                <span class="font-weight-300">2 tháng trải nghiệm miễn phí các sản phẩm trong
                                    hệ sinh thái số <span class="font-weight-700">HappyTime, TestCenter,
                                        SHiring</span></span>
                            </div>
                            <div class="item">
                                <span class="font-weight-300">2 tháng trải nghiệm miễn phí các sản phẩm trong
                                    hệ sinh thái số <span class="font-weight-700">HappyTime, TestCenter,
                                        SHiring</span></span>
                            </div>
                            <div class="item">
                                <span class="font-weight-300">2 tháng trải nghiệm miễn phí các sản phẩm trong
                                    hệ sinh thái số <span class="font-weight-700">HappyTime, TestCenter,
                                        SHiring</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" px-[20px] md:flex md:justify-center mt-[24px]">
            <div class="relative flex md:gap-[12px] gap-[8px] items-center md:flex-row  flex-col ">
                <div
                    class="bg-white rounded text-primary text-center font-[14px] md:leading-[24px] leading-[22px] font-semibold md:px-[24px] md:py-[10px] px-[16px] py-[9px] border-[1px] border-primary show-modal-create-lead hover:bg-[#E5F7ED] hover:cursor-pointer w-full md:w-fit">
                    Tư vấn tuyển dụng
                </div>
                <a href="https://tuyendung.topcv.vn/app/register" target="_blank"
                    class="bg-primary md:px-[24px] md:py-[10px] px-[16px] py-[9px] rounded text-white text-center border-[1px] border-primary font-[14px] md:leading-[24px] leading-[22px] font-semibold hover:bg-[#19B961] w-full md:w-fit btn-post-job-free">
                    Đăng tin miễn phí
                </a>
            </div>
        </div>
    </div>

    <style>
        .d-flex {
            display: flex;
        }

        .icon-slide-gift {
            z-index: 99;
        }

        .block-slide {
            border-bottom: 1px solid rgba(233, 233, 233, 0.05);
            border-top: 1px solid rgba(233, 233, 233, 0.05);
            height: 52px;
        }

        .main_reward .head {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .head .head_l {
            padding: 20px;
            width: 20%;
        }

        .head_l img {
            width: 199px;
        }

        .head .head_r {
            width: 80%;
            padding-right: 10px;
            display: grid;
            grid-gap: 8px;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            grid-auto-columns: 1fr;
        }

        .head .head_r .item {
            padding: 20px 6px 40px;
            color: #303235;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .head .head_r .item .inner {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            line-height: 24px;
            font-weight: 400;
        }

        .head .head_r .item .inner .tt {
            font-size: 14px;
            font-weight: 600;
            display: block;
        }

        .head .head_r .item .inner .txt-green {
            font-weight: 700;
            font-size: 13px;
        }

        .main_reward .list .block-tittle-mobile {
            padding: 8px;
            font-size: 14px;
            display: flex;
            align-items: center;
            height: 130px;
        }

        .reward-list .reward-item {
            height: 130px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
            color: #303235;
            padding: 16px 20px;
            border-bottom: 1px solid rgba(233, 233, 233, 0.1);
        }

        .reward-title {
            width: 50%;
            background: #FFF;
            box-shadow: 0px 4px 20px 0px rgba(204, 212, 223, 0.33);
            border-top-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        .height-box {
            height: 250px;
        }

        .img-reward img {
            border-top-left-radius: 8px;
            height: 270px;
        }

        .main_reward .list .block-mobile {
            padding: 16px 8px;
            color: #303235;
            display: flex;
            align-items: center;
            height: 130px;
        }

        .list .block-tittle {
            border-bottom: 1px solid rgba(233, 233, 233, 0.1);
            padding: 8px;
            text-align: center;
            font-size: 20px;
        }

        .one-time img {
            width: 150px;
            margin: auto;
        }

        .one-time .icon-vip {
            width: 30px;
            margin: auto;
        }

        .main_reward .inner-mobile {
            color: #303235;
            text-align: center;
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }

        .font-rose {
            font-family: "Red Rose", serif;
        }

        .tt {
            font-weight: 600;
            font-size: 14px;
        }

        .txt-green {
            color: #00b14f;
            font-weight: 400;
        }

        .main_reward .list .block_r .item {
            width: 20%;
            font-weight: 600;
            font-size: 14px;
            color: #303235;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            text-align: center;
            justify-content: center;
        }

        .font-weight-300 {
            font-weight: 300;
        }

        .font-weight-700 {
            font-weight: 700;
        }

        .main_reward .list .block_r .item img {
            width: 24px;
        }

        .main_reward .list {
            border: 1px solid rgba(233, 233, 233, 0.1);
            margin: 0 20px;
            border-bottom: 0;
        }

        .main_reward .list .block {
            /*border-bottom: 1px solid rgba(233, 233, 233, 0.1);*/
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .block_l a {
            font-style: italic;
            font-weight: 400;
        }

        .main_reward .list .block-highlight {
            background: #FAFAFA;
            border: 1px solid rgba(233, 233, 233, 0.10);
        }

        .main_reward .list .block_l {
            width: 20%;
            padding: 16px 15px;
        }

        .main_reward .list .block_r {
            width: 80%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .main_reward .list .block_r .item .icon-check {
            position: relative;
            display: block;
        }

        @media (max-width: 960px) {
            .icon-check-slide {
                color: #00b14f;
                font-size: 35px;
            }

            .reward-list .slick-initialized {
                margin-top: -23px;
            }

            .main_reward .reward-content .list .block_l {
                text-align: center;
                font-size: 14px;
                font-weight: 400;
                display: flex;
                justify-content: center;
                flex-direction: column;
            }

            .main_reward .list .block_l {
                font-size: 14px;
                /*height: 116px;*/
            }

            .main_reward .inner {
                margin-bottom: 52px;
            }

            .main_reward .inner .tt {
                font-weight: 600;
            }

            .slick-list {
                margin-top: 20px;
            }

            .main_reward .main_title {
                font-size: 24px;
            }

            .main_reward .main_title .txt {
                font-size: 14px;
            }

            .reward-title {
                width: 50%;
            }

            .reward-content {
                width: 50%;
                position: relative;
            }

            .img-reward {}

            .one-time img {
                margin: auto;
                object-fit: fill;
                border-radius: 4px;
            }

            .main_reward .list {
                margin: unset;
            }

            .main_reward .list .block_l {
                width: 100%;
                text-align: left;
            }

            .main_reward {
                margin-bottom: 50px;
            }

            .slick-dots {
                @apply sm:hidden;
                display: flex;
                justify-content: center;
                margin: 0;
                padding: 1rem 0;
                list-style-type: none;
                position: absolute;
                top: 255px;
                left: 50px;
            }

            .slick-dots li {
                margin: 0 5px;
            }

            .slick-dots button {
                display: block;
                width: 0.5rem;
                height: 0.5rem;
                padding: 0;
                border: none;
                border-radius: 100%;
                background-color: #A6ACB2;
                text-indent: -9999px;
            }

            .slick-dots li.slick-active button {
                background-color: #00B14F;
            }

            .icon-slide-gift {
                position: absolute;
                top: 400px;
                left: 10%;
                width: 100px;
            }
        }

        .icon-slide-gift {
            position: absolute;
            top: 400px;
            left: 35%;
            width: 125px;
        }
    </style>

    <script>
        var $sliderwrap = $('.one-time');

        function setW() {

            $sliderwrap.width($sliderwrap.parent().width());
        }

        setW();
        window.addEventListener('resize', setW);
        $('.one-time').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true,
            prevArrow: false,
            nextArrow: false,
        })
    </script>
    <div id="floating-sp-mkt">
        <div class="w-[210px] rounded-[8px] overflow-hidden">
            <img id="close-img-sp-banner" src="https://tuyendung.topcv.vn/images/mkt/floating_marketing_hrtech_2024.png"
                width="210" alt="" />
        </div>
        <div id="close-img-sp" class="mt-[12px]">
            <img id="close-img-sp-icon" src="https://tuyendung.topcv.vn/images/mkt/close_floating_support_mkt.webp"
                width="24" alt="" />
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showFloatingIcon()
        })


        function showFloatingIcon() {
            if (sessionStorage.getItem('hidden_floating_icon') !== 'true') {
                $('#floating-sp-mkt').fadeIn(1000)
            }
        }

        function hiddenFloatingIcon() {
            $('#floating-sp-mkt').fadeOut(1000)
            sessionStorage.setItem('hidden_floating_icon', true)
        }

        $('#close-img-sp-banner').click(function() {
            window.open('https://hrtechconference.topcv.vn/?SOURCCE=BANNER', '_blank')
        })

        $('#close-img-sp-icon').click(function() {
            hiddenFloatingIcon()
        })
    </script>
@endsection
