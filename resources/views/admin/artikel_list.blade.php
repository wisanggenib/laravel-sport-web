@extends('admin.template')
@section('judul', 'Testing')
@section('halaman', 'artikel')
@section('konten')
<?php  
  $halaman = "artikel";
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <?php if (@$_GET['list'] == "persetujuan"): ?>
          <h1>Artikel Memerlukan Persetujuan</h1>
        <?php elseif(@$_GET['list'] == "ditolak"): ?>
          <h1>Artikel Ditolak</h1>
        <?php else: ?>
          <h1>Artikel Tayang</h1>
        <?php endif ?>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Artikel</li>
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
          <div class="col-md-3 mb-2">
            <a href="{{route('pengelola_artikel_tambah')}}" class="btn btn-sm btn-block btn-primary">Tambah Artikel</a>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <?php notif() ?>
        <div class="table-responsive">
          <table class="table table_data">
            <thead class="thead-dark">
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Dibuat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($list as $key => $value): ?>
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value->judul}}</td>
                  <td>{{$value->nama}}</td>
                  <td>
                    <a href="{{route('pengelola_artikel_detail', $value->id_artikel, [])}}" class="badge badge-primary">Detail</a>
                      <a href="{{route('pengelola_artikel_edit', $value->id_artikel, [])}}" class="badge badge-info">edit</a>
                      <a href="#" data-id="{{$value->id_artikel}}" class="badge badge-danger btn_hapus">Hapus</a>
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
            window.location.href = '{{route("pengelola_artikel_hapus_proses", "")}}/'+id;
          }
        },
        Tidak: function () {
        }
      }
    });
  })
</script>


@endsection()