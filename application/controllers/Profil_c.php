<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_m', 'profil');

        // cek apakah sudah login atau belum
        if (!$this->session->userdata('id_users')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Profil';
        $data['module'] = 'Profil/';
        $data['profils'] = $this->profil->get_profil($this->session->userdata('id_users'))->result();
        $data['absensi'] = $this->profil->get_absen($this->session->userdata('id_users'))->result();

        // templates
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('profil_v', $data); // content
        $this->load->view('template/footer', $data);
    }
    public function absenmasuk($id)
    {

        $data = array(
            'id_users' => $id,
            'status_masuk' => 'Masuk',
            'date' => date("Y-m-d H:i:s"),
        );

        $result = $this->profil->insert($data);
        echo json_encode($result);
    }
    public function ijin()
    {

        $data = array(
            'id_users' => $this->input->post('id_users'),
            'keterangan' => $this->input->post('keterangan'),
            'status_masuk' => 'Ijin',
            'date' => date("Y-m-d H:i:s"),
        );

        $result = $this->profil->insert($data);
        echo json_encode($result);
    }


    public function ajax_add()
    {
        $data = array(
            'nama_jabatan' => $this->input->post('nama_jabatan'),
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
        $data = array(
            'nama_jabatan' => $this->input->post('nama_jabatan'),
        );

        $result = $this->models->update(array('id_jabatan' => $this->input->post('id')), $data);
        echo json_encode($result);
    }
}
