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
          <li><a class="dropdown-item" href="{{route('add_sk')}}?sk={{setRoute($sk->id)}}"><i class="bi bi-pencil-square"></i>Edit SK</a></li>
          @if($sk->id_lembaga)
          <li><a class="dropdown-item" href="{{route('add_pengurus')}}?id_sk={{setRoute($sk->id)}}&type=lembaga"><i class="bi bi-person-lines-fill"></i>Edit Pengurus</a></li>
          @elseif ($sk->id_banom)
          <li><a class="dropdown-item" href="{{route('add_pengurus')}}?id_sk={{setRoute($sk->id)}}&type=banom"><i class="bi bi-person-lines-fill"></i>Edit Pengurus</a></li>
          @elseif ($sk->id_ranting)
          <li><a class="dropdown-item" href="{{route('add_pengurus')}}?id_sk={{setRoute($sk->id)}}&type=ranting"><i class="bi bi-person-lines-fill"></i>Edit Pengurus</a></li>
          @elseif ($sk->id_anak_ranting)
          <li><a class="dropdown-item" href="{{route('add_pengurus')}}?id_sk={{setRoute($sk->id)}}&type=anak_ranting"><i class="bi bi-person-lines-fill"></i>Edit Pengurus</a></li>
          @else
          <li><a class="dropdown-item" href="{{route('add_pengurus')}}?id_sk={{setRoute($sk->id)}}"><i class="bi bi-person-lines-fill"></i>Edit Pengurus</a></li>
        @endif
      </ul>
    </div>
    <div class="card-header">Detail SK</div>
    <div class="card-body">
      <h5 class="card-title">Informasi Umum</h5>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Nomor Dokumen :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{$sk->no_dokumen}}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Tanggal Mulai :</dt>
        </div>
        <div class="col-lg-9">
          <dd>
            {{$sk->tanggal_mulai}}
          </dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Tanggal Berakhir :</dt>
        </div>
        <div class="col-lg-9">
          <dd>{{$sk->tanggal_berakhir}}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">File :</dt>
        </div>
        <div class="col-lg-9">
          <dd><a href="{{route('download_sk', ['file_name' => $sk->file_sk])}}">Download</a></dd>
        </div>
      </div>

      <div class="border-bottom my-5"></div>
      <div class="table-responsive">
        <table class="table table-borderless table-hover" id="pengurusTable">
          <thead>
            <tr>
              {{-- <th scope="col">No</th> --}}
              <th scope="col">Nama</th>
              <th scope="col">Pengurus</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Periode</th>
            </tr>
          </thead>
          <tbody>
            {{-- @foreach ($pengurus as $value)
            <tr>
                <th scope="row"><a href="{{ route('detail_pengurus') }}?pengurus={{ setRoute($value->id) }}">{{ $value->nama }}</a></th>
                <td>{{$value->jenis_pengurus}}</td>
                <td>{{$value->jabatan}}</td>
                <td>{{$value->mulai_jabatan}} - {{$value->akhir_jabatan}}</td>
            </tr>
            @endforeach --}}
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

@endsection()
@section('js-page')
<script>
    $(document).ready(function() {
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
            ajax: "{{ url('/') }}/sk/detail?sk={{setRoute($sk->id)}}",
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
    })
</script>
@endsection
