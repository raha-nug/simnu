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
      <li class="breadcrumb-item"><a href="/admin">PWNU</a></li>
      <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
  </nav>
</div>
@endsection

@section('content')
<x-form :$method :$action>
    @csrf
  <x-slot:title>
    Tambah Uraian Indikator
  </x-slot:title>
  {{-- @if(isset($data_ui))
    <div class="col-md-12 mt-2">
      <label for="nama-banom" class="form-label">Nama Uraian Indikator</label>
      <input type="text" name="nama_uraian" class="form-control" value="{{$data_ui->nama_uraian}}">
      <input type="hidden" name="id" value="{{$data_ui->id}}">
    </div>
    @else --}}
    <div class="col-md-12 mt-2">
        <label for="nama_uraian" class="form-label">Nama Indikator</label>
        <input type="text" class="form-control" value="{{$data_ui->nama_indikator}}" readonly>
    </div>
    <div class="col-md-12 mt-2">
      <label for="nama-banom" class="form-label">Nama Uraian Indikator</label>
      @if(isset($data_ui))
      <input type="hidden" name="id_indikator" value="{{$data_ui->id}}">
      @endif
      <input type="text" name="nama_uraian" class="form-control">
    </div>
    {{-- @endif --}}
</x-form>
@endsection
