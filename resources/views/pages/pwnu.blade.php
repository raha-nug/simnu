@extends('layout.master')

@section('title',$title)
@section('username',$username)
@section('from',$from)


@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">PWNU Jawa Barat</div>
    <div class="card-body">
      <h5 class="card-title">Informasi Umum</h5>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Nama : </dt>
        </div>
        <div class="col-lg-9">
          <dd>{{ $name }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Alamat : </dt>
        </div>
        <div class="col-lg-9">
          <dd>Ini text Hallo</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Telepon :</dt>
        </div>
        <div class="col-lg-9">
          <dd>Ini text Hallo</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Email :</dt>
        </div>
        <div class="col-lg-9">
          <dd>Ini text Hallo</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <dt class="text-lg-end text-sm-start">Website :</dt>
        </div>
        <div class="col-lg-9">
          <dd>Ini text Hallo</dd>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <!-- Bordered Tabs Justified -->
      <ul
        class="nav nav-tabs nav-tabs-bordered d-flex pt-5"
        id="borderedTabJustified"
        role="tablist">
        <li class="nav-item flex-fill" role="presentation">
          <button
            class="nav-link w-100 active"
            id="pengurus-tab"
            data-bs-toggle="tab"
            data-bs-target="#bordered-justified-pengurus"
            type="button"
            role="tab"
            aria-controls="pengurus"
            aria-selected="true">
            Pengurus
          </button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button
            class="nav-link w-100"
            id="kepengurusan-tab"
            data-bs-toggle="tab"
            data-bs-target="#bordered-justified-kepengurusan"
            type="button"
            role="tab"
            aria-controls="kepengurusan"
            aria-selected="false">
            SK Kepengurusan
          </button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button
            class="nav-link w-100"
            id="lembaga-tab"
            data-bs-toggle="tab"
            data-bs-target="#bordered-justified-lembaga"
            type="button"
            role="tab"
            aria-controls="lembaga"
            aria-selected="false">
            Lembaga
          </button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button
            class="nav-link w-100"
            id="banom-tab"
            data-bs-toggle="tab"
            data-bs-target="#bordered-justified-banom"
            type="button"
            role="tab"
            aria-controls="banom"
            aria-selected="false">
            Banom
          </button>
        </li>
      </ul>
      <div class="tab-content pt-2" id="borderedTabJustifiedContent">
        <div
          class="tab-pane fade show active"
          id="bordered-justified-pengurus"
          role="tabpanel"
          aria-labelledby="pengurus-tab">
          Sunt est soluta temporibus accusantium neque nam maiores cumque
          temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt
          iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi
          sed ea saepe at unde.
        </div>
        <div
          class="tab-pane fade"
          id="bordered-justified-kepengurusan"
          role="tabpanel"
          aria-labelledby="kepengurusan-tab">
          Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure
          eos quia. Accusantium distinctio omnis et atque fugiat. Itaque
          doloremque aliquid sint quasi quia distinctio similique. Voluptate
          nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
        </div>
        <div
          class="tab-pane fade"
          id="bordered-justified-lembaga"
          role="tabpanel"
          aria-labelledby="lembaga-tab">
          Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi
          debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis
          magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet
          ipsum iure. Dignissimos fuga tempore dolor.
        </div>
        <div
          class="tab-pane fade"
          id="bordered-justified-banom"
          role="tabpanel"
          aria-labelledby="banom-tab">
          empore dolor.
        </div>
      </div>
      <!-- End Bordered Tabs Justified -->
    </div>
  </div>
</div>

@endsection
