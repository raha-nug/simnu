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
            <h5 class="card-title">Tambah Banom</h5>
            <form class="row g-3">
                <div class="col-md-12">
                  <label for="no-sk" class="form-label">Nama Banom</label>
                  <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">--pilih banom master--</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-12">
                  <label for="no-sk" class="form-label">Banom Base</label>
                  <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">--pilih banom base--</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="text-end">
                  <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-2"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection