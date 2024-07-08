<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vieclamso1 | Bootstrap 5 Admin Dashboard Template</title>
    <!--favicon-->
    <link rel="icon"
        href="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/images/favicon-32x32.png"
        type="image/png">
    <!-- loader-->
    <link href="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/css/pace.min.css" rel="stylesheet">
    <script src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menuassets/js/pace.min.js"></script>

    <!--plugins-->
    <link
        href="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/plugins/metismenu/metisMenu.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/plugins/metismenu/mm-vertical.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/plugins/simplebar/css/simplebar.css">
    <!--bootstrap css-->
    <link href="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/css/bootstrap.min.css"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/css/bootstrap-extended.css"
        rel="stylesheet">
    <link href="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/sass/main.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/sass/dark-theme.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/sass/blue-theme.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/sass/semi-dark.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/sass/bordered-theme.css"
        rel="stylesheet">
    <link href="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/sass/responsive.css" rel="stylesheet">

</head>

<body>

    <!--start header-->
    <header class="top-header">
        <nav class="navbar navbar-expand align-items-center gap-4">
            <div class="btn-toggle">
                <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative">
                    <input class="form-control rounded-5 px-5 search-control d-lg-block d-none" type="text"
                        placeholder="Search">
                    <span
                        class="material-icons-outlined position-absolute d-lg-block d-none ms-3 translate-middle-y start-0 top-50">search</span>
                    <span
                        class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 search-close">close</span>
                    <div class="search-popup p-3">
                        <div class="card rounded-4 overflow-hidden">
                            <div class="card-header d-lg-none">
                                <div class="position-relative">
                                    <input class="form-control rounded-5 px-5 mobile-search-control" type="text"
                                        placeholder="Search">
                                    <span
                                        class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                                    <span
                                        class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 mobile-search-close">close</span>
                                </div>
                            </div>
                            <div class="card-body search-content">
                                <p class="search-title">Recent Searches</p>
                                <div class="d-flex align-items-start flex-wrap gap-2 kewords-wrapper">
                                    <a href="javascript:;" class="kewords"><span>Angular Template</span><i
                                            class="material-icons-outlined fs-6">search</i></a>
                                    <a href="javascript:;" class="kewords"><span>Dashboard</span><i
                                            class="material-icons-outlined fs-6">search</i></a>
                                    <a href="javascript:;" class="kewords"><span>Admin Template</span><i
                                            class="material-icons-outlined fs-6">search</i></a>
                                    <a href="javascript:;" class="kewords"><span>Bootstrap 5 Admin</span><i
                                            class="material-icons-outlined fs-6">search</i></a>
                                    <a href="javascript:;" class="kewords"><span>Html eCommerce</span><i
                                            class="material-icons-outlined fs-6">search</i></a>
                                    <a href="javascript:;" class="kewords"><span>Sass</span><i
                                            class="material-icons-outlined fs-6">search</i></a>
                                    <a href="javascript:;" class="kewords"><span>laravel 9</span><i
                                            class="material-icons-outlined fs-6">search</i></a>
                                </div>
                                <hr>
                                <p class="search-title">Tutorials</p>
                                <div class="search-list d-flex flex-column gap-2">
                                    <div class="search-list-item d-flex align-items-center gap-3">
                                        <div class="list-icon">
                                            <i class="material-icons-outlined fs-5">play_circle</i>
                                        </div>
                                        <div class="">
                                            <h5 class="mb-0 search-list-title ">Wordpress Tutorials</h5>
                                        </div>
                                    </div>
                                    <div class="search-list-item d-flex align-items-center gap-3">
                                        <div class="list-icon">
                                            <i class="material-icons-outlined fs-5">shopping_basket</i>
                                        </div>
                                        <div class="">
                                            <h5 class="mb-0 search-list-title">eCommerce Website Tutorials</h5>
                                        </div>
                                    </div>

                                    <div class="search-list-item d-flex align-items-center gap-3">
                                        <div class="list-icon">
                                            <i class="material-icons-outlined fs-5">laptop</i>
                                        </div>
                                        <div class="">
                                            <h5 class="mb-0 search-list-title">Responsive Design</h5>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <p class="search-title">Members</p>

                                <div class="search-list d-flex flex-column gap-2">
                                    <div class="search-list-item d-flex align-items-center gap-3">
                                        <div class="memmber-img">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/images/avatars/01.png"
                                                width="32" height="32" class="rounded-circle" alt="">
                                        </div>
                                        <div class="">
                                            <h5 class="mb-0 search-list-title ">Andrew Stark</h5>
                                        </div>
                                    </div>

                                    <div class="search-list-item d-flex align-items-center gap-3">
                                        <div class="memmber-img">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/images/avatars/02.png"
                                                width="32" height="32" class="rounded-circle" alt="">
                                        </div>
                                        <div class="">
                                            <h5 class="mb-0 search-list-title ">Snetro Jhonia</h5>
                                        </div>
                                    </div>

                                    <div class="search-list-item d-flex align-items-center gap-3">
                                        <div class="memmber-img">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/images/avatars/03.png"
                                                width="32" height="32" class="rounded-circle" alt="">
                                        </div>
                                        <div class="">
                                            <h5 class="mb-0 search-list-title">Michle Clark</h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-center bg-transparent">
                                <a href="javascript:;" class="btn w-100">See All Search Results</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav gap-1 nav-right-links align-items-center">
                <li class="nav-item d-lg-none mobile-search-btn">
                    <a class="nav-link" href="javascript:;"><i class="material-icons-outlined">search</i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="avascript:;"
                        data-bs-toggle="dropdown"><img
                            src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/county/02.png"
                            width="22" alt="">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/county/01.png"
                                    width="20" alt=""><span class="ms-2">English</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/county/02.png"
                                    width="20" alt=""><span class="ms-2">Catalan</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/county/03.png"
                                    width="20" alt=""><span class="ms-2">French</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/county/04.png"
                                    width="20" alt=""><span class="ms-2">Belize</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/county/05.png"
                                    width="20" alt=""><span class="ms-2">Colombia</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/county/06.png"
                                    width="20" alt=""><span class="ms-2">Spanish</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/county/07.png"
                                    width="20" alt=""><span class="ms-2">Georgian</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/county/08.png"
                                    width="20" alt=""><span class="ms-2">Hindi</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown position-static  d-md-flex d-none">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-auto-close="outside"
                        data-bs-toggle="dropdown" href="javascript:;"><i
                            class="material-icons-outlined">done_all</i></a>
                    <div class="dropdown-menu dropdown-menu-end mega-menu shadow-lg p-4 p-lg-5">
                        <div class="mega-menu-widgets">
                            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-4 g-lg-5">
                                <div class="col">
                                    <div class="card rounded-4 shadow-none border mb-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start gap-3">
                                                <div class="mega-menu-icon flex-shrink-0 bg-danger">
                                                    <i class="material-icons-outlined">question_answer</i>
                                                </div>
                                                <div class="mega-menu-content">
                                                    <h5>Marketing</h5>
                                                    <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum
                                                        is a placeholder text commonly used to demonstrate
                                                        the visual form of a document.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card rounded-4 shadow-none border mb-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start gap-3">
                                                <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/megaIcons/02.png"
                                                    width="40" alt="">
                                                <div class="mega-menu-content">
                                                    <h5>Website</h5>
                                                    <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum
                                                        is a placeholder text commonly used to demonstrate
                                                        the visual form of a document.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card rounded-4 shadow-none border mb-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start gap-3">
                                                <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/megaIcons/03.png"
                                                    width="40" alt="">
                                                <div class="mega-menu-content">
                                                    <h5>Subscribers</h5>
                                                    <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum
                                                        is a placeholder text commonly used to demonstrate
                                                        the visual form of a document.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card rounded-4 shadow-none border mb-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start gap-3">
                                                <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/megaIcons/01.png"
                                                    width="40" alt="">
                                                <div class="mega-menu-content">
                                                    <h5>Hubspot</h5>
                                                    <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum
                                                        is a placeholder text commonly used to demonstrate
                                                        the visual form of a document.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card rounded-4 shadow-none border mb-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start gap-3">
                                                <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/megaIcons/11.png"
                                                    width="40" alt="">
                                                <div class="mega-menu-content">
                                                    <h5>Templates</h5>
                                                    <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum
                                                        is a placeholder text commonly used to demonstrate
                                                        the visual form of a document.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card rounded-4 shadow-none border mb-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start gap-3">
                                                <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/megaIcons/13.png"
                                                    width="40" alt="">
                                                <div class="mega-menu-content">
                                                    <h5>Ebooks</h5>
                                                    <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum
                                                        is a placeholder text commonly used to demonstrate
                                                        the visual form of a document.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card rounded-4 shadow-none border mb-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start gap-3">
                                                <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/megaIcons/12.png"
                                                    width="40" alt="">
                                                <div class="mega-menu-content">
                                                    <h5>Sales</h5>
                                                    <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum
                                                        is a placeholder text commonly used to demonstrate
                                                        the visual form of a document.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card rounded-4 shadow-none border mb-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start gap-3">
                                                <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/megaIcons/08.png"
                                                    width="40" alt="">
                                                <div class="mega-menu-content">
                                                    <h5>Tools</h5>
                                                    <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum
                                                        is a placeholder text commonly used to demonstrate
                                                        the visual form of a document.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card rounded-4 shadow-none border mb-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start gap-3">
                                                <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/megaIcons/09.png"
                                                    width="40" alt="">
                                                <div class="mega-menu-content">
                                                    <h5>Academy</h5>
                                                    <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum
                                                        is a placeholder text commonly used to demonstrate
                                                        the visual form of a document.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-auto-close="outside"
                        data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">apps</i></a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-apps shadow-lg p-3">
                        <div class="border rounded-4 overflow-hidden">
                            <div class="row row-cols-3 g-0 border-bottom">
                                <div class="col border-end">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/apps/01.png"
                                                width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Gmail</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col border-end">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/apps/02.png"
                                                width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Skype</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/apps/03.png"
                                                width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Slack</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->

                            <div class="row row-cols-3 g-0 border-bottom">
                                <div class="col border-end">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/apps/04.png"
                                                width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">YouTube</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col border-end">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/apps/05.png"
                                                width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Google</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/apps/06.png"
                                                width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Instagram</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->

                            <div class="row row-cols-3 g-0 border-bottom">
                                <div class="col border-end">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/apps/07.png"
                                                width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Spotify</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col border-end">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/apps/08.png"
                                                width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Yahoo</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/apps/09.png"
                                                width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Facebook</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->

                            <div class="row row-cols-3 g-0">
                                <div class="col border-end">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/apps/10.png"
                                                width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Figma</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col border-end">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/apps/11.png"
                                                width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Paypal</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/apps/12.png"
                                                width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Photo</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                        data-bs-auto-close="outside" data-bs-toggle="dropdown" href="javascript:;"><i
                            class="material-icons-outlined">notifications</i>
                        <span class="badge-notify">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
                        <div class="px-3 py-1 d-flex align-items-center justify-content-between border-bottom">
                            <h5 class="notiy-title mb-0">Notifications</h5>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle dropdown-toggle-nocaret option"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="material-icons-outlined">
                                        more_vert
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-option dropdown-menu-end shadow">
                                    <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                            href="javascript:;"><i
                                                class="material-icons-outlined fs-6">inventory_2</i>Archive All</a>
                                    </div>
                                    <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                            href="javascript:;"><i
                                                class="material-icons-outlined fs-6">done_all</i>Mark all as read</a>
                                    </div>
                                    <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                            href="javascript:;"><i
                                                class="material-icons-outlined fs-6">mic_off</i>Disable
                                            Notifications</a></div>
                                    <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                            href="javascript:;"><i
                                                class="material-icons-outlined fs-6">grade</i>What's new ?</a></div>
                                    <div>
                                        <hr class="dropdown-divider">
                                    </div>
                                    <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                            href="javascript:;"><i
                                                class="material-icons-outlined fs-6">leaderboard</i>Reports</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="notify-list">
                            <div>
                                <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/avatars/01.png"
                                                class="rounded-circle" width="45" height="45" alt="">
                                        </div>
                                        <div class="">
                                            <h5 class="notify-title">Congratulations Jhon</h5>
                                            <p class="mb-0 notify-desc">Many congtars jhon. You have won the gifts.</p>
                                            <p class="mb-0 notify-time">Today</p>
                                        </div>
                                        <div class="notify-close position-absolute end-0 me-3">
                                            <i class="material-icons-outlined fs-6">close</i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="user-wrapper bg-primary text-primary bg-opacity-10">
                                            <span>RS</span>
                                        </div>
                                        <div class="">
                                            <h5 class="notify-title">New Account Created</h5>
                                            <p class="mb-0 notify-desc">From USA an user has registered.</p>
                                            <p class="mb-0 notify-time">Yesterday</p>
                                        </div>
                                        <div class="notify-close position-absolute end-0 me-3">
                                            <i class="material-icons-outlined fs-6">close</i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/apps/13.png"
                                                class="rounded-circle" width="45" height="45" alt="">
                                        </div>
                                        <div class="">
                                            <h5 class="notify-title">Payment Recived</h5>
                                            <p class="mb-0 notify-desc">New payment recived successfully</p>
                                            <p class="mb-0 notify-time">1d ago</p>
                                        </div>
                                        <div class="notify-close position-absolute end-0 me-3">
                                            <i class="material-icons-outlined fs-6">close</i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/apps/14.png"
                                                class="rounded-circle" width="45" height="45" alt="">
                                        </div>
                                        <div class="">
                                            <h5 class="notify-title">New Order Recived</h5>
                                            <p class="mb-0 notify-desc">Recived new order from michle</p>
                                            <p class="mb-0 notify-time">2:15 AM</p>
                                        </div>
                                        <div class="notify-close position-absolute end-0 me-3">
                                            <i class="material-icons-outlined fs-6">close</i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/avatars/06.png"
                                                class="rounded-circle" width="45" height="45" alt="">
                                        </div>
                                        <div class="">
                                            <h5 class="notify-title">Congratulations Jhon</h5>
                                            <p class="mb-0 notify-desc">Many congtars jhon. You have won the gifts.</p>
                                            <p class="mb-0 notify-time">Today</p>
                                        </div>
                                        <div class="notify-close position-absolute end-0 me-3">
                                            <i class="material-icons-outlined fs-6">close</i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a class="dropdown-item py-2" href="javascript:;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="user-wrapper bg-danger text-danger bg-opacity-10">
                                            <span>PK</span>
                                        </div>
                                        <div class="">
                                            <h5 class="notify-title">New Account Created</h5>
                                            <p class="mb-0 notify-desc">From USA an user has registered.</p>
                                            <p class="mb-0 notify-time">Yesterday</p>
                                        </div>
                                        <div class="notify-close position-absolute end-0 me-3">
                                            <i class="material-icons-outlined fs-6">close</i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item d-md-flex d-none">
                    <a class="nav-link position-relative" data-bs-toggle="offcanvas" href="#offcanvasCart"><i
                            class="material-icons-outlined">shopping_cart</i>
                        <span class="badge-notify">8</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                            class="rounded-circle p-1 border" width="45" height="45" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                        <a class="dropdown-item  gap-2 py-2" href="javascript:;">
                            <div class="text-center">
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                    class="rounded-circle p-1 shadow mb-3" width="90" height="90"
                                    alt="">
                                <h5 class="user-name mb-0 fw-bold">Hello, {{ Auth::user()->name }}</h5>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('users.show', Auth::user()->id) }}"><i
                                class="material-icons-outlined">person_outline</i>Profile</a>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                class="material-icons-outlined">local_bar</i>Setting</a>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                class="material-icons-outlined">dashboard</i>Dashboard</a>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                class="material-icons-outlined">account_balance</i>Earning</a>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                class="material-icons-outlined">cloud_download</i>Downloads</a>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                class="material-icons-outlined">power_settings_new</i>Logout</a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                    </div>
                </li>
            </ul>

        </nav>
    </header>
    <!--end top header-->


    <!--start sidebar-->
    <aside class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div class="logo-icon">
                <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/logo-icon.png"
                    class="logo-img" alt="">
            </div>
            <div class="logo-name flex-grow-1">
                <h5 class="mb-0">Maxton</h5>
            </div>
            <div class="sidebar-close">
                <span class="material-icons-outlined">close</span>
            </div>
        </div>
        <div class="sidebar-nav">
            <!--navigation-->
            <ul class="metismenu" id="sidenav">
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="material-icons-outlined">home</i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                    <ul>
                        <li><a href="index.html"><i class="material-icons-outlined">arrow_right</i>Analysis</a>
                        </li>
                        <li><a href="{{ url('/home') }}"><i
                                    class="material-icons-outlined">arrow_right</i>eCommerce</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="material-icons-outlined">shopping_bag</i>
                        </div>
                        <div class="menu-title">Home</div>
                    </a>
                    <ul>
                        <li><a href="{{ route('users.index') }}"><i class="material-icons-outlined">arrow_right</i>
                                User</a>
                        </li>
                        <li><a href="{{ route('roles.index') }}"><i
                                    class="material-icons-outlined">arrow_right</i>Roles</a>
                        </li>
                        <li><a href="ecommerce-customers.html"><i
                                    class="material-icons-outlined">arrow_right</i>Customers</a>
                        </li>
                        <li><a href="ecommerce-customer-details.html"><i
                                    class="material-icons-outlined">arrow_right</i>Customer Details</a>
                        </li>
                        <li><a href="ecommerce-orders.html"><i
                                    class="material-icons-outlined">arrow_right</i>Orders</a>
                        </li>
                        <li><a href="ecommerce-order-details.html"><i
                                    class="material-icons-outlined">arrow_right</i>Order Details</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascrpt:;">
                        <div class="parent-icon"><i class="material-icons-outlined">support</i>
                        </div>
                        <div class="menu-title">Support</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
    </aside>
    <!--end sidebar-->
    <main class="main-wrapper">
        <div class="main-content">
            @yield('content')
        </div>
    </main>

    <!--start overlay-->
    <div class="overlay btn-toggle"></div>
    <!--end overlay-->


    <!--start footer-->
    <footer class="page-footer">
        <p class="mb-0">Copyright © 2024. All right reserved.</p>
    </footer>
    <!--end footer-->

    <!--start cart-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart">
        <div class="offcanvas-header border-bottom h-70">
            <h5 class="mb-0" id="offcanvasRightLabel">8 New Orders</h5>
            <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
                <i class="material-icons-outlined">close</i>
            </a>
        </div>
        <div class="offcanvas-body p-0">
            <div class="order-list">
                <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
                    <div class="order-img">
                        <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/orders/01.png"
                            class="img-fluid rounded-3" width="75" alt="">
                    </div>
                    <div class="order-info flex-grow-1">
                        <h5 class="mb-1 order-title">White Men Shoes</h5>
                        <p class="mb-0 order-price">$289</p>
                    </div>
                    <div class="d-flex">
                        <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
                        <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
                    </div>
                </div>

                <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
                    <div class="order-img">
                        <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/orders/02.png"
                            class="img-fluid rounded-3" width="75" alt="">
                    </div>
                    <div class="order-info flex-grow-1">
                        <h5 class="mb-1 order-title">Red Airpods</h5>
                        <p class="mb-0 order-price">$149</p>
                    </div>
                    <div class="d-flex">
                        <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
                        <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
                    </div>
                </div>

                <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
                    <div class="order-img">
                        <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/orders/03.png"
                            class="img-fluid rounded-3" width="75" alt="">
                    </div>
                    <div class="order-info flex-grow-1">
                        <h5 class="mb-1 order-title">Men Polo Tshirt</h5>
                        <p class="mb-0 order-price">$139</p>
                    </div>
                    <div class="d-flex">
                        <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
                        <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
                    </div>
                </div>

                <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
                    <div class="order-img">
                        <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/orders/04.png"
                            class="img-fluid rounded-3" width="75" alt="">
                    </div>
                    <div class="order-info flex-grow-1">
                        <h5 class="mb-1 order-title">Blue Jeans Casual</h5>
                        <p class="mb-0 order-price">$485</p>
                    </div>
                    <div class="d-flex">
                        <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
                        <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
                    </div>
                </div>

                <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
                    <div class="order-img">
                        <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/orders/05.png"
                            class="img-fluid rounded-3" width="75" alt="">
                    </div>
                    <div class="order-info flex-grow-1">
                        <h5 class="mb-1 order-title">Fancy Shirts</h5>
                        <p class="mb-0 order-price">$758</p>
                    </div>
                    <div class="d-flex">
                        <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
                        <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
                    </div>
                </div>

                <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
                    <div class="order-img">
                        <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/orders/06.png"
                            class="img-fluid rounded-3" width="75" alt="">
                    </div>
                    <div class="order-info flex-grow-1">
                        <h5 class="mb-1 order-title">Home Sofa Set </h5>
                        <p class="mb-0 order-price">$546</p>
                    </div>
                    <div class="d-flex">
                        <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
                        <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
                    </div>
                </div>

                <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
                    <div class="order-img">
                        <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/orders/07.png"
                            class="img-fluid rounded-3" width="75" alt="">
                    </div>
                    <div class="order-info flex-grow-1">
                        <h5 class="mb-1 order-title">Black iPhone</h5>
                        <p class="mb-0 order-price">$1049</p>
                    </div>
                    <div class="d-flex">
                        <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
                        <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
                    </div>
                </div>

                <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
                    <div class="order-img">
                        <img src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//images/orders/08.png"
                            class="img-fluid rounded-3" width="75" alt="">
                    </div>
                    <div class="order-info flex-grow-1">
                        <h5 class="mb-1 order-title">Goldan Watch</h5>
                        <p class="mb-0 order-price">$689</p>
                    </div>
                    <div class="d-flex">
                        <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
                        <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas-footer h-70 p-3 border-top">
            <div class="d-grid">
                <button type="button" class="btn btn-grd btn-grd-primary" data-bs-dismiss="offcanvas">View
                    Products</button>
            </div>
        </div>
    </div>
    <!--end cart-->



    <!--start switcher-->
    <button class="btn btn-grd btn-grd-primary position-fixed bottom-0 end-0 m-3 d-flex align-items-center gap-2"
        type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop">
        <i class="material-icons-outlined">tune</i>Customize
    </button>

    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="staticBackdrop">
        <div class="offcanvas-header border-bottom h-70">
            <div class="">
                <h5 class="mb-0">Theme Customizer</h5>
                <p class="mb-0">Customize your theme</p>
            </div>
            <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
                <i class="material-icons-outlined">close</i>
            </a>
        </div>
        <div class="offcanvas-body">
            <div>
                <p>Theme variation</p>

                <div class="row g-3">
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="BlueTheme" checked>
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="BlueTheme">
                            <span class="material-icons-outlined">contactless</span>
                            <span>Blue</span>
                        </label>
                    </div>
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="LightTheme">
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="LightTheme">
                            <span class="material-icons-outlined">light_mode</span>
                            <span>Light</span>
                        </label>
                    </div>
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="DarkTheme">
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="DarkTheme">
                            <span class="material-icons-outlined">dark_mode</span>
                            <span>Dark</span>
                        </label>
                    </div>
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="SemiDarkTheme">
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="SemiDarkTheme">
                            <span class="material-icons-outlined">contrast</span>
                            <span>Semi Dark</span>
                        </label>
                    </div>
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="BoderedTheme">
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="BoderedTheme">
                            <span class="material-icons-outlined">border_style</span>
                            <span>Bordered</span>
                        </label>
                    </div>
                </div><!--end row-->

            </div>
        </div>
    </div>
    <!--start switcher-->

    <!--bootstrap js-->
    <script src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/js/bootstrap.bundle.min.js">
    </script>

    <!--plugins-->
    <script src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/js/jquery.min.js"></script>
    <!--plugins-->
    <script
        src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets//plugins/perfect-scrollbar/js/perfect-scrollbar.js">
    </script>
    <script src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/plugins/metismenu/metisMenu.min.js">
    </script>
    <script
        src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/plugins/apexchart/apexcharts.min.js">
    </script>
    <script
        src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/plugins/simplebar/js/simplebar.min.js">
    </script>
    <script src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/plugins/peity/jquery.peity.min.js">
    </script>
    <script>
        $(".data-attributes span").peity("donut")
    </script>
    <script src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/js/dashboard2.js"></script>
    <script src="{{ asset('backend') }}/codervent.com/maxton/demo/vertical-menu/assets/js/main.js"></script>

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

    <!-- Include DataTables JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#user-table').DataTable();
        });
    </script>

</body>

</html>
