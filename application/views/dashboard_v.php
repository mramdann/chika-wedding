<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <?php $jmlpegawai = $this->db->query("SELECT * FROM tbl_users WHERE status=1 ")->num_rows(); ?>
                            <div class="card-body">
                                <h5 class="card-title">Pegawai <span>| Today</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-people-fill"></i></div>
                                    <div class="ps-3">
                                        <h6><?= $jmlpegawai ?></h6> <span class="text-success small pt-1 fw-bold"><?= $jmlpegawai ?></span> <span class="text-muted small pt-2 ps-1">Pegawai Aktif</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-6">

                        <?php
                        $st = 'Masuk';
                        $tgl = date('y-m-d');
                        $jmlmasuk = $this->db->query("SELECT * FROM tbl_absensi WHERE date='" . $tgl . "'  AND status_masuk='" . $st . "'")->num_rows();
                        ?>
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Absensi <span>| <?= date('d-m-y') ?></span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-save"></i></div>
                                    <div class="ps-3">
                                        <h6><?= $jmlmasuk ?></h6> <span class="text-muted small pt-2 ps-1">Status Masuk</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
    </section>
</main>