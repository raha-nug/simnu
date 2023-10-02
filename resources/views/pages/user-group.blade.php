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
    @include('sweetalert::alert')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Daftar User Group</div>
                <div class="d-flex justify-content-end me-3 btn-sm">
                <a class="btn btn-primary" href="{{route('add-user-group')}}">
                <i class="bi bi-plus me-1"></i>
                Tambah
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-borderless table-hover datatable">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama User Group</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_group as $value)
                    <tr>
                        <th scope="row">1</th>
                        <td><a href="{{ route('detail-user-group') }}?page=10&ug={{ setRoute($value->id) }}">{{$value->nama_grup}}</a></td>
                        <td>

                            <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots-vertical"></i>
                            </a>
                            <ul
                            class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                            <li><a class="dropdown-item" href="{{route('update-user-group', ['id_user_group' => setRoute($value->id)])}}">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                                </a>
                            </li>
                            <li><a class="dropdown-item text-danger" href="{{route('delete-user-group', ['id_ug' => setRoute($value->id)])}}">
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
