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
<x-form method="POST" action="/admin/pwnu" >
  <x-slot:title>
    Tambah Pengurus
  </x-slot:title>
  <div class="col-lg-3">
    <label for="cari-pengurus" class="form-label">Cari Pengurus</label>
    <input type="text" class="form-control" id="cari-pengurus" placeholder="Search..">
  </div>
  <div class="col-lg-9 d-flex align-items-end">
    <button class="btn btn-primary">
      <i class="bi bi-plus"></i>
      Tambah
    </button>
  </div>
</x-form>

@endsection