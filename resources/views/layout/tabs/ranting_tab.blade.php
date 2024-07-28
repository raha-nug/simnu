<div class="tab-pane fade mt-3" id="bordered-justified-ranting" role="tabpanel" aria-labelledby="ranting-tab">
   <div class="d-flex justify-content-end align-items-center">
      <a class="btn btn-primary" href="{{ route('ranting-add') }}?mwc={{setRoute($mwc_data->id)}}">
         <i class="bi bi-plus me-1"></i>
         Tambah
      </a>
   </div>
   <div class="table-responsive mt-3">
      <table class="table table-borderless table-hover" id="rantingTable">
         <thead>
            <tr>
               <th scope="col">Nama Ranting</th>
               <th scope="col">Alamat Ranting</th>
               {{-- <th scope="col">Kelengkapan Dokumen</th> --}}
               <th scope="col">Jumlah Anak Ranting</th>
               <th scope="col">Aksi</th>
            </tr>
         </thead>
         <tbody>

         </tbody>
      </table>
   </div>
</div>