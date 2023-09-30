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
    <div class="card-header">Data Master Lembaga </div>
    <div class="card-body">
      <h5 class="card-title">Informasi Master Lembaga</h5>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Nama :</dt>
        </div>
        <div class="col-lg-9">
          <dd>Lembaga Amil Zakat Infak dan Sodaqoh NU</dd>
        </div>
      </div>
    </div>
  </div>
    
@endsection