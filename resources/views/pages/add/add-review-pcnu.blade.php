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
        <label for="pcnu" class="form-label">Nama PCNU</label>
        <input type="text" name="pcnu" class="form-control" id="pcnu" value="{{$pcnu_data->nama}}" readonly>
        <input type="hidden" name="id_pcnu" value="{{$pcnu_data->id}}">
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
  </x-form>
@endsection
