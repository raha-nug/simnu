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
      <table class="table table-borderless table-hover datatable">
         <thead>
            <tr>
               <th scope="col">No</th>
               <th scope="col">No Surat</th>
               <th scope="col">Masa Jabatan</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($sk as $value)
            <tr>
               <th scope="row">{{$nomor++}}</th>
               <td><a href="{{route('sk_detail')}}?sk={{setRoute($value->id)}}">{{$value->no_dokumen}}</a></td>
               <td>{{$value->tanggal_mulai}} - {{$value->tanggal_berakhir}}</td>
            </tr>
            @endforeach
            <tr>
               <th scope="row">2</th>
               <td><a href="">790/A.II.04/11/2021</a></td>
               <td>24 Nov 2021 - 24 Nov 2026</td>
            </tr>
         </tbody>
      </table>
   </div>
</div>
