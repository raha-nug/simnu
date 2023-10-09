@extends('layout.master')


@section('title',$title)
@section('username',$username)
@section('from',$from)

@section('pagetitle')
<div class="pagetitle">
  <h1>{{ $title }}</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">Home</a></li>
      <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
  </nav>
</div>
@endsection

@section('content')
        <div class="container">
        <div class="card">
            <div class="card-header">
                Filter By Locations
            </div>
            <div class="card-body">

                <div class="row mt-4 mb-5">
                    <div class="col-lg-2">
                        <label for="pcnu" class="form-label">PCNU</label>
                        <select class="form-select" id="pcnu" required>
                            <option disabled selected></option>
                            <option>Kabupaten Tasikmalaya</option>
                            <option>Kota Tasikmalaya</option>
                        </select>
                    </div>
                    <div class="col-lg-2 d-none" id="mwc">
                        <label for="mwcnu" class="form-label">MWCNU</label>
                        <select class="form-select" id="mwcnu" required>
                            <option disabled selected></option>
                            <option >None</option>
                            <option>Singaparna</option>
                        </select>
                    </div>
                    <div class="col-lg-2 d-none" id="ranting">
                        <label for="rantingnu" class="form-label">Ranting</label>
                        <select class="form-select" id="rantingnu" required>
                            <option disabled selected></option>
                            <option >None</option>
                            <option>Cipakat</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" required>
                            <option disabled selected></option>
                            <option>Lengkap</option>
                            <option>Belum Lengkap</option>
                        </select>
                    </div>
                    <div class="col-lg-2 d-flex align-items-end">
                        <a class="btn btn-primary me-3" href="" id="filter">
                        <i class="bi bi-funnel me-1"></i>
                        Filter
                        </a>
                    </div>
                    
                </div>
                <div class="table-responsive d-none" id="table">
                    <table class="table table-borderless table-hover datatable">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>  
                         
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-page')
<script>
       const filter = document.getElementById('filter')
       const table = document.getElementById('table')
       filter.addEventListener('click', function(e){
        e.preventDefault()
        table.classList.remove('d-none')
       })

    document.getElementById('pcnu').addEventListener('change', function() {
       const selectedPCNU = this.value
       const mwc = document.getElementById('mwc')
       const mwcnu = document.getElementById('mwcnu')
       const ranting = document.getElementById('ranting')
       const rantingnu = document.getElementById('rantingnu')

       if(selectedPCNU){
           mwc.classList.remove('d-none')
       }

       mwcnu.addEventListener('change', function(){
        if(mwcnu.value !== 'None'){
            ranting.classList.remove('d-none')
        }
        else{
            mwc.classList.add('d-none')
            ranting.classList.add('d-none')
        }
       })

       rantingnu.addEventListener('change', function(){
        if(rantingnu.value !== 'None'){
            ranting.classList.remove('d-none')
        }
        else{
            ranting.classList.add('d-none')
        }
       })

    })
</script>
@endsection