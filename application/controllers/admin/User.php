<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m', 'models');

        // cek apakah sudah login atau belum
        if (!$this->session->userdata('id_users')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Pegawai';
        $data['module'] = 'user/';

        // templates
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user_v', $data); // content
        $this->load->view('template/footer', $data);
    }

    public function data_pegawai()
    {
        $data['title'] = 'Laporan Data Pegawai';
        $data['module'] = 'user/';

        // templates
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('laporan/data_user_v', $data); // content
        $this->load->view('template/footer', $data);
    }
    public function print()
    {
        $data['title'] = 'Laporan Data Pegawai';
        $data['module'] = 'user/';
        $data['data_pegawai'] = $this->models->get_datatables();

        // templates

        $this->load->view('cetak/print_pegawai', $data); // content

    }

    public function ajax_list()
    {
        $list = $this->models->get_datatables();
        // print_r($list);

        $data = array();
        $no = 0;
        foreach ($list as $dd) {
            $no++;
            $row = array();

            $row[] = $no;
            $row[] = $dd->nama;
            $row[] = $dd->nip;
            $row[] = $dd->nama_jabatan;
            $row[] = $dd->alamat;
            $row[] = $dd->nohp;
            $row[] = $dd->role == '0' ? '<span class="badge bg-success">Admin</span>' : '<span class="badge bg-primary">Pegawai</span>';
            $row[] = $dd->status == '1' ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-danger">Tidak Aktif</span>';

            // add html for action

            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function ajax_add()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'nip' => $this->input->post('nip'),
            'nohp' => $this->input->post('nohp'),
            'password' => $this->input->post('password'),
            'id_jabatan' => $this->input->post('id_jabatan'),
            'role' => $this->input->post('role'),
            'status' => $this->input->post('status'),
        );

        $result = $this->models->insert($data);
        echo json_encode($result);
    }

    public function ajax_edit($id)
    {
        $data = $this->models->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_update()
    {
        $id = $this->session->userdata('id_users');
        $old_password = $this->models->get_by_id($id)->password;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nip' => $this->input->post('nip'),
            'nohp' => $this->input->post('nohp'),
            'password' => $this->input->post('password') == '' ? $old_password : $this->input->post('password'),
            'id_jabatan' => $this->input->post('id_jabatan'),
            'role' => $this->input->post('role'),
            'status' => $this->input->post('status'),
        );

        $result = $this->models->ajax_update(array('id_users' => $this->input->post('id')), $data);
        echo json_encode($result);
    }

    public function ajax_delete($id)
    {
        $result = $this->models->delete_by_id($id);
        echo json_encode($result);
    }

    public function getJabatan()
    {
        $result = $this->models->getJabatan();
        echo json_encode($result);
    }
}
