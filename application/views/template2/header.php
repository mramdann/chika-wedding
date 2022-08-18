<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/images/logos.png">
    <title> <?= isset($title) ? $title . ' - ' : 'Home - ' ?> Chika Wedding</title>

    <link href="<?= base_url() ?>assets/css/themify-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/flaticon.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
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
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

    <!-- Library Offline -->
    <script src="<?= base_url() ?>assets/vendor/jquery-3.6.0.js"></script>
    <script src="<?= base_url() ?>assets/vendor/sweetalert2@11.js"></script>
</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader">
            <div class="vertical-centered-box">
                <div class="content">
                    <div class="loader-circle"></div>
                    <div class="loader-line-mask">
                        <div class="loader-line"></div>
                    </div>
                    <img src="<?= base_url() ?>assets/images/logos.png" alt="">
                </div>
            </div>
        </div>
        <!-- end preloader -->

        <!-- start wpo-box-style -->

        <div class="wpo-box-style">
            <!-- Start header -->
            <header id="header">
                <div class="wpo-site-header">
                    <nav class="navigation navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-lg-3 col-md-3 col-3 d-lg-none dl-block">
                                    <div class="mobail-menu">
                                        <button type="button" class="navbar-toggler open-btn">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar first-angle"></span>
                                            <span class="icon-bar middle-angle"></span>
                                            <span class="icon-bar last-angle"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-6">
                                    <div class="navbar-header">
                                        <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/logos.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-1 col-1">
                                    <div id="navbar" class="collapse navbar-collapse navigation-holder">
                                        <button class="menu-close"><i class="ti-close"></i></button>
                                        <ul class="nav navbar-nav mb-2 mb-lg-0">

                                            <li><a href="<?= base_url('home') ?>">Home</a></li>
                                            <li><a href="<?= base_url('paket') ?>">Daftar Paket</a></li>
                                            <li><a href="<?= base_url('home/kontak') ?>">Kontak</a></li>
                                            <li><a href="<?= base_url('home/tentang') ?>">Tentang Kami</a></li>

                                        </ul>

                                    </div><!-- end of nav-collapse -->
                                </div>
                                <div class="col-lg-2 col-md-2 col-2">
                                    <div class="header-right">
                                        <div class="mini-cart">
                                            <a href="<?= base_url('auth') ?>" class="cart-toggle-btn" title="Akun"> <i class="fi flaticon-user"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end of container -->
                    </nav>
                </div>
            </header>
            <!-- end of header -->