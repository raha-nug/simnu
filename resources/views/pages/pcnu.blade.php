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
                <a class="btn btn-primary" href="{{ route('pcnu-add') }}">
                    <i class="bi bi-plus me-1"></i>
                    Tambah
                </a>
            </div>
            <div class="table-responsive ">
                <table class="table table-borderless table-hover datatable" id="pcnuDT">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Nilai Verifikasi & Validasi</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">MWC</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_pcnu as $item)
                        <tr>
                            <th scope="row"><a href="{{ route('pcnu-detail') }}?page=10&pc={{ setRoute($item->id) }}">{{ $item->nama }}</a></th>
                            <td>
                                @if($item->nilai_kurang > $item->nilai_cukup && $item->nilai_kurang > $item->nilai_baik)
                                    <span class="bg-danger text-white px-3 py-1 rounded">Kurang</span>
                                {{-- @elseif($item->nilai_kurang == 0 && $item->nilai_cukup == 0 && $item->nilai_baik == 0) --}}
                                    <span class="bg-danger text-white px-3 py-1 rounded">Kurang</span>
                                @elseif($item->nilai_cukup > $item->nilai_kurang && $item->nilai_cukup > $item->nilai_baik)
                                    <span class="bg-warning text-white px-3 py-1 rounded">Cukup</span>
                                @elseif($item->nilai_baik > $item->nilai_cukup && $item->nilai_baik > $item->nilai_kurang)
                                    <span class="bg-success text-white px-3 py-1 rounded">Baik</span>
                                @else
                                    <span>Belum Di Verifikasi Dan Validasi</span>
                               @endif
                            </td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->jumlah_mwc }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('pcnu-update',['id_pc' => setRoute($item->id)]) }}">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-danger" href="{{ route('pcnu-delete',['id_pc' => setRoute($item->id)]) }}">
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
</div>
@endsection
