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
          <center><b>MASUK</b></center>
          <hr>
          <?php notif() ?>
          <form method="POST" action="{{route('user_login_proses')}}">
            @csrf
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            Belum punya akun? <a href="{{route('user_registrasi')}}">Daftar</a>
            <hr>
            <button class="btn btn-primary btn-block">Masuk</button>
          </form>


          <a class="btn btn-danger"
            style="width: 100%; margin-top:30px;height: 50px;justify-content:center;text-align:center;align-items:center;display:flex;border-radius:10px"
            href="{{ '/auth/redirect'}}">
            <span>Masuk Dengan Akun Google</span>
          </a>
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