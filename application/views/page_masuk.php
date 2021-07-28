<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Creative - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url('assets/')?>css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container"> 
            <div class="login-content">
                <div class="text-center">
                    <h1 class="h3 text-white mb-4">MASUK</h1>
                </div>
                <div class="login-form">
                    <?= $this->session->flashdata('message'); ?>
                    <form class="user" method="POST" action="<?= base_url('masuk'); ?>">
                    
                    <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" id="email" name="email" class="form-control" id="password" name="password" placeholder="Email">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    
                    </div>
                    <div class="row">

                    <div class="col-5">
                        <div class="form-group">

                            <label>Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>

                        </div>
                    
                    </div>
                    </div>

                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 mb-3">Masuk</button>

                        
                            <p>Tidak memiliki akun ? <a href="<?= base_url('masuk/daftar') ?>"> Daftar disini!</a>
                                Kembali ke Halaman Awal ? <a href="<?= base_url('') ?>"> Halaman Awal!</a></p>
                        
                                            </form>

                </div>
            </div>
        </div>
    </div>
 <!-- Footer-->
 <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021 - Company Name</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= base_url('assets/');?>js/scripts.js"></script>
    </body>
</html>