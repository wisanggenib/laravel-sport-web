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
        <h1>Tambah Artikel</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Tambah Artikel</li>
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
        <h3 class="card-title">Tambah Artikel</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form method="POST" action="{{route('pengelola_artikel_edit_proses', $data->id_artikel)}}"
          enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Judul Artikel</label>
            <input type="text" value="{{$data->judul}}" name="judul" max="200" class="form-control" autocomplete="off"
              require>
            @error('judul') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group">
            <label>Kategori Artikel</label>
            <select class="form-control select2bs4" name="kategori" style="width: 100%;">
              <option value="1">Tournamen Minor</option>
              <option value="2">Tournamen Major</option>
            </select>
            @error('kategori') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group">
            <label>Kategori Artikel</label>
            <select class="form-control select2bs4" name="kategori_permainan" style="width: 100%;">
              <option value="" disabled <?php if(!$data->id_kategori){echo "selected";} ?>>Pilih Kategori Permainan
              </option>
              @foreach ($kategori_permainan as $item)
              <option <?php if($data->id_kategori == $item->id_kategori){echo "selected";} ?> value={{
                $item->id_kategori }}>{{ $item->nama_kategori }}</option>
              @endforeach

            </select>
            @error('kategori') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group">
            <label>Isi Artikel</label>
            <textarea id="summernote" name="konten">{{$data->konten}}</textarea>
            @error('konten') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group">
            <img src="{{asset('storage/images/artikel/'.$data->gambar)}}" width="100px" alt="">
            <br>
            <label>Foto Thumbnail</label>
            <input type="file" class="form-control" name="foto_thumbnail">
            <small>Kosongkan jika tidak ingin diubah</small>
            @error('foto_thumbnail') <small class="text-danger">{{$message}}</small><br> @enderror
          </div>
          <hr>
          <div class="form-group">
            <button class="btn btn-block btn-primary">Simpan Artikel</button>
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
      height: 300
    });
  });
</script>

@endsection()