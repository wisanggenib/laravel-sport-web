@extends('user.template')
@section('judul', 'Testing')
@section('konten')

<?php
  $halaman = "akun";
?>


<div class="container mb-5">
    <hr>
    <div class="row">
        <div class="col-md-9">
            <?php notif() ?>
            <h3>{{$artikel->judul}}</h3>
            <h5>Kategori : {{ $artikel->nama_kategori }}</h5>
            <small>Tanggal Posting : {{$artikel->date}}</small>
            <hr>
            <div style="color : black !important; text-align: justify;">
                <?= $artikel->konten ?>
            </div>
            <hr>
            <?php //dd(session('id')) ?>
            <?php if (!empty(session('id'))): ?>
            <div class="card mb-2">
                <div class="card-body" style="background-color: #f7f7f7;">
                    <form method="POST" action="{{route('tambah_komentar_proses', $artikel->id_artikel)}}">
                        @csrf
                        <div class="form-group">
                            <textarea required class="form-control" rows="2" name="komentar"
                                placeholder="Tambah Komentar ... "></textarea>
                        </div>
                        <?php if (session('id') != NULL): ?>
                        <button type="submit"
                            class="btn p-0 pl-2 pr-2 btn-primary float-right"><small>Kirim</small></button>
                        <?php else: ?>
                        <button type="button"
                            class="btn p-0 pl-2 pr-2 btn-secondary float-right"><small>Kirim</small></button>
                        <?php endif ?>
                    </form>
                </div>
            </div>
            <?php endif ?>

            <?php foreach ($komentar as $key => $value): ?>
            <div class="card mb-2">
                <div class="card-body pt-3">
                    <label>{{ucwords($value->nama)}}</label> |
                    <small>{{date_format(date_create($value->date), 'd M y, H:i')}} WIB</small>
                    <?php if (session("id") == $value->id_user OR session('level') == 1): ?>
                    <a href="<?= route('hapus_komentar_proses', $value->id_komentar ) ?>"
                        onclick="confirm('Apakah anda yakin ingin menghapus?')"
                        class="badge badge-danger float-right">Hapus</a>
                    <?php endif ?>
                    <hr class="m-0">
                    <small>{{$value->konten}}</small>
                </div>
            </div>
            <?php endforeach ?>


        </div>
        <div class="col-md-3">
            <b>News Artikel</b>
            <hr>
            <?php foreach ($artikel_terbaru as $key => $value): ?>
            <div class="row">
                <div class="col-4 mt-1">
                    <a href="{{route('user_detail_blog', $value->id_artikel, [])}}"><img
                            src="{{asset('storage/images/artikel/'.$value->gambar)}}" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-8">
                    <small><a href="{{route('user_detail_blog', $value->id_artikel, [])}}"
                            style="color:black">{{$value->judul}}</a></small>
                </div>
            </div>
            <hr>
            <?php endforeach ?>
        </div>
    </div>



</div> <!-- container-fluid, tm-container-content -->


@endsection()