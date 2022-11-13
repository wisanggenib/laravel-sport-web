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
        <h1>Kategori Artikel</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Kategori Artikel</li>
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
        <div class="row">
          <div class="col-md-2 mb-2">
            <a href="{{route('pengelola_artikel_kat_tambah')}}" class="btn btn-sm btn-block btn-primary">Tambah
              Kategori</a>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <?php notif() ?>
        <div class="table-responsive">
          <table class="table_data table">
            <thead class="thead-dark">
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($list as $key => $value): ?>
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$value->nama_kategori}}</td>
                <td>
                  <a href="{{route('pengelola_artikel_kat_edit', $value->id_artikel_kategori, [])}}"
                    class="badge badge-info">Ubah</a>
                  <a href="#" data-id="{{$value->id_artikel_kategori}}" class="badge badge-danger btn_hapus">Hapus</a>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card-body -->
    </div>

  </div>
  <!-- /.container-fluid -->
</section>


<script>
  $(document).ready( function () {
      $('.table_data').DataTable();
  } );

  $(".btn_hapus").click(function(){
    var elemen = $(this);
    $.confirm({
      title: 'Hapus',
      content: 'Apakah anda yakin ingin menghapus data ini?',
      type: 'red',
      typeAnimated: true,
      buttons: {
        Ya: {
          text: 'Ya',
          btnClass: 'btn-red',
          action: function(){
            $.alert('Mohon Tunggu');
            var id = $(elemen).attr('data-id');
            // alert(id);
            window.location.href = '{{route("pengelola_artikel_kat_hapus_proses", "")}}/'+id;
          }
        },
        Tidak: function () {
        }
      }
    });
  })
</script>

@endsection