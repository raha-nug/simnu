@extends('layout.master')


@section('pagetitle')
<div class="pagetitle">
  <h1>{{ $title }}</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">Home</a></li>
      <li class="breadcrumb-item"><a href="/admin/ranting">Anak Ranting</a></li>
      <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
  </nav>
</div>
@endsection

@section('content')
<x-form :$method :$action>
  <x-slot:title>
    Tambah Anak Ranting
  </x-slot:title>
  @csrf
  @if (isset($anak_ranting_data))
    <div class="col-md-12 mt-2">
      <label for="nama" class="form-label">Nama</label>
      <input type="hidden" name="id_ranting" value="{{ $anak_ranting_data->id_ranting }}">
      <input type="hidden" name="id" value="{{ $anak_ranting_data->id }}">
      <input type="text" class="form-control" name="nama" value="{{ $anak_ranting_data->nama }}" required>
    </div>
    <div class="col-md-12 mt-2">
      <label for="alamat" class="form-label">Alamat</label>
      <input type="hidden" name="kota" value="{{ $anak_ranting_data->kota }}">
      <input type="hidden" name="kecamatan" value="{{ $anak_ranting_data->kecamatan }}">
      <input type="hidden" name="desa" value="{{ $anak_ranting_data->desa }}">
      <input type="text" class="form-control" name="alamat" value="{{ $anak_ranting_data->alamat }}" required>
    </div>
    <div class="col-md-12 mt-2">
      <label for="telepon" class="form-label">Telepon</label>
      <input type="text" class="form-control" name="telepon" value="{{ $anak_ranting_data->telp ?? ''}}" >
    </div>
  @else
    <div class="col-md-12 mt-2">
      <label for="nama" class="form-label">Nama</label>
      <input type="hidden" name="id_ranting" value="{{ $ranting_data->id }}">
      <input type="text" class="form-control" name="nama" required>
    </div>
    <div class="col-md-12 mt-2">
      <label for="alamat" class="form-label">Alamat</label>
      <input type="hidden" name="kota" value="{{ $ranting_data->kota }}">
      <input type="hidden" name="kecamatan" value="{{ $ranting_data->kecamatan }}">
      <input type="hidden" name="desa" value="{{ $ranting_data->desa }}">
      <input type="text" class="form-control" name="alamat" required>
    </div>
    <div class="col-md-12 mt-2">
      <label for="telepon" class="form-label">Telepon</label>
      <input type="text" class="form-control" name="telepon" >
    </div>
  @endif
  <!-- <div class="col-md-12 mt-2">
    <label for="website" class="form-label">Website</label>
    <input type="text" class="form-control" id="website" required>
  </div> -->
  <!-- <div class="col-md-12 mt-2">
    <label for="pcnu" class="form-label">NU Ranting</label>
    <select class="form-select" id="pcnu" required>
        <option selected disabled value="">--pilih nu ranting--</option>
        <option>...</option>
      </select>
  </div> -->
  <!-- <div class="col-md-6 mt-2">
    <label for="latitude" class="form-label">Latitude</label>
    <input type="text" class="form-control" id="latitude" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="longitude" class="form-label">Longitude</label>
    <input type="text" class="form-control" id="longitude" required>
  </div> -->
</x-form>

@endsection