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
    Tambah Banom
  </x-slot:title>
    <div class="col-md-12">
      <label for="nama-banom" class="form-label">Nama Banom</label>
      <select class="form-select" id="nama-banom" required>
        <option selected disabled value="">--pilih banom master--</option>
        <option>...</option>
      </select>
    </div>
    <div class="col-md-12">
      <label for="banom-base" class="form-label">Banom Base</label>
      <select class="form-select" id="banom-base" required>
        <option selected disabled value="">--pilih banom base--</option>
        <option>...</option>
      </select>
    </div>
</x-form>

@endsection