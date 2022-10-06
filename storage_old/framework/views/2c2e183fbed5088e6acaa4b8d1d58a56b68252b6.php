
<?php $__env->startSection('judul', 'Testing'); ?>
<?php $__env->startSection('konten'); ?>

<?php
  $halaman = "akun";
?>


<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row tm-mb-90 justify-content-center">
    
      <div class="col-md-6">
        <div class="card">
          <div class="card-body" style="box-shadow: 0px 0px 5px #00000040">
            <center><b>LOGIN</b></center>
            <hr>
            <?php notif() ?>
            <form method="POST" action="<?php echo e(route('user_login_proses')); ?>">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>
              Belum punya akun? <a href="<?php echo e(route('user_registrasi')); ?>">Daftar</a>
              <hr>
              <button class="btn btn-primary btn-block">Login</button>
            </form>
            
          </div>
        </div>
      </div>

    </div> <!-- row -->
    <!-- <div class="row tm-mb-90">
        <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
            <a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
            <a href="javascript:void(0);" class="btn btn-primary tm-btn-next">Next Page</a>
        </div>            
    </div> -->
</div> <!-- container-fluid, tm-container-content -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Nikko\Project\portal\resources\views/user/login.blade.php ENDPATH**/ ?>