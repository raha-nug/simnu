@extends('layout.master')


@section('title',$title)
@section('username',$username)
@section('from',$from)

@section('pagetitle')
<div class="pagetitle">
  <h1>{{ $title }}</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">Home</a></li>
      <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
  </nav>
</div>
@endsection


@section('content')
    <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <div class="detail-pengurus">
                <img src="../assets/img/pengurus.jpg" alt="Profile"  >
              </div>
              <h5>KH. Hasan Nuri Hidayatullah</h5>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profil</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Detail Profil</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label fw-bold ">Nama Lengkap</div>
                    <div class="col-lg-9 col-md-8">KH. Hasan Nuri Hidayatullah</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label fw-bold ">NIK</div>
                    <div class="col-lg-9 col-md-8">3206240000001</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label fw-bold ">ID KartaNU</div>
                    <div class="col-lg-9 col-md-8">PWNU-JABAR</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label fw-bold ">Alamat</div>
                    <div class="col-lg-9 col-md-8">Dusun Kosbar RT 002 RW 005 Desa Sukatani Kec. Cilamaya Wetan Kab. Karawang</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label fw-bold">Telepon</div>
                    <div class="col-lg-9 col-md-8">0811111111</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label fw-bold">Email</div>
                    <div class="col-lg-9 col-md-8">contoh@email.com</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label fw-bold">Whatsapp</div>
                    <div class="col-lg-9 col-md-8">0811111111</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form id="submit">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="KH. Hasan Nuri Hidayatullah">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="NIK" class="col-md-4 col-lg-3 col-form-label">NIK</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="NIK" type="text" class="form-control" id="NIK" value="3206020000001">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="id-karta-nu" class="col-md-4 col-lg-3 col-form-label">ID KartaNU</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="id-karta-nu" type="text" class="form-control" id="id-karta-nu" value="PWNU-JABAR">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about"  style="height: 100px">Dusun Kosbar RT 002 RW 005 Desa Sukatani Kec. Cilamaya Wetan Kab. Karawang.
                        </textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Telepon</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="0811111111">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" value="contoh@email.com">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="whatsapp" class="col-md-4 col-lg-3 col-form-label">Whatsapp</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="whatsapp" type="text" class="form-control" id="whatsapp" value="081111111">
                      </div>
                    </div>

                    <div class="text-end">
                      <button type="submit" id="btnSubmit" class="btn btn-primary"><i class="bi bi-check-circle me-2"></i> Simpan</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>
        </div>
      </div>
@endsection