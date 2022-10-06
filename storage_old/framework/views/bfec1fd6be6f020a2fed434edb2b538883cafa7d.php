<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Sport</title>
    <!-- <link rel="stylesheet" href="<?php echo e(asset('user/css/bootstrap.min.css')); ?>"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('user/fontawesome/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('user/css/templatemo-style.css')); ?>">
</head>
<body>

    <section class="mb-3" style="box-shadow: 0px 5px 3px #00000040">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?php echo e(route('landing')); ?>">
                        <b>SPORT NEWS</b>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                        <!-- <li class="nav-item">
                            <a class="nav-link nav-link-1 active" aria-current="page" href="index.html">Photos</a>
                        </li> -->
                        <?php if ( session('level') == "0" ): ?>
                            <li class="nav-item">
                                <a class="nav-link nav-link-2" href="<?php echo e(route('user_profile')); ?>"><?php echo e(ucwords(session('nama'))); ?>s</a>
                            </li>
                            <?php if (session('status') == "1" ): ?>
                                <li class="nav-item">
                                    <a class="nav-link nav-link-2" href="<?php echo e(route('pengelola_artikel_list')); ?>">Kelola Artikel</a>
                                </li>
                            <?php endif ?>
                            <li class="nav-item">
                                <a class="nav-link nav-link-2" href="<?php echo e(route('logout')); ?>">Logout</a>
                            </li>
                        <?php else: ?>                                          
                            <li class="nav-item">
                                <a class="nav-link nav-link-2" href="<?php echo e(route('user_login')); ?>">Login</a>
                            </li>
                        <?php endif ?>                        
                    </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    <div class="container">
        <section>
            <?php echo $__env->yieldContent('konten'); ?>
        </section>

    </div>
    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">SPORT NEWS</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    </p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                        <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                        <li class="mb-2"><a href="https://pinterest.com"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <a href="#" class="tm-text-gray text-right d-block mb-2">Terms of Use</a>
                    <a href="#" class="tm-text-gray text-right d-block">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="<?php echo e(asset('user/js/plugins.js')); ?>"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>
</html><?php /**PATH D:\Nikko\Project\portal\resources\views/user/template.blade.php ENDPATH**/ ?>