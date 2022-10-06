@extends('admin.template')
@section('judul', 'Testing')
@section('konten')

<?php
  $halaman = "akun";
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
        <form method="POST" action="{{route('pengelola_akun_tambah_proses')}}">
          @csrf
          <div class="form-group">
            <label>Nama</label>
            <input type="text" value="{{old('nama')}}" max="200" name="nama" class="form-control" autocomplete="off" require>
            @error('nama') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" value="{{old('email')}}" max="200" name="email" class="form-control" autocomplete="off" require>
            @error('email') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group">
            <label>Password Akun</label>
            <input type="password" value="" max="200" name="password" class="form-control" autocomplete="off" require>
            @error('password') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group">
            <label>Konfirmasi Password Akun</label>
            <input type="password" value="" max="200" name="password_konfirmasi" class="form-control" autocomplete="off" require>
            @error('password_konfirmasi') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group">
            <label>Level Akun</label>
            <select class="form-control select2bs4" name="level" style="width: 100%;">
              <option value="1">Super Admin</option>
              <option value="2">Admin</option>
            </select>
            @error('level') <small class="text-danger">{{$message}}</small><br> @enderror
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