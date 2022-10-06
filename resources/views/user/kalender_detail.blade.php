
@extends('user.template')
@section('judul', 'Testing')
@section('konten')

<?php
  $halaman = "akun";
?>


<div class="container mb-5">
    <center><h4><?= $text_tanggal ?></h4></center>
    <hr>
    
    <ul>
    	<?php foreach ($data as $key => $value): ?>
    		<li><?= $value->isi_kalender ?></li>
    	<?php endforeach ?>
    </ul>

</div> <!-- container-fluid, tm-container-content -->


@endsection()