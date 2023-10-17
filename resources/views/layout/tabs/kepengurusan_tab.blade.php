<div class="tab-pane fade mt-3" id="bordered-justified-kepengurusan" role="tabpanel" aria-labelledby="kepengurusan-tab">
   <div class="d-flex justify-content-end align-items-center  me-3">
    @if($pw_detail->id ?? null)
        <a class="btn btn-primary" href="{{route('add_sk')}}?pw={{setRoute($pw_detail->id)}}">
    @elseif($pc_data->id ?? null)
      <a class="btn btn-primary" href="{{route('add_sk')}}?pc={{setRoute($pc_data->id)}}">
    @elseif($mwc_data->id ?? null)
      <a class="btn btn-primary" href="{{route('add_sk')}}?mwc={{setRoute($mwc_data->id)}}">
    @endif
         <i class="bi bi-plus me-1"></i>
         Tambah
      </a>
   </div>

   <div class="table-responsive">
      <table class="table table-borderless table-hover" id="SkTable">
         <thead>
            <tr>
               <th scope="col">No</th>
               <th scope="col">No Surat</th>
               <th scope="col">Masa Jabatan</th>
            </tr>
         </thead>
         <tbody>

         </tbody>
      </table>
   </div>
</div>
