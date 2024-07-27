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
<x-form :$method :$action>
    @csrf
  <x-slot:title>
    Tambah Jabatan
  </x-slot:title>
  @if(isset($data_j))
    <div class="col-md-12">
      <label for="nama" class="form-label">Nama Jabatan</label>
      <input type="text" class="form-control" name="nama_jabatan" value="{{$data_j->nama_jabatan}}" id="nama">
      <input type="hidden" name="id" value="{{ $data_j->id }}">
    </div>
    <div class="col-md-12">
      <label for="nama" class="form-label">Tipe Jabatan</label>
      <select name="tipe" class="form-select" id="">
        <option value="Syuriyah">Syuriyah</option>
        <option value="Tanfidziyah">Tanfidziyah</option>
        <option value="Lembaga">Lembaga</option>
        <option value="Banom">Banom</option>
      </select>
    </div>
    @else
    <div class="col-md-12">
        <label for="nama" class="form-label">Nama Jabatan</label>
        <input type="text" class="form-control" name="nama_jabatan" id="nama">
    </div>
    <div class="col-md-12">
        <label for="nama" class="form-label">Tipe Jabatan</label>
        <select name="tipe" class="form-select" id="">
          <option value="Syuriyah">Syuriyah</option>
          <option value="Tanfidzyiah">Tanfidziyah</option>
          <option value="Lembaga">Lembaga</option>
          <option value="Banom">Banom</option>
        </select>
      </div>
    @endif
</x-form>

@endsection
