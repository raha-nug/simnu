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
      <li class="breadcrumb-item"><a href="/admin/mwc">Ranting</a></li>
      <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
  </nav>
</div>
@endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-three-dots"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">


        <li><a class="dropdown-item" href="{{ route('anak-ranting-add') }}?anakranting={{ setRoute($anak_ranting_data->id) }}"><i class="bi bi-pencil-square"></i>Edit</a></li>
        <li><a href="#" class="dropdown-item"><i class="bi bi-list-check"></i>Review</a></li>

      </ul>
    </div>
    <div class="card-header">Detail Anak Ranting</div>
    <div class="card-body">
      <h5 class="card-title">Informasi Umum</h5>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Nama :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $anak_ranting_data->nama }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Alamat :</dt>
        </div>
        <div class="col-lg-9">
          <dd>
            {{ $anak_ranting_data->alamat }}
          </dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Telepon :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $anak_ranting_data->telp ?? '-' }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Email :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $anak_ranting_data->email ?? '-' }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">NU Ranting :</dt>
        </div>
        <div class="col-lg-9">
          <dd><a href="{{ route('ranting') }}?ranting={{ $anak_ranting_data->id_ranting }}">{{ $anak_ranting_data->ranting_nama }}</a></dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Latitude :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{$anak_ranting_data->lat ?? '-'}}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Longitude :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $anak_ranting_data->long ?? '-' }}</dd>
        </div>
      </div>

    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <!-- Bordered Tabs Justified -->
      <ul class="nav nav-tabs nav-tabs-bordered d-flex pt-5" id="borderedTabJustified" role="tablist">
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100 active" id="pengurus-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-pengurus" type="button" role="tab" aria-controls="pengurus" aria-selected="true">
            Pengurus
          </button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100" id="kepengurusan-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-kepengurusan" type="button" role="tab" aria-controls="kepengurusan" aria-selected="false">
            SK Kepengurusan
          </button>
        </li>

      </ul>
      <div class="tab-content pt-2" id="borderedTabJustifiedContent">
        @include('layout.tabs.pengurus_tab')
        @include('layout.tabs.kepengurusan_tab')
      </div>
    </div>
  </div>
</div>

@endsection
@section('js-page')
<script>
    $(document).ready(function() {
        pengurusTable();
        SkTable();
    });
    const pengurusTable = () => {
    $("#pengurusTable").DataTable({
            responsive:!0,
            language:{
                paginate:{
                    previous:"<i class='ri-arrow-left-s-line'>",
                    next:"<i class='ri-arrow-right-s-line'>"
                }
            },
            processing: true,
            serverSide: true,
            ajax: "{{ url('/') }}/anak-ranting/detail?anakranting={{setRoute($anak_ranting_data->id)}}&tipe=pengurus",
            columns: [
                    {
                        className: "my-column",
                        mData: "nama",
                        mRender: function(data, type, row) {
                            return `<a href="{{ route('detail_pengurus') }}?pengurus=${row.id}">${row.nama}</a>`;
                        }
                    },
                    {
                        className: "my-column",
                        mData: "jenis_pengurus",
                        mRender: function(data, type, row) {
                            return `${row.jenis_pengurus}`;
                        }
                    },
                    {
                        className: "my-column",
                        mData: "jabatan",
                        mRender: function(data, type, row) {
                            return `${row.jabatan}`;

                        }
                    },
                    {
                        className: "my-column",
                        mData: "periode",
                        mRender: function(data, type, row) {
                            return `${row.mulai_jabatan} - ${row.akhir_jabatan}`;

                        }
                    },

                ],
            drawCallback:function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            }
        });
  }
  const SkTable = () => {
    $("#SkTable").DataTable({
            responsive:!0,
            language:{
                paginate:{
                    previous:"<i class='ri-arrow-left-s-line'>",
                    next:"<i class='ri-arrow-right-s-line'>"
                }
            },
            processing: true,
            serverSide: true,
            ajax: "{{ url('/') }}/anak-ranting/detail?anakranting={{setRoute($anak_ranting_data->id)}}&tipe=sk",
            columns: [
                    {
                        className: "my-column",
                        mData: "no",
                        mRender: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        className: "my-column",
                        mData: "no_dokumen",
                        mRender: function(data, type, row) {
                            return `<a href="{{ route('sk_detail') }}?sk=${row.id}">${row.no_dokumen}</a>`;
                        }
                    },
                    {
                        className: "my-column",
                        mData: "masa_jabatan",
                        mRender: function(data, type, row) {
                            return `${row.tanggal_mulai} - ${row.tanggal_berakhir}`;
                        }
                    },
                    // {
                    //     className: "my-column",
                    //     mData: "periode",
                    //     mRender: function(data, type, row) {
                    //         return `${row.mulai_jabatan} - ${row.akhir_jabatan}`;

                    //     }
                    // },

                ],
            drawCallback:function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            }
        });
  }
</script>
@endsection
