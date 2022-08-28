<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
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
        $data['title'] = 'Data Customer';
        $data['module'] = 'admin/customer/';

        // templates
        $this->load->view('template/_header', $data);
        $this->load->view('admin/customer_v', $data); // content
        $this->load->view('template/_footer', $data);
    }

    public function ajax_list()
    {
        $list = $this->models->getDatatablesCustomer('tbl_customer');

        $data = array();
        $foto = '';
        $no = 0;
        foreach ($list as $dd) {
            $no++;
            $row = array();

            $row[] = $no;
            $row[] = $dd->nama_lengkap;
            $row[] = $dd->username;
            $row[] = $dd->no_hp;
            $row[] = $dd->alamat;

            // add html for action
            $row[] = '<a href="javascript:void(0)" title="Hapus" onclick="hapus(' . "'" . $dd->id_customer . "'" . ')"><i class="align-middle fas fa-fw fa-trash"></i></a>';

            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function ajax_delete($id)
    {
        $result = $this->models->delete_by_id(['id_customer' => $id], 'tbl_customer');
        echo json_encode($result);
    }
}
