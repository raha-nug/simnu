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
<x-form :$method :$action>
  @csrf
  <x-slot:title>
    Tambah Lembaga
  </x-slot:title>
  @if(!isset($lembaga_data))
    <div class="col-md-12">
      <label for="no-sk" class="form-label">Nama Lembaga</label>
      <input type="hidden" name="nama" id="nama_lembaga">
      <select class="form-select" id="lembaga" name="master_id" required>
        <option></option>
        @foreach($master_data as $item)
        <option value="{{ $item->id }}" data-nama="{{ $item->nama_lembaga }}">{{ $item->nama_lembaga }}</option>
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
      <input type="text" class="form-control" value="{{ $mwcnu_data->nama }}" id="wilKerja" readonly>
      <input type="hidden" name="id_mwcnu" value="{{ $mwcnu_data->id }}">
    </div>
    @endisset
  @else
    <div class="col-md-12">
      <label for="no-sk" class="form-label">Nama Lembaga</label>
      <input type="hidden" name="nama" id="nama_lembaga" value="{{ $lembaga_data->nama }}">
      <input type="hidden" name="id" value="{{ $lembaga_data->id }}">
      <input type="hidden" name="master_id" value="{{ $lembaga_data->master_id }}">
      <select class="form-select" id="lembaga" required>
        <option></option>
        @foreach($master_data as $item)
          @if ($item->id == $lembaga_data->master_id)
            <option value="{{ $item->id }}" data-nama="{{ $item->nama_lembaga }}" selected>{{ $item->nama_lembaga }}</option>
          @else
            <option value="{{ $item->id }}" data-nama="{{ $item->nama_lembaga }}">{{ $item->nama_lembaga }}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="col-md-12">
      <label for="wil_kerja">Wilayah kerja</label>
      <input type="text" class="form-control" value="{{ $lembaga_data->nama_wilayah_kerja }}" id="wilKerja" readonly>
      @if($lembaga_data->wilayah_kerja == 'pwnu')
        <input type="hidden" name="id_pwnu" value="{{ $lembaga_data->id_wilayah_kerja }}">
      @elseif($lembaga_data->wilayah_kerja == 'pcnu')
        <input type="hidden" name="id_pcnu" value="{{ $lembaga_data->id_wilayah_kerja }}">
      @elseif($lembaga_data->wilayah_kerja == 'mwcnu')
        <input type="hidden" name="id_mwcnu" value="{{ $lembaga_data->id_wilayah_kerja }}">
      @endif
    </div>
  @endif
</x-form>
@endsection
@section('js-page')
<script>
  $(document).ready(function() {
    $("#lembaga").select2({
      placeholder: "Pilih Lembaga"
    });
    $('.select2-container').addClass('form-select');
    $('.select2-selection').addClass('custom-selection');
    $('.select2-search__field').addClass('select2-custom-search_field');
    $('.select2-selection__arrow').addClass('d-none');
  })

  $("#lembaga").change(function() {
    var nama = $(this).children(":selected").attr('data-nama') + " " + $("#wilKerja").val();
    $("#nama_lembaga").val(nama);
  })
</script>
@endsection