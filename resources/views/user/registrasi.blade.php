@extends('user.template')
@section('judul', 'Testing')
@section('konten')

<?php
  $halaman = "akun";
?>


<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row tm-mb-90 justify-content-center">
    
      <div class="col-md-6">
        <div class="card">
          <div class="card-body" style="box-shadow: 0px 0px 5px #00000040">
            <center><b>Registrasi</b></center>
            <hr>
            <?php notif() ?>
            <form method="POST" action="{{route('user_registrasi_proses')}}">
              @csrf
              <div class="form-group">
                <label>Nama</label>
                <input type="text" value="{{old('nama')}}" max="200" name="nama" class="form-control" autocomplete="off" require>
                @error('nama') <small class="text-danger">{{$message}}</small> @enderror
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" value="{{old('username')}}" max="200" name="username" class="form-control" autocomplete="off" require>
                @error('username') <small class="text-danger">{{$message}}</small> @enderror
              </div>
              <div class="form-group">
                <label>Email Akun</label>
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
              <hr>
              <button class="btn btn-primary btn-block">Daftar</button>
            </form>
            
          </div>
        </div>
      </div>

    </div> <!-- row -->
    <!-- <div class="row tm-mb-90">
        <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
            <a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
            <a href="javascript:void(0);" class="btn btn-primary tm-btn-next">Next Page</a>
        </div>            
    </div> -->
</div> <!-- container-fluid, tm-container-content -->


@endsection()