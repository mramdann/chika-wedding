<!-- start of breadcumb-section -->
<div class="wpo-breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-breadcumb-wrap">
                    <ul>
                        <li><a href="<?= base_url('paket') ?>">Paket </a></li>
                        <li><span><?= $title ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of wpo-breadcumb-section-->

<!-- start wpo-shop-single-section -->
<section class="wpo-shop-single-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-6 col-12">
                <div class="shop-single-slider">
                    <div class="row">
                        <div class="col-lg-3 col-3">
                            <div class="slider-nav">
                                <div><img src="<?= base_url('upload/' . $paket->foto) ?>" alt></div>
                                <div><img src="<?= base_url('upload/' . $paket->foto2) ?>" alt></div>
                            </div>
                        </div>
                        <div class="col-lg-9 col col-9">
                            <div class="slider-for">
                                <div><img src="<?= base_url('upload/' . $paket->foto) ?>" alt></div>
                                <div><img src="<?= base_url('upload/' . $paket->foto2) ?>" alt></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col col-lg-6 col-12">
                <div class="product-details">
                    <h2><?= $paket->nama_paket ?></h2>
                    <div class="product-rt">
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <span>(ratings)</span>
                    </div>
                    <div class="price">
                        <!-- <span class="old">$230.00</span> -->
                        <span class="current">Rp. <?= number_format($paket->harga) ?></span>
                    </div>

                    <?= $paket->deskripsi ?>

                    <div class="product-option">
                        <a href="<?= base_url() ?>paket/pesan/<?= $paket->id_paket ?>" class="theme-btn">Pesan Sekarang</a>
                        <button class="theme-btn heart-btn"><i class="ti-heart"></i></button>

                    </div> <!-- end option -->
                    <div class="tg-btm">
                        <p><span>Kategori:</span> <?= $paket->kategori ?></p>
                        <p><span>Tags:</span> Jewellery, events, wedding</p>
                    </div>
                </div> <!-- end product details -->
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div> <!-- end of container -->
</section>
<!-- end of wpo-shop-single-section -->