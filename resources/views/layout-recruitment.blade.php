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




    <script src="{{ asset('code.jquery.com/jquery-2.2.4.js') }}"></script>
    <script src="{{ asset('cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js') }}"></script>
    <script src="{{ asset('maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js') }}"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css') }}" />

</head>

<body class="min-h-screen font-body bg-[#F4F5F5] pt-[68px] md:pt-[80px] text-color-default font-alexandria">
    <div id="page-container" class="page-container">
        <div class="min-h-screen">
            <div class="bg-white fixed w-full top-0 right-0 z-[100] md:border-b">
                <div class="w-container">
                    <div class="md:flex md:items-center md:h-[80px]">
                        <div class="relative h-[68px] md:h-auto flex items-center justify-center md:pr-[30px]">
                            <a href="{{ route('change.language', ['lang' => 'vi']) }}" class="business-image">
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
                                    <a class="{{ Request::routeIs('recruitment') ? 'text-primary' : '' }} hover:text-primary block pd-12 md:py-5 text-center font-medium"
                                        href="{{ route('recruitment') }}">
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
                                    <a class="{{ Request::routeIs('pricing') ? 'text-primary' : '' }} hover:text-primary block pd-12 md:py-5 text-center font-medium"
                                        href="{{ route('pricing') }}">
                                       Báo giá
                                    </a>
                                </li>

                                <li>
                                    <a class="hover:text-primary block pd-12 md:py-5 text-center font-medium"
                                        href="#">
                                        Hỗ trợ
                                    </a>
                                </li>
                            </ul>
<div class="py-[40px] md:flex md:items-center md:justify-end md:py-0 md:!ml-auto">
    <div class="mb-[35px] p-0 flex justify-center md:mb-0 md:mr-[30px]">
        <div class="ml-1 border border-gray-100">
            <a href="javascript:void(0)" onclick="translateLanguage('en')">
                <img style="width: 27px; height: 16px"
                     src="{{ asset('static.topcv.vn/srp/website/images/flags/uk.jpg') }}"
                     alt="us flag">
            </a>
        </div>
        <div class="ml-1 border border-gray-100">
            <a href="javascript:void(0)" onclick="translateLanguage('vi')">
                <img style="width: 27px; height: 16px"
                     src="{{ asset('static.topcv.vn/srp/website/images/flags/vietnam.png') }}"
                     alt="vi flag">
            </a>
        </div>
        <div class="ml-1 border border-gray-100">
            <a href="javascript:void(0)" onclick="translateLanguage('ja')">
                <img style="width: 27px; height: 16px"
                     src="{{ asset('static.topcv.vn/srp/website/images/flags/japan.png') }}"
                     alt="jp flag">
            </a>
        </div>
        <div class="ml-1 border border-gray-100">
            <a href="javascript:void(0)" onclick="translateLanguage('zh-CN')">
                <img style="width: 27px; height: 16px"
                     src="{{ asset('static.topcv.vn/srp/website/images/flags/china.png') }}"
                     alt="cn flag">
            </a>
        </div>
        <div class="ml-1 border border-gray-100">
            <a href="javascript:void(0)" onclick="translateLanguage('ko')">
                <img style="width: 27px; height: 16px"
                     src="{{ asset('static.topcv.vn/srp/website/images/flags/korea.png') }}"
                     alt="kr flag">
            </a>
        </div>
    </div>
</div>
 <!-- Google Translate Element -->
