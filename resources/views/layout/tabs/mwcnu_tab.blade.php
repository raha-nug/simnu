<div class="tab-pane fade mt-3" id="bordered-justified-mwc" role="tabpanel" aria-labelledby="mwc-tab">
   <div class="d-flex justify-content-end align-items-center  me-3">
      <a class="btn btn-primary" href="add-mwc">
         <i class="bi bi-plus me-1"></i>
         Tambah
      </a>
   </div>
   <div class="table-responsive">
      <table class="table table-borderless table-hover datatable">
         <thead>
            <tr>
               <th scope="col">Nama MWC</th>
               <th scope="col">Alamat MWC</th>
               <th scope="col">Kelengkapan Dokumen</th>
               <th scope="col">Jumlah Ranting</th>
               <th scope="col">Aksi</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($list_mwc as $item)
               <tr>
                  <td><a href="{{ route() }}">{{ $item->nama }}</a></td>
                  <td>{{ $item->alamat }}</td>
                  <td><span class="badge bg-warning"><i class="bi bi-info-circle me-1"></i> 
                     Belum Lengkap
                     </span></td>
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
            @endforeach
         </tbody>
      </table>
   </div>
</div>