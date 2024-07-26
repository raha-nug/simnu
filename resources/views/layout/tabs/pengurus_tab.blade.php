<div class="tab-pane fade show active mt-3" id="bordered-justified-pengurus" role="tabpanel" aria-labelledby="pengurus-tab">
   <div class="table-responsive">
      <table class="table table-borderless table-hover datatable">
         <thead>
            <tr>
               {{-- <th scope="col">No</th> --}}
               <th scope="col">Nama</th>
               <th scope="col">Pengurus</th>
               <th scope="col">Jabatan</th>
               <th scope="col">Periode</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($pengurus as $value)
            <tr>
                <th scope="row"><a href="{{ route('detail_pengurus') }}?pengurus={{ setRoute($value->id) }}">{{ $value->nama }}</a></th>
                <td>{{$value->jenis_pengurus ?? "-"}}</td>
                <td>{{$value->jabatan}}</td>
                <td>{{$value->mulai_jabatan}} - {{$value->akhir_jabatan}}</td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>
