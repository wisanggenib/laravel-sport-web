
@extends('user.template')
@section('judul', 'Testing')
@section('konten')

<?php
  $halaman = "akun";
?>



<style type="text/css"> 
  .crd_shdw{
    box-shadow: 3px 3px 5px #00000030;
  }
  .ui-datepicker-calendar {
    display: none;
  }



  header {
    display: flex;
    align-items: center;
    font-size: calc(16px + (26 - 16) * ((100vw - 300px) / (1600 - 300)));
    justify-content: center;
    margin-bottom: 2em;
    background: #000;
    color: #fff;
    min-height: 10vh;
    text-align: center;
  }

  ul.weekdays, .day-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    grid-gap: 1em;
    margin: 0 auto;
    max-width: 64em;
    padding: 0;
  }

  .day-grid li, .weekdays li {
    display: flex;
    align-items: center;
    justify-content: center;
    list-style: none;
    margin-left: 0;
    font-size: calc(16px + (21 - 16) * ((100vw - 300px) / (1600 - 300)));
  }

  ul.weekdays {
    margin-bottom: 1em;
  }

  ul.weekdays li {
    height: 4vw;
  }

  .day-grid.day-grid li {
    background-color: #eaeaea;
    border: 1px solid #eaeaea;
    height: 12vw;
    max-height: 125px;
  }

  ul.weekdays abbr[title] {
    border: none;
    font-weight: 800;
    text-decoration: none;
  }

 /* .day-grid.day-grid li:nth-child(1),
  .day-grid.day-grid li:nth-child(2),
  .day-grid.day-grid li:nth-child(3),
  .day-grid.day-grid li:nth-child(34),
  .day-grid.day-grid li:nth-child(35) {
    background-color: #fff;
  }
*/
  @media all and (max-width: 800px) {
    ul.weekdays, .day-grid {
      grid-gap: .25em;
    }

    ul.weekdays li {
      font-size: 0;
    }

    ul.weekdays > li abbr:after {
      content: attr(title);
      font-size: calc(16px + (26 - 16) * ((100vw - 300px) / (1600 - 300)));
      text-align: center;
    }

  }

  .badge_keberangkatan{
    position: absolute; margin-top: -30px; margin-left: 20px;
  }

  @media only screen and (max-width: 1300px) {
    .badge_keberangkatan{
      position: absolute; margin-top: -30px; margin-left: 15px;
      padding: 2px;
    }
  }

  @media only screen and (max-width: 900px) {
    .badge_keberangkatan{
      position: absolute; margin-top: -20px; margin-left: 15px;
      padding: 2px;
    }
  }

  @media only screen and (max-width: 600px) {
    .badge_keberangkatan{
      position: absolute; margin-top: -8px; margin-left: 0px;
      padding: 2px;
    }
  }

  .bg_white{
    background-color: #fff !important;
  }

</style>


<?php 
  
  if (isset($_GET['tanggal'])) {
    $date = date_create($_GET['tanggal']);
    $bulan =  date_format($date,"m");
    $tahun =  date_format($date,"Y");
  }else{
    $bulan = date('m');
    $tahun = date('Y');
    $_GET['tanggal'] = date('M-Y');
  }

  $jml_tanggal =  $number = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
  $date_strtotime = strtotime($_GET['tanggal']);
  $hari_awal = date('w', $date_strtotime);

  if ($hari_awal == 1) {
    $perulangan_awal = 1;
  }elseif($hari_awal == 2){
    $perulangan_awal = 0;
  }elseif($hari_awal == 3){
    $perulangan_awal = -1;
  }elseif($hari_awal == 4){
    $perulangan_awal = -2;
  }elseif($hari_awal == 5){
    $perulangan_awal = -3;
  }elseif($hari_awal == 6){
    $perulangan_awal = -4;
  }elseif($hari_awal == 0){
    $perulangan_awal = -5;
  }

  foreach ($data as $key => $value) {
    $keberangkatan[$value->tgl_kalender] = $value->jml;
  }

?>


<div class="container mb-5">
    <center><h1><?= $text_tanggal ?></h1></center>
    <hr>
    <div class="calendar">
      
      <ul class="weekdays">
        <li>
          <abbr title="S">Senin</abbr>
        </li>
        <li>
          <abbr title="S">Selasa</abbr>
        </li>
        <li>
          <abbr title="R">Rabu</abbr>
        </li>
        <li>
          <abbr title="K">Kamis</abbr>
        </li>
        <li>
          <abbr title="J">Jumat</abbr>
        </li>
        <li>
          <abbr title="S">Sabtu</abbr>
        </li>
        <li>
          <abbr title="M">Minggu</abbr>
        </li>
      </ul>

      <ol class="day-grid">
        
        <?php for ($i= $perulangan_awal; $i <= 31; $i++) : ?>
          <?php

            if (strlen($i) == 1) {
              $day_loop = "0".$i;
            }else{
              $day_loop = $i;
            }

            $tgl_loop = $tahun."-".$bulan."-".$day_loop;
            
            if (!isset($keberangkatan[$tgl_loop])) {
              $keberangkatan[$tgl_loop] = 0;
            }

          ?>
          <?php if ($i < 1): ?>
            <li class="bg_white"></li>
          <?php else: ?>
            <li>
              <a href="<?= route('kalender_detail',$tgl_loop); ?>">
                <?= $i ?> 
                <span class="badge badge-<?= ($keberangkatan[$tgl_loop]<1)?'secondary':'success' ?> badge_keberangkatan" ><small><?= number_format($keberangkatan[$tgl_loop]) ?></small></span>
              </a>
            </li>
          <?php endif ?>
        <?php endfor ?>

      </ol>
        
    </div>

    <div class="row justify-content-center mt-4">
      <div class="col-md-7">
        <div class="row">
          <div class="col-6">
            <a href="<?= route('kalender') ?>?tanggal=<?= date("M-Y", strtotime("-1 month", strtotime(date_format(date_create($_GET['tanggal']),"Y-m")) )) ?>" class="btn btn-outline-primary btn-block">Sebelumnya</a>
          </div>
          <div class="col-6">
            <a href="<?= route('kalender') ?>?tanggal=<?= date("M-Y", strtotime("+1 month", strtotime(date_format(date_create($_GET['tanggal']),"Y-m")) )) ?>" class="btn btn-outline-primary btn-block">Selanjutnya</a>
          </div>
        </div>
      </div>
    </div>

</div> <!-- container-fluid, tm-container-content -->


@endsection()