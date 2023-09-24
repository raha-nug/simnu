@extends('layout.master')


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
<x-form method="POST" action="/admin/pwnu">
  <x-slot:title>
    Edit PWNU
  </x-slot:title>
  <div class="row">
     <div class="col-md-12 mt-2">
    <label for="no-sk" class="form-label">Nama</label>
    <input type="text" class="form-control" id="no-sk" required value="PWNU Jawa Barat">
  </div>
  <div class="col-md-12 mt-2">
    <label for="tgl-mulai" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="tgl-mulai" required value="Jl. Terusan Galunggung No. 9 Kel. Lingkar Selatan Kec. Lengkong Kota Bandung 40263">
  </div>
  <div class="col-md-12 mt-2">
    <label for="telepon" class="form-label">Telepon</label>
    <input type="text" class="form-control" id="telepon" required value="0227315915">
  </div>
  <div class="col-md-12 mt-2">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" required value="admin@nujabar.or.id">
  </div>
  <div class="col-md-12 mt-2">
    <label for="website" class="form-label">Website</label>
    <input type="text" class="form-control" id="website" required value="https://jabar.nu.or.id">
  </div>

  </div>
</x-form>

@endsection