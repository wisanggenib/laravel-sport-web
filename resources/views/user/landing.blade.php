@extends('user.template')
@section('judul', 'Testing')
@section('konten')

<?php
  $halaman = "akun";
?>


<div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll"
    data-image-src="{{asset('user/img/mobile_legends.jpg')}}">
    <form class="d-flex tm-search-form" style="display: flex;flex-direction:column">
        <!-- <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search"> -->
        <select name="kat" class="form-control tm-search-input" style="height: 50px;">
            <option <?php if(!$kat || $kat=='' ){echo "selected" ;} ?> value="">Semua Tournamen</option>
            <option <?php if($kat=='1' ){echo "selected" ;} ?> value="1">Tournamen Minor</option>
            <option <?php if($kat=='2' ){echo "selected" ;} ?> value="2">Tournamen Major</option>
        </select>
        <select name="kategori_permainan" class="form-control tm-search-input"
            style="height: 50px;margin-top:5px; margin-bottom:5px">
            <option <?php if(!$kp || $kp=='' ){echo "selected" ;} ?> value="">Semua Permainan</option>
            @foreach ($kategori_permainan as $item)
            <option <?php if($kp==$item->id_kategori ){echo "selected" ;} ?> value={{ $item->id_kategori }}>{{
                $item->nama_kategori }}</option>
            @endforeach
        </select>
        <button class="btn btn-outline-success tm-search-btn" type="submit" style="width: 100%">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>

@php
function renderTournamen ($value){
if($value == 1){
echo "Tournamen Minor";
}else{
echo "Tournamen Major";
}
}
@endphp
<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row tm-mb-90 tm-gallery">
        <?php foreach ($artikel as $key => $value): ?>
        <div class="col-md-4 col-12 mb-5" style="height: 100% !important">
            <div class="card" style="height: 100% !important;">
                <div class="card-body" style="text-align: justify; height: 100% !important; ">
                    <a href="{{route('user_detail_blog', $value->id_artikel, [])}}"><img
                            src="{{asset('storage/images/artikel/'.$value->gambar)}}" alt="Image" class="img-fluid"></a>
                    <br />
                    <b>{{$value->judul}}</b>
                    <br />
                    <b>Kategori : {{$value->nama_kategori}}</b>
                    <br />
                    <b>{{renderTournamen($value->kategori)}}</b>
                    <br>
                    <small>
                        <?= substr(strip_tags($value->konten),1,80); ?>...
                    </small> <a href="{{route('user_detail_blog', $value->id_artikel, [])}}">Selengkapnya</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div> <!-- row -->
    <!-- <div class="row tm-mb-90">
        <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
            <a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
            <a href="javascript:void(0);" class="btn btn-primary tm-btn-next">Next Page</a>
        </div>            
    </div> -->
</div> <!-- container-fluid, tm-container-content -->


@endsection()