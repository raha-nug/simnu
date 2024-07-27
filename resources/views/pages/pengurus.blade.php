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
                <div class="row">
                    <div class="col-md-3 mt-2">
                        <label for="kota" class="form-label">Filter PWNU</label>
                        <select class="form-select" id="pwnu_select" name="pwnu" required>
                          <option></option>
                          @foreach($pwnu as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mt-2">
                        <label for="kota" class="form-label">Filter PCNU</label>
                        <select class="form-select" id="pcnu_select" name="pcnu" required>
                          <option></option>
                          @foreach($pcnu as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mt-2">
                        <label for="kota" class="form-label">Filter MWCNU</label>
                        <select class="form-select" id="mwcnu_select" name="mwcnu" required>
                          <option></option>
                          @foreach($mwcnu as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mt-2">
                        <label for="kota" class="form-label">Filter Ranting</label>
                        <select class="form-select" id="ranting_select" name="ranting" required>
                          <option></option>
                          @foreach($ranting as $item)
                            <option value="{{ $item->id ?? "" }}">{{ $item->nama ?? "" }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-start me-3 mt-3 btn-sm">
                        <a class="btn btn-primary" href="" id="resetFilter">
                            Reset Filter
                        </a>
                    </div>
                </div>
                <div class="table-responsive ">
                    <table class="table table-borderless table-hover" id="pengurus-table">
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
                        {{-- @foreach ($anggota as $item)
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
                        @endforeach --}}
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-page')
<script>
    $(document).ready(function() {
        $("#pwnu_select").select2({
            placeholder: "Pilih PWNU"
        });
        $('.select2-container').addClass('form-select');
        $('.select2-selection').addClass('custom-selection');
        $('.select2-search__field').addClass('select2-custom-search_field');
        $('.select2-selection__arrow').addClass('d-none');

        $("#pcnu_select").select2({
            placeholder: "Pilih PCNU"
        });
        $('.select2-container').addClass('form-select');
        $('.select2-selection').addClass('custom-selection');
        $('.select2-search__field').addClass('select2-custom-search_field');
        $('.select2-selection__arrow').addClass('d-none');

        $("#mwcnu_select").select2({
            placeholder: "Pilih MWCNU"
        });
        $('.select2-container').addClass('form-select');
        $('.select2-selection').addClass('custom-selection');
        $('.select2-search__field').addClass('select2-custom-search_field');
        $('.select2-selection__arrow').addClass('d-none');

        $("#ranting_select").select2({
            placeholder: "Pilih Ranting"
        });
        $('.select2-container').addClass('form-select');
        $('.select2-selection').addClass('custom-selection');
        $('.select2-search__field').addClass('select2-custom-search_field');
        $('.select2-selection__arrow').addClass('d-none');

        var table = $('#pengurus-table').DataTable({
            responsive:!0,
            language:{
                paginate:{
                    previous:"<i class='ri-arrow-left-s-line'>",
                    next:"<i class='ri-arrow-right-s-line'>"
                }
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('pengurus') }}',
                data: function(d) {
                    d.pcnu_id = $('#pcnu_select').val()
                    d.mwcnu_id = $('#mwcnu_select').val()
                    d.pwnu_id = $('#pwnu_select').val()
                }
            },
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
                        mData: "no_telp",
                        mRender: function(data, type, row) {
                            return `${row.no_telp ?? ''}`;
                        }
                    },
                    {
                        className: "my-column",
                        mData: "email",
                        mRender: function(data, type, row) {
                            return `${row.email ?? ''}`;

                        }
                    },
                    {
                        className: "my-column",
                        mData: "alamat",
                        mRender: function(data, type, row) {
                            return `${row.alamat ?? ''}`;

                        }
                    },
                    {
                        className: "my-column",
                        mData: "alamat",
                        mRender: function(data, type, row) {
                            return `
                                <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul
                                class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                <li><a class="dropdown-item" id="edit" data-syarat=${row.id} href="{{route('detail_pengurus')}}?pengurus=${row.id}">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                    </a>
                                </li>
                                <li><a class="dropdown-item text-danger" href="{{route('delete')}}?id_anggota=${row.id}">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                    </a>
                                </li>
                                </ul>
                            `;

                        }
                    },
            ],
            drawCallback:function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            }
        });

        $('#pwnu_select').change(function() {
            $('#pcnu_select, #mwcnu_select').val('');
            table.ajax.reload();
        });
        $('#pcnu_select').change(function() {
            $('#mwcnu_select, #pwnu_select').val('');
            table.ajax.reload();
        });
        $('#mwcnu_select').change(function() {
            $('#pcnu_select, #pwnu_select').val('');
            table.ajax.reload();
        });

        $('#resetFilter').click(function() {
            $('#pcnu_select, #mwcnu_select').val('');
            table.ajax.reload();
        });

    })
</script>
@endsection
