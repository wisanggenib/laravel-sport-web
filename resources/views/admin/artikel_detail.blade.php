@extends('admin.template')
@section('judul', 'Testing')
@section('konten')


<?php
  $halaman = "artikel";
?>


<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<style>
  .note-group-select-from-files {
    display: none;
  }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Detail Artikel</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Detail Artikel</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
      <div class="card-body">

        <center>
          <img src="{{asset('storage/images/artikel/'.$data->gambar)}}" width="30%" alt="">
          <hr>
          <h5>{{$data->judul}}</h5>
        </center>
        Oleh : {{$data->nama}}
        <br />
        Kategori : {{$data->nama_kategori}}
        <hr>
        {!! $data->konten !!}

      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
</section>

<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      height: 300
    });
  });
</script>

@endsection()