<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/images/favicon.png">
    <title> Login - Chika Wedding</title>
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
                    <form class="wpo-accountWrapper" action="<?= base_url() ?>auth/login" method="post">
                        <div class="wpo-accountInfo">
                            <div class="wpo-accountInfoHeader">
                                <a href="#"><img src="<?= base_url() ?>assets/images/logo-2.png" alt=""></a>
                                <a class="wpo-accountBtn" href="<?= base_url('auth/register') ?>">
                                    <span class="">Register</span>
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
                                <h2>Login</h2>
                                <p>Sign into your account</p>
                            </div>

                            <?php if ($this->session->flashdata('message')) {
                                echo $this->session->flashdata('message');
                                // set time out alert
                                echo '<script>setTimeout(function() {
                                            $(".alert").fadeOut("slow");
                                        }, 3000);</script>';
                            } ?>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <label>Username</label>
                                    <input type="text" id="username" name="username" placeholder="Input username">
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="pwd6" type="password" placeholder="" name="password" placeholder="password">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default reveal6" type="button"><i class="fa fa-eye"></i></button>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-12">
                                    <button type="submit" class="wpo-accountBtn">Login</button>
                                </div>
                            </div>
                            <h4 class="or"><span>OR</span></h4>
                            <p class="subText">Belum punya akun ? <a href="<?= base_url() ?>auth/register">Register</a></p>
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