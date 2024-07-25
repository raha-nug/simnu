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
<x-form :$method :$action>
    @csrf
  <x-slot:title>
    Edit PWNU
  </x-slot:title>
  <div class="row">
     <div class="col-md-12 mt-2">
    <label for="no-sk" class="form-label">Nama</label>
    <input type="text" class="form-control" name="nama" id="no-sk" readonly value="{{$pw_data->nama}}">
    <input type="hidden" class="form-control" name="id" id="no-sk" value="{{$pw_data->id}}">
  </div>
  <div class="col-md-12 mt-2">
    <label for="tgl-mulai" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="tgl-mulai" name="alamat" value="{{$pw_data->alamat}}">
  </div>
  <div class="col-md-12 mt-2">
    <label for="telepon" class="form-label">Telepon</label>
    <input type="text" class="form-control" id="telepon" name="telp" value="{{$pw_data->telp}}">
  </div>
  <div class="col-md-12 mt-2">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{$pw_data->email}}">
  </div>
  <div class="col-md-12 mt-2">
    <label for="website" class="form-label">Website</label>
    <input type="text" class="form-control" id="website" name="website" value="{{$pw_data->website}}">
  </div>
  <div class="col-md-12 mt-2">
    <label for="website" class="form-label">Lattitude</label>
    <input type="text" class="form-control" id="website" name="lat" value="{{$pw_data->lat}}">
  </div>
  <div class="col-md-12 mt-2">
    <label for="website" class="form-label">Longitude</label>
    <input type="text" class="form-control" id="website" name="long" value="{{$pw_data->long}}">
  </div>
  <div class="col-md-12 mt-2">
    <label for="website" class="form-label">Provinsi</label>
    <input type="text" class="form-control" id="website" name="provinsi" readonly value="{{$pw_data->provinsi}}">
  </div>

  </div>
</x-form>

@endsection
