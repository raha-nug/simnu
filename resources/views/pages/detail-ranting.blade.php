@extends('layout.master',$ranting_data)


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


        <li><a class="dropdown-item" href="{{ route('ranting-add') }}?ranting={{ setRoute($ranting_data->id) }}"><i class="bi bi-pencil-square"></i>Edit</a></li>
        <li><a href="#" class="dropdown-item"><i class="bi bi-list-check"></i>Review</a></li>

      </ul>
    </div>
    <div class="card-header">Detail Ranting NU</div>
    <div class="card-body">
      <h5 class="card-title">Informasi Umum</h5>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Nama :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $ranting_data->nama ?? '-' }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Alamat :</dt>
        </div>
        <div class="col-lg-9">
          <dd>
            {{ $ranting_data->alamat }}
          </dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Telepon :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $ranting_data->telp ?? '-' }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Email :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $ranting_data->email ?? '-' }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">MWC NU :</dt>
        </div>
        <div class="col-lg-9">
          <dd><a href="{{ route('mwcnu') }}?mwc={{ setRoute($ranting_data->id_mwcnu) }}">{{ $ranting_data->mwc_nama }}</a></dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Kecamatan :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $kecamatan->nama }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Latitude :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{$ranting_data->lat ?? '-'}}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Longitude :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $ranting_data->long ?? '-' }}</dd>
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
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100" id="anak-ranting-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-anak-ranting" type="button" role="tab" aria-controls="anak-ranting" aria-selected="false">
            Anak Ranting
          </button>
        </li>

      </ul>
      <div class="tab-content pt-2" id="borderedTabJustifiedContent">
        @include('layout.tabs.pengurus_tab')
        <div class="tab-pane fade mt-3" id="bordered-justified-kepengurusan" role="tabpanel" aria-labelledby="kepengurusan-tab">
          <div class="d-flex justify-content-end me-3 btn-sm">
            <a class="btn btn-primary" href="{{route('add_sk')}}?ranting={{setRoute($ranting_data->id)}}">
              <i class="bi bi-plus me-1"></i>
              Tambah
            </a>
          </div>

          <div class="table-responsive">
            <table class="table table-borderless table-hover datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">No Surat</th>
                  <th scope="col">Masa Jabatan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sk as $value)
                <tr>
                    <th scope="row">{{$number++}}</th>
                    <td><a href="{{route('sk_detail')}}?sk={{setRoute($value->id)}}">{{$value->no_dokumen}}</a></td>
                    <td>{{$value->tanggal_mulai}} - {{$value->tanggal_berakhir}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        @include('layout.tabs.anak_ranting_tab')
      </div>
    </div>
  </div>
</div>
@endsection
@section('js-page')
<script>
  $(document).ready(function() {
    anakrantingTable();
    pengurusTable();
  })

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
            ajax: "{{ url('/') }}/ranting/detail?ranting={{setRoute($ranting_data->id)}}",
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

  const anakrantingTable = () => {
    $("#anakrantingTable").DataTable({
      responsive: true,
      language: {
        "scrollX": true,
        "scrollY": true,
        search: "_INPUT_",
        searchPlaceholder: "Cari...",
        sLengthMenu: "_MENU_",
        "zeroRecords": "Tidak ada data untuk ditampilkan",
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
        "infoFiltered": ""
      },
      "aLengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "Show All"]
      ],
      "processing": true,
      "bAutoWidth": false,
      "serverSide": true,
      "iDisplayLength": 10,
      "bInfo": true,
      "orderCellsTop": false,
      "ajax": {
        "url": "{{ route('anak-ranting-list') }}",
        "type": "GET",
        "data": function(d) {
          d.ranting = "{{ $ranting_data->id }}";
        }
      },
      "columns": [{
          mData: "nama",
          mRender: function(data, type, row) {
            return `<th scope="row"><a href="{{ route('anak-ranting') }}?anakranting=${row.id}">${row.nama}</a></th>`;
          },
          "orderable": false
        },
        {
          mData: "alamat",
          mRender: function(data, type, row) {
            return row.alamat;
          },
          "orderable": false
        },
        {
          mData: "",
          mRender: function(data, type, row) {
            return `<span class="badge bg-warning"><i class="bi bi-info-circle me-1"></i> Belum Lengkap </span>`;
          },
          "orderable": false
        },
        // {
        //   mData: "jumlah",
        //   mRender: function(data, type, row) {
        //     return row.jumlah;
        //   },
        //   "orderable": false
        // },
        {
          mData: "",
          mRender: function(data, type, row) {

            return `<a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-three-dots-vertical"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li><a class="dropdown-item" href="{{ route('anak-ranting-add') }}?anakranting=${row.id}">
                    <i class="bi bi-pencil-square"></i>
                    Edit
                  </a>
              </li>
              <li><a class="dropdown-item text-danger" href="{{ route('anak-ranting-delete') }}?anakranting=${row.id}">
                    <i class="bi bi-trash"></i>
                    Hapus
                  </a>
              </li>
            </ul>`;
          },
          "orderable": false
        },
      ],
      "tabIndex": 1,
      "drawCallback": function(settings) {
        // $('[data-toggle="tooltip"]').tooltip({ trigger:"hover" });
      }
    });
  }
</script>
@endsection
