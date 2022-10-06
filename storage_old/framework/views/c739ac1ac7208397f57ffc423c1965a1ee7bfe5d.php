
<?php $__env->startSection('judul', 'Testing'); ?>
<?php $__env->startSection('konten'); ?>

<?php
  $halaman = "akun";
?>


<div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="<?php echo e(asset('user/img/hero.jpg')); ?>">
    <form class="d-flex tm-search-form">
        <!-- <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search"> -->
        <select name="kat" class="form-control tm-search-input" style="height: 50px;">
            <option value="">Semua Kategori</option>
            <option value="1">Kategori 1</option>
            <option value="2">Kategori 2</option>
        </select>
        <button class="btn btn-outline-success tm-search-btn" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>

<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row tm-mb-90 tm-gallery">
        <?php foreach ($artikel as $key => $value): ?>
        	<div class="col-md-4 col-12 mb-5" style="height: 100% !important">
                <div class="card" style="height: 100% !important;">
                    <div class="card-body" style="text-align: justify; height: 100% !important; ">
                        <a href="<?php echo e(route('user_detail_blog', $value->id_artikel, [])); ?>"><img src="<?php echo e(asset('storage/images/artikel/'.$value->gambar)); ?>" alt="Image" class="img-fluid"></a>
                        <b><?php echo e($value->judul); ?></b>
                        <br>
                        <small>
                            <?= substr(strip_tags($value->konten),1,80); ?>...
                        </small> <a href="<?php echo e(route('user_detail_blog', $value->id_artikel, [])); ?>">Selengkapnya</a>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Nikko\Project\portal\resources\views/user/landing.blade.php ENDPATH**/ ?>