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
      <li class="breadcrumb-item"><a href="/admin/ranting">Ranting</a></li>
      <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
  </nav>
</div>
@endsection

@section('content')
<x-form :$action :$method>
  @csrf
  <x-slot:title>
    Tambah Ranting
  </x-slot:title>
  @if(isset($ranting_data))
    <div class="col-md-12 mt-2">
      <label for="kabkot" class="form-label">Desa</label>
      <input type="hidden" name="kota" value="{{ $ranting_data->kota }}">
      <input type="hidden" name="kecamatan" value="{{ $ranting_data->kecamatan }}">
      <input type="hidden" name="desa" value="{{ $ranting_data->desa }}">
      <select class="form-select" id="kecamatan" disabled>
        <option></option>
        @foreach($desa as $item)
          @if($item->kode == $ranting_data->desa)
            <option value="{{ $item->kode }}" selected >{{ $item->nama }}</option>
          @else 
            <option value="{{ $item->kode }}">{{ $item->nama }}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="col-md-12 mt-2">
      <label for="no-sk" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="{{ $ranting_data->nama }}" readonly>
      <input type="hidden" name="id" value="{{ $ranting_data->id }}">
      <input type="hidden" name="id_mwcnu" value="{{ $ranting_data->id_mwcnu }}">
    </div>
    <div class="col-md-12 mt-2">
      <label for="tgl-mulai" class="form-label">Alamat</label>
      <input type="text" class="form-control" name="alamat" value="{{ $ranting_data->alamat  ?? '' }}" required>
    </div>
    <div class="col-md-12 mt-2">
      <label for="telepon" class="form-label">Telepon</label>
      <input type="text" class="form-control" name="telp" value="{{ $ranting_data->telp  ?? '' }}">
    </div>
    {{-- <div class="col-md-6 mt-2">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="{{ $ranting_data->email ?? ''}}">
    </div>
    <div class="col-md-12 mt-2">
      <label for="website" class="form-label">Website</label>
      <input type="text" class="form-control" name="website" value="{{ $ranting_data->website ?? ''}}">
    </div> --}}

    {{-- <div class="col-md-6 mt-2">
      <label for="latitude" class="form-label">Latitude</label>
      <input type="text" class="form-control" name="lat" value="{{ $ranting_data->lat ?? '' }}">
    </div>
    <div class="col-md-6 mt-2">
      <label for="longitude" class="form-label">Longitude</label>
      <input type="text" class="form-control" name="long" value="{{ $ranting_data->long ?? '' }}">
    </div> --}}
  @else
    <div class="col-md-12 mt-2">
      <label for="kabkot" class="form-label">Desa</label>
      <input type="hidden" name="kota" value="{{ $mwc_data->kota }}">
      <input type="hidden" name="kecamatan" value="{{ $mwc_data->kecamatan }}">
      <select class="form-select" id="desa" name="desa" >
        <option></option>
        @foreach($desa as $item)
            <option value="{{ $item->kode }}">{{ $item->nama }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-12 mt-2">
      <label for="no-sk" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" readonly>
      <input type="hidden" name="id_mwcnu" value="{{ $mwc_data->id }}">
    </div>
    <div class="col-md-12 mt-2">
      <label for="tgl-mulai" class="form-label">Alamat</label>
      <input type="text" class="form-control" name="alamat" required>
    </div>
    <div class="col-md-12 mt-2">
      <label for="telepon" class="form-label">Telepon</label>
      <input type="text" class="form-control" name="telp">
    </div>
    {{-- <div class="col-md-12 mt-2">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="col-md-12 mt-2">
      <label for="website" class="form-label">Website</label>
      <input type="text" class="form-control" name="website">
    </div> --}}

    {{-- <div class="col-md-6 mt-2">
      <label for="latitude" class="form-label">Latitude</label>
      <input type="text" class="form-control" name="lat">
    </div>
    <div class="col-md-6 mt-2">
      <label for="longitude" class="form-label">Longitude</label>
      <input type="text" class="form-control" name="long">
    </div> --}}
  @endif
  </x-form>
@endsection
@section('js-page')
<script>
  $(document).ready(function () {
    $("#desa").select2({
      placeholder: "Pilih Desa"
    });
    $('.select2-container').addClass('form-select');
    $('.select2-selection').addClass('custom-selection');
    $('.select2-search__field').addClass('select2-custom-search_field');
    $('.select2-selection__arrow').addClass('d-none');
  })

  $("#desa").change(function () {
    $.get("/wilayah?kode="+$(this).val(),function (o) {
        $("#nama").val("Ranting Desa "+o.data.nama);
    })
  })
</script>
@endsection