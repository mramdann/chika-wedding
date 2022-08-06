<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/images/favicon.png">
    <title> Home - Chika Wedding</title>
	
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
                    <img src="<?= base_url() ?>assets/images/favicon.png" alt="">
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
                                        <a class="navbar-brand" href="index.html"><img src="<?= base_url() ?>assets/images/logo.png"
                                                alt=""></a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-1 col-1">
                                    <div id="navbar" class="collapse navbar-collapse navigation-holder">
                                        <button class="menu-close"><i class="ti-close"></i></button>
                                        <ul class="nav navbar-nav mb-2 mb-lg-0">
										
											<li><a href="<?= base_url('home') ?>">Home</a></li>
											<li><a href="<?= base_url('paket') ?>">Daftar Paket</a></li>
											<li><a href="<?= base_url('kontak') ?>">Kontak</a></li>
											<li><a href="<?= base_url('tentang') ?>">Tentang Kami</a></li>

                                        </ul>

                                    </div><!-- end of nav-collapse -->
                                </div>
                                <div class="col-lg-2 col-md-2 col-2">
                                    <div class="header-right">
                                        <div class="header-search-form-wrapper">
                                            <div class="cart-search-contact">
                                                <button class="search-toggle-btn"><i
                                                        class="fi flaticon-search"></i></button>
                                                <div class="header-search-form">
                                                    <form>
                                                        <div>
                                                            <input type="text" class="form-control"
                                                                placeholder="Search here...">
                                                            <button type="submit"><i class="fi flaticon-search"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mini-cart">
                                            <button class="cart-toggle-btn"> <i class="fi flaticon-shopping-cart"></i>
                                                <span class="cart-count">2</span></button>
                                            <div class="mini-cart-content">
                                                <button class="mini-cart-close"><i class="ti-close"></i></button>
                                                <div class="mini-cart-items">
                                                    <div class="mini-cart-item clearfix">
                                                        <div class="mini-cart-item-image">
                                                            <a href="shop.html"><img src="<?= base_url() ?>assets/images/shop/mini-cart/img-1.jpg"
                                                                    alt></a>
                                                        </div>
                                                        <div class="mini-cart-item-des">
                                                            <a href="shop.html">Wedding Gown</a>
                                                            <span class="mini-cart-item-price">$20.15 x 1</span>
                                                            <span class="mini-cart-item-quantity"><a href="#"><i class="ti-close"></i></a></span>
                                                        </div>
                                                    </div>
                                                    <div class="mini-cart-item clearfix">
                                                        <div class="mini-cart-item-image">
                                                            <a href="shop.html"><img
                                                                    src="<?= base_url() ?>assets/images/shop/mini-cart/img-2.jpg"
                                                                    alt></a>
                                                        </div>
                                                        <div class="mini-cart-item-des">
                                                            <a href="shop.html">Bridal Flower</a>
                                                            <span class="mini-cart-item-price">$13.25 x 2</span>
                                                            <span class="mini-cart-item-quantity"><a href="#"><i
                                                                        class="ti-close"></i></a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mini-cart-action clearfix">
                                                    <span class="mini-checkout-price">Subtotal:
                                                        <span>$215.14</span></span>
                                                    <div class="mini-btn">
                                                        <a href="checkout.html" class="view-cart-btn s1">Checkout</a>
                                                        <a href="cart.html" class="view-cart-btn">View Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end of container -->
                    </nav>
                </div>
            </header>
            <!-- end of header -->