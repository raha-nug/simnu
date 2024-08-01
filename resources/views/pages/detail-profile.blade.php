@extends('layout.master', ['foto' => Storage::url($profile->foto)])


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
                @if($profile->foto == null)
                    <img src="{{asset('assets/img/profile-image.png')}}" alt="">
                @else
                    <img src="{{Storage::url($profile->foto)}}" alt="Profile">
                @endif
              </div>
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
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" id="edit" data-id="#">Edit Profil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ubah-password" id="edit-password" data-id="#">Edit Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Detail Profil</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                    <div class="col-lg-9 col-md-8">{{$profile->nama}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Telepon</div>
                    <div class="col-lg-9 col-md-8">{{$profile->no_telp}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{$profile->email}}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form id="submit" method="POST" action="{{route('editProfile')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="pt-2">
                          <input type="file" class="btn btn-primary btn-sm" name="foto" title="Upload new profile image">
                          {{-- <a href="#" class="btn btn-danger btn-sm" title="Remove profile image"><i class="bi bi-trash"></i></a> --}}
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="id" value="{{$profile->id}}">
                    <input type="hidden" name="user_group" value="{{$profile->id_grup}}">
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="fullName" name="nama" value="{{$profile->nama}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Telepon</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="company" name="no_telp" value="{{$profile->no_telp}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="email" class="form-control" id="email" name="email" value="{{$profile->email}}">
                      </div>
                    </div>

                    <div class="text-end">
                      <button type="submit" id="btnSubmit" class="btn btn-primary"><i class="bi bi-check-circle me-2"></i> Simpan</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>
                <div class="tab-pane fade profile-edit pt-3" id="ubah-password">

                  <!-- Profile Edit Form -->
                  <form id="submit" method="POST" action="{{route('editPassword')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$profile->id}}">
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="password" class="form-control" id="fullName" name="current_password" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="password" class="form-control" id="company" name="password" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="password" class="form-control" id="email" name="password_confirmation" value="">
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
      <script>
        $(document).on('click', '#edit', function(o) {
            let id = $(this).attr('data-id');
            getData(id);
            console.log(id);
        })

        function getData(id){
            $.get("{{route('getPengurus')}}?id=" + id, function(o) {
                $("input[name='id']").val(o.id);
                $("input[name='user_group']").val(o.id_group);
                $("input[name='nama']").val(o.nama);
                $("input[name='no_telp']").val(o.no_telp);
                $("input[name='email']").val(o.email);
                $("input[name='img']").val(o.img);
            })
        }
      </script>
@endsection
