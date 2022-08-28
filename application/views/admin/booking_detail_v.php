<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </div>

    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
            <?php if ($booking->status == 'Menunggu Konfirmasi Admin') {
                echo '<span class="badge badge-warning">' . $booking->status . '</span>';
            } else if ($booking->status == 'Menunggu Pembayaran Uang Muka (DP)') {
                echo '<span class="badge badge-info">' . $booking->status . '</span>';
            } else if ($booking->status == 'Kunci Tanggal') {
                echo '<span class="badge badge-primary">' . $booking->status . '</span>';
            } else if ($booking->status == 'Selesai') {
                echo '<span class="badge badge-success">' . $booking->status . '</span>';
            } else if ($booking->status == 'Pesanan Ditolak') {
                echo '<span class="badge badge-danger">' . $booking->status . '</span>';
            } else if ($booking->status == 'Customer membatalkan pesanan') {
                echo '<span class="badge badge-danger">' . $booking->status . '</span>';
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
                        <table class="table table-striped table-hover table-md">
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

                    <div class="section-title mb-2 mt-4"><b>Detail Pembayaran</b></div>
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
                            foreach ($pays as $pay) {
                                if ($pay->status_pembayaran == 0) {
                                    $sp = '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                                    $btn = '<button class="btn btn-sm btn-primary" onclick="acc(' . $pay->id_pembayaran . ')">Konfirmasi</button>
                                        <button class="btn btn-sm btn-danger" onclick="tolak(' . $pay->id_pembayaran . ')">Tidak Sesuai</button>';
                                } else if ($pay->status_pembayaran == 1) {
                                    $sp = '<span class="badge badge-success">Dikonfirmasi</span>';
                                } else {
                                    $sp = '<span class="badge badge-danger">Tidak Sesuai</span>';
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
            <?php
            if ($booking->status == 'Menunggu Konfirmasi Admin') { ?>
                <button class="btn btn-danger text-right mb-0" onclick="batal('<?= $booking->id_booking ?>')">Batalkan Pesanan</button>
                <button class="btn btn-success text-right mb-0" onclick="konfirmasi('<?= $booking->id_booking ?>')">Konfirmasi Pesanan</button>
            <?php } else if ($booking->status == 'Kunci Tanggal') { ?>
                <button class="btn btn-success text-right mb-0" onclick="selesai('<?= $booking->id_booking ?>')">Selesai</button>
            <?php } ?>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="form" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="catatan"> Catatan </label>
                                <textarea name="catatan" class="form-control" id="" cols="20" rows="10"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- javascript -->
<script type="text/javascript">
    function selesai(id) {
        Swal.fire({
            title: 'Apa anda yakin ?',
            text: "Akan menyelesaikan pesanan ini, dan pastikan pembayaran sudah lunas !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Selesai!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url($module . 'selesai/') ?>" + id,
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

    function acc(id) {
        Swal.fire({
            title: 'Apa anda yakin ?',
            text: "Akan mengkonfirmasi pembayaran ini",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Konfirmasi!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url($module . 'acc/') ?>" + id,
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

    function tolak(id) {
        Swal.fire({
            title: 'Apa anda yakin ?',
            text: "Akan mengkonfirmasi pembayaran ini tidak sesuai",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Konfirmasi!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url($module . 'tolak/') ?>" + id,
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

    function konfirmasi(id) {
        Swal.fire({
            title: 'Apa anda yakin ?',
            text: "Akan mengkonfirmasi pesanan ini",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Konfirmasi!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url($module . 'konfirmasi/') ?>" + id,
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


    $('#form').submit(function(e) {
        e.preventDefault();
        var form = $('#form')[0];
        var data = new FormData(form);

        $('#btnSave').text('Sedang Proses, Mohon tunggu...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable

        // ajax adding data to database
        $.ajax({
            url: "<?php echo base_url($module . 'batal') ?>",
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            data: data,
            dataType: "JSON",

            success: function(data) {

                if (data.status == '00') {
                    //if success reload ajax table
                    Swal.fire('Suksess', data.mess, 'success');

                    $('#form')[0].reset();
                    $('#modal_form').modal('hide');
                } else {
                    Swal.fire('Yaahh...', data.mess, 'error');
                }

                $('#btnSave').text('Simpan'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire('Ooppss :(', 'Error adding / update data', 'error');
                $('#btnSave').text('Simpan'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable
            }
        });
    });

    function batal(id) {
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Input Catatan'); // Set Title to Bootstrap modal title
        $('#id').val(id);
    }
</script>