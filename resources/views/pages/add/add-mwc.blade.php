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
      <li class="breadcrumb-item"><a href="/admin">MWC</a></li>
      <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
  </nav>
</div>
@endsection

@section('content')
<x-form :$action :$method>
  @csrf
  <x-slot:title>
    Tambah MWC
  </x-slot:title>
  @if(isset($mwc_data))
    <div class="col-md-12 mt-2">
      <label for="kabkot" class="form-label">Kecamatan</label>
      <input type="hidden" name="kota" value="{{ $mwc_data->kota }}">
      <input type="hidden" name="kecamatan" value="{{ $mwc_data->kecamatan }}">
      <select class="form-select" id="kecamatan" disabled>
        <option></option>
        @foreach($kecamatan as $item)
          @if($item->kode == $mwc_data->kecamatan)
            <option value="{{ $item->kode }}" selected >{{ $item->nama }}</option>
          @else
            <option value="{{ $item->kode }}">{{ $item->nama }}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="col-md-12 mt-2">
      <label for="no-sk" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="{{ $mwc_data->nama }}" readonly>
      <input type="hidden" name="id" value="{{ $mwc_data->id }}">
      <input type="hidden" name="id_pcnu" value="{{ $mwc_data->id_pcnu }}">
    </div>
    <div class="col-md-12 mt-2">
      <label for="tgl-mulai" class="form-label">Alamat</label>
      <input type="text" class="form-control" name="alamat" value="{{ $mwc_data->alamat  ?? '' }}" required>
    </div>
    <div class="col-md-12 mt-2">
      <label for="telepon" class="form-label">Telepon</label>
      <input type="text" class="form-control" name="telp" value="{{ $mwc_data->telp  ?? '' }}">
    </div>
    <div class="col-md-6 mt-2">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="{{ $mwc_data->email ?? ''}}">
    </div>
    <div class="col-md-12 mt-2">
      <label for="website" class="form-label">Website</label>
      <input type="text" class="form-control" name="website" value="{{ $mwc_data->website ?? ''}}">
    </div>

    <div class="col-md-6 mt-2">
      <label for="latitude" class="form-label">Latitude</label>
      <input type="text" class="form-control" name="lat" value="{{ $mwc_data->lat ?? '' }}">
    </div>
    <div class="col-md-6 mt-2">
      <label for="longitude" class="form-label">Longitude</label>
      <input type="text" class="form-control" name="long" value="{{ $mwc_data->long ?? '' }}">
    </div>
    <div class="col-md-6 mt-2">
        <label for="profileImage" class="form-label">Foto Pengurus</label>
        <div class="col-md-8 col-lg-12">
          <div class="pt-2">
            <input type="file" class="btn btn-primary btn-sm" name="foto_pengurus" title="Upload new profile image">
            {{-- <a href="#" class="btn btn-danger btn-sm" title="Remove profile image"><i class="bi bi-trash"></i></a> --}}
          </div>
        </div>
      </div>
  @else
    <div class="col-md-12 mt-2">
      <label for="kabkot" class="form-label">Kecamatan</label>
      <input type="hidden" name="kota" value="{{ $pc_data->kota }}">
      <select class="form-select" id="kecamatan" name="kecamatan" >
        <option></option>
        @foreach($kecamatan as $item)
            <option value="{{ $item->kode }}">{{ $item->nama }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-12 mt-2">
      <label for="no-sk" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" readonly>
      <input type="hidden" name="id_pcnu" value="{{ $pc_data->id }}">
    </div>
    <div class="col-md-12 mt-2">
      <label for="tgl-mulai" class="form-label">Alamat</label>
      <input type="text" class="form-control" name="alamat" required>
    </div>
    <div class="col-md-12 mt-2">
      <label for="telepon" class="form-label">Telepon</label>
      <input type="text" class="form-control" name="telp">
    </div>
    <div class="col-md-12 mt-2">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="col-md-12 mt-2">
      <label for="website" class="form-label">Website</label>
      <input type="text" class="form-control" name="website">
    </div>

    <div class="col-md-6 mt-2">
      <label for="latitude" class="form-label">Latitude</label>
      <input type="text" class="form-control" name="lat">
    </div>
    <div class="col-md-6 mt-2">
      <label for="longitude" class="form-label">Longitude</label>
      <input type="text" class="form-control" name="long">
    </div>
    <div class="col-md-6 mt-2">
        <label for="profileImage" class="form-label">Foto Pengurus</label>
        <div class="col-md-8 col-lg-12">
          <div class="pt-2">
            <input type="file" class="btn btn-primary btn-sm" name="foto_pengurus" title="Upload new profile image">
            {{-- <a href="#" class="btn btn-danger btn-sm" title="Remove profile image"><i class="bi bi-trash"></i></a> --}}
          </div>
        </div>
      </div>
  @endif
  </x-form>
@endsection
@section('js-page')
<script>
  $(document).ready(function () {
    $("#kecamatan").select2({
      placeholder: "Pilih kecamatan"
    });
    $('.select2-container').addClass('form-select');
    $('.select2-selection').addClass('custom-selection');
    $('.select2-search__field').addClass('select2-custom-search_field');
    $('.select2-selection__arrow').addClass('d-none');
  })

  $("#kecamatan").change(function () {
    $.get("/wilayah?kode="+$(this).val(),function (o) {
        $("#nama").val("MWCNU "+o.data.nama);
    })
  })
</script>
@endsection
