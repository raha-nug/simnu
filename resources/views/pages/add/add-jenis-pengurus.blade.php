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
    Tambah Jenis Pengurus
  </x-slot:title>
  @if(isset($data_jp))
    <div class="col-md-12">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" name="nama_jp" value="{{$data_jp->nama_jp}}" id="nama">
      <input type="hidden" name="id" value="{{ $data_jp->id }}">
    </div>
    @else
    <div class="col-md-12">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" name="nama_jp" id="nama">
    </div>
    @endif
</x-form>

@endsection
