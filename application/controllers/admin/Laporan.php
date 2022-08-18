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
        $foto = '';
        $no = 0;
        foreach ($list as $dd) {
            $no++;
            $row = array();

            if ($dd->foto !== '') {
                $foto = '<img src="' . base_url('upload/' . $dd->foto) . '" alt="' . $dd->foto . '" class="img-profile" style="width: 100px"> ';
            }

            $row[] = $no;
            $row[] = $dd->nama_lengkap;
            $row[] = $dd->no_hp;
            $row[] = $dd->nama_paket;
            $row[] = $dd->tgl_booking;
            $row[] = $dd->tgl_acara;
            $row[] = $dd->lokasi;

            // add html for action
            $row[] = '<a href="javascript:void(0)" title="Edit" onclick="edit(' . "'" . $dd->id_booking . "'" . ')"><i class="align-middle fas fa-fw fa-pen"></i></a>
                <a href="javascript:void(0)" title="Hapus" onclick="hapus(' . "'" . $dd->id_booking . "'" . ')"><i class="align-middle fas fa-fw fa-trash"></i></a>';

            $data[] = $row;
        }

        echo json_encode($data);
    }
}
