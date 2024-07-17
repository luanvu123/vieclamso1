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
    <link rel="stylesheet" href="{{ asset('backend/dashboard-2.html') }}">
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
                        <h1><a href="index-2.html"><img src="{{ asset('backend/images/logo.png') }}"
                                    alt="Work Scout" /></a></h1>
                    </div>

                    <!-- Menu -->
                    <nav id="navigation" class="menu">
                        <ul id="responsive">

                            <li><a href="index-2.html">Home</a>
                                <ul>
                                    <li><a href="index-2.html">Home #1</a></li>
                                    <li><a href="index-3.html">Home #2</a></li>
                                    <li><a href="index-4.html">Home #3</a></li>
                                    <li><a href="index-5.html">Home #4</a></li>
                                    <li><a href="index-6.html">Home #5</a></li>
                                </ul>
                            </li>

                            <li><a href="#">Pages</a>
                                <ul>
                                    <li><a href="job-page.html">Job Page</a></li>
                                    <li><a href="job-page-alt.html">Job Page Alternative</a></li>
                                    <li><a href="resume-page.html">Resume Page</a></li>
                                    <li><a href="shortcodes.html">Shortcodes</a></li>
                                    <li><a href="icons.html">Icons</a></li>
                                    <li><a href="pricing-tables.html">Pricing Tables</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </li>

                            <li><a href="#">Browse Listings</a>
                                <ul>
                                    <li><a href="browse-jobs.html">Browse Jobs</a></li>
                                    <li><a href="browse-resumes.html">Browse Resumes</a></li>
                                    <li><a href="browse-categories.html">Browse Categories</a></li>
                                </ul>
                            </li>

                            <li><a href="#" id="current">Dashboard</a>
                                <ul>
                                    <li><a href="dashboard.html">Dashboard</a></li>
                                    <li><a href="dashboard-messages.html">Messages</a></li>
                                    <li><a href="dashboard-manage-resumes.html">Manage Resumes</a></li>
                                    <li><a href="dashboard-add-resume.html">Add Resume</a></li>
                                    <li><a href="dashboard-job-alerts.html">Job Alerts</a></li>
                                    <li><a href="dashboard-manage-jobs.html">Manage Jobs</a></li>
                                    <li><a href="dashboard-manage-applications.html">Manage Applications</a></li>
                                    <li><a href="dashboard-add-job.html">Add Job</a></li>
                                    <li><a href="dashboard-my-profile.html">My Profile</a></li>
                                </ul>
                            </li>
                        </ul>


                        <ul class="responsive float-right">
                            <li><a href="dashboard.html"><i class="fa fa-cog"></i> Dashboard</a></li>
                            <li><a href="index-2.html"><i class="fa fa-lock"></i> Log Out</a></li>
                        </ul>

                    </nav>

                    <!-- Navigation -->
                    <div id="mobile-navigation">
                        <a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i></a>
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
                        <li class="active"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li><a href="dashboard-messages.html">Messages <span class="nav-tag">2</span></a></li>
                    </ul>

                    <ul data-submenu-title="Management">
                        <li><a>For Employers</a>
                            <ul>
                                <li><a href="">Manage Jobs <span class="nav-tag">5</span></a>
                                </li>
                                <li><a href="{{ route('users.index') }}">Manage Users <span class="nav-tag">5</span></a>
                                </li>
                                <li><a href="{{ route('roles.index') }}">Manage Roles <span class="nav-tag">5</span></a>
                                </li>
                                <li><a href="dashboard-manage-applications.html">Manage Applications <span
                                            class="nav-tag">4</span></a></li>
                                <li><a href="dashboard-add-job.html">Add Job</a></li>
                            </ul>
                        </li>

                        <li><a>For Candidates</a>
                            <ul>
                                <li><a href="{{route('candidates.index')}}">Manage Candidates <span
                                            class="nav-tag">2</span></a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul data-submenu-title="Account">
                        <li><a href="{{ route('users.edit', auth()->user()) }}">My Profile</a></li>
                        <li><a href="{{ route('logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
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
</body>

</html>
