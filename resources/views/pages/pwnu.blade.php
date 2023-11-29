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
    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-three-dots"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">


        <li><a class="dropdown-item" href="{{route('pwnu-add')}}?id={{setRoute($pw_detail->id)}}"><i class="bi bi-pencil-square"></i>Edit</a></li>

      </ul>
    </div>
    <div class="card-header">PWNU Jawa Barat</div>
    <div class="card-body">
      <h5 class="card-title">Informasi Umum</h5>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Nama :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{$pw_detail->nama ?? 'PWNU Jawa Barat'}}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Alamat :</dt>
        </div>
        <div class="col-lg-9">
          <dd>
            {{ $pw_detail->alamat ?? 'Jl. Terusan Galunggung No. 9 Kel. Lingkar Selatan Kec. Lengkong Kota Bandung 40263'}}
          </dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Telepon :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $pw_detail->telp ?? '0227315915' }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Email :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $pw_detail->email ?? 'admin@nujabar.or.id' }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Website :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $pw_detail->website ?? 'https://jabar.nu.or.id' }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Lattitude :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{$pw_detail->lat ?? '-'}}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Longitude :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{$pw_detail->long ?? '-'}}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Provinsi :</dt>
        </div>
        <div class="col-lg-9">
          <dd>Jawa Barat</dd>
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
          <button class="nav-link w-100" id="lembaga-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-lembaga" type="button" role="tab" aria-controls="lembaga" aria-selected="false">
            Lembaga
          </button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100" id="banom-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-banom" type="button" role="tab" aria-controls="banom" aria-selected="false">
            Banom
          </button>
        </li>
      </ul>
      <div class="tab-content pt-2" id="borderedTabJustifiedContent">
        @include('layout.tabs.pengurus_tab')
        @include('layout.tabs.kepengurusan_tab')
        @include('layout.tabs.lembaga_tab',['pwnu_data' => $pw_detail])
        @include('layout.tabs.banom_tab')
      </div>
    </div>
  </div>
</div>

@endsection
@section('js-page')
<script>
  $(document).ready(function() {
    lembagaTable();
    BanomTable();
    SkTable();
  })

  const lembagaTable = () => {
    $("#lembagaTable").DataTable({
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
        "url": "{{ route('lembaga-list') }}",
        "type": "GET",
        "data": function(d) {
          d.pw = "{{ $pw_detail->id }}";
        }
      },
      "columns": [{
          mData: "no",
          mRender: function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          },
          "orderable": false
        },
        {
          mData: "nama",
          mRender: function(data, type, row) {
            return `<th scope="row"><a href="{{ route('lembaga') }}?lembaga=${row.id}">${row.nama}</a></th>`;
          },
          "orderable": false
        },
        {
          mData: "",
          mRender: function(data, type, row) {

            return `<a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-three-dots-vertical"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li><a class="dropdown-item" href="{{ route('lembaga-add') }}?lembaga=${row.id}">
                    <i class="bi bi-pencil-square"></i>
                    Edit
                  </a>
              </li>
              <li><a class="dropdown-item text-danger" href="{{ route('lembaga-delete') }}?lembaga=${row.id}">
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

  const BanomTable = () => {
    $("#BanomTable").DataTable({
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
        "url": "{{ route('Banom-list') }}",
        "type": "GET",
        "data": function(d) {
          d.pw = "{{ $pw_detail->id }}";
        }
      },
      "columns": [{
          mData: "no",
          mRender: function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          },
          "orderable": false
        },
        {
          mData: "nama",
          mRender: function(data, type, row) {
            return `<th scope="row"><a href="{{ route('Banom') }}?banom=${row.id}">${row.nama}</a></th>`;
          },
          "orderable": false
        },
        {
          mData: "",
          mRender: function(data, type, row) {

            return `<a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-three-dots-vertical"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li><a class="dropdown-item" href="{{ route('Banom-add') }}?Banom=${row.id}">
                    <i class="bi bi-pencil-square"></i>
                    Edit
                  </a>
              </li>
              <li><a class="dropdown-item text-danger" href="{{ route('Banom-delete') }}?banom=${row.id}">
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
  const SkTable = () => {
    $("#SkTable").DataTable({
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
        "url": "{{ route('Sk-list') }}",
        "type": "GET",
        "data": function(d) {
          d.pw = "{{ $pw_detail->id }}";
        }
      },
      "columns": [{
          mData: "no",
          mRender: function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          },
          "orderable": false
        },
        {
          mData: "no_dokumen",
          mRender: function(data, type, row) {
            return `<th scope="row"><a href="{{ route('sk_detail') }}?sk=${row.id}">${row.no_dokumen}</a></th>`;
          },
          "orderable": false
        },
        {
          mData: "masa_jabatan",
          mRender: function(data, type, row) {
            return row.tanggal_mulai + ' - ' + row.tanggal_berakhir;
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
