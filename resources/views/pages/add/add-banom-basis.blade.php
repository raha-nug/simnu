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
<x-form method="POST" action="/admin/pwnu">
  <x-slot:title>
    Tambah Banom Basis
  </x-slot:title>
    <div class="col-md-12">
      <label for="nama" class="form-label">Nama Banom Basis</label>
      <input type="text" class="form-control" name="nama" id="nama">
    </div>
</x-form>

@endsection