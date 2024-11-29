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
    <div class="bg-white md:py-10 lg:px-0 py-5">
        <div class="w-container mx-auto">
            @foreach ($carts->groupBy('type_cart_id') as $typeCartId => $cartsByType)
                <div class="px-[20px] lg:px-0">
                    <div class="uppercase mb-3 text-gray-600"><span
                            class="text-primary font-normal md:font-light">{{ $cartsByType->first()->typeCart->name ?? 'Unknown Type' }}</span>
                    </div>
                    <div class="md:text-[14px] font-light mb-[28px] text-color-light">{!! $cartsByType->first()->typeCart->detail ?? 'Unknown Type' !!}</div>
                </div>
                <div class="container-service">
                    <div class="container-service-right">
                        <div class="top-job">
                            @foreach ($cartsByType as $cart)
                                <div class="top-job-item item-job">
                                    <div class="header-item border-item-max">
                                        <span>{{ $cart->title }}</span>
                                    </div>
                                    <div class="item-content">
                                        <div>
                                            <span class="text-price"> {{ number_format($cart->value, 0, ',', '.') }}</span>
                                            <span class="text-primary font-weight-700">
                                                {{ $cart->planCurrency->currency }}</span>
                                        </div>
                                        <div class="text-vat">* Giá trên chưa bao gồm VAT</div>
                                        <div class="btn-contact"
                                            data-url="{{ route('job-postings.cart.detail', $cart->id) }}">
                                            {{ $tableHeaders['Liên hệ tư vấn'] }}
                                        </div>

                                        <div class="benefit-content">
                                            <div class="label-benefit"> {{ $tableHeaders['Quyền lợi đặc biệt'] }}</div>
                                            @foreach ($cart->planFeatures as $feature)
                                                <div class="d-flex" style="margin-top: 12px">
                                                    <img class="img-benefit"
                                                        src="{{ asset('static.topcv.vn/images/icons/check.png') }}"
                                                        alt="icon" />
                                                    <span class="ml-2 text-benefit"> {{ $feature->feature }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


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
@endsection
