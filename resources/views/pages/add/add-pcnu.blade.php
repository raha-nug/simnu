@extends('layout.master')


@section('pagetitle')
<div class="pagetitle">
  <h1>{{ $title }}</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">Home</a></li>
      <li class="breadcrumb-item"><a href="/admin">PCNU</a></li>
      <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
  </nav>
</div>
@endsection

@section('content')
<x-form :$action :$method >
  @csrf
  <x-slot:title>
    Tambah PCNU
  </x-slot:title>
  <div class="col-md-12 mt-2">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" required readonly>
  </div>
  <div class="col-md-12 mt-2">
    <label for="tgl-mulai" class="form-label">Alamat</label>
    <input type="text" class="form-control" name="alamat" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="telepon" class="form-label">Telepon</label>
    <input type="text" class="form-control" name="telp" >
  </div>
  <div class="col-md-6 mt-2">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" required>
  </div>
  <div class="col-md-12 mt-2">
    <label for="website" class="form-label">Website</label>
    <input type="text" class="form-control" name="website" >
  </div>
  <div class="col-md-12 mt-2">
    <label for="kota" class="form-label">Kota/Kab</label>
      <select class="form-select" id="kabkot" name="kota" required>
        <option></option>
        @foreach($kab_kota as $item)
          <option value="{{ $item->kode }}">{{ $item->nama }}</option>
        @endforeach
      </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="latitude" class="form-label">Latitude</label>
    <input type="text" class="form-control" name="lat" >
  </div>
  <div class="col-md-6 mt-2">
    <label for="longitude" class="form-label">Longitude</label>
    <input type="text" class="form-control" name="long" >
  </div>
</x-form>

@endsection
@section('js-page')
<script src="../assets/sources/js/pcnu.js"></script>
@endsection
