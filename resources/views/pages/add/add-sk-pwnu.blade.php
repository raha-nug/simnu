@extends('layout.master')


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
<div class="container">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Surat Keputusan</h5>
            <form class="row g-3">
                <div class="col-md-12">
                  <label for="no-sk" class="form-label">Nomer SK</label>
                  <input type="text" class="form-control" id="no-sk" required>
                </div>
                <div class="col-md-6">
                  <label for="tgl-mulai" class="form-label">Tanggal Mulai</label>
                  <input type="date" class="form-control" id="tgl-mulai" required>
                </div>
                <div class="col-md-6">
                  <label for="tgl-berhenti" class="form-label">Tanggal Berhenti</label>
                  <input type="date" class="form-control" id="tgl-berhenti" required>
                </div>
                <div class="col-12">
                  <label for="file-sk" class="form-label">File SK</label>
                  <input type="file" class="form-control" id="file-sk" required>
                </div>
                <div class="text-end">
                  <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-2"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection