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
<div class="card">
    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-three-dots"></i>
      </a>
      <ul
        class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">


        <li><a class="dropdown-item" href="edit-user-group"><i class="bi bi-pencil-square"></i>Edit</a></li>

      </ul>
    </div>
    <div class="card-header">Data User Group </div>
    <div class="card-body">
      <h5 class="card-title">Informasi User Group</h5>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Nama :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{$user_group->nama_grup}}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Admin Super :</dt>
        </div>
        <div class="col-lg-9">
          <dd>
            YES
          </dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Keterangan :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{$user_group->nama_grup}}{{$user_grup->id_pcnu}}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Hak Akses :</dt>
        </div>
        <div class="col-lg-9">
          <dd>
            <ul>
                <li>
                    <b>Kelola User</b>
                    Lihat Daftar
                        ,
                    Lihat Detail
                        ,
                    Tambah Baru
                        ,
                    Edit
                        ,
                    Hapus
            </li>
            <li>
                <b>Kelola User Group</b>
                Lihat Daftar
                    ,
                Lihat Detail
                    ,
                Tambah Baru
                    ,
                Edit
                    ,
                Hapus
            </li>
            <li>
                <b>Kelola Pengurus</b>
                Lihat Daftar
                    ,
                Lihat Detail
                    ,
                Tambah Baru
                    ,
                Edit
                    ,
                Hapus
            </li>
            <li>
                <b>Kelola Jenis Pengurus</b>
                Lihat Daftar
                    ,
                Lihat Detail
                    ,
                Tambah Baru
                    ,
                Edit
                    ,
                Hapus
            </li>
            <li>
                <b>Kelola Jenis Pengurus</b>
                Lihat Daftar
                    ,
                Lihat Detail
                    ,
                Tambah Baru
                    ,
                Edit
                    ,
                Hapus
            </li>
            <li>
                <b>Kelola Jabatan</b>
                Lihat Daftar
                    ,
                Lihat Detail
                    ,
                Tambah Baru
                    ,
                Edit
                    ,
                Hapus
            </li>
            <li>
                <b>Kelola Member</b>
                Lihat Daftar
                    ,
                Lihat Detail
                    ,
                Tambah Baru
                    ,
                Edit
                    ,
                Hapus
            </li>
            <li>
                <b>Kelola PWNU</b>
                Lihat Daftar
                    ,
                Lihat Detail
                    ,
                Tambah Baru
                    ,
                Edit
                    ,
                Hapus
            </li>
            <li>
                <b>Kelola PCNU</b>
                Lihat Daftar
                    ,
                Lihat Detail
                    ,
                Tambah Baru
                    ,
                Edit
                    ,
                Hapus
            </li>
            <li>
                <b>Kelola MWC NU</b>
                Lihat Daftar
                    ,
                Lihat Detail
                    ,
                Tambah Baru
                    ,
                Edit
                    ,
                Hapus
            </li>
            <li>
                <b>Kelola Anak Ranting</b>
                Lihat Daftar
                    ,
                Lihat Detail
                    ,
                Tambah Baru
                    ,
                Edit
                    ,
                Hapus
            </li>
            <li>
                <b>Kelola Lembaga</b>
                Lihat Daftar
                    ,
                Lihat Detail
                    ,
                Tambah Baru
                    ,
                Edit
                    ,
                Hapus
            </li>
            <li>
                <b>Kelola Master Lembaga</b>
                Lihat Daftar
                    ,
                Lihat Detail
                    ,
                Tambah Baru
                    ,
                Edit
                    ,
                Hapus
            </li>
            <li>
                <b>Kelola Banom Basis</b>
                Lihat Daftar
                    ,
                Lihat Detail
                    ,
                Tambah Baru
                    ,
                Edit
                    ,
                Hapus
            </li>
            <li>
                <b>Kelola Banom</b>
                Lihat Daftar
                    ,
                Lihat Detail
                    ,
                Tambah Baru
                    ,
                Edit
                    ,
                Hapus
            </li>
            <li>
                <b>Kelola Master Banom</b>
            Lihat Daftar
                ,
            Lihat Detail
                ,
            Tambah Baru
                ,
            Edit
                ,
            Hapus
            </li>
            <li>
                <b>Kelola Surat Keputusan</b>
                Lihat Daftar
                    ,
                Lihat Detail
                    ,
                Tambah Baru
                    ,
                Edit
                    ,
                Hapus
            </li>
            </ul>
            </dd>
        </div>
      </div>
    </div>
  </div>

@endsection
