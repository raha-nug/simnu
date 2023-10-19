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
  <x-form method="POST" action="#">
    <x-slot:title>
      Review Kinerja
    </x-slot:title>
    <div class="col-md-12">
      <label for="ranting" class="form-label">Nama Ranting</label>
      <input name="ranting" class="form-control" id="ranting" readonly>
   </div>
    <div class="col-md-12">
      <label for="mwc" class="form-label">Nama MWCNU</label>
      <input name="mwc" class="form-control" id="mwc" readonly>
   </div>
    <div class="col-md-12">
      <label for="pcnu" class="form-label">Nama PCNU</label>
      <input name="pcnu" class="form-control" id="pcnu" readonly>
   </div>
    <div class="table-responsive">
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
            <td>Mempunyai 100% SK PARNU yang Aktif</td>
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
            <td>Mempunyai SK Ranting NU yang Aktif</td>
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
            <td>Melaksanakan Musyarawah Kerja Ranting yang diadakan sekurang-kurangnya 4 (empat) kali dalam masa jabatan Pengurus Ranting</td>
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
            <td>Mempunyai layanan di bidang Keagamaan berupa pengelolaan Masjid/Musholla yang nadzir wakaf tanahnya adalah LWPNU</td>
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
            <td>Mempunyai minimal 1 (satu) layanan keagamaan berupa Majelis Taklim/Jam'iyyah Tahlil/Lailatul Ijtima' yang dilaksanakan satu kali dalam dua pekan</td>
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
            <td>Mempunyai minimal 1 (satu) lembaga pendidikan tingkat RA/PAUD/TPQ/MI/SD/MDT yang berbadan hukum dan/atau berafiliasi dengan Nahdlatul Ulama</td>
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
        </tbody>
      </table>
    </div>
  </x-form>
@endsection