@extends('layout.master')


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
<x-form method="POST" action="/admin/pwnu">
  <x-slot:title>
    Tambah SK PWNU
  </x-slot:title>
   <div class="col-md-12">
    <label for="no-sk" class="form-label">Nomer SK</label>
    <input type="text" class="form-control" id="no-sk" required>
  </div>
  <div class="col-md-6">
    <label for="tgl-mulai" class="form-label">Tanggal Mulai</label>
    <input type="date" class="form-control" id="tgl-mulai" required>
  </div>
  <div class="col-md-6">
    <label for="tgl-berhenti" class="form-label">Tanggal Berhenti</label>
    <input type="date" class="form-control" id="tgl-berhenti" required>
  </div>
  <div class="col-12">
    <label for="file-sk" class="form-label">File SK</label>
    <input type="file" class="form-control" id="file-sk" required>
  </div>
</x-form>

@endsection