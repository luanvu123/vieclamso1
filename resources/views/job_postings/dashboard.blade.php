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
                      <h4 class="counter">{{ $activeJobPostingsCount }}</h4> <span>Active Job Listings</span>
                  </div>
                  <div class="dashboard-stat-icon"><i class="ln ln-icon-File-Link"></i></div>
              </div>
          </div>

          <!-- Total Job Views -->
          <div class="col-lg-3 col-md-6">
              <div class="dashboard-stat color-2">
                  <div class="dashboard-stat-content">
                      <h4 class="counter">{{ $totalJobViews }}</h4> <span>Total Job Views</span>
                  </div>
                  <div class="dashboard-stat-icon"><i class="ln ln-icon-Bar-Chart"></i></div>
              </div>
          </div>


          <div class="col-lg-3 col-md-6">
              <div class="dashboard-stat color-3">
                  <div class="dashboard-stat-content">
                      <h4 class="counter">{{ $totalApplications }}</h4> <span>Total Applications</span>
                  </div>
                  <div class="dashboard-stat-icon"><i class="ln ln-icon-Business-ManWoman"></i></div>
              </div>
          </div>
          <!-- Total Messages -->
          <div class="col-lg-3 col-md-6">
              <div class="dashboard-stat color-4">
                  <div class="dashboard-stat-content">
                      <h4 class="counter">{{ $totalMessages }}</h4> <span>Messages</span>
                  </div>
                  <div class="dashboard-stat-icon"><i class="ln ln-icon-Add-UserStar"></i></div>
              </div>
          </div>

      </div>
  @endsection
