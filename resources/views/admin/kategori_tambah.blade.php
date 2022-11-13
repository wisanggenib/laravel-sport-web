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
                <h1>Tambah Kategori Permainan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Kategori Permainan</li>
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
                <h3 class="card-title">Tambah Kategori Permainan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php notif() ?>
                <form method="POST" action="{{route('kategori_permainan_tambah_proses')}}">
                    {{-- <form method="POST" action="{{route('kategori_permainan_ubah_proses', $data->id_kategori)}}">
                        --}}
                        @csrf
                        <div class="form-group">
                            <label>Nama Kategori Permainan</label>
                            <input type="text" value="{{old('nama_kategori')}}" max="200" name="nama_kategori"
                                class="form-control" autocomplete="off" require>
                            @error('nama') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">Simpan Kategori</button>
                        </div>
                    </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</section>


@endsection()