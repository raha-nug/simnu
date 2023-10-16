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
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Daftar Master Banom</div>
                <div class="d-flex justify-content-end me-3 btn-sm">
                <a class="btn btn-primary" href="{{route('add_master_banom')}}">
                <i class="bi bi-plus me-1"></i>
                Tambah
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-borderless table-hover datatable">
                <thead>
                    <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($master_banom as $value)
                    <tr>
                        <td><a href="{{route('detail_master_banom', ['id_mb' => setRoute($value->id)])}}">{{$value->nama_banom}}</a></td>
                        <td>

                            <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots-vertical"></i>
                            </a>
                            <ul
                            class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                            <li><a class="dropdown-item" href="{{route('update_master_banom', ['id_mb' => setRoute($value->id)])}}">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                                </a>
                            </li>
                            <li><a class="dropdown-item text-danger" href="{{route('delete_master_banom', ['id_mb' => setRoute($value->id)])}}">
                                <i class="bi bi-trash"></i>
                                Hapus
                                </a>
                            </li>
                            </ul>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
@endsection
