@extends('layout.master')


@section('title',$title)
@section('username',$username)
@section('from',$from)

@section('content')
    @include('sweetalert::alert')
        <div class="col-lg-12">
          <div class="row">
            <!-- Sales Card -->
            <div class="d-flex justify-content-center">
              <div class="col-xxl-6 col-md-6">
                <div class="card info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title mb-3">Jumlah Pengurus PWNU</h5>
  
                    <div class="d-flex align-items-center gap-4">
                      <div class="card-grand-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people" style="font-size: 3.75rem;"></i>
                      </div>
                      <div class="d-flex gap-4">
                          <div>
                            <h1 class="m-0">{{ $pengurus_pwnu }}</h1>
                          </div>
                      </div>
                    </div>
                  </div>
  
                </div>
              </div><!-- End Sales Card -->
            </div>
          </div>
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card ">
                <div class="card-body">
                  <h5 class="card-title mb-3">Jumlah <span>| PCNU & MWCNU</span></h5>

                  <div class="d-flex align-items-center gap-4">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <div class="icon-nav">
                        <?xml version="1.0" ?>
                        <svg
                          height="45"
                          viewBox="0 0 64 64"
                          width="45"
                          fill="#187865"
                          xmlns="http://www.w3.org/2000/svg">
                          <title />
                          <g>
                            <path
                              d="M42.208,15.8c-.507-2.39-5.022-4.517-7.859-5.634a2.91,2.91,0,1,0-4.7,0C26.814,11.28,22.3,13.407,21.792,15.8A5.681,5.681,0,0,0,24,21.312V42.688A5.681,5.681,0,0,0,21.792,48.2c.671,3.161,8.358,5.865,9.893,6.376a1,1,0,0,0,.63,0c1.535-.511,9.222-3.215,9.893-6.376A5.681,5.681,0,0,0,40,42.688V21.312A5.681,5.681,0,0,0,42.208,15.8ZM32,7.549A.911.911,0,0,1,32,9.37h0a.911.911,0,0,1,0-1.821ZM28.962,16.1c.146-1.575,1.9-3.428,3.038-4.431,1.139,1,2.892,2.856,3.038,4.431a7.563,7.563,0,0,1-.44,3.415H29.4A7.539,7.539,0,0,1,28.962,16.1Zm-5.213.115c.184-.868,2.042-2.094,4.374-3.206a6.487,6.487,0,0,0-1.153,2.905,9.72,9.72,0,0,0,.327,3.6H24.963A3.556,3.556,0,0,1,23.749,16.213Zm0,31.574a3.558,3.558,0,0,1,1.213-3.3H27.3a9.72,9.72,0,0,0-.327,3.6,6.476,6.476,0,0,0,1.154,2.906C25.792,49.883,23.933,48.656,23.749,47.787Zm11.289.115c-.146,1.575-1.9,3.428-3.038,4.431-1.139-1-2.892-2.856-3.038-4.431a7.563,7.563,0,0,1,.44-3.415h5.2A7.539,7.539,0,0,1,35.038,47.9Zm-6.271-5.415H26V21.513H38V42.487H28.767Zm11.484,5.3c-.184.868-2.042,2.094-4.374,3.206a6.487,6.487,0,0,0,1.153-2.905,9.72,9.72,0,0,0-.327-3.6h2.334A3.556,3.556,0,0,1,40.251,47.787ZM39.038,19.513H36.7a9.72,9.72,0,0,0,.327-3.6,6.476,6.476,0,0,0-1.154-2.906c2.332,1.111,4.191,2.338,4.375,3.207A3.558,3.558,0,0,1,39.038,19.513Z" />
                            <path
                              d="M32.5,22.936a1,1,0,0,0-.992,0,6.536,6.536,0,0,0-2.918,5.7V40.2a1,1,0,0,0,1,1h4.828a1,1,0,0,0,1-1V28.632A6.536,6.536,0,0,0,32.5,22.936Zm.918,16.26H30.586V28.632A4.793,4.793,0,0,1,32,25.069a4.793,4.793,0,0,1,1.414,3.563Z" />
                            <path
                              d="M58.027,40.134V24.64A4.411,4.411,0,0,0,59.648,20.4c-.38-1.792-3.429-3.327-5.632-4.218a2.911,2.911,0,1,0-4.291,0c-2.2.89-5.253,2.426-5.633,4.218a4.416,4.416,0,0,0,1.621,4.245V40.135a4.408,4.408,0,0,0-1.621,4.244h0c.511,2.409,5.842,4.355,7.463,4.894a1,1,0,0,0,.631,0c1.621-.539,6.952-2.485,7.462-4.893A4.408,4.408,0,0,0,58.027,40.134ZM51.87,13.315a.911.911,0,1,1-.91.911A.912.912,0,0,1,51.87,13.315ZM49.9,20.694a5.84,5.84,0,0,1,1.975-2.936,5.849,5.849,0,0,1,1.976,2.936h0a5.356,5.356,0,0,1-.242,2.229H50.138A5.349,5.349,0,0,1,49.9,20.694Zm-3.846.117c.091-.43,1-1.1,2.306-1.8a4.33,4.33,0,0,0-.453,1.5,7.439,7.439,0,0,0,.163,2.413H46.789A2.313,2.313,0,0,1,46.049,20.811Zm0,23.153h0a2.322,2.322,0,0,1,.741-2.112h1.274a7.46,7.46,0,0,0-.162,2.412,4.343,4.343,0,0,0,.454,1.5C47.045,45.068,46.14,44.394,46.049,43.964Zm7.8.115a5.854,5.854,0,0,1-1.976,2.938A5.845,5.845,0,0,1,49.9,44.079a5.329,5.329,0,0,1,.243-2.228H53.6A5.373,5.373,0,0,1,53.846,44.079Zm-4.358-4.228H47.713V24.924h8.314V39.851H49.488Zm8.2,4.113c-.091.43-1,1.1-2.306,1.8a4.343,4.343,0,0,0,.453-1.495,7.441,7.441,0,0,0-.161-2.413H56.95A2.323,2.323,0,0,1,57.691,43.964Zm-.741-21.04H55.676a7.443,7.443,0,0,0,.162-2.413,4.3,4.3,0,0,0-.449-1.486c1.3.69,2.214,1.365,2.3,1.786A2.326,2.326,0,0,1,56.95,22.924Z" />
                            <path
                              d="M52.366,25.48a1,1,0,0,0-.992,0,5.091,5.091,0,0,0-2.282,4.426v8.52a1,1,0,0,0,1,1h3.556a1,1,0,0,0,1-1v-8.52A5.091,5.091,0,0,0,52.366,25.48Zm.282,11.946H51.092v-7.52a3.34,3.34,0,0,1,.778-2.241,3.351,3.351,0,0,1,.778,2.241Z" />
                            <path
                              d="M19.908,44.379a4.408,4.408,0,0,0-1.621-4.244V24.64A4.416,4.416,0,0,0,19.908,20.4c-.38-1.792-3.43-3.328-5.633-4.218a2.911,2.911,0,1,0-4.291,0c-2.2.891-5.252,2.426-5.632,4.218A4.411,4.411,0,0,0,5.973,24.64V40.134a4.408,4.408,0,0,0-1.621,4.245h0c.51,2.409,5.841,4.355,7.462,4.894a1,1,0,0,0,.631,0C14.066,48.733,19.4,46.787,19.908,44.379ZM17.951,20.811a2.324,2.324,0,0,1-.742,2.113H15.935a7.439,7.439,0,0,0,.163-2.413,4.319,4.319,0,0,0-.449-1.486C16.952,19.715,17.862,20.39,17.951,20.811Zm-5.821-7.5a.911.911,0,1,1-.911.911A.912.912,0,0,1,12.13,13.315Zm-1.976,7.379a5.849,5.849,0,0,1,1.976-2.936,5.84,5.84,0,0,1,1.975,2.936,5.339,5.339,0,0,1-.243,2.23H10.4A5.369,5.369,0,0,1,10.154,20.694Zm-3.845.117c.091-.43,1-1.1,2.306-1.8a4.331,4.331,0,0,0-.453,1.494,7.45,7.45,0,0,0,.161,2.414H7.048A2.316,2.316,0,0,1,6.309,20.811Zm0,23.153h0a2.322,2.322,0,0,1,.741-2.112H8.323a7.463,7.463,0,0,0-.161,2.412,4.322,4.322,0,0,0,.454,1.5C7.305,45.068,6.4,44.394,6.309,43.964Zm7.8.115a5.845,5.845,0,0,1-1.975,2.938,5.854,5.854,0,0,1-1.976-2.938h0a5.343,5.343,0,0,1,.242-2.227h3.466A5.336,5.336,0,0,1,14.105,44.079ZM9.747,39.851H7.973V24.924h8.314V39.851H9.747Zm8.2,4.113c-.091.43-1,1.1-2.307,1.8a4.343,4.343,0,0,0,.454-1.5,7.46,7.46,0,0,0-.162-2.412h1.275A2.311,2.311,0,0,1,17.951,43.964Z" />
                            <path
                              d="M12.626,25.48a1,1,0,0,0-.992,0,5.091,5.091,0,0,0-2.282,4.426v8.52a1,1,0,0,0,1,1h3.556a1,1,0,0,0,1-1v-8.52A5.091,5.091,0,0,0,12.626,25.48Zm.282,11.946H11.352v-7.52a3.34,3.34,0,0,1,.778-2.241,3.356,3.356,0,0,1,.778,2.241Z" />
                          </g>
                        </svg>
                      </div>
                    </div>
                    <div class="d-flex gap-4">
                        <div>
                          <h6>{{$jml_pc}}</h6>
                          <span class="text-muted small pt-2 ps-1">PCNU</span>
                        </div>
                        <div>
                          <h6>{{$jml_mwc}}</h6>
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
                      <div class="icon-nav">
                        <?xml version="1.0" ?>
                        <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
                        <svg
                          height="40"
                          fill="#187865"
                          style="
                            fill-rule: evenodd;
                            clip-rule: evenodd;
                            stroke-linejoin: round;
                            stroke-miterlimit: 2;
                          "
                          version="1.1"
                          viewBox="0 0 100 100"
                          width="40"
                          xml:space="preserve"
                          xmlns="http://www.w3.org/2000/svg"
                          xmlns:serif="http://www.serif.com/"
                          xmlns:xlink="http://www.w3.org/1999/xlink">
                          <g transform="matrix(1,0,0,1,-450,-450)">
                            <g id="Layer1">
                              <path
                                d="M495.013,463.667L469.797,467.107C469.054,467.208 468.5,467.843 468.5,468.593L468.5,475.5C468.5,476.328 469.172,477 470,477L473.5,477L473.5,534.097C467.858,534.832 463.5,539.657 463.5,545.5C463.5,546.914 465,547 465,547L535,547C535,547 536.5,546.914 536.5,545.5L536.5,545.5C536.5,539.657 532.142,534.832 526.5,534.097L526.5,477L530,477C530.828,477 531.5,476.328 531.5,475.5L531.5,468.593C531.5,467.843 530.946,467.208 530.203,467.107L504.987,463.667C505.932,462.538 506.5,461.085 506.5,459.5C506.5,455.913 503.587,453 500,453C496.413,453 493.5,455.913 493.5,459.5C493.5,461.085 494.068,462.538 495.013,463.667ZM533.368,544L466.632,544C467.34,540.021 470.817,537 475,537C475,537 525,537 525,537C529.183,537 532.66,540.021 533.368,544ZM476.5,529.5L476.5,534C476.5,534 523.5,534 523.5,534L523.5,529.5L476.5,529.5ZM476.5,484.5L476.5,526.5L478.5,526.5L478.5,498.322C478.5,492.897 482.897,488.5 488.322,488.5L488.325,488.5C493.75,488.5 498.147,492.897 498.147,498.322L498.147,526.5L501.853,526.5L501.853,498.322C501.853,492.897 506.25,488.5 511.675,488.5L511.678,488.5C517.103,488.5 521.5,492.897 521.5,498.322L521.5,526.5L523.5,526.5L523.5,484.5L476.5,484.5ZM518.5,526.5L504.853,526.5C504.853,526.5 504.853,498.322 504.853,498.322C504.853,494.554 507.907,491.5 511.675,491.5C511.675,491.5 511.678,491.5 511.678,491.5C515.446,491.5 518.5,494.554 518.5,498.322L518.5,526.5ZM495.147,526.5L481.5,526.5C481.5,526.5 481.5,498.322 481.5,498.322C481.5,494.554 484.554,491.5 488.322,491.5C488.322,491.5 488.325,491.5 488.325,491.5C492.093,491.5 495.147,494.554 495.147,498.322L495.147,526.5ZM523.5,481.5L476.5,481.5L476.5,477L523.5,477L523.5,481.5ZM471.5,474L528.5,474L528.5,469.902L500,466.014C500,466.014 471.5,469.902 471.5,469.902C471.5,469.902 471.5,474 471.5,474ZM500,456C501.932,456 503.5,457.568 503.5,459.5C503.5,461.432 501.932,463 500,463C498.068,463 496.5,461.432 496.5,459.5C496.5,457.568 498.068,456 500,456Z" />
                            </g>
                          </g>
                        </svg>
                      </div>
                    </div>
                    <div class="d-flex gap-4">
                        <div>
                          <h6>{{$jml_ranting}}</h6>
                          <span class="text-muted small pt-2 ps-1">Ranting</span>
                        </div>
                        <div>
                          <h6>{{$jml_anak_ranting}}</h6>
                          <span class="text-muted pt-2 ps-1" style="font-size: 0.78em;">Anak Ranting</span>
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
                  <h5 class="card-title mb-3">Jumlah <span>| Lembaga & Banom</span></h5>

                  <div class="d-flex align-items-center gap-4">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-building"></i>
                    </div>
                    <div class="d-flex gap-4">
                        <div>
                          <h6>{{$total_lembaga}}</h6>
                          <span class="text-muted small pt-2 ps-1">Lembaga</span>
                        </div>
                        <div>
                          <h6>{{$total_banom}}</h6>
                          <span class="text-muted small pt-2 ps-1">Banom</span>
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
                          <h6>{{ $pengurus_pcnu }}</h6>
                          <span class="text-muted small pt-2 ps-1">PCNU</span>
                        </div>
                        <div>
                          <h6>{{ $pengurus_mwcnu }}</h6>
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
                          <h6>{{ $pengurus_ranting }}</h6>
                          <span class="text-muted small pt-2 ps-1">Ranting</span>
                        </div>
                        <div>
                          <h6>{{ $pengurus_anak_ranting }}</h6>
                          <span class="text-muted pt-2 ps-1" style="font-size: 0.78em;">Anak Ranting</span>
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
                  <h5 class="card-title mb-3">Jumlah Pengurus <span>| Lembaga & Banom</span></h5>

                  <div class="d-flex align-items-center gap-4">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="d-flex gap-4">
                        <div>
                          <h6>0</h6>
                          <span class="text-muted small pt-2 ps-1">Lembaga</span>
                        </div>
                        <div>
                          <h6>0</h6>
                          <span class="text-muted small pt-2 ps-1">Banom</span>
                        </div>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

          </div>

        </div>

@endsection