<div id="google_translate_element" style="display: none;"></div>


                            <div id="login-box" class="flex items-center justify-center">
                                <div class="grid grid-cols-2 gap-[12px]">
                                    <a href="{{ route('employer.login') }}"
                                        class="bg-white border border-primary py-[14px] px-[13px] rounded block  text-primary text-center min-w-[104px]">Đăng nhập</a>
                                    <a href="{{ route('employer.register') }}"
                                        class="bg-primary border border-primary py-[14px] px-[13px] rounded block text-white text-center min-w-[104px]">Đăng ký</a>
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
                                <h5 class="font-medium text-color-default mb-[24px] text-[18px]">Tải xuống
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
                                        <h5 class="font-semibold text-[18px] text-color-default mb-[16px]">
                                          Về Vieclamso1
                                        </h5>
                                        <ul>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="{{route('tutorial')}}" target="_blank">Giới thiệu</a>
                                            </li>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="{{route('/')}}" target="_blank">Tuyển dụng</a>
                                            </li>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="{{route('recruitment')}}" target>Liên hệ</a>
                                            </li>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="{{route('tutorial')}}" target="_blank">Góc báo chí</a>
                                            </li>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="{{route('faqs')}}" target="_blank">Chính sách bảo mật</a>
                                            </li>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="{{route('terms-of-service')}}" target="_blank">Điều khoản dịch vụ</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-[18px] text-color-default mb-[16px]">
                                           Ứng viên
                                        </h5>
                                        <ul>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="{{route('site.app')}}" target="_blank">Tìm việc làm</a>
                                            </li>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="{{route('site.courses')}}" target="_blank">Khoá học</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-[16px] md:grid-cols-1">
                                    <div>
                                        <h5 class="font-semibold text-[18px] text-color-default mb-[16px]">
                                          Đối tác</h5>
                                        <ul>
                                            <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                                                    href="#" target="_blank">Doanh nghiệp</a>
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
                                    {{ $infolglg->company_name }}</h3>
                                <ul>
                                    <li class="xl:inline mt-2.5 mr-1">
                                        <img class="inline" src="{{ asset('images/icons/tax.svg') }}"
                                            style="vertical-align: text-bottom !important;" alt="Item icon" />
                                        <span
                                            class="text-[12px] md:text-[14px] text-color-light font-light">Giấy phép đăng ký kinh doanh số:</span>
                                        <span
                                            class="text-[12px] md:text-[14px] font-medium text-color-default">{{ $info->business_license_number }}</span>
                                    </li>
                                    <li class="xl:inline mt-2.5 mr-1">
                                        <img class="inline" src="{{ asset('images/icons/paper.svg') }}"
                                            style="vertical-align: text-bottom !important;" alt="Item icon" />
                                        <span
                                            class="text-[12px] md:text-[14px] text-color-light font-light">Giấy phép hoạt động dịch vụ việc làm số:</span>
                                        <span
                                            class="text-[12px] md:text-[14px] font-medium text-color-default">{{ $info->service_license_number }}
                                        </span>
                                    </li>
                                    <li class=" mt-2.5 mr-1">
                                        <img class="inline" src="{{ asset('images/icons/location.svg') }}"
                                            style="vertical-align: text-bottom !important;" alt="Item icon" />
                                        <span
                                            class="text-[12px] md:text-[14px] text-color-light font-light">Trụ sở
                                        </span>
                                        <span
                                            class="text-[12px] md:text-[14px] font-medium text-color-default">Trụ sở</span>
                                    </li>
                                    <li class=" mt-2.5 mr-1">
                                        <img class="inline" src="{{ asset('images/icons/location.svg') }}"
                                            style="vertical-align: text-bottom !important;" alt="Item icon" />
                                        <span
                                            class="text-[12px] md:text-[14px] text-color-light font-light">Chi nhánh HCM:</span>
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
                                @foreach ($ecosystems_layout_lg as $ecosystem_layout)
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
            <a href="{{ route('consultations.store') }}" target="_blank">
                <img src="{{ asset('images/banner_form_center.png') }}" id="landing-popup-image"
                    alt="sales campaign banner" class="image-icon-banner">
            </a>
        </div>
    </div>
    <script src="{{ asset('ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}"></script>
    <link rel="modulepreload" href="{{ asset('build/assets/header.d1ee4fe5.js') }}" />
    <script type="module" src="{{ asset('build/assets/header.d1ee4fe5.js') }}"></script>
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
<!-- Google Translate Script -->
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',  // Ngôn ngữ mặc định của trang (Ví dụ: 'en' - tiếng Anh, 'vi' - tiếng Việt)
            autoDisplay: false
        }, 'google_translate_element');
    }

    function translateLanguage(languageCode) {
        const selectField = document.querySelector("select.goog-te-combo");
        if (selectField) {
            selectField.value = languageCode;
            selectField.dispatchEvent(new Event('change'));
        }
    }
</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>
