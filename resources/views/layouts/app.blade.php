<!DOCTYPE html>
<html>

<head>
    <title>
        Trang Admin
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords"
        content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('backend_admin/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="{{ asset('backend_admin/css/style.css') }}" rel="stylesheet" type="text/css" />
    {{-- button --}}
    <link href="{{ asset('backend_admin/css/fronend/metachose.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend_admin/css/fronend/categorychoose.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend_admin/css/fronend/plane.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend_admin/css/fronend/hotdeal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend_admin/css/fronend/buttoncoupon.css') }}" rel="stylesheet" type="text/css" />
    <!-- font-awesome icons CSS -->
    <link href="{{ asset('backend_admin/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend_admin/css/SidebarNav.min.css') }}" media="all" rel="stylesheet" type="text/css" />


    <script src="{{ asset('backend_admin/js/modernizr.custom.js') }}"></script>


    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext"
        rel="stylesheet" />
    <script src="https://kit.fontawesome.com/3e3afb65d3.js" crossorigin="anonymous"></script>
    <!-- Metis Menu -->
    <script src="{{ asset('backend_admin/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend_admin/js/custom.js') }}"></script>
    <link href="{{ asset('backend_admin/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend_admin/css/owl.carousel.css') }}" rel="stylesheet" />
    <script src="{{ asset('backend_admin/js/owl.carousel.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('backend_admin/css/dropzone.min.css') }}">
    <script src="{{ asset('backend_admin/js/jquery-1.11.1.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#owl-demo').owlCarousel({
                items: 3,
                lazyLoad: true,
                autoPlay: true,
                pagination: true,
                nav: true,
            });
        });
    </script>

    <style>
        .image-card {
            position: relative;
        }

        .image-card .btn-danger {
            position: absolute;
            right: 20px;
            top: 20px;
        }

        .message-avatar img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
    <!-- //requried-jsfiles-for owl -->
</head>

