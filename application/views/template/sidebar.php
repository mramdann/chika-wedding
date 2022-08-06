<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>"> <i class="bi bi-grid"></i> <span>Dashboard</span> </a></li>
        <li class="nav-item"> <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i> </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li> <a href="<?= base_url() ?>user"> <i class="bi bi-circle"></i><span>Data Pegawai</span> </a></li>
                <li> <a href="<?= base_url() ?>jabatan"> <i class="bi bi-circle"></i><span>Data Jabatan</span> </a></li>
            </ul>
        </li>
        <li class="nav-item"> <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-journal-text"></i><span>Absensi</span><i class="bi bi-chevron-down ms-auto"></i> </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li> <a href="<?= base_url('absensi_hr') ?>"> <i class="bi bi-circle"></i><span>Absensi Masuk</span> </a></li>
                <li> <a href="<?= base_url('absensi_bulanan') ?>"> <i class="bi bi-circle"></i><span>Absensi Bulanan</span> </a></li>
            </ul>
        </li>
        <li class="nav-item"> <a class="nav-link collapsed" data-bs-target="#honor-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-journal-text"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i> </a>
            <ul id="honor-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li> <a href="<?= base_url('daftar_honor') ?>"> <i class="bi bi-circle"></i><span>Daftar Gajih</span> </a></li>
                <li> <a href="<?= base_url('trans_pegawai') ?>"> <i class="bi bi-circle"></i><span>Transaksi Pegwai</span> </a></li>

            </ul>
        </li>
        <li class="nav-item"> <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-layout-text-window-reverse"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i> </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li> <a href="<?= base_url('laporan_data_pegawai') ?>"> <i class="bi bi-circle"></i><span>Data Pegawai</span> </a></li>
                <li> <a href="<?= base_url('laporan_absensi') ?>"> <i class="bi bi-circle"></i><span>Data Absensi</span> </a></li>
                <li> <a href="<?= base_url('laporan_absensi_bulanan') ?>"> <i class="bi bi-circle"></i><span>Data Absensi Bulanan</span> </a></li>
                <li> <a href="<?= base_url('laporan_trans_kariawan') ?>"> <i class="bi bi-circle"></i><span>Data Transaksi Pegawai</span> </a></li>
            </ul>
        </li>
        <!-- <li class="nav-item"> <a class="nav-link collapsed" href="users-profile.html"> <i class="bi bi-person"></i> <span>Profile</span> </a></li>
        <li class="nav-item"> <a class="nav-link collapsed" href="pages-faq.html"> <i class="bi bi-question-circle"></i> <span>F.A.Q</span> </a></li> -->
    </ul>
</aside>