<!-- start of hero -->
<section class="wpo-hero-slider">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slide-inner slide-bg-image" data-background="<?= base_url() ?>assets/images/depan.jpeg">
                    <!-- <div class="gradient-overlay"></div> -->
                    <div class="container-fluid">
                        <div class="slide-content">
                            <div data-swiper-parallax="300" class="slide-title">
                                <h2>Chika Wedding</h2>
                            </div>
                            <div data-swiper-parallax="400" class="slide-text">
                                <p>Selamat datang. Wujudkan acara istimewa kamu dengan meriah bersama kami !</p>
                            </div>
                            <div class="clearfix"></div>
                            <div data-swiper-parallax="500" class="slide-btns">
                                <a href="<?= base_url('paket') ?>" class="theme-btn">Temukan Lebih Banyak</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end slide-inner -->
            </div> <!-- end swiper-slide -->

            <div class="swiper-slide">
                <div class="slide-inner slide-bg-image" data-background="<?= base_url() ?>assets/images/slider/slide-2.jpg">
                    <!-- <div class="gradient-overlay"></div> -->
                    <div class="container-fluid">
                        <div class="slide-content">
                            <div data-swiper-parallax="300" class="slide-title">
                                <h2>Chika Wedding</h2>
                            </div>
                            <div data-swiper-parallax="400" class="slide-text">
                                <p>Selamat datang. Wujudkan acara istimewa kamu dengan meriah bersama kami !</p>
                            </div>
                            <div class="clearfix"></div>
                            <div data-swiper-parallax="500" class="slide-btns">
                                <a href="<?= base_url('paket') ?>" class="theme-btn">Discover More</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end slide-inner -->
            </div> <!-- end swiper-slide -->

            <div class="swiper-slide">
                <div class="slide-inner slide-bg-image" data-background="<?= base_url() ?>assets/images/slider/slide-3.jpg">
                    <!-- <div class="gradient-overlay"></div> -->
                    <div class="container-fluid">
                        <div class="slide-content">
                            <div data-swiper-parallax="300" class="slide-title">
                                <h2>Chika Wedding</h2>
                            </div>
                            <div data-swiper-parallax="400" class="slide-text">
                                <p>Selamat datang. Wujudkan acara istimewa kamu dengan meriah bersama kami !</p>
                            </div>
                            <div class="clearfix"></div>
                            <div data-swiper-parallax="500" class="slide-btns">
                                <a href="<?= base_url('paket') ?>" class="theme-btn">Discover More</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end slide-inner -->
            </div> <!-- end swiper-slide -->
        </div>
        <!-- end swiper-wrapper -->

        <!-- swipper controls -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>
<!-- end of wpo-hero-slide-section-->

<!-- start wpo-product-section -->
<section class="wpo-product-section section-padding">
    <div class="container">
        <div class="row">
            <div class="wpo-section-title">
                <span>Paket Kami</span>
                <h2>PAKET KHUSUS UNTUK ANDA</h2>
                <div class="section-title-img">
                    <img src="<?= base_url() ?>assets/images/section-title.png" alt="">
                </div>
            </div>
        </div>
        <div class="wpo-product-wrap">
            <div class="row">
                <?php //print_r($this->session->userdata()) 
                ?>
                <?php
                foreach ($paket as $p) {
                    echo '<div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="wpo-product-item">
                                <div class="wpo-product-img">
                                    <img src="' . base_url('upload/' . $p->foto) . '" alt="">
                                    <a href="' . base_url('paket/pesan/' . $p->id_paket) . '">Pesan Sekarang</a>
                                </div>
                                <div class="wpo-product-text">
                                    <h3><a href="' . base_url('paket/detail/' . $p->id_paket) . '">' . $p->nama_paket . '</a></h3>
                                    <span>Rp. ' . number_format($p->harga) . '</span>
                                </div>
                            </div>
                        </div>';
                } ?>
            </div>
        </div>

    </div> <!-- end container -->
</section>
<!-- end wpo-product-section -->

<!-- start wpo-cta-section -->

<div class="wpo-cta-section">
    <div class="conatiner-fluid">
        <div class="wpo-cta-item">
            <span><img src="<?= base_url() ?>assets/images/cta/1.png" alt=""></span>
            <h2>Lets Celebrate Your Love</h2>
            <a class="theme-btn-s2" href="<?= base_url('kontak') ?>">Hubungi Kami</a>
        </div>
    </div>
</div>

<!-- end wpo-cta-section -->