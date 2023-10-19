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
      <li class="breadcrumb-item"><a href="/admin">PWNU</a></li>
      <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
  </nav>
</div>
@endsection

@section('content')
<x-form :$method :$action>
    @csrf
  <x-slot:title>
    Tambah Indikator
  </x-slot:title>
  @if(isset($data_i))
    <div class="col-md-12 mt-2">
      <label for="nama-banom" class="form-label">Nama Indikator</label>
      <input type="text" name="nama_indikator" class="form-control" value="{{$data_i->nama_indikator}}">
      <input type="hidden" name="id" value="{{$data_i->id}}">
    </div>
    @else
    <div class="col-md-12 mt-2">
      <label for="nama-banom" class="form-label">Nama Indikator</label>
      <input type="text" name="nama_indikator" class="form-control">
    </div>
    @endif
</x-form>
@endsection
