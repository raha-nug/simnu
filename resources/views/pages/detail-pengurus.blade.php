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
                @if($anggota->img == null)
                    <img src="{{asset('assets/img/profile-image.png')}}" alt="">
                @else
                    <img src="{{Storage::url($anggota->img)}}" alt="Profile">
                @endif
              </div>
              <h5>{{$pengurus->nama}}</h5>
              @if($sk_data->id_lembaga || $sk_data->id_banom)
              <h6 class="text-primary text-center">{{$pengurus->jabatan}} <br> {{$sk_data->nama_wilayah_kerja}}<i class="bi bi-bookmark-star-fill"></i></h6>
              @else
              <h6 class="text-primary text-center">{{$pengurus->jabatan}} {{$pengurus->jenis_pengurus}} <br> {{$sk_data->nama_wilayah_kerja}}<i class="bi bi-bookmark-star-fill"></i></h6>
              @endif
              <div class="social-links mt-2 d-flex gap-3">
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
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
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" id="edit" data-id="{{setRoute($anggota->id)}}">Edit Profil</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Detail Profil</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                    <div class="col-lg-9 col-md-8">{{$anggota->nama}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">NIK</div>
                    <div class="col-lg-9 col-md-8">{{$anggota->nik}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">ID KartaNU</div>
                    <div class="col-lg-9 col-md-8">{{$anggota->karta_nu}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Alamat</div>
                    <div class="col-lg-9 col-md-8">{{$anggota->alamat}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Telepon</div>
                    <div class="col-lg-9 col-md-8">{{$anggota->no_telp}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{$anggota->email}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Whatsapp</div>
                    <div class="col-lg-9 col-md-8">{{$anggota->no_telp}}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form id="submit" method="POST" action="{{route('edit')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="pt-2">
                          <input type="file" class="btn btn-primary btn-sm" name="img" title="Upload new profile image">
                          {{-- <a href="#" class="btn btn-danger btn-sm" title="Remove profile image"><i class="bi bi-trash"></i></a> --}}
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="id" value="{{$anggota->id}}">
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="fullName" name="nama" value="{{$anggota->nama}}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="NIK" class="col-md-4 col-lg-3 col-form-label">NIK</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="NIK" name="nik" value="{{$anggota->nik}}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="id-karta-nu" class="col-md-4 col-lg-3 col-form-label">ID KartaNU</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="id-karta-nu" name="karta_nu" value="{{$anggota->karta_nu}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea class="form-control" id="about"  name="alamat" style="height: 100px">{{$anggota->alamat}}
                        </textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Telepon</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="company" name="no_telp" value="{{$anggota->no_telp}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="email" class="form-control" id="email" name="email" value="{{$anggota->email}}">
                      </div>
                    </div>

                    {{-- <div class="row mb-3">
                      <label for="whatsapp" class="col-md-4 col-lg-3 col-form-label">Whatsapp</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="whatsapp" value="081111111">
                      </div>
                    </div> --}}
                    <div class="row mb-3">
                      <label for="jabatan" class="col-md-4 col-lg-3 col-form-label">Jabatan</label>
                      <div class="col-md-8 col-lg-9">
                        <select class="form-select" disabled id="${inputId}">
                          <option selected disabled value="">{{$pengurus->jabatan}} {{$pengurus->jenis_pengurus}}</option>
                          <option>...</option>
                        </select>
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
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                History Kepegurusan
              </h5>

              <div class="activity">
                <div class="activity-item d-flex">
                  <div class="activite-label">{{$pengurus->tanggal_mulai}} - {{$pengurus->tanggal_berakhir}}</div>
                  <i
                    class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                  <div class="activity-content">
                    <a href="detaik-sk">{{$pengurus->jabatan}} {{$pengurus->jenis_pengurus}} {{$sk_data->nama_wilayah_kerja}}</a>
                  </div>
                </div>
                <!-- End history item-->
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        $(document).on('click', '#edit', function(o) {
            let id = $(this).attr('data-id');
            console.log(id);
            getData(id);
        })

        function getData(id){
            $.get("{{route('getPengurus')}}?id=" + id, function(o) {
                $("input[name='id']").val(o.id);
                $("input[name='nama']").val(o.nama);
                $("input[name='nik']").val(o.nik);
                $("input[name='alamat']").val(o.alamat);
                $("input[name='no_telp']").val(o.no_telp);
                $("input[name='email']").val(o.email);
                $("input[name='karta_nu']").val(o.karta_nu);
                $("input[name='img']").val(o.img);
            })
        }
      </script>
@endsection
