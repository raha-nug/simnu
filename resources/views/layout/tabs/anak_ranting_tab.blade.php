<div class="tab-pane fade mt-3" id="bordered-justified-anak-ranting" role="tabpanel" aria-labelledby="anak-ranting-ranting-tab">
   <div class="d-flex justify-content-end align-items-center">
      <a class="btn btn-primary" href="{{ route('anak-ranting-add') }}?ranting={{setRoute($ranting_data->id)}}">
         <i class="bi bi-plus me-1"></i>
         Tambah
      </a>
   </div>
   <div class="table-responsive mt-3">
      <table class="table table-borderless table-hover" id="anakrantingTable">
         <thead>
            <tr>
               <th scope="col">Nama Anak Ranting</th>
               <th scope="col">Alamat </th>
               <th scope="col">Aksi</th>
            </tr>
         </thead>
         <tbody>

         </tbody>
      </table>
   </div>
</div>
