<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>SIMNU - @yield('title')</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="../assets/img/logo.svg" rel="icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;500;600;700;800;900&display=swap"
      rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link
      href="../assets/css/bootstrap/bootstrap.min.css"
      rel="stylesheet" />
    <link
      href="../assets/css/bootstrap/bootstrap-icons.css"
      rel="stylesheet" />
    <link
      href="../assets/css/data-tables.css"
      rel="stylesheet" />
   

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet" />

  </head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <img src="../assets/img/logo.svg" alt="" />
          <span class="d-none d-lg-block">
            SISTEM INFORMASI MANAJEMEN NU JABAR
          </span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div>
      <!-- End Logo -->

      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
          <li class="nav-item dropdown pe-3">
            <a
              class="nav-link nav-profile d-flex align-items-center pe-0"
              href="#"
              data-bs-toggle="dropdown">
              <img
                src="../assets/img/profile-image.png"
                alt="Profile"
                class="rounded-circle" />
              <span class="d-none d-md-block dropdown-toggle ps-2">
                @yield('username')
              </span>
            </a>
            <!-- End Profile Iamge Icon -->

            <ul
              class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6>@yield('username')</h6>
                <span>@yield('from')</span>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>

              <li>
                <a
                  class="dropdown-item d-flex align-items-center"
                  href="users-profile.html">
                  <i class="bi bi-person"></i>
                  <span>My Profile</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="/login">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Sign Out</span>
                </a>
              </li>
            </ul>
            <!-- End Profile Dropdown Items -->
          </li>
          <!-- End Profile Nav -->
        </ul>
      </nav>
      <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/dashboard') ? 'active':'' }}" href="/admin/dashboard">
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/pwnu') ? 'active':'' }}" href="/admin/pwnu">
            <i class="bi bi-menu-button-wide"></i>
            <span>PWNU</span>
          </a>
        </li>
         <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/pcnu') ? 'active':'' }}" href="/admin/pcnu">
            <i class="bi bi-globe2"></i>
            <span>PCNU</span>
          </a>
        </li>
         <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/mwcnu') ? 'active':'' }}" href="/admin/mwcnu">
            <i class="bi bi-globe2"></i>
            <span>MWC NU</span>
          </a>
        </li>
         <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/ranting') ? 'active':'' }}" href="/admin/ranting">
            <i class="bi bi-gem"></i>
            <span>Ranting</span>
          </a>
        </li>
         <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/anak-ranting') ? 'active':'' }}" href="/admin/anak-ranting">
            <i class="bi bi-gem"></i>
            <span>Anak Ranting</span>
          </a>
        </li>
         <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/lembaga') ? 'active':'' }}" href="/admin/lembaga">
            <i class="bi bi-building"></i>
            <span>Lembaga</span>
          </a>
        </li>
         <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/banom') ? 'active':'' }}" href="/admin/banom">
            <i class="bi bi-building"></i>
            <span>Banom</span>
          </a>
        </li>
         <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/sadesha') ? 'active':'' }}" href="/admin/sadesha">
            <i class="bi bi-pie-chart-fill"></i>
            <span>Sadesha</span>
          </a>
        </li>
        </li>
         <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/nu-award') ? 'active':'' }}" href="/admin/nu-award">
            <i class="bi bi-pie-chart-fill"></i>
            <span>NU Award</span>
          </a>
        </li>

        <!-- End Dashboard Nav -->
        

   
      </ul>
    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">
      @yield('pagetitle')
      <!-- End Page Title -->

      <section class="section ">
        <div class="row">
          @yield('content')
      </section>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright
        <strong><span>CMR</span></strong>
        . All Rights Reserved
      </div>
    </footer>
    <!-- End Footer -->

    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center">
      <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->  
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script> 
    <script src="../assets/js/simple-datatables.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
  </body>
</html>
