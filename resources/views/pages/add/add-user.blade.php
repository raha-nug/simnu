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
    Tambah User
  </x-slot:title>
  <div class="col-md-12 mt-2">
     <label for="name" class="form-label">Nama</label>
     <input type="text" class="form-control" id="name" required>
   </div>
  <div class="col-md-12 mt-2">
     <label for="email" class="form-label">Email</label>
     <input type="email" class="form-control" id="email" required>
   </div>
   <div class="col-md-6 mt-2">
     <label for="foto" class="form-label">Foto</label>
     <input type="file" class="form-control" id="foto" required>
   </div>
   <div class="col-md-6 mt-2">
     <label for="userGroup" class="form-label">User Group</label>
     <select class="form-select" id="userGroup" required>
        <option selected disabled value="">--pilih user group--</option>
        <option>...</option>
      </select>
   </div>
   <div class="col-md-12 mt-2">
     <label for="password" class="form-label">Password</label>
     <input type="password" class="form-control" id="password" required>
   </div>
   <div class="col-md-12 mt-2">
     <label for="confirmPass" class="form-label">Konfirmasi Password</label>
     <input type="password" class="form-control" id="confirmPass" required>
   </div>
</x-form>

@endsection