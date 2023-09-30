@extends('layout.master')


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
    @include('sweetalert::alert')
<x-form :$method :$action>
    @csrf
  <x-slot:title>
    Tambah User Group
  </x-slot:title>
  @if (isset($user_group))
    <div class="col-md-6">
        <label for="namaUG" class="form-label">Nama User Group</label>
        <input type="text" class="form-control" id="namaUG" name="nama_grup" value="{{$user_group->nama_grup}}" required>
        <input type="hidden" name="id" value="{{ $user_group->id }}">
    </div>
    <div class="col-md-6">
        <label for="status" class="form-label">Role</label>
        <select class="form-select" id="status" name="role" required>
            <option selected disabled value="">--pilih role--</option>
            <option value="PWNU">PWNU</option>
            <option value="PCNU">PCNU</option>
            <option value="MWCNU">MWC</option>
        </select>
    </div>
    <div class="col-md-12">
    <label for="kota" class="form-label">Kota/Kab</label>
    <select class="form-select" id="kabkot" name="kota" required disabled>
        <option></option>
        @foreach($kab_kota as $item)
            @if($item->kode == $user_group->kota)
                <option value="{{ $item->kode }}" selected>{{ $item->nama }}</option>
            @else
                <option value="{{ $item->kode }}">{{ $item->nama }}</option>
            @endif
        @endforeach
    </select>
    </div>
    <div class="col-md-12">
        <label for="ket" class="form-label">Keterangan User Group</label>
        <textarea name="ket" class="form-control" id="ket"  style="height: 100px"></textarea>
    </div>
  @else
    <div class="col-md-6">
        <label for="namaUG" class="form-label">Nama User Group</label>
        <input type="text" class="form-control" id="namaUG" name="nama_grup" required>
   </div>
   <div class="col-md-6">
        <label for="status" class="form-label">Role</label>
        <select class="form-select" id="status" name="role" required>
            <option selected disabled value="">--pilih role--</option>
            <option value="PWNU">PWNU</option>
            <option value="PCNU">PCNU</option>
            <option value="MWCNU">MWC</option>
        </select>
   </div>
   <div class="col-md-12">
    <label for="kota" class="form-label">Kota/Kab</label>
      <select class="form-select" id="kabkot" name="kota" required>
        <option></option>
        @foreach($kab_kota as $item)
          <option value="{{ $item->kode }}">{{ $item->nama }}</option>
        @endforeach
      </select>
  </div>
   <div class="col-md-12">
        <label for="ket" class="form-label">Keterangan User Group</label>
        <textarea name="ket" class="form-control" id="ket"  style="height: 100px"></textarea>
   </div>
   <div class="row mt-5">
        <legend class="col-form-label col-sm-2 pt-0">Hak Akses</legend>
        <div class="col-sm-10">
          <div class="row">
            <div class="col-md-12">
              <div class="form-check mb-3">
                <input class="form-check-input" name="user" type="checkbox" id="gridCheck1">
                <label class="form-check-label fw-semibold" for="gridCheck1">
                Kelola User
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="user" type="checkbox" id="gridCheck2">
                <label class="form-check-label" for="gridCheck2">
                Lihat Daftar
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="user" type="checkbox" id="gridCheck3">
                <label class="form-check-label" for="gridCheck3">
                Lihat Detail
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="user" type="checkbox" id="gridCheck4">
                <label class="form-check-label" for="gridCheck4">
                Tambah Baru
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="user" type="checkbox" id="gridCheck5">
                <label class="form-check-label" for="gridCheck5">
                Edit
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="user" type="checkbox" id="gridCheck6">
                <label class="form-check-label" for="gridCheck6">
                Hapus
                </label>
              </div>
            </div>
          </div>



          <div class="row mt-5">
            <div class="col-md-12">
              <div class="form-check mb-3">
                <input class="form-check-input" name="userGroup" type="checkbox" id="gridCheck7">
                <label class="form-check-label fw-semibold" for="gridCheck7">
                Kelola User Group
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="userGroup" type="checkbox" id="gridCheck8">
                <label class="form-check-label" for="gridCheck8">
                Lihat Daftar
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="userGroup" type="checkbox" id="gridCheck9">
                <label class="form-check-label" for="gridCheck9">
                Lihat Detail
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="userGroup" type="checkbox" id="gridCheck10">
                <label class="form-check-label" for="gridCheck10">
                Tambah Baru
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="userGroup" type="checkbox" id="gridCheck11">
                <label class="form-check-label" for="gridCheck11">
                Edit
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="userGroup" type="checkbox" id="gridCheck12">
                <label class="form-check-label" for="gridCheck12">
                Hapus
                </label>
              </div>
            </div>
          </div>





          <div class="row mt-5">
            <div class="col-md-12">
              <div class="form-check mb-3">
                <input class="form-check-input" name="pengurus" type="checkbox" id="gridCheck13">
                <label class="form-check-label fw-semibold" for="gridCheck13">
                Kelola Pengurus
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="pengurus" type="checkbox" id="gridCheck14">
                <label class="form-check-label" for="gridCheck14">
                Lihat Daftar
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="pengurus" type="checkbox" id="gridCheck15">
                <label class="form-check-label" for="gridCheck15">
                Lihat Detail
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="pengurus" type="checkbox" id="gridCheck16">
                <label class="form-check-label" for="gridCheck16">
                Tambah Baru
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="pengurus" type="checkbox" id="gridCheck17">
                <label class="form-check-label" for="gridCheck17">
                Edit
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="pengurus" type="checkbox" id="gridCheck18">
                <label class="form-check-label" for="gridCheck18">
                Hapus
                </label>
              </div>
            </div>
          </div>





          <div class="row mt-5">
            <div class="col-md-12">
              <div class="form-check mb-3">
                <input class="form-check-input" name="jenisPengurus" type="checkbox" id="gridCheck19">
                <label class="form-check-label fw-semibold" for="gridCheck19">
                Kelola Jenis Pengurus
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="jenisPengurus" type="checkbox" id="gridCheck20">
                <label class="form-check-label" for="gridCheck20">
                Lihat Daftar
                </label>
              </div>
            </div>

            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="jenisPengurus" type="checkbox" id="gridCheck21">
                <label class="form-check-label" for="gridCheck21">
                Lihat Detail
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="jenisPengurus" type="checkbox" id="gridCheck22">
                <label class="form-check-label" for="gridCheck22">
                Tambah Baru
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="jenisPengurus" type="checkbox" id="gridCheck23">
                <label class="form-check-label" for="gridCheck23">
                Edit
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="jenisPengurus" type="checkbox" id="gridCheck24">
                <label class="form-check-label" for="gridCheck24">
                Hapus
                </label>
              </div>
            </div>
          </div>





          <div class="row mt-5">
            <div class="col-md-12">
              <div class="form-check mb-3">
                <input class="form-check-input" name="jabatan" type="checkbox" id="gridCheck25">
                <label class="form-check-label fw-semibold" for="gridCheck25">
                Kelola Jabatan
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="jabatan" type="checkbox" id="gridCheck26">
                <label class="form-check-label" for="gridCheck26">
                Lihat Daftar
                </label>
              </div>
            </div>

            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="jabatan" type="checkbox" id="gridCheck27">
                <label class="form-check-label" for="gridCheck27">
                Lihat Detail
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="jabatan" type="checkbox" id="gridCheck28">
                <label class="form-check-label" for="gridCheck28">
                Tambah Baru
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="jabatan" type="checkbox" id="gridCheck29">
                <label class="form-check-label" for="gridCheck29">
                Edit
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="jabatan" type="checkbox" id="gridCheck30">
                <label class="form-check-label" for="gridCheck30">
                Hapus
                </label>
              </div>
            </div>
          </div>




          <div class="row mt-5">
            <div class="col-md-12">
              <div class="form-check mb-3">
                <input class="form-check-input" name="pwnu" type="checkbox" id="gridCheck31">
                <label class="form-check-label fw-semibold" for="gridCheck31">
                Kelola PWNU
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="pwnu" type="checkbox" id="gridCheck32">
                <label class="form-check-label" for="gridCheck32">
                Lihat Daftar
                </label>
              </div>
            </div>

            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="pwnu" type="checkbox" id="gridCheck33">
                <label class="form-check-label" for="gridCheck33">
                Lihat Detail
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="pwnu" type="checkbox" id="gridCheck34">
                <label class="form-check-label" for="gridCheck34">
                Tambah Baru
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="pwnu" type="checkbox" id="gridCheck35">
                <label class="form-check-label" for="gridCheck35">
                Edit
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="pwnu" type="checkbox" id="gridCheck36">
                <label class="form-check-label" for="gridCheck36">
                Hapus
                </label>
              </div>
            </div>
          </div>





          <div class="row mt-5">
            <div class="col-md-12">
              <div class="form-check mb-3">
                <input class="form-check-input" name="pcnu" type="checkbox" id="gridCheck37">
                <label class="form-check-label fw-semibold" for="gridCheck37">
                Kelola PCNU
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="pcnu" type="checkbox" id="gridCheck38">
                <label class="form-check-label" for="gridCheck38">
                Lihat Daftar
                </label>
              </div>
            </div>

            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="pcnu" type="checkbox" id="gridCheck39">
                <label class="form-check-label" for="gridCheck39">
                Lihat Detail
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="pcnu" type="checkbox" id="gridCheck40">
                <label class="form-check-label" for="gridCheck40">
                Tambah Baru
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="pcnu" type="checkbox" id="gridCheck41">
                <label class="form-check-label" for="gridCheck41">
                Edit
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="pcnu" type="checkbox" id="gridCheck42">
                <label class="form-check-label" for="gridCheck42">
                Hapus
                </label>
              </div>
            </div>
          </div>





          <div class="row mt-5">
            <div class="col-md-12">
              <div class="form-check mb-3">
                <input class="form-check-input" name="mwcnu" type="checkbox" id="gridCheck43">
                <label class="form-check-label fw-semibold" for="gridCheck43">
                Kelola MWCNU
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="mwcnu" type="checkbox" id="gridCheck44">
                <label class="form-check-label" for="gridCheck44">
                Lihat Daftar
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="mwcnu" type="checkbox" id="gridCheck45">
                <label class="form-check-label" for="gridCheck45">
                Lihat Detail
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="mwcnu" type="checkbox" id="gridCheck46">
                <label class="form-check-label" for="gridCheck46">
                Tambah Baru
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="mwcnu" type="checkbox" id="gridCheck47">
                <label class="form-check-label" for="gridCheck47">
                Edit
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="mwcnu" type="checkbox" id="gridCheck48">
                <label class="form-check-label" for="gridCheck48">
                Hapus
                </label>
              </div>
            </div>
          </div>





          <div class="row mt-5">
            <div class="col-md-12">
              <div class="form-check mb-3">
                <input class="form-check-input" name="ranting" type="checkbox" id="gridCheck49">
                <label class="form-check-label fw-semibold" for="gridCheck49">
                Kelola Ranting
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="ranting" type="checkbox" id="gridCheck50">
                <label class="form-check-label" for="gridCheck50">
                Lihat Daftar
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="ranting" type="checkbox" id="gridCheck51">
                <label class="form-check-label" for="gridCheck51">
                Lihat Detail
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="ranting" type="checkbox" id="gridCheck52">
                <label class="form-check-label" for="gridCheck52">
                Tambah Baru
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="ranting" type="checkbox" id="gridCheck53">
                <label class="form-check-label" for="gridCheck53">
                Edit
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="ranting" type="checkbox" id="gridCheck54">
                <label class="form-check-label" for="gridCheck54">
                Hapus
                </label>
              </div>
            </div>
          </div>





          <div class="row mt-5">
            <div class="col-md-12">
              <div class="form-check mb-3">
                <input class="form-check-input" name="anakRanting" type="checkbox" id="gridCheck55">
                <label class="form-check-label fw-semibold" for="gridCheck55">
                Kelola Anak Ranting
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="anakRanting" type="checkbox" id="gridCheck56">
                <label class="form-check-label" for="gridCheck56">
                Lihat Daftar
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="anakRanting" type="checkbox" id="gridCheck57">
                <label class="form-check-label" for="gridCheck57">
                Lihat Detail
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="anakRanting" type="checkbox" id="gridCheck58">
                <label class="form-check-label" for="gridCheck58">
                Tambah Baru
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="anakRanting" type="checkbox" id="gridCheck59">
                <label class="form-check-label" for="gridCheck59">
                Edit
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="anakRanting" type="checkbox" id="gridCheck60">
                <label class="form-check-label" for="gridCheck60">
                Hapus
                </label>
              </div>
            </div>
          </div>





          <div class="row mt-5">
            <div class="col-md-12">
              <div class="form-check mb-3">
                <input class="form-check-input" name="lembaga" type="checkbox" id="gridCheck61">
                <label class="form-check-label fw-semibold" for="gridCheck61">
                Kelola Lembaga
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="lembaga" type="checkbox" id="gridCheck62">
                <label class="form-check-label" for="gridCheck62">
                Lihat Daftar
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="lembaga" type="checkbox" id="gridCheck63">
                <label class="form-check-label" for="gridCheck63">
                Lihat Detail
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="lembaga" type="checkbox" id="gridCheck64">
                <label class="form-check-label" for="gridCheck64">
                Tambah Baru
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="lembaga" type="checkbox" id="gridCheck65">
                <label class="form-check-label" for="gridCheck65">
                Edit
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="lembaga" type="checkbox" id="gridCheck66">
                <label class="form-check-label" for="gridCheck66">
                Hapus
                </label>
              </div>
            </div>
          </div>





          <div class="row mt-5">
            <div class="col-md-12">
              <div class="form-check mb-3">
                <input class="form-check-input" name="banom" type="checkbox" id="gridCheck67">
                <label class="form-check-label fw-semibold" for="gridCheck67">
                Kelola Banom
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="banom" type="checkbox" id="gridCheck68">
                <label class="form-check-label" for="gridCheck68">
                Lihat Daftar
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="banom" type="checkbox" id="gridCheck69">
                <label class="form-check-label" for="gridCheck69">
                Lihat Detail
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="banom" type="checkbox" id="gridCheck70">
                <label class="form-check-label" for="gridCheck70">
                Tambah Baru
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="banom" type="checkbox" id="gridCheck71">
                <label class="form-check-label" for="gridCheck71">
                Edit
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="banom" type="checkbox" id="gridCheck72">
                <label class="form-check-label" for="gridCheck72">
                Hapus
                </label>
              </div>
            </div>
          </div>





          <div class="row mt-5">
            <div class="col-md-12">
              <div class="form-check mb-3">
                <input class="form-check-input" name="masterLembaga" type="checkbox" id="gridCheck73">
                <label class="form-check-label fw-semibold" for="gridCheck73">
                Kelola Master Lembaga
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="masterLembaga" type="checkbox" id="gridCheck74">
                <label class="form-check-label" for="gridCheck74">
                Lihat Daftar
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="masterLembaga" type="checkbox" id="gridCheck75">
                <label class="form-check-label" for="gridCheck75">
                Lihat Detail
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="masterLembaga" type="checkbox" id="gridCheck76">
                <label class="form-check-label" for="gridCheck76">
                Tambah Baru
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="masterLembaga" type="checkbox" id="gridCheck77">
                <label class="form-check-label" for="gridCheck77">
                Edit
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="masterLembaga" type="checkbox" id="gridCheck78">
                <label class="form-check-label" for="gridCheck78">
                Hapus
                </label>
              </div>
            </div>
          </div>





          <div class="row mt-5">
            <div class="col-md-12">
              <div class="form-check mb-3">
                <input class="form-check-input" name="masterBanom" type="checkbox" id="gridCheck79">
                <label class="form-check-label fw-semibold" for="gridCheck79">
                Kelola Master Banom
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="masterBanom" type="checkbox" id="gridCheck80">
                <label class="form-check-label" for="gridCheck80">
                Lihat Daftar
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="masterBanom" type="checkbox" id="gridCheck81">
                <label class="form-check-label" for="gridCheck81">
                Lihat Detail
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="masterBanom" type="checkbox" id="gridCheck82">
                <label class="form-check-label" for="gridCheck82">
                Tambah Baru
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="masterBanom" type="checkbox" id="gridCheck83">
                <label class="form-check-label" for="gridCheck83">
                Edit
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="masterBanom" type="checkbox" id="gridCheck84">
                <label class="form-check-label" for="gridCheck84">
                Hapus
                </label>
              </div>
            </div>
          </div>





          <div class="row mt-5">
            <div class="col-md-12">
              <div class="form-check mb-3">
                <input class="form-check-input" name="banomBasis" type="checkbox" id="gridCheck85">
                <label class="form-check-label fw-semibold" for="gridCheck85">
                Kelola Banom Basis
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="banomBasis" type="checkbox" id="gridCheck86">
                <label class="form-check-label" for="gridCheck86">
                Lihat Daftar
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="banomBasis" type="checkbox" id="gridCheck87">
                <label class="form-check-label" for="gridCheck87">
                Lihat Detail
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="banomBasis" type="checkbox" id="gridCheck88">
                <label class="form-check-label" for="gridCheck88">
                Tambah Baru
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="banomBasis" type="checkbox" id="gridCheck89">
                <label class="form-check-label" for="gridCheck89">
                Edit
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="banomBasis" type="checkbox" id="gridCheck90">
                <label class="form-check-label" for="gridCheck90">
                Hapus
                </label>
              </div>
            </div>
          </div>





          <div class="row mt-5">
            <div class="col-md-12">
              <div class="form-check mb-3">
                <input class="form-check-input" name="sk" type="checkbox" id="gridCheck91">
                <label class="form-check-label fw-semibold" for="gridCheck91">
                Kelola Surat Keputusan
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="sk" type="checkbox" id="gridCheck92">
                <label class="form-check-label" for="gridCheck92">
                Lihat Daftar
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="sk" type="checkbox" id="gridCheck93">
                <label class="form-check-label" for="gridCheck93">
                Lihat Detail
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="sk" type="checkbox" id="gridCheck94">
                <label class="form-check-label" for="gridCheck94">
                Tambah Baru
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="sk" type="checkbox" id="gridCheck95">
                <label class="form-check-label" for="gridCheck95">
                Edit
                </label>
              </div>
            </div>
            <div class=" float-start" style="width:40%;">
              <div class="form-check">
                <input class="form-check-input" name="sk" type="checkbox" id="gridCheck96">
                <label class="form-check-label" for="gridCheck96">
                Hapus
                </label>
              </div>
            </div>
          </div>



        </div>
    </div>
    @endif
