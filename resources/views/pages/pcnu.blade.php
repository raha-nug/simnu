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
            
            <div class="card-header">
                Daftar PCNU
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end me-3 mt-3 btn-sm">
                  <a class="btn btn-outline-primary me-md-2" href="">
                    <i class="bi bi-file-earmark-arrow-down-fill"></i>
                    Export
                  </a>
                  <a class="btn btn-primary" href="/admin/add-pcnu">
                  <i class="bi bi-plus me-1"></i>
                  Tambah
                  </a>
                </div>
                <div class="table-responsive ">
                    <table class="table table-borderless table-hover datatable">
                    <thead>
                        <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Jumlah Pengurus PCNU</th>
                        <th scope="col">Jumlah MWCNU</th>
                        <th scope="col">Jumlah Ranting</th>
                        <th scope="col">Kelengkapan Dokumen</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><a href="/admin/detail-pcnu">PCNU Kota Bogor</a></th>
                            <td>78</td>
                            <td>45</td>
                            <td>21</td>
                            <td><span class="badge bg-primary"><i class="bi bi-check-circle me-1"></i> Lengkap</span></td>
                            <td>
                                <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul
                                class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                <li><a class="dropdown-item" href="#" >
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                    </a>
                                </li>
                                <li><a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#disablebackdrop">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                    </a>
                                </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><a href="/admin/detail-pcnu">PCNU Kota Tasikmalaya</a></th>
                            <td>50</td>
                            <td>10</td>
                            <td>67</td>
                            <td><span class="badge bg-warning"><i class="bi bi-bi bi-info-circle me-1"></i> Belum Lengkap
                            </span></td>
                            <td>
                                <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul
                                class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                <li><a class="dropdown-item" href="#" >
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                    </a>
                                </li>
                                <li><a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#disablebackdrop">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                    </a>
                                </li>
                                </ul>
                            </td>
                        </tr>

                    </tbody>
                    </table>
                </div>
                <div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Pemberitahuan!</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Konfirmasi hapus data?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tidak</button>
                      <button type="button" class="btn btn-danger"><i class="bi bi-trash me-2"></i>Hapus</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
        </div>
    </div>
@endsection
