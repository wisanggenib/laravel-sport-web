
<?php $__env->startSection('judul', 'Testing'); ?>
<?php $__env->startSection('konten'); ?>

<?php
  $halaman = "akun";
?>


<div class="container mb-5">
    <hr>
    <div class="row">
        <div class="col-md-9">
            <?php notif() ?>
            <h3><?php echo e($artikel->judul); ?></h3>
            <small>Tanggal Posting : <?php echo e($artikel->date); ?></small>
            <hr>
            <div style="color : black !important; text-align: justify;">
                <?= $artikel->konten ?>
            </div>
            <hr>

            <?php if (!empty(session('id'))): ?>
                <div class="card mb-2">
                    <div class="card-body" style="background-color: #f7f7f7;">
                        <form method="POST" action="<?php echo e(route('tambah_komentar_proses', $artikel->id_artikel)); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <textarea required class="form-control" rows="2" name="komentar" placeholder="Tambah Komentar ... "></textarea>
                            </div>
                            <button type="submit" class="btn p-0 pl-2 pr-2 btn-primary float-right"><small>Kirim</small></button>
                        </form>
                    </div>
                </div>
            <?php endif ?>

            <?php foreach ($komentar as $key => $value): ?>
                <div class="card mb-2">
                    <div class="card-body pt-3">
                        <label><?php echo e(ucwords($value->nama)); ?></label> | 
                        <small><?php echo e(date_format(date_create($value->date), 'd M y, H:i')); ?> WIB</small>
                        <hr class="m-0">
                        <small><?php echo e($value->konten); ?></small>
                    </div>
                </div>
            <?php endforeach ?>


        </div>
        <div class="col-md-3">
            <b>Artikel Terbaru</b>
            <hr>
            <?php foreach ($artikel_terbaru as $key => $value): ?>
                <div class="row">
                    <div class="col-4 mt-1">
                        <a href="<?php echo e(route('user_detail_blog', $value->id_artikel, [])); ?>"><img src="<?php echo e(asset('storage/images/artikel/'.$value->gambar)); ?>" alt="Image" class="img-fluid"></a>
                    </div>
                    <div class="col-8">
                        <small><a href="<?php echo e(route('user_detail_blog', $value->id_artikel, [])); ?>" style="color:black"><?php echo e($value->judul); ?></a></small>
                    </div>
                </div>
                <hr>
            <?php endforeach ?>
        </div>
    </div>



</div> <!-- container-fluid, tm-container-content -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Nikko\Project\portal\resources\views/user/artikel_detail.blade.php ENDPATH**/ ?>