@extends('admin.template')
@section('judul', 'Testing')
@section('konten')

<?php
  $halaman = "artikel_kategori";
?>



<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tambah Akun</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Tambah Akun</li>
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
        <h3 class="card-title">Tambah Akun</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <?php notif() ?>
        <form method="POST" action="{{route('pengelola_artikel_kat_edit_proses', $data->id_artikel_kategori)}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Username Akun</label>
            <input type="text" value="{{$data->nama_kategori}}" max="200" name="nama" class="form-control" autocomplete="off" require>
            @error('nama') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <hr>
          <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary">Simpan Akun</button>
          </div>
        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
</section>

@endsection()