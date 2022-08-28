<div class="wpo-breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-breadcumb-wrap">
                    <ul>
                        <li><a href="<?= base_url() ?>">Akun </a></li>
                        <li><span><?= $title ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
        <?php if ($booking->status == 'Menunggu Konfirmasi Admin') {
            echo '<span class="badge bg-warning">Status Pesanan : ' . $booking->status . '</span>';
        } else if ($booking->status == 'Menunggu Pembayaran Uang Muka (DP)') {
            echo '<span class="badge bg-info">Status Pesanan : ' . $booking->status . '</span>';
        } else if ($booking->status == 'Kunci Tanggal') {
            echo '<span class="badge bg-primary">Status Pesanan : ' . $booking->status . '</span>';
        } else if ($booking->status == 'Selesai') {
            echo '<span class="badge bg-success">Status Pesanan : ' . $booking->status . '</span>';
        } else if ($booking->status == 'Pesanan Ditolak') {
            echo '<span class="badge bg-danger">Status Pesanan : ' . $booking->status . '</span>';
        } else if ($booking->status == 'Customer membatalkan pesanan') {
            echo '<span class="badge bg-danger">Status Pesanan : ' . $booking->status . '</span>';
        } ?>

    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <address>
                    <strong>Customer :</strong><br>
                    <?= $booking->nama_lengkap ?><br>
                    <?= $booking->alamat ?><br>
                    <?= $booking->no_hp ?><br>
                </address>
            </div>
            <div class="col-md-6 text-md-right">
                <address>
                    <strong>Lokasi Pemasangan:</strong><br>
                    <?= $booking->lokasi ?><br>
                    <strong>Tanggal Acara:</strong><br>
                    <?= $booking->tgl_acara ?><br>
                </address>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <address>
                    <strong>Metode Pembayaran:</strong><br>
                    BANK BCA<br>
                    980809886 A/N Chika Wedding
                </address>
            </div>
            <div class="col-md-6 text-md-right">
                <address>
                    <strong>Tanggal Booking:</strong><br>
                    <?= $booking->tgl_booking ?><br><br>
                </address>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="section-title mb-2"><b>Paket yang Dipesan</b></div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-md nowrap">
                        <tr>
                            <th data-width="40">#</th>
                            <th>Item</th>
                            <th class="text-center">Uang Muka (DP)</th>
                            <th class="text-center">Pelunasan</th>
                            <th class="text-center">Total Harga</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td> <?= $booking->nama_paket ?></td>
                            <td class="text-center">Rp. <?= number_format(20 / 100 * $booking->harga) ?></td>
                            <td class="text-center">Rp. <?= number_format(80 / 100 * $booking->harga) ?></td>
                            <td class="text-center">Rp. <?= number_format($booking->harga) ?></td>
                        </tr>
                    </table>
                </div>

                <div class="section-title mb-2 mt-4"><b class="me-2">Rincian Pembayaran</b> <button id="btnBayar" class="btn btn-sm btn-primary" onclick="add_new()">Tambah Pembayaran</button> </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-md nowrap">
                        <tr>
                            <th data-width="40">#</th>
                            <th>Jenis Pembayaran</th>
                            <th>Tgl Bayar</th>
                            <th>Nominal</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Bukti Pembayaran</th>
                            <th></th>
                        </tr>
                        <?php
                        $no = 0;
                        $sp = '';
                        $btn = '';
                        $jlh_bayar = 0;
                        foreach ($pays as $pay) {
                            if ($pay->status_pembayaran == 0) {
                                $sp = '<span class="badge bg-warning">Menunggu Konfirmasi</span>';
                                $btn = '<button class="btn btn-sm btn-danger" onclick="hapusPembayaran(' . $pay->id_pembayaran . ')">Hapus</button>';
                                $jlh_bayar += $pay->nominal;
                            } else if ($pay->status_pembayaran == 1) {
                                $sp = '<span class="badge bg-success">Dikonfirmasi</span>';
                            } else {
                                $sp = '<span class="badge bg-danger">Tidak Sesuai</span>';
                            }
                            $no++;
                            echo '<tr>
                                    <td>' . $no . '</td>
                                    <td>' . $pay->jenis_pembayaran . '</td>
                                    <td>' . date('d-m-Y H:i:s', strtotime($pay->tgl_bayar)) . '</td>
                                    <td>Rp. ' . number_format($pay->nominal) . '</td>
                                    <td>' . $pay->ket_pembayaran . '</td>
                                    <td>' . $sp . '</td>
                                    <td><a href="' . base_url($pay->bukti_pembayaran) . '" target="_blank"> Lihat </a></td>
                                    <td>' . $btn . '</td>
                                </tr>';
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <center>
            <?php
            if ($booking->status == 'Menunggu Konfirmasi Admin') { ?>
                <a href="<?= base_url('home/batalpesan/' . $booking->id_booking) ?>" class="btn btn-danger text-right mb-0">Batalkan Pesanan</a>
            <?php } ?>
        </center>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Bukti Pembayaran</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="<?= $booking->id_booking ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="jenis_pembayaran"> Pembayaran </label>
                                <select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control" required autofocus>
                                    <option value="">-- Pilih --</option>
                                    <option value="Uang Muka (DP)">Uang Muka (DP)</option>
                                    <option value="Pelunasan">Pelunasan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nominal"> Nominal (Rp.)</label>
                                <input type="number" class="form-control" name="nominal" id="nominal" required autofocus>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bukti_pembayaran">Silahkan Upload Bukti Pembayaranmu</label>
                                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control" accept="image/*" required autofocus />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="ket_pembayaran"> Keterangan </label>
                                <textarea name="ket_pembayaran" class="form-control" id="ket_pembayaran"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- javascript -->
<script type="text/javascript">
    harga = <?= $booking->harga ?>;
    jlh_bayar = <?= $jlh_bayar ?>;

    if (harga == jlh_bayar) {
        $('#btnBayar').show();
    } else {
        $('#btnBayar').hide();

    }

    function add_new() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal
    }

    function hapusPembayaran(id) {
        Swal.fire({
            title: 'Apa anda yakin ?',
            text: "Akan menghapus bukti pembayaran ini",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url('home/hapusPembayaran/') ?>" + id,
                    type: "POST",
                    dataType: "JSON",

                    success: function(data) {
                        if (data.status == '00') {
                            location.reload(true);
                            Swal.fire('Suksess', data.mess, 'success');
                        } else {
                            Swal.fire('Yaahh...', data.mess, 'error');
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire('Ooppss :(', 'Kesalahan saat konfirmasi data', 'error');
                    }
                });
            }
        });
    }
</script>