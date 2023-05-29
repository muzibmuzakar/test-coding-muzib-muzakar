<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tes Praktek Coding</title>
  <link rel="stylesheet" href={{ asset('/assets/css/styles.min.css') }} />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-center">
          <a href="/" class="text-nowrap logo-img">
            <h2><strong>Logo</strong></h2>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Menu</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href={{ route('klub.index') }} aria-expanded="false">
                <span>
                  <i class="ti ti-shield-chevron"></i>
                </span>
                <span class="hide-menu">Klub</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href={{ route('pertandingan.index') }} aria-expanded="false">
                <span>
                  <i class="ti ti-trophy"></i>
                </span>
                <span class="hide-menu">Pertandingan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href={{ route('klasemen.index') }} aria-expanded="false">
                <span>
                  <i class="ti ti-table"></i>
                </span>
                <span class="hide-menu">Klasemen</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
  </div>
  <script src={{ asset('/assets/libs/jquery/dist/jquery.min.js') }}></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src={{ asset('/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}></script>
  <script src={{ asset('/assets/js/sidebarmenu.js') }}></script>
  <script src={{ asset('/assets/js/app.min.js') }}></script>
  <script src={{ asset('/assets/libs/apexcharts/dist/apexcharts.min.js') }}></script>
  <script src={{ asset('/assets/libs/simplebar/dist/simplebar.js') }}></script>
  <script src={{ asset('/assets/js/dashboard.js') }}></script>
</body>

</html>