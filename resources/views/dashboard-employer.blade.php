<!DOCTYPE html>

<head>

    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    <title>TuyenDungSo1_Trung tâm tìm việc</title>

    <!-- Mobile Specific Metas
================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
================================================== -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/colors.css') }}">

    <link rel="stylesheet" href="{{ asset('vieclamso1/css-frontend/tai-khoan-nha-tuyen-dung.css') }}" type="text/css">
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>


</head>

<body>
    <div id="wrapper">
        <!-- Header
================================================== -->
        <header class="dashboard-header">
            <div class="container">
                <div class="sixteen columns">
                    <div id="logo">
                        <h1><a href="{{ route('recruitment') }}"><img
                                    src="{{ asset('storage/' . $info->logo_recruitment) }}" style="width: 206px" /></a>
                        </h1>
                    </div>
                </div>
            </div>
        </header>
        <div class="clearfix"></div>


        <!-- Titlebar
================================================== -->

        <!-- Dashboard -->
        <div id="dashboard">
            <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard
                Navigation</a>

            <div class="dashboard-nav">
                <div class="dashboard-nav-inner">
                    <ul>

                        <li class="{{ Route::is('employer.change-password') ? 'active' : '' }}">
                            <a href="{{ route('employer.change-password') }}">
                                <div class="message-avatar">
                                    <img src="{{ Auth::guard('employer')->user()->avatar ? asset('storage/' . Auth::guard('employer')->user()->avatar) : asset('storage/avatar/avatar-default.jpg') }}"
                                        alt="">
                                    {{ Auth::guard('employer')->user()->name }}

                                </div>
                                <div data-v-76d90e0b="" class="user-role mb-2">
                                    Tài khoản xác thực: <span data-v-76d90e0b="" class="text-primary mr-2">Cấp
                                        {{ Auth::guard('employer')->user()->level }}/3</span></div>

                            </a>
                        </li>
                        <li class="{{ Route::is('job-postings.dashboard') ? 'active' : '' }}">
                            <a href="{{ route('job-postings.dashboard') }}"><span class="ln ln-icon-Align-JustifyAll"></span> Bảng tin</a>
                        </li>
                        <li
                            class="{{ Route::is('job-postings.index') || Route::is('job-postings.show') || Route::is('job-postings.edit') ? 'active' : '' }}">
                            <a href="{{ route('job-postings.index') }}"><span class="ln ln-icon-Blackboard"></span> Chiến dịch tuyển dụng
                            </a>
                        </li>
                        <li class="{{ Route::is('job-postings.create') ? 'active' : '' }}">
                            <a href="{{ route('job-postings.create') }}"><span class="ln ln-icon-Drag-Down"></span> Add Job</a>
                        </li>
                        <li class="{{ Route::is('messages.receive') || Route::is('messages.show') ? 'active' : '' }}">
                            <a href="{{ route('messages.receive') }}"><span class="ln ln-icon-Bird-DeliveringLetter"></span> Message </a>
                        </li>
                        <li class="{{ Route::is('loyal-customer') ? 'active' : '' }}">
                            <a href="{{ route('loyal-customer') }}"><span class="ln ln-icon-Gift-Box"></span> Rewards </a>
                        </li>
                        <li class="{{ Route::is('buy-gift') ? 'active' : '' }}">
                            <a href="{{ route('buy-gift') }}"><span class="ln ln-icon-Sled-withGifts"></span> Đổi quà </a>
                        </li>
                        <li class="{{ Route::is('job-postings.cart') ? 'active' : '' }}">
                            <a href="{{ route('job-postings.cart') }}"><span class="ln ln-icon-Film-Cartridge"></span> Buy Services </a>
                        </li>
                        <li class="{{ Route::is('cartlist.index') ? 'active' : '' }}">
                            <a href="{{ route('cartlist.index') }}"><span class="ln ln-icon-Add-Cart"></span> My cart </a>
                        </li>
                        <li
                            class="{{ Route::is('cartlist.listOrder') || Route::is('cartlist.showOrder') ? 'active' : '' }}">
                            <a href="{{ route('cartlist.listOrder') }}"><span class="ln ln-icon-Full-Cart"></span> My Order </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="ln ln-icon-Align-Center"></span> Logout</a>
                            <form id="logout-form" action="{{ route('logout-employer') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>




                </div>
            </div>
            <!-- Navigation / End -->


            <!-- Content
 ================================================== -->
            <div class="dashboard-content">
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
            <!-- Content / End -->


        </div>
        <!-- Dashboard / End -->


    </div>
    <!-- Wrapper / End -->


    <!-- Scripts
================================================== -->
    <script src="{{ asset('backend/scripts/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('backend/scripts/jquery-migrate-3.1.0.min.js') }}"></script>
    <script src="{{ asset('backend/scripts/custom.js') }}"></script>
    <script src="{{ asset('backend/scripts/jquery.superfish.js') }}"></script>
    <script src="{{ asset('backend/scripts/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('backend/scripts/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('backend/scripts/jquery.themepunch.showbizpro.min.js') }}"></script>
    <script src="{{ asset('backend/scripts/jquery.flexslider-min.js') }}"></script>
    <script src="{{ asset('backend/scripts/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('backend/scripts/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('backend/scripts/waypoints.min.js') }}"></script>
    <script src="{{ asset('backend/scripts/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('backend/scripts/jquery.jpanelmenu.js') }}"></script>
    <script src="{{ asset('backend/scripts/stacktable.js') }}"></script>
    <script src="{{ asset('backend/scripts/slick.min.js') }}"></script>
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

    <!-- Include DataTables JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#user-table').DataTable();
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('summary');
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
    <!-- Include jQuery and Slick JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

    <!-- Initialize the slider -->
    <script>
        $(document).ready(function() {
            $('.VueCarousel-inner').slick({
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
                dots: true
            });
        });
    </script>
     <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdn.bootcdn.net/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</body>

</html>
