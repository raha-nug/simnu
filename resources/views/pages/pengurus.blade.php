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
                Daftar Pengurus
            </div>
            <div class="card-body">
                {{-- <div class="d-flex justify-content-end align-items-center me-3 mt-3">
                  <a class="btn btn-outline-primary me-2" href="" data-bs-toggle="dropdown">
                    <i class="bi bi-funnel-fill"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow py-5 px-3">
                    <li class="mb-3">
                      <label for="status" class="form-label">Kelengkapan Dokumen</label>
                      <select class="form-select" id="status" required>
                        <option>Lengkap</option>
                        <option>Belum Lengkap</option>
                    </select>
                    </li>
                    <li class="">
                      <button class="btn btn-primary">Filter</button>
                    </li>
                  </ul>
                  <a class="btn btn-outline-primary me-2" href="">
                    <i class="bi bi-file-earmark-arrow-down-fill"></i>
                    Export
                  </a>
                  <a class="btn btn-primary" href="add-pcnu">
                  <i class="bi bi-plus me-1"></i>
                  Tambah
                  </a>
                </div> --}}
                <div class="table-responsive ">
                    <table class="table table-borderless table-hover datatable">
                    <thead>
                        <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggota as $item)
                        <tr>
                            <th scope="row"><a href="{{route('detail_pengurus')}}?pengurus={{setRoute($item->id)}}">{{$item->nama}}</a></th>
                            <td>{{$item->telepon}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>
                                <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul
                                class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                <li><a class="dropdown-item" id="edit" data-syarat={{$item->id}} href="{{route('detail_pengurus')}}?pengurus={{setRoute($item->id)}}">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                    </a>
                                </li>
                                <li><a class="dropdown-item text-danger" href="{{route('delete')}}?id_anggota={{setRoute($item->id)}}">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                    </a>
                                </li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                        {{-- <tr>
                            <th scope="row"><a href="detail-pengurus">H. Asep Saepudin Abdillah</a></th>
                            <td>081111111</td>
                            <td>contoh@email.com</td>
                            <td>Dusun Kosbar RT 002 RW 005 Desa Sukatani Kec. Cilamaya Wetan Kab. Karawang</td>
                            <td>
                                <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul
                                class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                <li><a class="dropdown-item" href="#">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                    </a>
                                </li>
                                <li><a class="dropdown-item text-danger" href="#">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                    </a>
                                </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><a href="detail-pengurus">H. Ahmad Husen Jali, S.Ag</a></th>
                            <td>081111111</td>
                            <td>contoh@email.com</td>
                            <td>Dusun Kosbar RT 002 RW 005 Desa Sukatani Kec. Cilamaya Wetan Kab. Karawang</td>
                            <td>
                                <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul
                                class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                <li><a class="dropdown-item" href="#">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                    </a>
                                </li>
                                <li><a class="dropdown-item text-danger" href="#">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                    </a>
                                </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><a href="detail-pengurus">H. Ahmad Dasuki</a></th>
                            <td>081111111</td>
                            <td>contoh@email.com</td>
                            <td>Dusun Kosbar RT 002 RW 005 Desa Sukatani Kec. Cilamaya Wetan Kab. Karawang</td>
                            <td>
                                <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul
                                class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                <li><a class="dropdown-item" href="#">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                    </a>
                                </li>
                                <li><a class="dropdown-item text-danger" href="#">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                    </a>
                                </li>
                                </ul>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><a href="detail-pengurus">Drs. H. Daddy Syarif, MM.</a></th>
                            <td>081111111</td>
                            <td>contoh@email.com</td>
                            <td>Dusun Kosbar RT 002 RW 005 Desa Sukatani Kec. Cilamaya Wetan Kab. Karawang</td>
                            <td>
                                <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul
                                class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                <li><a class="dropdown-item" href="#">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                    </a>
                                </li>
                                <li><a class="dropdown-item text-danger" href="#">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                    </a>
                                </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><a href="detail-pengurus">KH. M. Nuh Addawami</a></th>
                            <td>081111111</td>
                            <td>contoh@email.com</td>
                            <td>Dusun Kosbar RT 002 RW 005 Desa Sukatani Kec. Cilamaya Wetan Kab. Karawang</td>
                            <td>
                                <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul
                                class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                <li><a class="dropdown-item" href="#">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                    </a>
                                </li>
                                <li><a class="dropdown-item text-danger" href="#">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                    </a>
                                </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><a href="detail-pengurus">KH. M. Usamah Manshur</a></th>
                            <td>081111111</td>
                            <td>contoh@email.com</td>
                            <td>Dusun Kosbar RT 002 RW 005 Desa Sukatani Kec. Cilamaya Wetan Kab. Karawang</td>
                            <td>
                                <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul
                                class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                <li><a class="dropdown-item" href="#">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                    </a>
                                </li>
                                <li><a class="dropdown-item text-danger" href="#">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                    </a>
                                </li>
                                </ul>
                            </td>
                        </tr> --}}

                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
@endsection
