<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>SIMNU - Login</title>
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

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet" />
  </head>
  <body
    class="body d-flex justify-content-center align-items-center min-vh-100">
    <main class="min-vw-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 text-center">
            <img
              src="assets/img/logo/logo.svg"
              alt=""
              class="w-50 me-0 me-lg-5" />
            <p class="text-center text-lg-start pt-5 text-white pe-0 pe-lg-5">
              SIM NU (Sistem Informasi Manajemen NU), aplikasi ini memuat data
              pengurus PWNU, PCNU, MWC, Ranting dan Anak Ranting, Lembaga dan
              Badan Otonom yang berada di bawah lingkungan NU Jawa Barat.
            </p>
          </div>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Login</h5>
                <form action="/admin/dashboard">
                  <div class="row gap-3">
                    <div class="col-lg-12">
                      <label for="email" class="form-label">Email</label>
                      <input
                        type="email"
                        class="form-control"
                        id="email"
                        required />
                    </div>
                    <div class="col-lg-12">
                      <label for="password" class="form-label">Password</label>
                      <input
                        type="password"
                        class="form-control"
                        id="password"
                        required />
                    </div>
                    <div class="col-lg-12 d-none">
                      <div
                        class="alert alert-danger alert-dismissible fade show"
                        role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        Email atau Password salah !
                        <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="alert"
                          aria-label="Close"></button>
                      </div>
                    </div>
                    <div class="text-end">
                      <button type="submit" class="btn btn-primary">
                        Masuk
                        <i class="bi bi-arrow-right ms-2"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Vendor JS Files -->
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
  </body>
</html>