<body class="cbp-spmenu-push">
    @if (Auth::check())
        <div class="main-content">
            <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
                <!--left-fixed -navigation-->
                <aside class="sidebar-left">
                    <nav class="navbar navbar-inverse">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target=".collapse" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <h1>
                                <a class="navbar-brand" href="{{ url('/') }}"><span
                                        class="fa fa-area-chart"></span> HOME<span class="dashboard_text">Vieclamso1
                                        Admin</span></a>
                            </h1>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="sidebar-menu">
                                <li class="header">MAIN ADMIN</li>
                                <li class="treeview">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('backend_admin/images/3643769_building_home_house_main_menu_icon.svg') }}"
                                            alt="Google" width="20" height="20">
                                        <span> Trang chủ</span>
                                    </a>
                                </li>
                                @php
                                    $segment = Request::segment(1);
                                @endphp
                                <li
                                    class="treeview {{ Request::is('users*') || Request::is('cv_templates*') || Request::is('roles*') || Request::is('categories*') ? 'active' : '' }}">
                                    <a href="#">
                                        <img src="{{ asset('backend_admin/images/9165478_unbox_package_icon.svg') }}"
                                            alt="Google" width="20" height="20">
                                        <span>Quản lý hệ thống</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li class="{{ Request::is('users*') ? 'active' : '' }}">
                                            <a href="{{ route('users.index') }}">
                                                <img src="{{ asset('backend_admin/images/9989338_rating_evaluation_grade_ranking_rate_icon.svg') }}"
                                                    alt="Google" width="20" height="20"> Tài khoản quản trị
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
                                            <a href="{{ route('roles.index') }}">
                                                <img src="{{ asset('backend_admin/images/3018587_admin_administrator_ajax_options_permission_icon.svg') }}"
                                                    alt="Google" width="20" height="20"> Phân quyền quản trị
                                            </a>
                                        </li>
                                          <li class="{{ Request::is('banks*') ? 'active' : '' }}">
                                            <a href="{{ route('banks.index') }}">
                                                <img src="{{ asset('backend_admin/images/3018587_admin_administrator_ajax_options_permission_icon.svg') }}"
                                                    alt="Google" width="20" height="20"> Thông tin thanh toán
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('categories*') ? 'active' : '' }}">
                                            <a href="{{ route('categories.index') }}">
                                                <img src="{{ asset('backend_admin/images/8673763_ic_fluent_slide_size_filled_icon.svg') }}"
                                                    alt="Google" width="20" height="20"> Thể loại ngành nghề
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('cv_templates*') ? 'active' : '' }}">
                                            <a href="{{ route('cv_templates.index') }}">
                                                <img src="{{ asset('backend_admin/images/file-cv-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Mẫu CV
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li
                                    class="treeview {{ Request::is('posts*') || Request::is('genre-posts*') || Request::is('slugs*') || Request::is('courses*') ? 'active' : '' }}">
                                    <a href="#">
                                        <img src="{{ asset('backend_admin/images/newspaper-news-svgrepo-com.svg') }}"
                                            alt="Google" width="20" height="20">
                                        <span>Bài đăng</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li class="{{ Request::is('posts*') ? 'active' : '' }}">
                                            <a href="{{ route('posts.index') }}">
                                                <img src="{{ asset('backend_admin/images/file-document-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Danh sách Bài viết
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('genre-posts*') ? 'active' : '' }}">
                                            <a href="{{ route('genre-posts.index') }}">
                                                <img src="{{ asset('backend_admin/images/category-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Cẩm nang nghề
                                                nghiệp
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('slugs*') ? 'active' : '' }}">
                                            <a href="{{ route('slugs.index') }}">
                                                <img src="{{ asset('backend_admin/images/tag-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Tags
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('courses*') ? 'active' : '' }}">
                                            <a href="{{ route('courses.index') }}">
                                                <img src="{{ asset('backend_admin/images/study-2-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Khóa học
                                            </a>
                                        </li>



                                    </ul>
                                </li>

                                <li class="treeview {{ Request::is('candidates*') ? 'active' : '' }}">
                                    <a href="{{ route('candidates.index') }}">
                                        <img src="{{ asset('backend_admin/images/candidate-for-elections-svgrepo-com.svg') }}"
                                            alt="Google" width="20" height="20">
                                        <span> Ứng viên</span>
                                    </a>
                                </li>

                                <li
                                    class="treeview {{ Request::is('employers*', 'job-postings-manage*', 'admin/companies*', 'ordermanages*', 'products*', 'employers/purchasedManage*') ? 'active' : '' }}">
                                    <a href="#">
                                        <img src="{{ asset('backend_admin/images/company-svgrepo-com.svg') }}"
                                            alt="Google" width="20" height="20">
                                        <span> Nhà tuyẻn dụng
                                            @if (
                                                $jobPostingCountTwoHour > 0 ||
                                                    $employerCountTwoHour > 0 ||
                                                    $companyCountTwoHour > 0 ||
                                                    $ordermanagesCountTwoHour > 0 ||
                                                    $ordermanagesCountTwoHour > 0 ||
                                                    $ordermanagesCountTwoHour > 0)
                                                <span class="label label-primary pull-right">new</span>
                                            @endif
                                        </span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li class="{{ Request::is('employers') ? 'active' : '' }}">
                                            <a href="{{ route('employers.index') }}">
                                                <img src="{{ asset('backend_admin/images/company-portal-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Danh sách NTD
                                                @if ($employerCountTwoHour > 0)
                                                    <span
                                                        class="label label-primary pull-right">{{ $employerCountTwoHour }}</span>
                                                @endif
                                            </a>
                                        </li>

                                        <li class="{{ Request::is('job-postings-manage') ? 'active' : '' }}">
                                            <a href="{{ route('job-postings-manage.index') }}">
                                                <img src="{{ asset('backend_admin/images/job-search-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Tin ứng tuyển
                                                @if ($jobPostingCountTwoHour > 0)
                                                    <span
                                                        class="label label-primary pull-right">{{ $jobPostingCountTwoHour }}</span>
                                                @endif
                                            </a>
                                        </li>

                                        <li class="{{ Request::is('admin/companies') ? 'active' : '' }}">
                                            <a href="{{ route('admin.companies.index') }}">
                                                <img src="{{ asset('backend_admin/images/company-small-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Công ty
                                                @if ($companyCountTwoHour > 0)
                                                    <span
                                                        class="label label-primary pull-right">{{ $companyCountTwoHour }}</span>
                                                @endif
                                            </a>
                                        </li>

                                        <li class="{{ Request::is('ordermanages') ? 'active' : '' }}">
                                            <a href="{{ route('ordermanages.index') }}">
                                                <img src="{{ asset('backend_admin/images/order-1-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Mua tin
                                                @if ($ordermanagesCountTwoHour > 0)
                                                    <span
                                                        class="label label-primary pull-right">{{ $ordermanagesCountTwoHour }}</span>
                                                @endif
                                            </a>
                                        </li>

                                        <li class="{{ Request::is('products') ? 'active' : '' }}">
                                            <a href="{{ route('products.index') }}">
                                                <img src="{{ asset('backend_admin/images/gift-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Đổi quà
                                            </a>
                                        </li>

                                        <li class="{{ Request::is('employers/purchasedManage') ? 'active' : '' }}">
                                            <a href="{{ route('employers.purchasedManage') }}">
                                                <img src="{{ asset('backend_admin/images/purchase-buy-pay-transaction-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Danh sách đổi quà
                                                @if ($ordermanagesCountTwoHour > 0)
                                                    <span
                                                        class="label label-primary pull-right">{{ $ordermanagesCountTwoHour }}</span>
                                                @endif
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('service') ? 'active' : '' }}">
                                            <a href="{{ route('employers.carts.list') }}">
                                                <img src="{{ asset('backend_admin/images/usd-square-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Danh sách dịch vụ
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                <li
                                    class="treeview {{ Request::is('plan-currencies*', 'plan-features*', 'carts*') ? 'active' : '' }}">
                                    <a href="#">
                                        <img src="{{ asset('backend_admin/images/shopping-cart-reversed-svgrepo-com.svg') }}"
                                            alt="Google" width="20" height="20">
                                        <span> Dịch vụ</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li class="{{ Request::is('plan-currencies*') ? 'active' : '' }}">
                                            <a href="{{ route('plan-currencies.index') }}">
                                                <img src="{{ asset('backend_admin/images/usd-square-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Đơn vị tiền tệ
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('plan-features*') ? 'active' : '' }}">
                                            <a href="{{ route('plan-features.index') }}">
                                                <img src="{{ asset('backend_admin/images/content-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Quyền lợi đặc biệt
                                                (Báo giá)
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('carts*') ? 'active' : '' }}">
                                            <a href="{{ route('carts.index') }}">
                                                <img src="{{ asset('backend_admin/images/shopping-cart-reversed-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Danh sách dịch vụ
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                <li
                                    class="treeview {{ Request::is('admin/info*', 'public_links*', 'partners*', 'hotlines*', 'medias*', 'awards*', 'slides*', 'salaries*') ? 'active' : '' }}">
                                    <a href="#">
                                        <img src="{{ asset('backend_admin/images/5355692_code_coding_development_programming_web_icon.svg') }}"
                                            alt="Google" width="20" height="20">
                                        <span>Giao diện</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li class="{{ Request::is('admin/info*') ? 'active' : '' }}">
                                            <a href="{{ route('admin.info.index') }}">
                                                <img src="{{ asset('backend_admin/images/5355692_code_coding_development_programming_web_icon.svg') }}"
                                                    alt="Google" width="20" height="20"> Quản lý giao diện
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('public_links*') ? 'active' : '' }}">
                                            <a href="{{ route('public_links.index') }}">
                                                <img src="{{ asset('backend_admin/images/youtube-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Giao diện cộng đồng
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('partners*') ? 'active' : '' }}">
                                            <a href="{{ route('partners.index') }}">
                                                <img src="{{ asset('backend_admin/images/cooperate-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Đối tác khách hàng
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('salaries*') ? 'active' : '' }}">
                                            <a href="{{ route('salaries.index') }}">
                                                <img src="{{ asset('backend_admin/images/usd-square-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Lương
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('hotlines*') ? 'active' : '' }}">
                                            <a href="{{ route('hotlines.index') }}">
                                                <img src="{{ asset('backend_admin/images/phone-call-alt-1-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Hotline
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('medias*') ? 'active' : '' }}">
                                            <a href="{{ route('medias.index') }}">
                                                <img src="{{ asset('backend_admin/images/press-conference-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20"> Góc báo chí
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('awards*') ? 'active' : '' }}">
                                            <a href="{{ route('awards.index') }}">
                                                <img src="{{ asset('backend_admin/images/award-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20">
                                                <span> Giải thưởng</span>
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('slides*') ? 'active' : '' }}">
                                            <a href="{{ route('slides.index') }}">
                                                <img src="{{ asset('backend_admin/images/image-svgrepo-com.svg') }}"
                                                    alt="Google" width="20" height="20">
                                                <span> Slides</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li
                                    class="treeview {{ Request::is('tin-nhan-da-gui*', 'candidate-sent-emails*', 'employer-sent-emails*') ? 'active' : '' }}">
                                    <a href="#">
                                        <img src="{{ asset('backend_admin/images/email-svgrepo-com.svg') }}"
                                            alt="Email" width="20" height="20">
                                        <span>Email</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li class="{{ Request::is('tin-nhan-da-gui*') ? 'active' : '' }}">
                                            <a href="{{ route('about.sent') }}">
                                                <img src="{{ asset('backend_admin/images/email-sent-svgrepo-com.svg') }}"
                                                    alt="About Sent" width="20" height="20"> Emails hỗ trợ
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('candidate-sent-emails*') ? 'active' : '' }}">
                                            <a href="{{ route('candidate.sentEmails') }}">
                                                <img src="{{ asset('backend_admin/images/email2-svgrepo-com.svg') }}"
                                                    alt="Candidate Emails" width="20" height="20"> Email đã
                                                gửi cho ứng viên
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('employer-sent-emails*') ? 'active' : '' }}">
                                            <a href="{{ route('employer.sentEmails') }}">
                                                <img src="{{ asset('backend_admin/images/email2-svgrepo-com.svg') }}"
                                                    alt="Employer Emails" width="20" height="20"> Email đã gửi
                                                cho công ty
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="treeview {{ Request::is('consultations*') ? 'active' : '' }}">
                                    <a href="{{ route('consultations.index') }}">
                                        <img src="{{ asset('backend_admin/images/register-svgrepo-com.svg') }}"
                                            alt="Google" width="20" height="20">
                                        <span> Đăng kí nhận tư vấn </span>
                                        @if ($consultationCountTwoHour > 0)
                                            <span
                                                class="label label-primary pull-right">{{ $consultationCountTwoHour }}</span>
                                        @endif
                                    </a>
                                </li>

                                <li class="treeview {{ Request::is('feedbacks*') ? 'active' : '' }}">
                                    <a href="{{ route('feedbacks.index.list') }}">
                                        <img src="{{ asset('backend_admin/images/feedback-positive-svgrepo-com.svg') }}"
                                            alt="Google" width="20" height="20"> Phản hồi ứng viên
                                        @if ($feedbackCountTwoHour > 0)
                                            <span
                                                class="label label-primary pull-right">{{ $feedbackCountTwoHour }}</span>
                                        @endif
                                    </a>
                                </li>

                                <li class="treeview {{ Request::is('supports*') ? 'active' : '' }}">
                                    <a href="{{ route('supports.index.list') }}">
                                        <img src="{{ asset('backend_admin/images/support-svgrepo-com.svg') }}"
                                            alt="Google" width="20" height="20"> Hỗ trợ ứng viên
                                        @if ($supportCountTwoHour > 0)
                                            <span
                                                class="label label-primary pull-right">{{ $supportCountTwoHour }}</span>
                                        @endif
                                    </a>
                                </li>

                                <li class="treeview {{ Request::is('job-reports*') ? 'active' : '' }}">
                                    <a href="{{ route('job-reports.index') }}">
                                        <img src="{{ asset('backend_admin/images/report-comment-svgrepo-com.svg') }}"
                                            alt="Google" width="20" height="20"> Tố cáo tin tuyển dụng
                                        @if ($reportCountTwoHour > 0)
                                            <span
                                                class="label label-primary pull-right">{{ $reportCountTwoHour }}</span>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                </aside>
            </div>
            <!--left-fixed -navigation-->
            <!-- header-starts -->
            <div class="sticky-header header-section">
                <div class="header-left">
                    <!--toggle button start-->
                    <button id="showLeftPush"><i class="fa fa-bars"></i></button>
                    <!--toggle button end-->
                    <div class="clearfix"></div>
                </div>
                <div class="header-right">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <div class="profile_details">
                            <ul>
                                <li class="dropdown profile_details_drop">
                                    <a href="{{ route('users.edit', auth()->user()) }}" class="dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false">
                                        <div class="profile_img">
                                            <span class="prfil-img"><img
                                                    style="width: 40px;height: 40px;border-radius: 50%;object-fit: cover;"src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                                    alt="">
                                            </span>
                                            <div class="user-name">
                                                <p> {{ Auth::user()->name }}</p>
                                                <span>{{ Auth::user()->getRoleNames() }}</span>
                                            </div>
                                            <i class="fa fa-angle-down lnr"></i>
                                            <i class="fa fa-angle-up lnr"></i>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu drp-mnu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out"></i> Đăng xuất
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('users.edit', auth()->user()) }}">
                                                <i class="fa fa-user-edit"></i> Hồ sơ
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    @endguest
                    <div class="clearfix"></div>
                </div>

                <div class="clearfix"></div>
            </div>
            <!-- //header-ends -->
            <!-- main content start-->
            <div id="page-wrapper">
                <div class="main-page">
                    <div class="col_3">
                        <div class="col-md-3 widget widget1">
                            <div class="r3_counter_box">
                                <i class="pull-left fa fa-dollar icon-rounded"></i>
                                <div class="stats">
                                    <h5><strong>{{ $activeJobListingsCount }}</strong></h5>
                                    <span>Chiến dịch đang mở</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 widget widget1">
                            <div class="r3_counter_box">
                                <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
                                <div class="stats">
                                    <h5><strong>{{ $totalJobCount }}</strong></h5>
                                    <span>Tông số việc làm</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 widget widget1">
                            <div class="r3_counter_box">
                                <i class="pull-left fa fa-money user2 icon-rounded"></i>
                                <div class="stats">
                                    <h5><strong>{{ $totalCandidateCount }}</strong></h5>
                                    <span> Ứng viên </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 widget widget1">
                            <div class="r3_counter_box">
                                <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
                                <div class="stats">
                                    <h5><strong>{{ $totalEmployerCount }}</strong></h5>
                                    <span>Nhà tuyển
                                            dụng</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 widget">
                            <div class="r3_counter_box">
                                <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                                <div class="stats">
                                    <h5><strong>{{ $totalCartEmployerCount }}</strong></h5>
                                    <span>Dịch vụ đang chạy</span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <br>


                    <script src="{{ asset('backend_admin/js/dropzone.min.js') }}"></script>
                    <!-- for amcharts js -->

                    <script src="{{ asset('backend_admin/js/amcharts.js') }}"></script>
                    <script src="{{ asset('backend_admin/js/serial.js') }}"></script>
                    <script src="{{ asset('backend_admin/js/export.min.js') }}"></script>
                    <link rel="stylesheet" href="{{ asset('backend_admin/css/export.css') }}" type="text/css"
                        media="all" />
                    <script src="{{ asset('backend_admin/js/light.js') }}"></script>
                    <!-- for amcharts js -->
                    <script src="{{ asset('backend_admin/js/index1.js') }}"></script>
                    <script src="{{ asset('backend_admin/js/index.js') }}"></script>
                    <script src="{{ asset('backend_admin/js/index2.js') }}"></script>
                    <div class="col-md-12">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <!--footer-->
            <div class="footer">
                <p>
                    &copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by
                    <a href="#" target="_blank">w3layouts</a>
                </p>
            </div>
            <!--//footer-->
        </div>
    @else
        @yield('content_login')
    @endif

    <script src="{{ asset('backend_admin/js/classie.js') }}"></script>
    <script>
        var menuLeft = document.getElementById('cbp-spmenu-s1'),
            showLeftPush = document.getElementById('showLeftPush'),
            body = document.body;

        showLeftPush.onclick = function() {
            classie.toggle(this, 'active');
            classie.toggle(body, 'cbp-spmenu-push-toright');
            classie.toggle(menuLeft, 'cbp-spmenu-open');
            disableOther('showLeftPush');
        };

        function disableOther(button) {
            if (button !== 'showLeftPush') {
                classie.toggle(showLeftPush, 'disabled');
            }
        }
    </script>
    <script src="{{ asset('backend_admin/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('backend_admin/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('backend_admin/js/scripts.js') }}"></script>
    <!--//scrolling js-->
    <!-- side nav js -->
    <script src="{{ asset('backend_admin/js/SidebarNav.min.js') }}" type="text/javascript"></script>
    <script>
        $('.sidebar-menu').SidebarNav();
    </script>
    <script src="{{ asset('backend_admin/js/bootstrap.js') }}"></script>
    <!-- //Bootstrap Core JavaScript -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        function ChangeToSlug() {

            var slug;

            //Lấy text từ thẻ input title
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '-');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }
    </script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

    <!-- Include DataTables JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#user-table').DataTable();
        });
    </script>
    <script>
        $('.jobPosting_choose').change(function() {
            var trangthai_val = $(this).val();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('jobPosting-choose') }}",
                method: "GET",
                data: {
                    trangthai_val: trangthai_val,
                    id: id
                },
                success: function(data) {
                    alert('Thay đổi thành công!');
                }
            });
        })

        $('.isHot_choose').change(function() {
            var isHot_val = $(this).val();
            var id = $(this).attr('id').split('_')[1];
            $.ajax({
                url: "{{ route('isHot-choose') }}",
                method: "GET",
                data: {
                    isHot_val: isHot_val,
                    id: id
                },
                success: function(data) {
                    alert('Thay đổi isHot thành công!');
                }
            });
        });
    </script>

    <script>
        $('.user_choose').change(function() {
            var trangthai_val = $(this).val();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('user-choose') }}",
                method: "GET",
                data: {
                    trangthai_val: trangthai_val,
                    id: id
                },
                success: function(data) {
                    alert('Thay đổi trạng thái user thành công!');
                }
            });
        })
    </script>
    <script>
        $('.media_choose').change(function() {
            var trangthai_val = $(this).val();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('media-choose') }}",
                method: "GET",
                data: {
                    trangthai_val: trangthai_val,
                    id: id
                },
                success: function(data) {
                    alert('Thay đổi trạng thái media thành công!');
                }
            });
        })
        $('.slug_choose').change(function() {
            var trangthai_val = $(this).val();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('slug-choose') }}",
                method: "GET",
                data: {
                    trangthai_val: trangthai_val,
                    id: id
                },
                success: function(data) {
                    alert('Thay đổi trạng thái tag thành công!');
                }
            });
        })
        $('.post_choose').change(function() {
            var trangthai_val = $(this).val();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('post-choose') }}",
                method: "GET",
                data: {
                    trangthai_val: trangthai_val,
                    id: id
                },
                success: function(data) {
                    alert('Thay đổi trạng thái bài viết thành công!');
                }
            });
        })
    </script>
    <script>
        $('.support_choose').change(function() {
            var trangthai_val = $(this).val();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('support-choose') }}",
                method: "GET",
                data: {
                    trangthai_val: trangthai_val,
                    id: id
                },
                success: function(data) {
                    alert('Thay đổi trạng thái support thành công!');
                }
            });
        })
    </script>
    <script>
        $('.feedback_choose').change(function() {
            var trangthai_val = $(this).val();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('feedback-choose') }}",
                method: "GET",
                data: {
                    trangthai_val: trangthai_val,
                    id: id
                },
                success: function(data) {
                    alert('Thay đổi trạng thái feedback thành công!');
                }
            });
        })
    </script>
    <script>
        $('.employer_choose').change(function() {
            var trangthai_val = $(this).val();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('employer-choose') }}",
                method: "GET",
                data: {
                    trangthai_val: trangthai_val,
                    id: id
                },
                success: function(data) {
                    alert('Thay đổi trạng thái nhà tuyển dụng thành công!');
                }
            });
        })
    </script>
    <script>
        CKEDITOR.replace('summary2');
        CKEDITOR.replace('summary3');
        CKEDITOR.replace('summary1');
        CKEDITOR.replace('summary4');
        CKEDITOR.replace('summary5');
         CKEDITOR.replace('summary6');
    </script>

    <script src="{{ asset('backend_admin/js/utils.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdn.bootcdn.net/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    {{-- {!! Toastr::message() !!} --}}

</body>

</html>
