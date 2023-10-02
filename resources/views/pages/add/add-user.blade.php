@extends('layout.master')


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
<x-form :$method :$action >
    @csrf
  <x-slot:title>
    Tambah User
  </x-slot:title>
  @if(isset($data_user))
    <div class="col-md-12 mt-2">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" name="nama" value="{{$data_user->nama}}" required>
        <input type="hidden" name="id" value="{{ $data_user->id }}">
    </div>
    <div class="col-md-12 mt-2">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{$data_user->email}}" required>
    </div>
    <div class="col-md-6 mt-2">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto">
    </div>
    <div class="col-md-6 mt-2">
        <label for="userGroup" class="form-label">User Group</label>
        <select class="form-select" id="userGroup" name="user_group" required>
            <option selected disabled value="">--pilih user group--</option>
            @foreach ($user_group as $value)
                @if ($value->nama_grup)
                    <option value="{{$value->nama_grup}}" selected>{{$value->nama_grup}}</option>
                @else
                    <option value="{{$value->nama_grup}}">{{$value->nama_grup}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-md-12 mt-2">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="{{$data_user->password}}" required>
    </div>
    <div class="col-md-12 mt-2">
        <label for="confirmPass" class="form-label">Konfirmasi Password</label>
        <input type="password" class="form-control" id="confirmPass" value="{{$data_user->password}}" required>
    </div>
   @else
    <div class="col-md-12 mt-2">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" name="nama" required>
    </div>
    <div class="col-md-12 mt-2">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="col-md-6 mt-2">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto">
    </div>
    <div class="col-md-6 mt-2">
        <label for="userGroup" class="form-label">User Group</label>
        <select class="form-select" id="userGroup" name="user_group" required>
        <option selected disabled value="">--pilih user group--</option>
        @foreach ($user_group as $value)
                <option value="{{$value->nama_grup}}">{{$value->nama_grup}}</option>
        @endforeach
        </select>
    </div>
    <div class="col-md-12 mt-2">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="col-md-12 mt-2">
        <label for="confirmPass" class="form-label">Konfirmasi Password</label>
        <input type="password" class="form-control" id="confirmPass" required>
    </div>
   @endif
</x-form>

@endsection
