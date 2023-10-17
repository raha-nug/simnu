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
<x-form :$action :$method>
  @csrf
  <x-slot:title>
    Tambah PCNU
  </x-slot:title>
  @if(isset($pc_data))
    <div class="col-md-12 mt-2">
    <label for="kota" class="form-label">Kota/Kab</label>
    <input type="hidden" name="kota" value="{{ $pc_data->kota }}">
    <select class="form-select" id="kabkot" required disabled>
      <option></option>
      @foreach($kab_kota as $item)
      @if($item->kode == $pc_data->kota)
      <option value="{{ $item->kode }}" selected>{{ $item->nama }}</option>
      @else
      <option value="{{ $item->kode }}">{{ $item->nama }}</option>
      @endif
      @endforeach
    </select>
  </div>
  <div class="col-md-12 mt-2">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" value="{{ $pc_data->nama }}" required readonly>
    <input type="hidden" name="id" value="{{ $pc_data->id }}">
  </div>
  <div class="col-md-12 mt-2">
    <label for="tgl-mulai" class="form-label">Alamat</label>
    <input type="text" class="form-control" name="alamat" value="{{ $pc_data->alamat }}" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="telepon" class="form-label">Telepon</label>
    <input type="text" class="form-control" name="telp" value="{{ $pc_data->telp ?? '' }}">
  </div>
  <div class="col-md-6 mt-2">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ $pc_data->email }}" required>
  </div>
  <div class="col-md-12 mt-2">
    <label for="website" class="form-label">Website</label>
    <input type="text" class="form-control" name="website" value="{{ $pc_data->website ?? '' }}">
  </div>

  <div class="col-md-6 mt-2">
    <label for="latitude" class="form-label">Latitude</label>
    <input type="text" class="form-control" name="lat" value="{{ $pc_data->lat ?? '' }}">
  </div>
  <div class="col-md-6 mt-2">
    <label for="longitude" class="form-label">Longitude</label>
    <input type="text" class="form-control" name="long" value="{{ $pc_data->long ?? ''}}">
  </div>
  @else
    <div class="col-md-12 mt-2">
    <label for="kota" class="form-label">Kota/Kab</label>
    <select class="form-select" id="kabkot" name="kota" required>
      <option></option>
      @foreach($kab_kota as $item)
      <option value="{{ $item->kode }}">{{ $item->nama }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-md-12 mt-2">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" required readonly>
  </div>
  <div class="col-md-12 mt-2">
    <label for="tgl-mulai" class="form-label">Alamat</label>
    <input type="text" class="form-control" name="alamat" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="telepon" class="form-label">Telepon</label>
    <input type="text" class="form-control" name="telp">
  </div>
  <div class="col-md-6 mt-2">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
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
  @endif
</x-form>

@endsection
@section('js-page')
<script>
  $(document).ready(function() {
    $("#kabkot").select2({
      placeholder: "Pilih kab/kota"
    });
    $('.select2-container').addClass('form-select');
    $('.select2-selection').addClass('custom-selection');
    $('.select2-search__field').addClass('select2-custom-search_field');
    $('.select2-selection__arrow').addClass('d-none');
  })

  $("#kabkot").change(function() {
    $.get("/wilayah?kode=" + $(this).val(), function(o) {
      $("#nama").val("PCNU " + o.data.nama);
    })
  })
</script>
@endsection