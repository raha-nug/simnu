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
<x-form :$method :$action>
    @csrf
  <x-slot:title>
    Tambah Master Banom
  </x-slot:title>
  @if(isset($data_mb))
    <div class="col-md-12">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" name="nama_banom" value="{{$data_mb->nama_banom}}" id="nama">
      <input type="hidden" name="id" value="{{$data_mb->id}}">
    </div>
    <div class="col-md-12">
      <label for="banomBase" class="form-label">Banom Base</label>
      <select name="nama_banom_basis" id="" class="form-select">
        <option value="" selected disabled>-- pilih banom base --</option>
        @foreach ($banom_basis as $value)
            @if($value->nama_banom_basis)
            <option value="{{$value->nama_banom_basis}}" selected>{{$value->nama_banom_basis}}</option>
            @else
            <option value="{{$value->nama_banom_basis}}">{{$value->nama_banom_basis}}</option>
            @endif
        @endforeach
      </select>
    </div>
    @else
    <div class="col-md-12">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama_banom" id="nama">
      </div>
      <div class="col-md-12">
        <label for="banomBase" class="form-label">Banom Base</label>
        <select name="nama_banom_basis" id="" class="form-select">
          <option value="" selected disabled>-- pilih banom base --</option>
          @foreach ($banom_basis as $value)
              <option value="{{$value->nama_banom_basis}}">{{$value->nama_banom_basis}}</option>
          @endforeach
        </select>
      </div>
      @endif
</x-form>

@endsection
