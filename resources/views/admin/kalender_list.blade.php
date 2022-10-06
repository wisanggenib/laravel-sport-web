@extends('admin.template')
@section('judul', 'Testing')
@section('halaman', 'artikel')
@section('konten')
<?php  
  $halaman = "kalender";
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
          <h1>Kalender Kita</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Kalender</li>
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
            <a href="{{route('pengelola_kalender_tambah')}}" class="btn btn-sm btn-block btn-primary">Tambah Kalender</a>
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
                <th>Tanggal</th>
                <th>Kalender</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($list as $key => $value): ?>
                <tr>
                  <td>{{$value->tgl_kalender}}</td>
                  <td><?= $value->isi_kalender ?></td>
                  <td>
                      <!-- <a href="{{route('pengelola_artikel_edit', $value->id_kalender, [])}}" class="badge badge-info">edit</a> -->
                      <a href="#" data-id="{{$value->id_kalender}}" class="badge badge-danger btn_hapus">Hapus</a>
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
            window.location.href = '{{route("pengelola_kalender_hapus_proses", "")}}/'+id;
          }
        },
        Tidak: function () {
        }
      }
    });
  })
</script>


@endsection()