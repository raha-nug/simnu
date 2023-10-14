<div class="tab-pane fade mt-3" id="bordered-justified-banom" role="tabpanel" aria-labelledby="banom-tab">
   <div class="d-flex justify-content-end align-items-center">
    @if($pw_detail->id ?? null)
        <a class="btn btn-primary" href="{{route('Banom-add')}}?pw={{setRoute($pw_detail->id)}}">
    @elseif($pc_data->id ?? null)
        <a class="btn btn-primary" href="{{route('Banom-add')}}?pc={{setRoute($pc_data->id)}}">
    @elseif($mwc_data->id ?? null)
        <a class="btn btn-primary" href="{{route('Banom-add')}}?mwc={{setRoute($mwc_data->id)}}">
    @endif
        <i class="bi bi-plus me-1"></i>
            Tambah
        </a>
   </div>
   <div class="table-responsive">
      <table class="table table-borderless table-hover" id="BanomTable">
         <thead>
            <tr>
               <th scope="col">No</th>
               <th scope="col">Nama Banom</th>
               <th scope="col">Aksi</th>
            </tr>
         </thead>
         <tbody>
            {{-- <tr>
               <th scope="row">1</th>
               <td>Ikatan Pelajar Putri NU (IPPNU) Jawa Barat</td>
               <td>

                  <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                     <i class="bi bi-three-dots-vertical"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                     <li><a class="dropdown-item" href="#">
                           <i class="bi bi-pencil-square"></i>
                           Edit
                        </a>
                     </li>
                     <li><a class="dropdown-item text-danger" href="#">
                           <i class="bi bi-trash"></i>
                           Hapus
                        </a>
                     </li>
                  </ul>

               </td>
            </tr>
            <tr>
               <th scope="row">2</th>
               <td>Ikatan Pelajar Putri NU (IPPNU) Jawa Barat</td>
               <td>

                  <a class="btn btn-outline-primary icon" href="#" data-bs-toggle="dropdown">
                     <i class="bi bi-three-dots-vertical"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                     <li><a class="dropdown-item" href="#">
                           <i class="bi bi-pencil-square"></i>
                           Edit
                        </a>
                     </li>
                     <li><a class="dropdown-item text-danger" href="#">
                           <i class="bi bi-trash"></i>
                           Hapus
                        </a>
                     </li>
                  </ul>

               </td>
            </tr> --}}
         </tbody>
      </table>
   </div>
</div>
