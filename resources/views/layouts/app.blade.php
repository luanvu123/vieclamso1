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

                    <!-- Logo -->
                    <div id="logo">
                        <h1><a href="{{ route('/') }}"><img
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

            <!-- Navigation
 ================================================== -->

            <!-- Responsive Navigation Trigger -->
            <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard
                Navigation</a>

            <div class="dashboard-nav">
                <div class="dashboard-nav-inner">

                    <ul data-submenu-title="Start">
                        <li class="{{ Route::is('home') ? 'active' : '' }}">
                            <a href="{{ route('home') }}">Dashboard</a>
                        </li>
                    </ul>

                    <ul data-submenu-title="Management">
                        <li
                            class="{{ Route::is('users.index') || Route::is('roles.index') || Route::is('categories.index') || Route::is('awards.index') || Route::is('ecosystems.index') || Route::is('medias.index') ? 'active-submenu' : '' }}">
                            <a href="#">General Management</a>
                            <ul>
                                <li class="{{ Route::is('users.index') ? 'active' : '' }}">
                                    <a href="{{ route('users.index') }}">Manage Users</a>
                                </li>
                                <li class="{{ Route::is('roles.index') ? 'active' : '' }}">
                                    <a href="{{ route('roles.index') }}">Manage Roles</a>
                                </li>
                                <li class="{{ Route::is('categories.index') ? 'active' : '' }}">
                                    <a href="{{ route('categories.index') }}">Manage Categories</a>
                                </li>
                                <li class="{{ Route::is('awards.index') ? 'active' : '' }}">
                                    <a href="{{ route('awards.index') }}">Manage Awards</a>
                                </li>
                                <li class="{{ Route::is('ecosystems.index') ? 'active' : '' }}">
                                    <a href="{{ route('ecosystems.index') }}">Manage Ecosystems</a>
                                </li>
                                <li class="{{ Route::is('medias.index') ? 'active' : '' }}">
                                    <a href="{{ route('medias.index') }}">Manage Medias</a>
                                </li>

                            </ul>
                        </li>

                        <li
                            class="{{ Route::is('posts.index') || Route::is('genre-posts.index') || Route::is('slugs.index') || Route::is('courses.index') ? 'active-submenu' : '' }}">
                            <a href="#">Posts</a>
                            <ul>
                                <li class="{{ Route::is('posts.index') ? 'active' : '' }}">
                                    <a href="{{ route('posts.index') }}">Manage Posts</a>
                                </li>
                                <li class="{{ Route::is('genre-posts.index') ? 'active' : '' }}">
                                    <a href="{{ route('genre-posts.index') }}">Manage Genres</a>
                                </li>
                                <li class="{{ Route::is('slugs.index') ? 'active' : '' }}">
                                    <a href="{{ route('slugs.index') }}">Manage Tags</a>
                                </li>
                                <li class="{{ Route::is('courses.index') ? 'active' : '' }}">
                                    <a href="{{ route('courses.index') }}">Manage Courses</a>
                                </li>
                                <li class="{{ Route::is('type_feedback.index') ? 'active' : '' }}">
                                    <a href="{{ route('type_feedback.index') }}">Manage Type feedback</a>
                                </li>
                                <li class="{{ Route::is('type_support.index') ? 'active' : '' }}">
                                    <a href="{{ route('type_support.index') }}">Manage Type Support</a>
                                </li>
                            </ul>
                        </li>

                        <li class="{{ Route::is('candidates.index') ? 'active-submenu' : '' }}">
                            <a href="#">Candidates</a>
                            <ul>
                                <li class="{{ Route::is('candidates.index') ? 'active' : '' }}">
                                    <a href="{{ route('candidates.index') }}">Manage Candidates
                                        @if ($candidateCountTwoHour > 0)
                                            <span class="nav-tag">{{ $candidateCountTwoHour }}</span>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li
                            class="{{ Route::is('employers.index') || Route::is('job-postings-manage.index') || Route::is('admin.companies.index') ? 'active-submenu' : '' }}">
                            <a href="#">Employers</a>
                            <ul>
                                <li class="{{ Route::is('employers.index') ? 'active' : '' }}">
                                    <a href="{{ route('employers.index') }}">Manage Employers
                                        @if ($employerCountTwoHour > 0)
                                            <span class="nav-tag">{{ $employerCountTwoHour }}</span>
                                        @endif
                                    </a>
                                </li>
                                <li class="{{ Route::is('job-postings-manage.index') ? 'active' : '' }}">
                                    <a href="{{ route('job-postings-manage.index') }}">Manage Jobs
                                        @if ($jobPostingCountTwoHour > 0)
                                            <span class="nav-tag">{{ $jobPostingCountTwoHour }}</span>
                                        @endif
                                    </a>
                                </li>
                                <li class="{{ Route::is('admin.companies.index') ? 'active' : '' }}">
                                    <a href="{{ route('admin.companies.index') }}">Manage Company
                                        @if ($companyCountTwoHour > 0)
                                            <span class="nav-tag">{{ $companyCountTwoHour }}</span>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Route::is('feedbacks.index.list') ? 'active-submenu' : '' }}">
                            <a href="{{ route('feedbacks.index.list') }}">Feedbacks
                                @if ($feedbackCountTwoHour > 0)
                                    <span class="nav-tag">{{ $feedbackCountTwoHour }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="{{ Route::is('supports.index.list') ? 'active-submenu' : '' }}">
                            <a href="{{ route('supports.index.list') }}">Support
                                @if ($supportCountTwoHour > 0)
                                    <span class="nav-tag">{{ $supportCountTwoHour }}</span>
                                @endif
                            </a>
                        </li>

                           <li class="{{ Route::is('job-reports.index') ? 'active-submenu' : '' }}">
                            <a href="{{ route('job-reports.index') }}">Report
                                @if ($reportCountTwoHour > 0)
                                    <span class="nav-tag">{{ $reportCountTwoHour }}</span>
                                @endif
                            </a>
                        </li>
                         <li class="{{ Route::is('admin.info.index') ? 'active-submenu' : '' }}">
                            <a href="{{ route('admin.info.index') }}">Edit Front-end
                            </a>
                        </li>

                    </ul>


                    </ul>
                    <ul data-submenu-title="Account">
                        <li><a href="{{ route('users.edit', auth()->user()) }}">My Profile</a></li>
                        <li><a href="{{ route('logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
        $('.category_choose').change(function() {
            var trangthai_val = $(this).val();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('category-choose') }}",
                method: "GET",
                data: {
                    trangthai_val: trangthai_val,
                    id: id
                },
                success: function(data) {
                    alert('Thay đổi trạng thái thể loại thành công!');
                }
            });
        })
        $('.company_choose').change(function() {
            var trangthai_val = $(this).val();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('company-choose') }}",
                method: "GET",
                data: {
                    trangthai_val: trangthai_val,
                    id: id
                },
                success: function(data) {
                    alert('Thay đổi trạng thái công ty thành công!');
                }
            });
        })
        $('.top_choose').change(function() {
            var trangthai_val = $(this).val();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('top-choose') }}",
                method: "GET",
                data: {
                    trangthai_val: trangthai_val,
                    id: id
                },
                success: function(data) {
                    alert('Thay đổi trạng thái top thành công!');
                }
            });
        })
        $('.top_home_choose').change(function() {
            var trangthai_val = $(this).val();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('top-home-choose') }}",
                method: "GET",
                data: {
                    trangthai_val: trangthai_val,
                    id: id
                },
                success: function(data) {
                    alert('Thay đổi trạng thái top home thành công!');
                }
            });
        })
        $('.featured_choose').change(function() {
            var trangthai_val = $(this).val();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('featured-choose') }}",
                method: "GET",
                data: {
                    trangthai_val: trangthai_val,
                    id: id
                },
                success: function(data) {
                    alert(
                        'Thay đổi trạng thái nổi bật thành công!');
                }
            });
        })
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
</body>

</html>
