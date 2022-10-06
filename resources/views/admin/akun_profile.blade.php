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
        <h1>Ubah Password</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Ubah Password</li>
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
      <!-- /.card-header -->
      <div class="card-body">
        <?php notif() ?>
        <form method="POST" action="{{route('pengelola_edit_password')}}">
          @csrf
          <div class="form-group">
            <label>Password Lama</label>
            <input type="password" value="{{old('pass_lama')}}" max="200" name="pass_lama" class="form-control" autocomplete="off" require>
            @error('pass_lama') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group">
            <label>Password Baru</label>
            <input type="password" value="{{old('pass_baru')}}" max="200" name="pass_baru" class="form-control" autocomplete="off" require>
            @error('pass_baru') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group">
            <label>Konfirmasi Password Baru</label>
            <input type="password" value="" max="200" name="pass_baru_cnf" class="form-control" autocomplete="off" require>
            @error('pass_baru_cnf') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <hr>
          <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
</section>


@endsection()