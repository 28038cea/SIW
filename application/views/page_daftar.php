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
                    <h1 class="h3 text-white mb-4">DAFTAR</h1>
                </div>
                <div class="login-form">
                    <form class="user" method="POST" action="<?= base_url('masuk/daftar'); ?>">
                        <div class="form-group"> 
                            <label>Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password1" name="password1" class="form-control" placeholder="Password">
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>

                        </div>
                        <div class="form-group">
                            <label>Ulangi Password</label>
                            <input type="password" id="password2" name="password2" class="form-control" placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 mb-3">Daftar</button>


                        <div class="register-link m-t-15 text-center">
                            <p>Sudah memiliki akun ? <a href="<?= base_url('masuk') ?>"> Masuk!</a>
                                </br>Kembali ke Halaman Awal ? <a href="<?= base_url('') ?>"> Halaman Awal!</a></p>
                        </div>
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