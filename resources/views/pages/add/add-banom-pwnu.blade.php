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
    Tambah Banom PWNU
  </x-slot:title>
    <div class="col-md-12">
      <label for="no-sk" class="form-label">Nama Banom</label>
      <select class="form-select" id="validationCustom04" required>
        <option selected disabled value="">--pilih banom master--</option>
        <option>...</option>
      </select>
    </div>
    <div class="col-md-12">
      <label for="no-sk" class="form-label">Banom Base</label>
      <select class="form-select" id="validationCustom04" required>
        <option selected disabled value="">--pilih banom base--</option>
        <option>...</option>
      </select>
    </div>
</x-form>

@endsection