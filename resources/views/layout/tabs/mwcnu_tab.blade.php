<div class="tab-pane fade mt-3" id="bordered-justified-mwc" role="tabpanel" aria-labelledby="mwc-tab">
   <div class="d-flex justify-content-end align-items-center">
      <a class="btn btn-primary" href="{{ route('mwcnu-add') }}?pc={{setRoute($pc_data->id)}}">
         <i class="bi bi-plus me-1"></i>
         Tambah
      </a>
   </div>
   <div class="table-responsive mt-3">
      <table class="table table-borderless table-hover" id="mwcTable">
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

         </tbody>
      </table>
   </div>
</div>