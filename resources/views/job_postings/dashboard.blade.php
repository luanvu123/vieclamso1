  @extends('dashboard-employer')

  @section('content')
  <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
               <h2>Howdy, {{ Auth::guard('employer')->user()->name }}</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="row">

        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-1">
                <div class="dashboard-stat-content">
                    <h4 class="counter">3</h4> <span>Active Job Listings</span>
                </div>
                <div class="dashboard-stat-icon"><i class="ln ln-icon-File-Link"></i></div>
            </div>
        </div>

        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-2">
                <div class="dashboard-stat-content">
                    <h4 class="counter">527</h4> <span>Total Job Views</span>
                </div>
                <div class="dashboard-stat-icon"><i class="ln ln-icon-Bar-Chart"></i></div>
            </div>
        </div>


        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-3">
                <div class="dashboard-stat-content">
                    <h4 class="counter">17</h4> <span>Total Applications</span>
                </div>
                <div class="dashboard-stat-icon"><i class="ln ln-icon-Business-ManWoman"></i></div>
            </div>
        </div>


        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-4">
                <div class="dashboard-stat-content">
                    <h4 class="counter">36</h4> <span>Times Bookmarked</span>
                </div>
                <div class="dashboard-stat-icon"><i class="ln ln-icon-Add-UserStar "></i></div>
            </div>
        </div>

    </div>
  @endsection
