<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_m', 'models');

        // cek apakah sudah login atau belum
        if (!$this->session->userdata('id_user')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Laporan';
        $data['module'] = 'admin/laporan/';

        // templates
        $this->load->view('template/_header', $data);
        $this->load->view('admin/laporan_v', $data); // content
        $this->load->view('template/_footer', $data);
    }

    public function ajax_list()
    {
        $list = $this->models->getDatatablesBooking('tbl_booking');

        $data = array();
        $status = '';
        $st = '';
        $no = 0;
        foreach ($list as $dd) {
            $no++;
            $row = array();

            $pembayaran = $this->models->hitungBayar($dd->id_booking);

            if ($dd->harga == $pembayaran) {
                $status = '<span class="badge badge-success">Lunas</span>';
            } else {
                $status = '<span class="badge badge-danger">Belum Lunas</span>';
            }

            if ($dd->status == 'Menunggu Konfirmasi Admin') {
                $st = '<span class="badge badge-warning">' . $dd->status . '</span>';
            } else if ($dd->status == 'Menunggu Pembayaran Uang Muka (DP)') {
                $st = '<span class="badge badge-info">' . $dd->status . '</span>';
            } else if ($dd->status == 'Kunci Tanggal') {
                $st = '<span class="badge badge-primary">' . $dd->status . '</span>';
            } else if ($dd->status == 'Selesai') {
                $st = '<span class="badge badge-success">' . $dd->status . '</span>';
            } else if ($dd->status == 'Pesanan Ditolak') {
                $st = '<span class="badge badge-danger">' . $dd->status . '</span><br> Catatan : ' . $dd->catatan;
            } else if ($dd->status == 'Customer membatalkan pesanan') {
                $st = '<span class="badge badge-danger">' . $dd->status . '</span>';
            }

            $row[] = $no;
            $row[] = $dd->nama_lengkap;
            $row[] = $dd->nama_paket;
            $row[] = $dd->tgl_booking;
            $row[] = $dd->tgl_acara;
            $row[] = $dd->lokasi;
            $row[] = 'Rp. ' . number_format($dd->harga);
            $row[] = 'Rp. ' . number_format($pembayaran);
            $row[] = $status;
            $row[] = $st;

            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function print()
    {
        $data['data'] = $this->models->getDatatablesBooking('tbl_booking');
        $this->load->view('admin/laporan_print_v', $data);
    }
}
