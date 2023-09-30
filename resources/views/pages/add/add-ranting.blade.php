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
      <li class="breadcrumb-item"><a href="/admin/ranting">Ranting</a></li>
      <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
  </nav>
</div>
@endsection

@section('content')
<x-form method="POST" action="/admin/pwnu">
  <x-slot:title>
    Tambah Ranting
  </x-slot:title>
  <div class="col-md-12 mt-2">
    <label for="no-sk" class="form-label">Nama</label>
    <input type="text" class="form-control" id="no-sk" required disabled>
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
    <label for="website" class="form-label">Website</label>
    <input type="text" class="form-control" id="website" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="pcnu" class="form-label">MWC NU</label>
    <select class="form-select" id="pcnu" required>
        <option selected disabled value="">--pilih mwcnu--</option>
        <option>...</option>
      </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="kabkot" class="form-label">Kecamatan</label>
      <select class="form-select" id="kabkot" required>
        <option selected disabled value="">--pilih kecamatan--</option>
        <option>...</option>
      </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="latitude" class="form-label">Latitude</label>
    <input type="text" class="form-control" id="latitude" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="longitude" class="form-label">Longitude</label>
    <input type="text" class="form-control" id="longitude" required>
  </div>
</x-form>

@endsection