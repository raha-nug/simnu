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
      Review Kinerja
    </x-slot:title>
    <div class="col-md-12">
      <label for="mwc" class="form-label">Nama MWCNU</label>
      <input name="mwc" class="form-control" id="mwc" value="{{$mwc_data->nama}}" readonly>
      <input type="hidden" value="{{$mwc_data->id}}" name="id_mwcnu">
   </div>
   <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr class="text-center">
          <th>No</th>
          <th>Program Kerja</th>
          <th>Verifikasi</th>
          <th>Validasi</th>
        </tr>
      </thead>
      <tbody>
          @if(isset($relasi_indikator))
              <input type="hidden" value="{{$relasi_indikator->id}}" name="id">
              @foreach ($list as $item => $value)
              <tr>
              <td class="text-center">{{$item+1}}</td>
              <td>{{$value['nama_indikator']}}</td>
              <td class="w-15 text-center">
                  <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  Review
                  <i class="bi bi-clipboard-data ms-1"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                  <div class="dropdown-header text-start">
                      <h6>Verifikasi</h6>
                  </div>
                  <li>
                      <div class="dropdown-item">
                      <input class="form-check-input me-2" name="verifikasiAda[]" type="checkbox" id="gridCheck1">
                      <label class="form-check-label fw-semibold" for="gridCheck1">
                      Ada
                      </label>
                      </div>
                  </li>
                  <li>
                      <div class="dropdown-item">
                      <input class="form-check-input me-2" name="verifikasiTidakAda[]" type="checkbox" id="gridCheck2">
                      <label class="form-check-label fw-semibold" for="gridCheck2">
                      Tidak Ada
                      </label>
                      </div>
                  </li>
                  </ul>
              </td>
              <td class="w-15 text-center">
                  <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  Review
                  <i class="bi bi-clipboard-data ms-1"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                  <div class="dropdown-header text-start">
                      <h6>Validasi</h6>
                  </div>
                  <li>
                      <div class="dropdown-item">
                      <input class="form-check-input me-2" name="validasiKurang[]" type="checkbox" id="gridCheck3">
                      <label class="form-check-label fw-semibold" for="gridCheck3">
                      Kurang
                      </label>
                      </div>
                  </li>
                  <li>
                      <div class="dropdown-item">
                      <input class="form-check-input me-2" name="validasiCukup[]" type="checkbox" id="gridCheck4">
                      <label class="form-check-label fw-semibold" for="gridCheck4">
                      Cukup
                      </label>
                      </div>
                  </li>
                  <li>
                      <div class="dropdown-item">
                      <input class="form-check-input me-2" name="validasiBaik[]" type="checkbox" id="gridCheck5">
                      <label class="form-check-label fw-semibold" for="gridCheck5">
                      Baik
                      </label>
                      </div>
                  </li>
                  </ul>
              </td>
              @foreach ($value['uraian_indikator'] as $key => $value )
                  <tr>
                      <td></td>
                      {{-- <td class="text-center"></td> --}}
                      <div class="d-flex">
                          <td><span class="pw-bold">{{$item+1}}.{{$key+1}} </span> {{$value->nama_uraian}}</td>
                      </div>
                      <td class="w-15 text-center">
                          <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          Review
                          <i class="bi bi-clipboard-data ms-1"></i>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                          <div class="dropdown-header text-start">
                              <h6>Verifikasi</h6>
                          </div>
                          <li>
                              <div class="dropdown-item">
                              <input class="form-check-input me-2" name="verifikasiAda[]" type="checkbox" id="gridCheck1">
                              <label class="form-check-label fw-semibold" for="gridCheck1">
                              Ada
                              </label>
                              </div>
                          </li>
                          <li>
                              <div class="dropdown-item">
                              <input class="form-check-input me-2" name="verifikasiTidakAda[]" type="checkbox" id="gridCheck2">
                              <label class="form-check-label fw-semibold" for="gridCheck2">
                              Tidak Ada
                              </label>
                              </div>
                          </li>
                          </ul>
                      </td>
                      <td class="w-15 text-center">
                          <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          Review
                          <i class="bi bi-clipboard-data ms-1"></i>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                          <div class="dropdown-header text-start">
                              <h6>Validasi</h6>
                          </div>
                          <li>
                              <div class="dropdown-item">
                              <input class="form-check-input me-2" name="validasiKurang[]" type="checkbox" id="gridCheck3">
                              <label class="form-check-label fw-semibold" for="gridCheck3">
                              Kurang
                              </label>
                              </div>
                          </li>
                          <li>
                              <div class="dropdown-item">
                              <input class="form-check-input me-2" name="validasiCukup[]" type="checkbox" id="gridCheck4">
                              <label class="form-check-label fw-semibold" for="gridCheck4">
                              Cukup
                              </label>
                              </div>
                          </li>
                          <li>
                              <div class="dropdown-item">
                              <input class="form-check-input me-2" name="validasiBaik[]" type="checkbox" id="gridCheck5">
                              <label class="form-check-label fw-semibold" for="gridCheck5">
                              Baik
                              </label>
                              </div>
                          </li>
                          </ul>
                      </td>
                  </tr>
              @endforeach
              </tr>
              @endforeach
          @else
          @foreach ($list as $item => $value)
          <tr>
          <td class="text-center">{{$item+1}}</td>
          <td>{{$value['nama_indikator']}}</td>
          <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
              Review
              <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
              <div class="dropdown-header text-start">
                  <h6>Verifikasi</h6>
              </div>
              <li>
                  <div class="dropdown-item">
                  <input class="form-check-input me-2" name="verifikasiAda[]" type="checkbox" id="gridCheck1">
                  <label class="form-check-label fw-semibold" for="gridCheck1">
                  Ada
                  </label>
                  </div>
              </li>
              <li>
                  <div class="dropdown-item">
                  <input class="form-check-input me-2" name="verifikasiTidakAda[]" type="checkbox" id="gridCheck2">
                  <label class="form-check-label fw-semibold" for="gridCheck2">
                  Tidak Ada
                  </label>
                  </div>
              </li>
              </ul>
          </td>
          <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
              Review
              <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
              <div class="dropdown-header text-start">
                  <h6>Validasi</h6>
              </div>
              <li>
                  <div class="dropdown-item">
                  <input class="form-check-input me-2" name="validasiKurang[]" type="checkbox" id="gridCheck3">
                  <label class="form-check-label fw-semibold" for="gridCheck3">
                  Kurang
                  </label>
                  </div>
              </li>
              <li>
                  <div class="dropdown-item">
                  <input class="form-check-input me-2" name="validasiCukup[]" type="checkbox" id="gridCheck4">
                  <label class="form-check-label fw-semibold" for="gridCheck4">
                  Cukup
                  </label>
                  </div>
              </li>
              <li>
                  <div class="dropdown-item">
                  <input class="form-check-input me-2" name="validasiBaik[]" type="checkbox" id="gridCheck5">
                  <label class="form-check-label fw-semibold" for="gridCheck5">
                  Baik
                  </label>
                  </div>
              </li>
              </ul>
          </td>
          @foreach ($value['uraian_indikator'] as $key => $value )
              <tr>
                  <td></td>
                  {{-- <td class="text-center"></td> --}}
                  <div class="d-flex">
                      <td><span class="pw-bold">{{$item+1}}.{{$key+1}} </span> {{$value->nama_uraian}}</td>
                  </div>
                  <td class="w-15 text-center">
                      <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      Review
                      <i class="bi bi-clipboard-data ms-1"></i>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                      <div class="dropdown-header text-start">
                          <h6>Verifikasi</h6>
                      </div>
                      <li>
                          <div class="dropdown-item">
                          <input class="form-check-input me-2" name="verifikasiAda[]" type="checkbox" id="gridCheck1">
                          <label class="form-check-label fw-semibold" for="gridCheck1">
                          Ada
                          </label>
                          </div>
                      </li>
                      <li>
                          <div class="dropdown-item">
                          <input class="form-check-input me-2" name="verifikasiTidakAda[]" type="checkbox" id="gridCheck2">
                          <label class="form-check-label fw-semibold" for="gridCheck2">
                          Tidak Ada
                          </label>
                          </div>
                      </li>
                      </ul>
                  </td>
                  <td class="w-15 text-center">
                      <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      Review
                      <i class="bi bi-clipboard-data ms-1"></i>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                      <div class="dropdown-header text-start">
                          <h6>Validasi</h6>
                      </div>
                      <li>
                          <div class="dropdown-item">
                          <input class="form-check-input me-2" name="validasiKurang[]" type="checkbox" id="gridCheck3">
                          <label class="form-check-label fw-semibold" for="gridCheck3">
                          Kurang
                          </label>
                          </div>
                      </li>
                      <li>
                          <div class="dropdown-item">
                          <input class="form-check-input me-2" name="validasiCukup[]" type="checkbox" id="gridCheck4">
                          <label class="form-check-label fw-semibold" for="gridCheck4">
                          Cukup
                          </label>
                          </div>
                      </li>
                      <li>
                          <div class="dropdown-item">
                          <input class="form-check-input me-2" name="validasiBaik[]" type="checkbox" id="gridCheck5">
                          <label class="form-check-label fw-semibold" for="gridCheck5">
                          Baik
                          </label>
                          </div>
                      </li>
                      </ul>
                  </td>
              </tr>
          @endforeach
          </tr>
          @endforeach
          @endif
      </tbody>
    </table>
  </div>
    {{-- <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr class="text-center">
            <th>No</th>
            <th>Uraian Kerja</th>
            <th>Verifikasi</th>
            <th>Validasi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center">1</td>
            <td>Mempunyai 100% SK Ranting NU yang Aktif</td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Verifikasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck1">
                    <label class="form-check-label fw-semibold" for="gridCheck1">
                    Ada
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck2">
                    <label class="form-check-label fw-semibold" for="gridCheck2">
                    Tidak Ada
                    </label>
                  </div>
                </li>
              </ul>
            </td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Validasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck3">
                    <label class="form-check-label fw-semibold" for="gridCheck3">
                    Kurang
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck4">
                    <label class="form-check-label fw-semibold" for="gridCheck4">
                    Cukup
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck5">
                    <label class="form-check-label fw-semibold" for="gridCheck5">
                    Baik
                    </label>
                  </div>
                </li>
              </ul>
            </td>
          </tr>
          <tr>
            <td class="text-center">2</td>
            <td>Mempunyai SK MWCNU Aktif</td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Verifikasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck6">
                    <label class="form-check-label fw-semibold" for="gridCheck6">
                    Ada
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck7">
                    <label class="form-check-label fw-semibold" for="gridCheck7">
                    Tidak Ada
                    </label>
                  </div>
                </li>
              </ul>
            </td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Validasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck8">
                    <label class="form-check-label fw-semibold" for="gridCheck8">
                    Kurang
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck9">
                    <label class="form-check-label fw-semibold" for="gridCheck9">
                    Cukup
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck10">
                    <label class="form-check-label fw-semibold" for="gridCheck10">
                    Baik
                    </label>
                  </div>
                </li>
              </ul>
            </td>
          </tr>
          <tr>
            <td class="text-center">3</td>
            <td>Mengadakan kegiatan lailatul ijtima' sebagai sarana merawat tradisi dan amaliyah NU minimal empat kali dalam satu tahun seperti halal bi halal, Peringatan Tahun Baru hijriyah/PHBI, Maulid Nabi, Rajaban dan lain-lain</td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Verifikasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck11">
                    <label class="form-check-label fw-semibold" for="gridCheck11">
                    Ada
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck12">
                    <label class="form-check-label fw-semibold" for="gridCheck12">
                    Tidak Ada
                    </label>
                  </div>
                </li>
              </ul>
            </td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Validasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck13">
                    <label class="form-check-label fw-semibold" for="gridCheck13">
                    Kurang
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck14">
                    <label class="form-check-label fw-semibold" for="gridCheck14">
                    Cukup
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck15">
                    <label class="form-check-label fw-semibold" for="gridCheck15">
                    Baik
                    </label>
                  </div>
                </li>
              </ul>
            </td>
          </tr>
          <tr>
            <td class="text-center">4</td>
            <td>Melaksanakan Halaqah dengan Pondok Pesantren Induk di wilayahnya yang mempunyai peran penting dalam kesejarahan Nahdlatul Ulama</td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Verifikasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck16">
                    <label class="form-check-label fw-semibold" for="gridCheck16">
                    Ada
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck17">
                    <label class="form-check-label fw-semibold" for="gridCheck17">
                    Tidak Ada
                    </label>
                  </div>
                </li>
              </ul>
            </td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Validasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck18">
                    <label class="form-check-label fw-semibold" for="gridCheck18">
                    Kurang
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck19">
                    <label class="form-check-label fw-semibold" for="gridCheck19">
                    Cukup
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck20">
                    <label class="form-check-label fw-semibold" for="gridCheck20">
                    Baik
                    </label>
                  </div>
                </li>
              </ul>
            </td>
          </tr>
          <tr>
            <td class="text-center">5</td>
            <td>Memiliki Kantor/Sekretariat permanen yang tanahnya diwakafkan atau bersertifikat atas nama Perkumpulan Nahdlatul Ulama</td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Verifikasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck21">
                    <label class="form-check-label fw-semibold" for="gridCheck21">
                    Ada
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck22">
                    <label class="form-check-label fw-semibold" for="gridCheck22">
                    Tidak Ada
                    </label>
                  </div>
                </li>
              </ul>
            </td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Validasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck23">
                    <label class="form-check-label fw-semibold" for="gridCheck23">
                    Kurang
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck24">
                    <label class="form-check-label fw-semibold" for="gridCheck24">
                    Cukup
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck25">
                    <label class="form-check-label fw-semibold" for="gridCheck25">
                    Baik
                    </label>
                  </div>
                </li>
              </ul>
            </td>
          </tr>
          <tr>
            <td class="text-center">6</td>
            <td>Melaksanakan kegiatan Rapat Rutin yang diamanatkan sesuai AD/ART Nahdlatul Ulama, Peraturan Perkumpulan Nahdlatul Ulama dan Peraturan lainnya</td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Verifikasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck26">
                    <label class="form-check-label fw-semibold" for="gridCheck26">
                    Ada
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck27">
                    <label class="form-check-label fw-semibold" for="gridCheck27">
                    Tidak Ada
                    </label>
                  </div>
                </li>
              </ul>
            </td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Validasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck28">
                    <label class="form-check-label fw-semibold" for="gridCheck28">
                    Kurang
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck29">
                    <label class="form-check-label fw-semibold" for="gridCheck29">
                    Cukup
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck30">
                    <label class="form-check-label fw-semibold" for="gridCheck30">
                    Baik
                    </label>
                  </div>
                </li>
              </ul>
            </td>
          </tr>
          <tr>
            <td class="text-center">7</td>
            <td>Melaksanakan Permusyawaratan tingkat daerah</td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Verifikasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck31">
                    <label class="form-check-label fw-semibold" for="gridCheck31">
                    Ada
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck32">
                    <label class="form-check-label fw-semibold" for="gridCheck32">
                    Tidak Ada
                    </label>
                  </div>
                </li>
              </ul>
            </td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Validasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck33">
                    <label class="form-check-label fw-semibold" for="gridCheck33">
                    Kurang
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck34">
                    <label class="form-check-label fw-semibold" for="gridCheck34">
                    Cukup
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck35">
                    <label class="form-check-label fw-semibold" for="gridCheck35">
                    Baik
                    </label>
                  </div>
                </li>
              </ul>
            </td>
          </tr>
          <tr>
            <td class="text-center">8</td>
            <td>Melaksanakan Pengkaderan/Kaderisasi minimal satu kali dalam setahun</td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Verifikasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck36">
                    <label class="form-check-label fw-semibold" for="gridCheck36">
                    Ada
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck37">
                    <label class="form-check-label fw-semibold" for="gridCheck37">
                    Tidak Ada
                    </label>
                  </div>
                </li>
              </ul>
            </td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Validasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck38">
                    <label class="form-check-label fw-semibold" for="gridCheck38">
                    Kurang
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck39">
                    <label class="form-check-label fw-semibold" for="gridCheck39">
                    Cukup
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck40">
                    <label class="form-check-label fw-semibold" for="gridCheck40">
                    Baik
                    </label>
                  </div>
                </li>
              </ul>
            </td>
          </tr>
          <tr>
            <td class="text-center">9</td>
            <td>Mempunyai minimal 1 (satu) Lembaga Pendidikan tingkat SLTP yang berbadan hukum Nahdatul Ulama (BPPPNU)</td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Verifikasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck41">
                    <label class="form-check-label fw-semibold" for="gridCheck41">
                    Ada
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck42">
                    <label class="form-check-label fw-semibold" for="gridCheck42">
                    Tidak Ada
                    </label>
                  </div>
                </li>
              </ul>
            </td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Validasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck43">
                    <label class="form-check-label fw-semibold" for="gridCheck43">
                    Kurang
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck44">
                    <label class="form-check-label fw-semibold" for="gridCheck44">
                    Cukup
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck45">
                    <label class="form-check-label fw-semibold" for="gridCheck45">
                    Baik
                    </label>
                  </div>
                </li>
              </ul>
            </td>
          </tr>
          <tr>
            <td class="text-center">10</td>
            <td>Mempunyai lembaga pendidikan tingkat SLTA yang berafiliasi dengan NU minimal 75% dari jumlah Ranting di MWCNU tersebut yang tergabung dalam LP Ma'arif NU</td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Verifikasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck46">
                    <label class="form-check-label fw-semibold" for="gridCheck46">
                    Ada
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck47">
                    <label class="form-check-label fw-semibold" for="gridCheck47">
                    Tidak Ada
                    </label>
                  </div>
                </li>
              </ul>
            </td>
            <td class="w-15 text-center">
              <a class="btn btn-outline-primary" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Review
                <i class="bi bi-clipboard-data ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"  >
                <div class="dropdown-header text-start">
                  <h6>Validasi</h6>
                </div>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck48">
                    <label class="form-check-label fw-semibold" for="gridCheck48">
                    Kurang
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck49">
                    <label class="form-check-label fw-semibold" for="gridCheck49">
                    Cukup
                    </label>
                  </div>
                </li>
                <li>
                  <div class="dropdown-item">
                    <input class="form-check-input me-2" name="isMWCExist" type="checkbox" id="gridCheck50">
                    <label class="form-check-label fw-semibold" for="gridCheck50">
                    Baik
                    </label>
                  </div>
                </li>
              </ul>
            </td>
          </tr>
        </tbody>
      </table>
    </div> --}}
  </x-form>
@endsection
