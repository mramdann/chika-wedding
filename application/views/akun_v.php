<div class="wpo-breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-breadcumb-wrap">
                    <ul>
                        <li><a href="<?= base_url() ?>">Home </a></li>
                        <li><span><?= $title ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .wpo-checkout-area .billing-adress {
        padding: 0px;
    }
</style>

<!-- wpo-checkout-area start-->
<div class="wpo-checkout-area section-padding">
    <div class="container">
        <div class="checkout-wrap">
            <div class="row">
                <div class="col-md-12">
                    <div class="caupon-wrap s3">
                        <div class="payment-area">
                            <div class="row">
                                <div class="col-12">
                                    <div class="coupon coupon-3">
                                        <label id="toggle4">Personal Profile</label>
                                    </div>
                                    <div class="payment-option" id="open4">
                                        <div class="contact-form form-style">
                                            <form class="row" method="POST">
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <label for="nama_lengkap">Nama Lengkap</label>
                                                    <input type="text" placeholder="" name="nama_lengkap" value="<?= $user->nama_lengkap ?>">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <label for="username">Username</label>
                                                    <input type="text" placeholder="" name="username" value="<?= $user->username ?>">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <label for="no_hp">No HP</label>
                                                    <input type="text" placeholder="" name="no_hp" value="<?= $user->no_hp ?>">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <label for="alamat">Alamat</label>
                                                    <input type="text" placeholder="" name="alamat" value="<?= $user->alamat ?>">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <label for="password">Password</label>
                                                    <input type="text" placeholder="" name="password">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <label for="password2">Konfirmasi Password</label>
                                                    <input type="text" placeholder="" name="password2">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="submit-btn-area text-center">
                                                        <button class="theme-btn-s4" type="submit">Simpan Perubahan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="caupon-wrap s2">
                        <div class="biling-item">
                            <div class="coupon coupon-3">
                                <label id="toggle2">Pesanan Saya</label>
                            </div>
                            <div class="billing-adress" id="open2">

                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-md">
                                        <tr>
                                            <th data-width="40">#</th>
                                            <th>Paket</th>
                                            <th>Tgl Booking</th>
                                            <th>Tgl Acara</th>
                                            <th>Status Pesanan</th>
                                            <th>Total Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <?php
                                        // print_r($booking);
                                        $no = 0;
                                        $status = '';
                                        $st = '';
                                        foreach ($booking as $order) {
                                            $no++;

                                            if ($order->status == 'Menunggu Konfirmasi Admin') {
                                                $status = '<span class="badge bg-warning">' . $order->status . '</span>';
                                            } else if ($order->status == 'Menunggu Pembayaran Uang Muka (DP)') {
                                                $status = '<span class="badge bg-info">' . $order->status . '</span>';
                                            } else if ($order->status == 'Kunci Tanggal') {
                                                $status = '<span class="badge bg-primary">' . $order->status . '</span>';
                                            } else if ($order->status == 'Selesai') {
                                                $status = '<span class="badge bg-success">' . $order->status . '</span>';
                                            } else if ($order->status == 'Pesanan Ditolak') {
                                                $status = '<span class="badge bg-danger">' . $order->status . '</span><br> Catatan : ' . $order->catatan;
                                            } else if ($order->status == 'Customer membatalkan pesanan') {
                                                $status = '<span class="badge bg-danger">' . $order->status . '</span>';
                                            }

                                            echo '<tr>
                                                    <td>' . $no . '</td>
                                                    <td><a href="' . base_url('paket/detail/' . $order->id_paket) . '" > ' . $order->nama_paket . '</a></td>
                                                    <td>' . date('d-m-Y H:i:s', strtotime($order->tgl_booking)) . '</td>
                                                    <td>' . date('d-m-Y', strtotime($order->tgl_acara)) . '</td>
                                                    <td>' . $status . '</td>
                                                    <td>Rp. ' . number_format($order->harga) . '</td>
                                                    <td><a href="' . base_url('home/invoice/' . $order->id_booking) . '" class="btn btn-sm btn-primary"> Lihat Detail </a></td>
                                                </tr>';
                                        } ?>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- wpo-checkout-area end-->