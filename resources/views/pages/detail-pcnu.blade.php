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
      <li class="breadcrumb-item"><a href="pcnu">PCNU</a></li>
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


        <li><a class="dropdown-item" href="{{ route('pcnu-update',['id_pc' => setRoute($pc_data->id)]) }}"><i class="bi bi-pencil-square"></i>Edit</a></li>

      </ul>
    </div>
    <div class="card-header">Detail PCNU</div>
    <div class="card-body">
      <h5 class="card-title">Informasi Umum</h5>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Nama :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $pc_data->nama ?? "" }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Alamat :</dt>
        </div>
        <div class="col-lg-9">
          <dd>
            {{ $pc_data->alamat ?? "" }}
          </dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Telepon :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $pc_data->telp ?? ""}}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Email :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $pc_data->email ?? "" }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Website :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $pc_data->website ?? "" }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Kota/Kab :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $kota->nama ?? ""}}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Latitude :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{$pc_data->lat ?? ""}}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Longitude :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $pc_data->long ?? "" }}</dd>
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
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100" id="banom-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-mwc" type="button" role="tab" aria-controls="banom" aria-selected="false">
            MWC
          </button>
        </li>
      </ul>
      <div class="tab-content pt-2" id="borderedTabJustifiedContent">
        @include('layout.tabs.pengurus_tab')
        @include('layout.tabs.kepengurusan_tab')
        @include('layout.tabs.lembaga_tab',['pcnu_data' => $pc_data])
        @include('layout.tabs.banom_tab')
        @include('layout.tabs.mwcnu_tab')
      </div>
    </div>
  </div>
</div>
@endsection
@section('js-page')
<script>
  $(document).ready(function() {
    mwcTable();
    lembagaTable();
    BanomTable();
    SkTable();
  })

  const mwcTable = () => {
    $("#mwcTable").DataTable({
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
        "url": "{{ route('mwc-list-bypcnu') }}",
        "type": "GET",
        "data": function(d) {
          d.pc = "{{ $pc_data->id }}";
        }
      },
      "columns": [{
          mData: "nama",
          mRender: function(data, type, row) {
            return `<th scope="row"><a href="{{ route('mwcnu') }}?mwc=${row.id}">${row.nama}</a></th>`;
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
        {
          mData: "jumlah",
          mRender: function(data, type, row) {
            return row.jumlah;
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
              <li><a class="dropdown-item" href="{{ route('mwcnu-add') }}?mwc=${row.id}">
                    <i class="bi bi-pencil-square"></i>
                    Edit
                  </a>
              </li>
              <li><a class="dropdown-item text-danger" href="{{ route('mwcnu-delete') }}?mwc=${row.id}">
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
          d.pc = "{{ $pc_data->id }}";
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
          d.pc = "{{ $pc_data->id }}";
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
          d.pc = "{{ $pc_data->id }}";
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
