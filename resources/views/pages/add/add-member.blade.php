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
<x-form method="POST" action="/admin/pwnu">
  <x-slot:title>
    Tambah Member
  </x-slot:title>
  <div class="col-md-12 mt-2">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" required>
  </div>
  <div class="col-md-12 mt-2">
    <label for="nik" class="form-label">NIK</label>
    <input type="text" class="form-control" id="nik" required>
  </div>
  <div class="col-md-12 mt-2">
    <label for="id-kartaNU" class="form-label">Id KartaNU</label>
    <input type="text" class="form-control" id="id-kartaNU" required>
  </div>
  <div class="col-md-12 mt-2">
    <label for="tgl-mulai" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="tgl-mulai" required>
  </div>
  <div class="col-md-12 mt-2">
    <label for="telepon" class="form-label">Telepon</label>
    <input type="text" class="form-control" id="telepon" required>
  </div>
  <div class="col-md-12 mt-2">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" id="email" required>
  </div>
  <div class="col-md-12 mt-2">
    <label for="whatsapp" class="form-label">Whatsapp</label>
    <input type="text" class="form-control" id="whatsapp" required>
  </div>
</x-form>

@endsection