</x-form>

<script>
  $("#gridCheck1").click(function(){
        $('input[name="user"]').prop('checked', $(this).prop('checked'));
});
  $("#gridCheck7").click(function(){
        $('input[name="userGroup"]').prop('checked', $(this).prop('checked'));
});
  $("#gridCheck13").click(function(){
        $('input[name="pengurus"]').prop('checked', $(this).prop('checked'));
});
  $("#gridCheck19").click(function(){
        $('input[name="jenisPengurus"]').prop('checked', $(this).prop('checked'));
});
  $("#gridCheck25").click(function(){
        $('input[name="jabatan"]').prop('checked', $(this).prop('checked'));
});
  $("#gridCheck31").click(function(){
        $('input[name="pwnu"]').prop('checked', $(this).prop('checked'));
});
  $("#gridCheck37").click(function(){
        $('input[name="pcnu"]').prop('checked', $(this).prop('checked'));
});
  $("#gridCheck43").click(function(){
        $('input[name="mwcnu"]').prop('checked', $(this).prop('checked'));
});
  $("#gridCheck49").click(function(){
        $('input[name="ranting"]').prop('checked', $(this).prop('checked'));
});
  $("#gridCheck55").click(function(){
        $('input[name="anakRanting"]').prop('checked', $(this).prop('checked'));
});
  $("#gridCheck61").click(function(){
        $('input[name="lembaga"]').prop('checked', $(this).prop('checked'));
});
  $("#gridCheck67").click(function(){
        $('input[name="banom"]').prop('checked', $(this).prop('checked'));
});
  $("#gridCheck73").click(function(){
        $('input[name="masterLembaga"]').prop('checked', $(this).prop('checked'));
});
  $("#gridCheck79").click(function(){
        $('input[name="masterBanom"]').prop('checked', $(this).prop('checked'));
});
  $("#gridCheck85").click(function(){
        $('input[name="banomBasis"]').prop('checked', $(this).prop('checked'));
});
  $("#gridCheck91").click(function(){
        $('input[name="sk"]').prop('checked', $(this).prop('checked'));
});
</script>
@endsection

@section('js-page')
<script src="../assets/sources/js/pcnu.js"></script>
@endsection


{{-- $('#select-all').click(function(event) {
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;
        });
    }
}); --}}
