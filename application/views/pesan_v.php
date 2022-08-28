 <!-- start wpo-page-title -->
 <section class="wpo-page-title">
     <div class="container">
         <div class="row">
             <div class="col col-xs-12">
                 <div class="wpo-breadcumb-wrap">
                     <h2>Booking</h2>
                     <ol class="wpo-breadcumb-wrap">
                         <li><a href="<?= base_url('paket') ?>">Paket</a></li>
                         <li>Booking Paket</li>
                     </ol>
                 </div>
             </div>
         </div> <!-- end row -->
     </div> <!-- end container -->
 </section>
 <!-- end page-title -->

 <!-- wpo-checkout-area start-->
 <div class="wpo-checkout-area section-padding">
     <div class="container">
         <form id="form" method="post">
             <div class="checkout-wrap">
                 <div class="row">
                     <div class="col-lg-8 col-12">

                         <div class="caupon-wrap s2">
                             <div class="biling-item">
                                 <div class="coupon coupon-3">
                                     <label id="toggle2">Form Booking Paket</label>
                                 </div>
                                 <div class="billing-adress" id="open2">
                                     <div class="contact-form form-style">
                                         <div class="row">
                                             <div class="col-lg-6 col-md-12 col-12">
                                                 <label for="fname1">Nama Lengkap</label>
                                                 <input type="text" placeholder="" id="fname1" value="<?= $user->nama_lengkap ?>" readonly>
                                             </div>
                                             <div class="col-lg-6 col-md-12 col-12">
                                                 <label for="fname2">No Hp</label>
                                                 <input type="text" placeholder="" id="fname2" value="<?= $user->no_hp ?>" readonly>
                                             </div>
                                             <div class="col-lg-12 col-md-12 col-12">
                                                 <label for="Adress">Alamat</label>
                                                 <input type="text" placeholder="" id="Adress" value="<?= $user->alamat ? $user->alamat : 'Mohon lengkapi profile Anda !' ?>" readonly>
                                             </div>
                                             <div class="col-lg-12 col-md-12 col-12">
                                                 <label for="lokasi">Alamat Lengkap Acara</label>
                                                 <input type="text" placeholder="" id="lokasi" name="lokasi" required>
                                             </div>
                                             <div class="col-lg-6 col-md-12 col-12">
                                                 <label for="tgl_acara">Tanggal Acara</label>
                                                 <input type="date" placeholder="" id="tgl_acara" name="tgl_acara" required>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="biling-item-2">
                                         <div class="note-area">
                                             <p>Catatan pesanan </p>
                                             <textarea name="catatan_pesanan" name="catatan_pesanan" placeholder="Catatan tentang pesanan Anda"></textarea>
                                         </div>
                                         <div class="submit-btn-area">
                                             <ul>
                                                 <li><button type="submit" class="theme-btn-s4" type="submit">Save & continue</button></li>
                                             </ul>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-4 col-12">
                         <div class="cout-order-area">
                             <div class="oreder-item ">
                                 <ul>
                                     <li class="o-header">Pesanan Anda (<?= $paket->nama_paket ?>)</li>
                                     <li>Uang Muka (DP)<span>Rp. <?= number_format(20 / 100 * $paket->harga) ?></span></li>
                                     <li>Pelunasan <span>Rp. <?= number_format(80 / 100 * $paket->harga) ?></span></li>
                                     <li class="o-bottom">Total Harga <span>Rp. <?= number_format($paket->harga) ?></span></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </form>
     </div>
 </div>
 <!-- wpo-checkout-area end-->