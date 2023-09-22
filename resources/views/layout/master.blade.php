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
    <link href="../assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/bootstrap/bootstrap-icons.css" rel="stylesheet" />
    <link href="../assets/css/data-tables.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
        <a href="" class="logo d-flex align-items-center">
          <img src="../assets/img/logo.svg" class="ms-lg-4" alt="" />
          <span class="d-none d-lg-block">SIM NU</span>
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
              <span class="d-none d-md-block px-2">@yield('username')</span>
              <img
                src="../assets/img/profile-image.png"
                alt="Profile"
                class="rounded-circle me-3 ms-3" />
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
                <a
                  class="dropdown-item d-flex align-items-center"
                  href="/login">
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
          <a
            class="nav-link {{ Request::is('admin/dashboard') ? 'active':'' }}"
            href="/admin/dashboard">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-heading">Districts</li>
        <li class="nav-item">
          <a
            class="nav-link {{ Request::is('admin/pwnu') ? 'active':'' }}"
            href="/admin/pwnu">
            <div class="icon-nav">
              <?xml version="1.0" ?>
              <svg
                height="25"
                viewBox="0 0 64 64"
                width="25"
                xmlns="http://www.w3.org/2000/svg">
                <title />
                <g>
                  <path
                    d="M42.208,15.8c-.507-2.39-5.022-4.517-7.859-5.634a2.91,2.91,0,1,0-4.7,0C26.814,11.28,22.3,13.407,21.792,15.8A5.681,5.681,0,0,0,24,21.312V42.688A5.681,5.681,0,0,0,21.792,48.2c.671,3.161,8.358,5.865,9.893,6.376a1,1,0,0,0,.63,0c1.535-.511,9.222-3.215,9.893-6.376A5.681,5.681,0,0,0,40,42.688V21.312A5.681,5.681,0,0,0,42.208,15.8ZM32,7.549A.911.911,0,0,1,32,9.37h0a.911.911,0,0,1,0-1.821ZM28.962,16.1c.146-1.575,1.9-3.428,3.038-4.431,1.139,1,2.892,2.856,3.038,4.431a7.563,7.563,0,0,1-.44,3.415H29.4A7.539,7.539,0,0,1,28.962,16.1Zm-5.213.115c.184-.868,2.042-2.094,4.374-3.206a6.487,6.487,0,0,0-1.153,2.905,9.72,9.72,0,0,0,.327,3.6H24.963A3.556,3.556,0,0,1,23.749,16.213Zm0,31.574a3.558,3.558,0,0,1,1.213-3.3H27.3a9.72,9.72,0,0,0-.327,3.6,6.476,6.476,0,0,0,1.154,2.906C25.792,49.883,23.933,48.656,23.749,47.787Zm11.289.115c-.146,1.575-1.9,3.428-3.038,4.431-1.139-1-2.892-2.856-3.038-4.431a7.563,7.563,0,0,1,.44-3.415h5.2A7.539,7.539,0,0,1,35.038,47.9Zm-6.271-5.415H26V21.513H38V42.487H28.767Zm11.484,5.3c-.184.868-2.042,2.094-4.374,3.206a6.487,6.487,0,0,0,1.153-2.905,9.72,9.72,0,0,0-.327-3.6h2.334A3.556,3.556,0,0,1,40.251,47.787ZM39.038,19.513H36.7a9.72,9.72,0,0,0,.327-3.6,6.476,6.476,0,0,0-1.154-2.906c2.332,1.111,4.191,2.338,4.375,3.207A3.558,3.558,0,0,1,39.038,19.513Z" />
                  <path
                    d="M32.5,22.936a1,1,0,0,0-.992,0,6.536,6.536,0,0,0-2.918,5.7V40.2a1,1,0,0,0,1,1h4.828a1,1,0,0,0,1-1V28.632A6.536,6.536,0,0,0,32.5,22.936Zm.918,16.26H30.586V28.632A4.793,4.793,0,0,1,32,25.069a4.793,4.793,0,0,1,1.414,3.563Z" />
                  <path
                    d="M58.027,40.134V24.64A4.411,4.411,0,0,0,59.648,20.4c-.38-1.792-3.429-3.327-5.632-4.218a2.911,2.911,0,1,0-4.291,0c-2.2.89-5.253,2.426-5.633,4.218a4.416,4.416,0,0,0,1.621,4.245V40.135a4.408,4.408,0,0,0-1.621,4.244h0c.511,2.409,5.842,4.355,7.463,4.894a1,1,0,0,0,.631,0c1.621-.539,6.952-2.485,7.462-4.893A4.408,4.408,0,0,0,58.027,40.134ZM51.87,13.315a.911.911,0,1,1-.91.911A.912.912,0,0,1,51.87,13.315ZM49.9,20.694a5.84,5.84,0,0,1,1.975-2.936,5.849,5.849,0,0,1,1.976,2.936h0a5.356,5.356,0,0,1-.242,2.229H50.138A5.349,5.349,0,0,1,49.9,20.694Zm-3.846.117c.091-.43,1-1.1,2.306-1.8a4.33,4.33,0,0,0-.453,1.5,7.439,7.439,0,0,0,.163,2.413H46.789A2.313,2.313,0,0,1,46.049,20.811Zm0,23.153h0a2.322,2.322,0,0,1,.741-2.112h1.274a7.46,7.46,0,0,0-.162,2.412,4.343,4.343,0,0,0,.454,1.5C47.045,45.068,46.14,44.394,46.049,43.964Zm7.8.115a5.854,5.854,0,0,1-1.976,2.938A5.845,5.845,0,0,1,49.9,44.079a5.329,5.329,0,0,1,.243-2.228H53.6A5.373,5.373,0,0,1,53.846,44.079Zm-4.358-4.228H47.713V24.924h8.314V39.851H49.488Zm8.2,4.113c-.091.43-1,1.1-2.306,1.8a4.343,4.343,0,0,0,.453-1.495,7.441,7.441,0,0,0-.161-2.413H56.95A2.323,2.323,0,0,1,57.691,43.964Zm-.741-21.04H55.676a7.443,7.443,0,0,0,.162-2.413,4.3,4.3,0,0,0-.449-1.486c1.3.69,2.214,1.365,2.3,1.786A2.326,2.326,0,0,1,56.95,22.924Z" />
                  <path
                    d="M52.366,25.48a1,1,0,0,0-.992,0,5.091,5.091,0,0,0-2.282,4.426v8.52a1,1,0,0,0,1,1h3.556a1,1,0,0,0,1-1v-8.52A5.091,5.091,0,0,0,52.366,25.48Zm.282,11.946H51.092v-7.52a3.34,3.34,0,0,1,.778-2.241,3.351,3.351,0,0,1,.778,2.241Z" />
                  <path
                    d="M19.908,44.379a4.408,4.408,0,0,0-1.621-4.244V24.64A4.416,4.416,0,0,0,19.908,20.4c-.38-1.792-3.43-3.328-5.633-4.218a2.911,2.911,0,1,0-4.291,0c-2.2.891-5.252,2.426-5.632,4.218A4.411,4.411,0,0,0,5.973,24.64V40.134a4.408,4.408,0,0,0-1.621,4.245h0c.51,2.409,5.841,4.355,7.462,4.894a1,1,0,0,0,.631,0C14.066,48.733,19.4,46.787,19.908,44.379ZM17.951,20.811a2.324,2.324,0,0,1-.742,2.113H15.935a7.439,7.439,0,0,0,.163-2.413,4.319,4.319,0,0,0-.449-1.486C16.952,19.715,17.862,20.39,17.951,20.811Zm-5.821-7.5a.911.911,0,1,1-.911.911A.912.912,0,0,1,12.13,13.315Zm-1.976,7.379a5.849,5.849,0,0,1,1.976-2.936,5.84,5.84,0,0,1,1.975,2.936,5.339,5.339,0,0,1-.243,2.23H10.4A5.369,5.369,0,0,1,10.154,20.694Zm-3.845.117c.091-.43,1-1.1,2.306-1.8a4.331,4.331,0,0,0-.453,1.494,7.45,7.45,0,0,0,.161,2.414H7.048A2.316,2.316,0,0,1,6.309,20.811Zm0,23.153h0a2.322,2.322,0,0,1,.741-2.112H8.323a7.463,7.463,0,0,0-.161,2.412,4.322,4.322,0,0,0,.454,1.5C7.305,45.068,6.4,44.394,6.309,43.964Zm7.8.115a5.845,5.845,0,0,1-1.975,2.938,5.854,5.854,0,0,1-1.976-2.938h0a5.343,5.343,0,0,1,.242-2.227h3.466A5.336,5.336,0,0,1,14.105,44.079ZM9.747,39.851H7.973V24.924h8.314V39.851H9.747Zm8.2,4.113c-.091.43-1,1.1-2.307,1.8a4.343,4.343,0,0,0,.454-1.5,7.46,7.46,0,0,0-.162-2.412h1.275A2.311,2.311,0,0,1,17.951,43.964Z" />
                  <path
                    d="M12.626,25.48a1,1,0,0,0-.992,0,5.091,5.091,0,0,0-2.282,4.426v8.52a1,1,0,0,0,1,1h3.556a1,1,0,0,0,1-1v-8.52A5.091,5.091,0,0,0,12.626,25.48Zm.282,11.946H11.352v-7.52a3.34,3.34,0,0,1,.778-2.241,3.356,3.356,0,0,1,.778,2.241Z" />
                </g>
              </svg>
            </div>
            <span>PWNU</span>
          </a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link {{ Request::is('admin/pcnu') ? 'active':'' }}"
            href="/admin/pcnu">
            <div class="icon-nav">
              <?xml version="1.0" ?>
              <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
              <svg
                height="25"
                style="
                  fill-rule: evenodd;
                  clip-rule: evenodd;
                  stroke-linejoin: round;
                  stroke-miterlimit: 2;
                "
                version="1.1"
                viewBox="0 0 100 100"
                width="25"
                xml:space="preserve"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:serif="http://www.serif.com/"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <g transform="matrix(1,0,0,1,-450,-450)">
                  <g id="Layer1">
                    <path
                      d="M495.013,463.667L469.797,467.107C469.054,467.208 468.5,467.843 468.5,468.593L468.5,475.5C468.5,476.328 469.172,477 470,477L473.5,477L473.5,534.097C467.858,534.832 463.5,539.657 463.5,545.5C463.5,546.914 465,547 465,547L535,547C535,547 536.5,546.914 536.5,545.5L536.5,545.5C536.5,539.657 532.142,534.832 526.5,534.097L526.5,477L530,477C530.828,477 531.5,476.328 531.5,475.5L531.5,468.593C531.5,467.843 530.946,467.208 530.203,467.107L504.987,463.667C505.932,462.538 506.5,461.085 506.5,459.5C506.5,455.913 503.587,453 500,453C496.413,453 493.5,455.913 493.5,459.5C493.5,461.085 494.068,462.538 495.013,463.667ZM533.368,544L466.632,544C467.34,540.021 470.817,537 475,537C475,537 525,537 525,537C529.183,537 532.66,540.021 533.368,544ZM476.5,529.5L476.5,534C476.5,534 523.5,534 523.5,534L523.5,529.5L476.5,529.5ZM476.5,484.5L476.5,526.5L478.5,526.5L478.5,498.322C478.5,492.897 482.897,488.5 488.322,488.5L488.325,488.5C493.75,488.5 498.147,492.897 498.147,498.322L498.147,526.5L501.853,526.5L501.853,498.322C501.853,492.897 506.25,488.5 511.675,488.5L511.678,488.5C517.103,488.5 521.5,492.897 521.5,498.322L521.5,526.5L523.5,526.5L523.5,484.5L476.5,484.5ZM518.5,526.5L504.853,526.5C504.853,526.5 504.853,498.322 504.853,498.322C504.853,494.554 507.907,491.5 511.675,491.5C511.675,491.5 511.678,491.5 511.678,491.5C515.446,491.5 518.5,494.554 518.5,498.322L518.5,526.5ZM495.147,526.5L481.5,526.5C481.5,526.5 481.5,498.322 481.5,498.322C481.5,494.554 484.554,491.5 488.322,491.5C488.322,491.5 488.325,491.5 488.325,491.5C492.093,491.5 495.147,494.554 495.147,498.322L495.147,526.5ZM523.5,481.5L476.5,481.5L476.5,477L523.5,477L523.5,481.5ZM471.5,474L528.5,474L528.5,469.902L500,466.014C500,466.014 471.5,469.902 471.5,469.902C471.5,469.902 471.5,474 471.5,474ZM500,456C501.932,456 503.5,457.568 503.5,459.5C503.5,461.432 501.932,463 500,463C498.068,463 496.5,461.432 496.5,459.5C496.5,457.568 498.068,456 500,456Z" />
                  </g>
                </g>
              </svg>
            </div>
            <span>PCNU</span>
          </a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link {{ Request::is('admin/mwcnu') ? 'active':'' }}"
            href="/admin/mwcnu">
            <div class="icon-nav">
              <?xml version="1.0" ?>
              <svg
                height="25"
                viewBox="0 0 64 64"
                width="25"
                xmlns="http://www.w3.org/2000/svg">
                <title />
                <path
                  d="M47.8,22.4l-3-4a.977.977,0,0,0-.547-.34A12.466,12.466,0,0,0,33,8.044V6a1,1,0,0,0-2,0V8.044A12.482,12.482,0,0,0,19.745,18.06a.977.977,0,0,0-.545.34l-3,4a1,1,0,0,0-.158.346A2.979,2.979,0,0,0,15,25v2a1,1,0,0,0,1,1h4V51H18a3,3,0,0,0-3,3v2a1,1,0,0,0,1,1H48a1,1,0,0,0,1-1V54a3,3,0,0,0-3-3H44V28h4a1,1,0,0,0,1-1V25a2.979,2.979,0,0,0-1.042-2.254A1,1,0,0,0,47.8,22.4ZM32,10a10.474,10.474,0,0,1,10.192,8H21.809A10.485,10.485,0,0,1,32,10ZM20.5,20h23L45,22H19ZM46,53a1,1,0,0,1,1,1v1H17V54a1,1,0,0,1,1-1H46ZM32.5,32.132a1,1,0,0,0-.992,0,10.306,10.306,0,0,0-4.575,9.011V51H22V28H42V51H37.071V41.143A10.306,10.306,0,0,0,32.5,32.132Zm2.575,9.011V51H28.929V41.143A8.592,8.592,0,0,1,32,34.222,8.636,8.636,0,0,1,35.071,41.143ZM47,26H17V25a1,1,0,0,1,1-1H46a1,1,0,0,1,1,1Z" />
              </svg>
            </div>
            <span>MWC NU</span>
          </a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link {{ Request::is('admin/ranting') ? 'active':'' }}"
            href="/admin/ranting">
            <div class="icon-nav">
              <?xml version="1.0" ?>
              <svg
                height="25"
                viewBox="0 0 64 64"
                width="25"
                xmlns="http://www.w3.org/2000/svg">
                <title />
                <g>
                  <path
                    d="M46.947,23h.3a1,1,0,0,0,0-2h-.934a2.966,2.966,0,0,0,.184-1,3,3,0,0,0-3-3h-.279a12.47,12.47,0,0,0-8.266-6.643,3.5,3.5,0,1,0-5.9.008A12.586,12.586,0,0,0,20.775,17H20.5a3,3,0,0,0-3,3,2.966,2.966,0,0,0,.184,1H16.75a1,1,0,0,0,0,2h.3C15.559,26.394,15.5,33.017,15.5,34s.059,7.606,1.553,11h-.3a1,1,0,0,0,0,2h.934a2.966,2.966,0,0,0-.184,1,3,3,0,0,0,3,3H22v4a1,1,0,0,0,2,0V51h4v4a1,1,0,0,0,2,0V51h4v4a1,1,0,0,0,2,0V51h4v4a1,1,0,0,0,2,0V51h1.5a3,3,0,0,0,3-3,2.966,2.966,0,0,0-.184-1h.934a1,1,0,0,0,0-2h-.3C48.441,41.606,48.5,34.983,48.5,34S48.441,26.394,46.947,23ZM32,7a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,32,7Zm0,5a10.486,10.486,0,0,1,8.948,5H23.079A10.553,10.553,0,0,1,32,12ZM20.5,19H42.436a.415.415,0,0,0,.276,0H43.5a1,1,0,0,1,0,2h-23a1,1,0,0,1,0-2ZM37.838,34c0,6.726-1.19,10.467-1.834,11H28c-.644-.533-1.834-4.274-1.834-11S27.352,23.533,28,23H36C36.648,23.533,37.838,27.274,37.838,34ZM17.5,34c0-6.721,1.188-10.463,1.833-11h6.382c-1.494,3.394-1.553,10.017-1.553,11s.059,7.606,1.553,11H19.333C18.688,44.463,17.5,40.721,17.5,34Zm26,15h-23a1,1,0,0,1,0-2h23a1,1,0,0,1,0,2Zm1.167-4H38.285c1.494-3.394,1.553-10.017,1.553-11s-.059-7.606-1.553-11h6.382c.645.537,1.833,4.279,1.833,11S45.312,44.463,44.667,45Z" />
                  <path
                    d="M29.327,42.412h5.346a1,1,0,0,0,1-1V30.346A7.124,7.124,0,0,0,32.5,24.132a1,1,0,0,0-.992,0,7.124,7.124,0,0,0-3.177,6.214V41.412A1,1,0,0,0,29.327,42.412Zm1-12.066A5.385,5.385,0,0,1,32,26.254a5.385,5.385,0,0,1,1.673,4.092V40.412H30.327Z" />
                </g>
              </svg>
            </div>
            <span>Ranting</span>
          </a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link {{ Request::is('admin/anak-ranting') ? 'active':'' }}"
            href="/admin/anak-ranting">
            <div class="icon-nav">
              <?xml version="1.0" ?>
              <svg
                height="25"
                viewBox="0 0 64 64"
                width="25"
                xmlns="http://www.w3.org/2000/svg">
                <title />
                <path
                  d="M44.435,51.164l-4.9-34.5a.984.984,0,0,0-.235-.492,3.992,3.992,0,0,0,.48-2.9c-.38-1.792-3.43-3.327-5.634-4.218a2.91,2.91,0,1,0-4.288,0c-2.2.891-5.254,2.426-5.634,4.218a3.991,3.991,0,0,0,.48,2.9.984.984,0,0,0-.235.492l-4.9,34.5A2.992,2.992,0,0,0,20.5,57h23a2.992,2.992,0,0,0,.935-5.836ZM42.392,51H38.1l-1.7-33.195h1.282ZM37.821,13.691a2.325,2.325,0,0,1-.742,2.114H35.805a7.439,7.439,0,0,0,.163-2.413,4.319,4.319,0,0,0-.449-1.486C36.822,12.6,37.733,13.271,37.821,13.691ZM32,6.2a.911.911,0,1,1-.91.911A.912.912,0,0,1,32,6.2Zm-1.976,7.38A5.849,5.849,0,0,1,32,10.639a5.849,5.849,0,0,1,1.976,2.936,5.336,5.336,0,0,1-.244,2.23H30.268A5.346,5.346,0,0,1,30.024,13.575Zm-.406,4.23H34.39l1.7,33.2H27.906l1.7-33.195Zm-3.439-4.114c.091-.429,1-1.1,2.306-1.794a4.33,4.33,0,0,0-.453,1.495,7.439,7.439,0,0,0,.163,2.413H26.919A2.314,2.314,0,0,1,26.179,13.691Zm.146,4.114h1.282L25.9,51H21.608ZM43.5,55h-23a1,1,0,0,1,0-2h23a1,1,0,0,1,0,2Z" />
              </svg>
            </div>
            <span>Anak Ranting</span>
          </a>
        </li>
        <li class="nav-heading">Datas</li>
        <li class="nav-item">
          <a
            class="nav-link {{ Request::is('admin/pengurus') ? 'active':'' }}"
            href="/admin/pengurus">
            <i class="bi bi-person-fill"></i>
            <span>Data Pengurus</span>
          </a>
        </li>
        <li class="nav-heading">master menu</li>
        <li class="nav-item">
          <a
            class="nav-link active collapsed"
            data-bs-target="#master-nav"
            data-bs-toggle="collapse"
            href="#">
            <i class="bi bi-gear"></i>
            <span>Master</span>
            <i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul
            id="master-nav"
            class="nav-content collapse"
            data-bs-parent="#sidebar-nav">
            <li>
              <a href="charts-chartjs.html">
                <i class="bi bi-circle"></i>
                <span>User</span>
              </a>
            </li>
            <li>
              <a href="charts-apexcharts.html">
                <i class="bi bi-circle"></i>
                <span>User Group</span>
              </a>
            </li>
            <li>
              <a href="charts-echarts.html">
                <i class="bi bi-circle"></i>
                <span>Member</span>
              </a>
            </li>
            <li>
              <a href="charts-echarts.html">
                <i class="bi bi-circle"></i>
                <span>Pengurus</span>
              </a>
            </li>
            <li>
              <a href="charts-echarts.html">
                <i class="bi bi-circle"></i>
                <span>Jenis Pengurus</span>
              </a>
            </li>
            <li>
              <a href="charts-echarts.html">
                <i class="bi bi-circle"></i>
                <span>Jabatan</span>
              </a>
            </li>
            <li>
              <a href="charts-echarts.html">
                <i class="bi bi-circle"></i>
                <span>Banom Basis</span>
              </a>
            </li>
            <li>
              <a href="charts-echarts.html">
                <i class="bi bi-circle"></i>
                <span>Master Lembaga</span>
              </a>
            </li>
            <li>
              <a href="charts-echarts.html">
                <i class="bi bi-circle"></i>
                <span>Master Banom</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- End Dashboard Nav -->
      </ul>
    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">
      @yield('pagetitle')
      <!-- End Page Title -->

      <section class="section">@yield('content')</section>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright
        <strong><span>2023</span></strong>
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
