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
      <li class="breadcrumb-item"><a href="/admin/mwc">Ranting</a></li>
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


        <li><a class="dropdown-item" href="{{ route('anak-ranting-add') }}?anakranting={{ setRoute($anak_ranting_data->id) }}"><i class="bi bi-pencil-square"></i>Edit</a></li>
        <li><a href="#" class="dropdown-item"><i class="bi bi-list-check"></i>Review</a></li>

      </ul>
    </div>
    <div class="card-header">Detail Anak Ranting</div>
    <div class="card-body">
      <h5 class="card-title">Informasi Umum</h5>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Nama :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $anak_ranting_data->nama }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Alamat :</dt>
        </div>
        <div class="col-lg-9">
          <dd>
            {{ $anak_ranting_data->alamat }}
          </dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Telepon :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $anak_ranting_data->telp ?? '-' }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Email :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $anak_ranting_data->email ?? '-' }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">NU Ranting :</dt>
        </div>
        <div class="col-lg-9">
          <dd><a href="{{ route('ranting') }}?ranting={{ $anak_ranting_data->id_ranting }}">{{ $anak_ranting_data->ranting_nama }}</a></dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Latitude :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{$anak_ranting_data->lat ?? '-'}}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Longitude :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $anak_ranting_data->long ?? '-' }}</dd>
        </div>
      </div>

    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <!-- Bordered Tabs Justified -->
      <ul class="nav nav-tabs nav-tabs-bordered d-flex pt-5" id="borderedTabJustified" role="tablist">
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100 active" id="pengurus-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-pengurus" type="button" role="tab" aria-controls="pengurus" aria-selected="true">
            Pengurus
          </button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100" id="kepengurusan-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-kepengurusan" type="button" role="tab" aria-controls="kepengurusan" aria-selected="false">
            SK Kepengurusan
          </button>
        </li>

      </ul>
      <div class="tab-content pt-2" id="borderedTabJustifiedContent">
        <div class="tab-pane fade show active mt-3" id="bordered-justified-pengurus" role="tabpanel" aria-labelledby="pengurus-tab">
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
                @foreach ($pengurus as $value)
                <tr>
                    <th scope="row"><a href="{{ route('detail_pengurus') }}?pengurus={{ setRoute($value->id) }}">{{ $value->nama }}</a></th>
                    <td>{{$value->jenis_pengurus}}</td>
                    <td>{{$value->jabatan}}</td>
                    <td>{{$value->mulai_jabatan}} - {{$value->akhir_jabatan}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade mt-3" id="bordered-justified-kepengurusan" role="tabpanel" aria-labelledby="kepengurusan-tab">
          <div class="d-flex justify-content-end me-3 btn-sm">
            <div class="d-flex justify-content-end me-3 btn-sm">
              <a class="btn btn-primary" href="{{route('add_sk')}}?anakranting={{setRoute($anak_ranting_data->id)}}">
                <i class="bi bi-plus me-1"></i>
                Tambah
              </a>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-borderless table-hover datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">No Surat</th>
                  <th scope="col">Masa Jabatan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sk as $key => $value)
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td><a href="{{route('sk_detail')}}?sk={{setRoute($value->id)}}">{{$value->no_dokumen}}</a></td>
                  <td>{{$value->tanggal_mulai}} - {{$value->tanggal_berakhir}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection