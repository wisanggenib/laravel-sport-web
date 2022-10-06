@extends('admin.template')
@section('judul', 'Testing')
@section('konten')


<?php
  $halaman = "kalender";
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
        <h1>Tambah Kalender</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Tambah Kalender</li>
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
      <div class="card-header">
        <h3 class="card-title">Tambah Kalender</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form method="POST" action="{{route('pengelola_kalender_tambah_proses')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Tanggal Kalender</label>
            <input type="date" value="{{old('tanggal')}}" name="tanggal" max="200" class="form-control" autocomplete="off" required>
            @error('tanggal') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group">
            <label>Isi Kalender</label>
            <textarea id="summernote" name="konten">{{old('konten')}}</textarea>
            @error('konten') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <hr>
          <div class="form-group">
            <button class="btn btn-block btn-primary">Simpan Kalender</button>
          </div>
        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
</section>


<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      height: 100,
      toolbar: [
        // [groupName, [list of button]]
        ['Insert', ['link']],
      ]
    });
  });
</script>

@endsection()