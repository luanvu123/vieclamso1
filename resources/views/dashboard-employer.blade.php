<!DOCTYPE html>

<head>

    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    <title>Work Scout</title>

    <!-- Mobile Specific Metas
================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
================================================== -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/colors.css') }}">


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
                                    src="{{ asset('static.topcv.vn/v4/image/logo/topcv-logo-6.png') }}"
                                    style="width: 206px" alt="Work Scout" /></a></h1>
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

                    <ul data-submenu-title="Start">
                        <li class="active"><a href="{{ route('recruitment') }}">Dashboard</a></li>
                    </ul>

                    <ul data-submenu-title="Management">
                        <li><a href="{{ route('job-postings.index') }}">Job</a>
                        </li>
                        <li><a href="{{ route('job-postings.create') }}">Add Job</a>
                        </li>
                    </ul>
                    <ul data-submenu-title="Account">
                        <li><a href="{{route('employer.profile')}}">My Profile</a></li>
                        <li><a href="{{ route('logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout-employer') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>

                </div>
            </div>
            <!-- Navigation / End -->


            <!-- Content
 ================================================== -->
            <div class="dashboard-content">
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
    <script>
        $('.application_choose').change(function() {
            var trangthai_val = $(this).val();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('application-choose') }}",
                method: "GET",
                data: {
                    trangthai_val: trangthai_val,
                    id: id
                },
                success: function(data) {
                    alert('Thay đổi trạng thái cv thành công!');
                }
            });
        })
    </script>
</body>

</html>