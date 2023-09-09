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
      <li class="breadcrumb-item"><a href="/admin/pcnu">PCNU</a></li>
      <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
  </nav>
</div>
@endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">Detail PCNU</div>
    <div class="card-body">
      <h5 class="card-title">Informasi Umum</h5>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Nama :</dt>
        </div>
        <div class="col-lg-9">
          <dd>PCNU Kota Tasikmalaya</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Alamat :</dt>
        </div>
        <div class="col-lg-9">
          <dd>
            Jl. DR. Sukarjo No. 47, Kota Tasikmalaya 46112
          </dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Telepon :</dt>
        </div>
        <div class="col-lg-9">
          <dd>0265326805</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Email :</dt>
        </div>
        <div class="col-lg-9">
          <dd>pcnukotatsk@gmail.com</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Website :</dt>
        </div>
        <div class="col-lg-9">
          <dd>https://nu-kotatasikmalaya.id/</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Kota/Kab :</dt>
        </div>
        <div class="col-lg-9">
          <dd>Kota Tasikmalaya</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Latitude :</dt>
        </div>
        <div class="col-lg-9">
          <dd>-7.323617768813682</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Longitude :</dt>
        </div>
        <div class="col-lg-9">
          <dd>108.22126124815536</dd>
        </div>
      </div>

    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <!-- Bordered Tabs Justified -->
      <ul
        class="nav nav-tabs nav-tabs-bordered d-flex pt-5"
        id="borderedTabJustified"
        role="tablist">
        <li class="nav-item flex-fill" role="presentation">
          <button
            class="nav-link w-100 active"
            id="pengurus-tab"
            data-bs-toggle="tab"
            data-bs-target="#bordered-justified-pengurus"
            type="button"
            role="tab"
            aria-controls="pengurus"
            aria-selected="true">
            Pengurus
          </button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button
            class="nav-link w-100"
            id="kepengurusan-tab"
            data-bs-toggle="tab"
            data-bs-target="#bordered-justified-kepengurusan"
            type="button"
            role="tab"
            aria-controls="kepengurusan"
            aria-selected="false">
            SK Kepengurusan
          </button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button
            class="nav-link w-100"
            id="lembaga-tab"
            data-bs-toggle="tab"
            data-bs-target="#bordered-justified-lembaga"
            type="button"
            role="tab"
            aria-controls="lembaga"
            aria-selected="false">
            Lembaga
          </button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button
            class="nav-link w-100"
            id="banom-tab"
            data-bs-toggle="tab"
            data-bs-target="#bordered-justified-banom"
            type="button"
            role="tab"
            aria-controls="banom"
            aria-selected="false">
            Banom
          </button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button
            class="nav-link w-100"
            id="banom-tab"
            data-bs-toggle="tab"
            data-bs-target="#bordered-justified-mwc"
            type="button"
            role="tab"
            aria-controls="banom"
            aria-selected="false">
            MWC
          </button>
        </li>
      </ul>
      <div class="tab-content pt-2" id="borderedTabJustifiedContent">
        <div
          class="tab-pane fade show active mt-3"
          id="bordered-justified-pengurus"
          role="tabpanel"
          aria-labelledby="pengurus-tab">
          <div class="table-responsive">
            <table class="table table-borderless table-hover datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Pengurus</th>
                  <th scope="col">Jabaran</th>
                  <th scope="col">Periode</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>KH. Asep Burhanudin</td>
                  <td>Mustasyar</td>
                  <td>-</td>
                  <td>2016-05-25</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Prof. Dr. KH. Fuad Wahab, MA.</td>
                  <td>Mustasyar</td>
                  <td>-</td>
                  <td>2014-12-05</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>KH. M. Nuh Addawami</td>
                  <td>Syuriah</td>
                  <td>Rais</td>
                  <td>2011-08-12</td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>Dr. KH. Abun Bunyamin</td>
                  <td>Syuriah</td>
                  <td>Wakil Rais</td>
                  <td>2012-06-11</td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>KH. M. Usamah Manshur</td>
                  <td>Syuriah</td>
                  <td>Katib</td>
                  <td>2011-04-19</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div
          class="tab-pane fade mt-3"
          id="bordered-justified-kepengurusan"
          role="tabpanel"
          aria-labelledby="kepengurusan-tab">
          <div class="d-flex justify-content-end me-3 btn-sm">
            <a class="btn btn-primary" href="/admin/add-sk">
              <i class="bi bi-plus me-1"></i>
              Tambah
            </a>
          </div>

          <div class="table-responsive">
            <table class="table table-borderless table-hover datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">No Surat</th>
                  <th scope="col">Masa Jabatan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td><a href="#">112/A.II.04/11/2016</a></td>
                  <td>04 Nov 2016 - 04 Nov 2021</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td><a href="">790/A.II.04/11/2021</a></td>
                  <td>24 Nov 2021 - 24 Nov 2026</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div
          class="tab-pane fade mt-3"
          id="bordered-justified-lembaga"
          role="tabpanel"
          aria-labelledby="lembaga-tab">
          <div class="d-flex justify-content-end me-3 btn-sm">
            <a class="btn btn-primary" href="/admin/add-lembaga">
              <i class="bi bi-plus me-1"></i>
              Tambah
            </a>
          </div>
          <div class="table-responsive">
            <table class="table table-borderless table-hover datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Lembaga</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Lembaga Dakwah NU (LDNU) Jawa Barat</td>
                  <td>
                    
                    <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <ul
                      class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                      <li><a class="dropdown-item" href="#">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                        </a>
                      </li>
                      <li><a class="dropdown-item text-danger" href="#">
                        <i class="bi bi-trash"></i>
                        Hapus
                        </a>
                      </li>
                    </ul>
                  
                  </td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Lembaga Pendidikan Ma’arif NU Jawa Barat</td>
                 <td>
                    
                    <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <ul
                      class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                      <li><a class="dropdown-item" href="#">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                        </a>
                      </li>
                      <li><a class="dropdown-item text-danger" href="#">
                        <i class="bi bi-trash"></i>
                        Hapus
                        </a>
                      </li>
                    </ul>
                  
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div
          class="tab-pane fade mt-3"
          id="bordered-justified-banom"
          role="tabpanel"
          aria-labelledby="banom-tab">
          <div class="d-flex justify-content-end me-3 btn-sm">
            <a class="btn btn-primary" href="/admin/add-banom">
              <i class="bi bi-plus me-1"></i>
              Tambah
            </a>
          </div>
          <div class="table-responsive">
            <table class="table table-borderless table-hover datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Banom</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Ikatan Pelajar Putri NU (IPPNU) Jawa Barat</td>
                 <td>
                    
                    <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <ul
                      class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                      <li><a class="dropdown-item" href="#">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                        </a>
                      </li>
                      <li><a class="dropdown-item text-danger" href="#">
                        <i class="bi bi-trash"></i>
                        Hapus
                        </a>
                      </li>
                    </ul>
                  
                  </td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Ikatan Pelajar Putri NU (IPPNU) Jawa Barat</td>
                  <td>
                    
                    <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <ul
                      class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                      <li><a class="dropdown-item" href="#">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                        </a>
                      </li>
                      <li><a class="dropdown-item text-danger" href="#">
                        <i class="bi bi-trash"></i>
                        Hapus
                        </a>
                      </li>
                    </ul>
                  
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        
        <div
          class="tab-pane fade mt-3"
          id="bordered-justified-mwc"
          role="tabpanel"
          aria-labelledby="mwc-tab">
          <div class="d-flex justify-content-end me-3 btn-sm">
            <a class="btn btn-primary" href="/admin/add-mwc">
              <i class="bi bi-plus me-1"></i>
              Tambah
            </a>
          </div>
          <div class="table-responsive">
            <table class="table table-borderless table-hover datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama MWC</th>
                  <th scope="col">Telepon</th>
                  <th scope="col">Email</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>MWC NU Kawalu</td>
                  <td>0800000009</td>
                  <td>mwcnukawalu@gmail.com</td>
                 <td>
                    
                    <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <ul
                      class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                      <li><a class="dropdown-item" href="#">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                        </a>
                      </li>
                      <li><a class="dropdown-item text-danger" href="#">
                        <i class="bi bi-trash"></i>
                        Hapus
                        </a>
                      </li>
                    </ul>
                  
                  </td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>MWC NU Kawalu</td>
                  <td>0800000009</td>
                  <td>mwcnukawalu@gmail.com</td>
                 <td>
                    
                    <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <ul
                      class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                      <li><a class="dropdown-item" href="#">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                        </a>
                      </li>
                      <li><a class="dropdown-item text-danger" href="#">
                        <i class="bi bi-trash"></i>
                        Hapus
                        </a>
                      </li>
                    </ul>
                  
                  </td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>MWC NU Kawalu</td>
                  <td>0800000009</td>
                  <td>mwcnukawalu@gmail.com</td>
                 <td>
                    
                    <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <ul
                      class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                      <li><a class="dropdown-item" href="#">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                        </a>
                      </li>
                      <li><a class="dropdown-item text-danger" href="#">
                        <i class="bi bi-trash"></i>
                        Hapus
                        </a>
                      </li>
                    </ul>
                  
                  </td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>MWC NU Kawalu</td>
                  <td>0800000009</td>
                  <td>mwcnukawalu@gmail.com</td>
                 <td>
                    
                    <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <ul
                      class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                      <li><a class="dropdown-item" href="#">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                        </a>
                      </li>
                      <li><a class="dropdown-item text-danger" href="#">
                        <i class="bi bi-trash"></i>
                        Hapus
                        </a>
                      </li>
                    </ul>
                  
                  </td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>MWC NU Kawalu</td>
                  <td>0800000009</td>
                  <td>mwcnukawalu@gmail.com</td>
                 <td>
                    
                    <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <ul
                      class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                      <li><a class="dropdown-item" href="#">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                        </a>
                      </li>
                      <li><a class="dropdown-item text-danger" href="#">
                        <i class="bi bi-trash"></i>
                        Hapus
                        </a>
                      </li>
                    </ul>
                  
                  </td>
                </tr>
                <tr>
                  <th scope="row">6</th>
                  <td>MWC NU Kawalu</td>
                  <td>0800000009</td>
                  <td>mwcnukawalu@gmail.com</td>
                 <td>
                    
                    <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <ul
                      class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                      <li><a class="dropdown-item" href="#">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                        </a>
                      </li>
                      <li><a class="dropdown-item text-danger" href="#">
                        <i class="bi bi-trash"></i>
                        Hapus
                        </a>
                      </li>
                    </ul>
                  
                  </td>
                </tr>
                <tr>
                  <th scope="row">7</th>
                  <td>MWC NU Kawalu</td>
                  <td>0800000009</td>
                  <td>mwcnukawalu@gmail.com</td>
                 <td>
                    
                    <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <ul
                      class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                      <li><a class="dropdown-item" href="#">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                        </a>
                      </li>
                      <li><a class="dropdown-item text-danger" href="#">
                        <i class="bi bi-trash"></i>
                        Hapus
                        </a>
                      </li>
                    </ul>
                  
                  </td>
                </tr>
                <tr>
                  <th scope="row">8</th>
                  <td>MWC NU Kawalu</td>
                  <td>0800000009</td>
                  <td>mwcnukawalu@gmail.com</td>
                 <td>
                    
                    <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <ul
                      class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                      <li><a class="dropdown-item" href="#">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                        </a>
                      </li>
                      <li><a class="dropdown-item text-danger" href="#">
                        <i class="bi bi-trash"></i>
                        Hapus
                        </a>
                      </li>
                    </ul>
                  
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection