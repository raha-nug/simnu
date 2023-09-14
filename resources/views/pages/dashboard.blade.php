@extends('layout.master')


@section('title',$title)
@section('username',$username)
@section('from',$from)

@section('content')
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card ">
                <div class="card-body">
                  <h5 class="card-title mb-3">Jumlah <span>| PCNU & MWCNU</span></h5>

                  <div class="d-flex align-items-center gap-4">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-globe2"></i>
                    </div>
                    <div class="d-flex gap-4">     
                        <div>
                          <h6>27</h6>
                          <span class="text-muted small pt-2 ps-1">PCNU</span>
                        </div>
                        <div>
                          <h6>591</h6>
                          <span class="text-muted small pt-2 ps-1">MWCNU</span>
                        </div>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card ">
                <div class="card-body">
                  <h5 class="card-title mb-3">Jumlah <span>| Ranting & Anak Ranting</span></h5>

                  <div class="d-flex align-items-center gap-4">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-gem"></i>
                    </div>
                    <div class="d-flex gap-4">     
                        <div>
                          <h6>2152</h6>
                          <span class="text-muted small pt-2 ps-1">Ranting</span>
                        </div>
                        <div>
                          <h6>760</h6>
                          <span class="text-muted small pt-2 ps-1">Anak Ranting</span>
                        </div>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card ">
                <div class="card-body">
                  <h5 class="card-title mb-3">Jumlah <span>| Banom & Lembaga</span></h5>

                  <div class="d-flex align-items-center gap-4">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-building"></i>
                    </div>
                    <div class="d-flex gap-4">     
                        <div>
                          <h6>48848</h6>
                          <span class="text-muted small pt-2 ps-1">Banom</span>
                        </div>
                        <div>
                          <h6>355</h6>
                          <span class="text-muted small pt-2 ps-1">Lembaga</span>
                        </div>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

          </div>
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title mb-3">Jumlah Pengurus <span>| PCNU & MWCNU</span></h5>

                  <div class="d-flex align-items-center gap-4">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="d-flex gap-4">     
                        <div>
                          <h6>2047</h6>
                          <span class="text-muted small pt-2 ps-1">PCNU</span>
                        </div>
                        <div>
                          <h6>9720</h6>
                          <span class="text-muted small pt-2 ps-1">MWCNU</span>
                        </div>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card ">
                <div class="card-body">
                  <h5 class="card-title mb-3">Jumlah Pengurus <span>| Ranting & Anak Ranting</span></h5>

                  <div class="d-flex align-items-center gap-4">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="d-flex gap-4">     
                        <div>
                          <h6>16004</h6>
                          <span class="text-muted small pt-2 ps-1">Ranting</span>
                        </div>
                        <div>
                          <h6>4799</h6>
                          <span class="text-muted small pt-2 ps-1">Anak Ranting</span>
                        </div>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card ">
                <div class="card-body">
                  <h5 class="card-title mb-3">Jumlah Pengurus <span>| Banom & Lembaga</span></h5>

                  <div class="d-flex align-items-center gap-4">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="d-flex gap-4">     
                        <div>
                          <h6>3029</h6>
                          <span class="text-muted small pt-2 ps-1">Banom</span>
                        </div>
                        <div>
                          <h6>2814</h6>
                          <span class="text-muted small pt-2 ps-1">Lembaga</span>
                        </div>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

          </div>

        </div>
    
@endsection
