<div class="tab-pane fade mt-3" id="bordered-justified-lembaga" role="tabpanel" aria-labelledby="lembaga-tab">
   <div class="d-flex justify-content-end align-items-center">
      @isset($pwnu_data)
         <a class="btn btn-primary" href="{{ route('lembaga-add') }}?pw={{setRoute($pwnu_data->id)}}">
            <i class="bi bi-plus me-1"></i>
            Tambah
         </a>
      @endisset
      @isset($pcnu_data)
         <a class="btn btn-primary" href="{{ route('lembaga-add') }}?pc={{setRoute($pcnu_data->id)}}">
            <i class="bi bi-plus me-1"></i>
            Tambah
         </a>
      @endisset
      @isset($mwcnu_data)
         <a class="btn btn-primary" href="{{ route('lembaga-add') }}?mwc={{setRoute($mwcnu_data->id)}}">
            <i class="bi bi-plus me-1"></i>
            Tambah
         </a>
      @endisset
   </div>
   <div class="table-responsive mt-3">
      <table class="table table-borderless table-hover" id="lembagaTable">
         <thead>
            <tr>
               <th scope="col">No</th>
               <th scope="col">Nama Lembaga</th>
               <th scope="col">Aksi</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <th scope="row">1</th>
               <td>Lembaga Dakwah NU (LDNU) Jawa Barat</td>
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
               <td>Lembaga Pendidikan Ma’arif NU Jawa Barat</td>
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
         </tbody>
      </table>
   </div>
</div>