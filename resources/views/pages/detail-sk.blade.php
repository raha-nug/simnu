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
<div class="container">
  <div class="card">
    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-three-dots"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">


        <li><a class="dropdown-item" href="{{route('add_sk')}}?sk={{setRoute($sk->id)}}"><i class="bi bi-pencil-square"></i>Edit SK</a></li>
        <li><a class="dropdown-item" href="{{route('add_pengurus')}}?id_sk={{setRoute($sk->id)}}"><i class="bi bi-person-lines-fill"></i>Edit Pengurus</a></li>

      </ul>
    </div>
    <div class="card-header">Detail SK</div>
    <div class="card-body">
      <h5 class="card-title">Informasi Umum</h5>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Nomor Dokumen :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{$sk->no_dokumen}}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Tanggal Mulai :</dt>
        </div>
        <div class="col-lg-9">
          <dd>
            {{$sk->tanggal_mulai}}
          </dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Tanggal Berakhir :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{$sk->tanggal_berakhir}}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">File :</dt>
        </div>
        <div class="col-lg-9">
          <dd><a href="{{route('download_sk')}}?sk={{setRoute($sk->id)}}">Download</a></dd>
        </div>
      </div>

      <div class="border-bottom my-5"></div>
      <div class="table-responsive">
        <table class="table table-borderless table-hover datatable">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Pengurus</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Periode</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td><a href="detail-pengurus">KH. Asep Burhanudin</a></td>
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
  </div>
</div>

@endsection