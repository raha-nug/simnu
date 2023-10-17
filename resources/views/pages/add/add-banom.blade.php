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
      <li class="breadcrumb-item"><a href="/admin">PWNU</a></li>
      <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
  </nav>
</div>
@endsection

@section('content')
<x-form :$method :$action>
    @csrf
  <x-slot:title>
    Tambah Banom
  </x-slot:title>
  @if(!isset($banom_data))
    <div class="col-md-12 mt-2">
      <label for="nama-banom" class="form-label">Nama Banom</label>
      <input type="hidden" name="nama" id="nama_banom">
      <select class="select2 form-select" id="banom">
        <option></option>
        @foreach ($master_banom as $value)
            <option value="{{$value->nama_banom}}" data-nama="{{ $value->nama_banom }}">{{$value->nama_banom}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-12 mt-2">
        <label for="banom-base" class="form-label">Banom Base</label>
        <select class="form-select" id="banom-base" required>
          <option selected disabled value="">--pilih banom base--</option>
          @foreach ($master_banom_basis as $value)
          <option value="{{$value->id}}">{{$value->nama_banom_basis}}</option>
          @endforeach
        </select>
      </div>
    @isset($pwnu_data)
    <div class="col-md-12">
        <label for="wil_kerja">Wilayah kerja</label>
        <input type="text" class="form-control" value="{{ $pwnu_data->nama }}" id="wilKerja" readonly>
        <input type="hidden" name="id_pwnu" value="{{ $pwnu_data->id }}">
    </div>
    @endisset
    @isset($pcnu_data)
    <div class="col-md-12">
        <label for="wil_kerja">Wilayah kerja</label>
        <input type="text" class="form-control" value="{{ $pcnu_data->nama }}" id="wilKerja" readonly>
        <input type="hidden" name="id_pcnu" value="{{ $pcnu_data->id }}">
    </div>
    @endisset
    @isset($mwcnu_data)
    <div class="col-md-12">
        <label for="wil_kerja">Wilayah kerja</label>
        <input type="text" class="form-control" value="{{ $pcnu_data->nama }}" id="wilKerja" readonly>
        <input type="hidden" name="id_mwcnu" value="{{ $mwcnu_data->id }}">
    </div>
    @endisset
    @endif
</x-form>
@endsection
@section('js-page')
<script>
  $(document).ready(function() {
    $("#banom").select2({
      placeholder: "Pilih Banom"
    });
    $('.select2-container').addClass('form-select');
    $('.select2-selection').addClass('custom-selection');
    $('.select2-search__field').addClass('select2-custom-search_field');
    $('.select2-selection__arrow').addClass('d-none');
  })

  $(document).ready(function() {
    $("#banom-base").select2({
      placeholder: "Pilih Banom"
    });
    $('.select2-container').addClass('form-select');
    $('.select2-selection').addClass('custom-selection');
    $('.select2-search__field').addClass('select2-custom-search_field');
    $('.select2-selection__arrow').addClass('d-none');
  })

  $("#banom").change(function() {
    let nama = $(this).children(":selected").attr('data-nama')  + " " + $("#wilKerja").val();
        console.log(nama);
        $("#nama_banom").val(nama);
  });
</script>
@endsection
