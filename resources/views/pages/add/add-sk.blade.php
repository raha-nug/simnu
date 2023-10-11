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
    Tambah SK
  </x-slot:title>
  @if (isset($sk))
  <div class="col-md-12 mt-2">
    <label for="no-sk" class="form-label">Nomer SK</label>
    <input type="text" class="form-control" id="no-sk" name="no_dokumen" value="{{$sk->no_dokumen ?? ''}}" required>
    <input type="hidden" id="sk_id" name="id" value="{{$sk->id}}">
    <input type="hidden" id="id_pcnu" name="id_pcnu" value="{{$sk->id_pcnu}}">
    <input type="hidden" id="id_mwcnu" name="id_mwcnu" value="{{$sk->id_mwcnu}}">
  </div>
  <div class="col-md-6 mt-2">
    <label for="tgl-mulai" class="form-label">Tanggal Mulai</label>
    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{$sk->tanggal_mulai ?? ''}}" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="tgl-berhenti" class="form-label">Tanggal Berhenti</label>
    <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir" value="{{$sk->tanggal_berakhir ?? ''}}" required>
  </div>
  <div class="col-md-12 mt-2">
    <label for="file-sk" class="form-label">File SK</label>
    <input type="file" class="form-control" id="file_sk" name="file_sk" required>
  </div>
  @else

  <div class="col-md-12 mt-2">
     <label for="no-sk" class="form-label">Nomer SK</label>
     <input type="text" class="form-control" id="no-sk" name="no_dokumen" required>
     <input type="hidden" id="id_pcnu" name="id_pcnu" value="{{$pc_data->id}}">
     <input type="hidden" id="id_mwcnu" name="id_mwcnu" value="{{$mwc_data->id}}">
   </div>
   <div class="col-md-6 mt-2">
     <label for="tgl-mulai" class="form-label">Tanggal Mulai</label>
     <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
   </div>
   <div class="col-md-6 mt-2">
     <label for="tgl-berhenti" class="form-label">Tanggal Berhenti</label>
     <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir" required>
   </div>
   <div class="col-md-12 mt-2">
     <label for="file-sk" class="form-label">File SK</label>
     <input type="file" class="form-control" id="file_sk" name="file_sk" required>
   </div>
  @endif
</x-form>

@endsection
