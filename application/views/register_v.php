<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/images/favicon.png">
    <title> Register - Chika Wedding</title>
    <link href="<?= base_url() ?>assets/css/themify-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/flaticon.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/magnific-popup.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/owl.carousel.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/owl.theme.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/slick.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/slick-theme.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/swiper.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/nice-select.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/owl.transitions.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/jquery.fancybox.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/odometer-theme-default.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/auth-pages.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
</head>


<body>
    <!-- start preloader -->
    <div class="preloader">
        <div class="vertical-centered-box">
            <div class="content">
                <div class="loader-circle"></div>
                <div class="loader-line-mask">
                    <div class="loader-line"></div>
                </div>
                <img src="<?= base_url() ?>assets/images/favicon.png" alt="">
            </div>
        </div>
    </div>
    <!-- end preloader -->
    <div class="wpo-login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form class="wpo-accountWrapper" method="post" action="<?= base_url('auth/register') ?>">
                        <div class="wpo-accountInfo">
                            <div class="wpo-accountInfoHeader">
                                <a href="#"><img src="<?= base_url() ?>assets/images/logo-2.png" alt=""></a>
                                <a class="wpo-accountBtn" href="<?= base_url('auth') ?>">
                                    <span class="">Log in</span>
                                </a>
                            </div>
                            <div class="image">
                                <img src="<?= base_url() ?>assets/images/login.svg" alt="">
                            </div>
                            <div class="back-home">
                                <a class="wpo-accountBtn" href="<?= base_url() ?>">
                                    <span class="">Back To Home</span>
                                </a>
                            </div>
                        </div>
                        <div class="wpo-accountForm form-style">
                            <div class="fromTitle">
                                <h2>Register</h2>
                                <p>Registrasi Akun Chika Wedding</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" id="name" name="nama_lengkap" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <label>Username</label>
                                    <input type="text" id="username" name="username" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <label>No HP</label>
                                    <input type="number" id="no_hp" name="no_hp" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="pwd2" type="password" placeholder="Your password here.." id="password" name="password" required>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default reveal3" type="button"><i class="fa fa-eye"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <button type="submit" id="btnsubmit" class="wpo-accountBtn">Daftar</button>
                                </div>
                            </div>
                            <h4 class="or"><span>OR</span></h4>
                            <p class="subText">Sudah punya akun ? <a href="<?= base_url() ?>auth">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- All JavaScript files
    ================================================== -->
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
    <!-- Plugins for this template -->
    <script src="<?= base_url() ?>assets/js/modernizr.custom.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.dlmenu.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery-plugin-collection.js"></script>
    <!-- Custom script for this template -->
    <script src="<?= base_url() ?>assets/js/script.js"></script>
</body>

</html>