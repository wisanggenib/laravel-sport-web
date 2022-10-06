
<?php $__env->startSection('judul', 'Testing'); ?>
<?php $__env->startSection('konten'); ?>


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
        <form method="POST" action="<?php echo e(route('pengelola_artikel_tambah_proses')); ?>" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <label>Judul Artikel</label>
            <input type="text" value="<?php echo e(old('judul')); ?>" name="judul" max="200" class="form-control" autocomplete="off" require>
            <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <div class="form-group">
            <label>Kategori Artikel</label>
            <select class="form-control select2bs4" name="kategori" style="width: 100%;">
              <option value="1">Kategori 1</option>
              <option value="2">Kategori 2</option>
            </select>
            <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <div class="form-group">
            <label>Isi Artikel</label>
            <textarea id="summernote" name="konten"><?php echo e(old('konten')); ?></textarea>
            <?php $__errorArgs = ['konten'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <div class="form-group">
            <label>Foto Thumbnail</label>
            <input type="file" class="form-control" name="foto_thumbnail">
            <?php $__errorArgs = ['foto_thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small><br> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Nikko\Project\portal\resources\views/admin/artikel_tambah.blade.php ENDPATH**/ ?>