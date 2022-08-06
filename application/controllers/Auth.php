<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_m', 'models');
    }

    public function index()
    {
        // cek apakah sudah login atau belum
        // if (!$this->session->userdata('id_users')) {
            $this->load->view('login_v');
        // } else {
            // redirect('dashboard');
        // }
    }
	
	public function register()
    {
        // cek apakah sudah login atau belum
        // if (!$this->session->userdata('id_users')) {
            $this->load->view('register_v');
        // } else {
            // redirect('dashboard');
        // }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $ress = $this->models->login($username, $password);

        if ($ress) {
            // set flash data message dengan notifikasi sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                                                            <div class="alert-icon"><i class="far fa-fw fa-bell"></i> </div>
                                                            <div class="alert-message"> Login Success! </div>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>');

            // simpan ke session
            $this->session->set_userdata('id_users', $ress->id_users);
            $this->session->set_userdata('username', $ress->username);
            $this->session->set_userdata('nama_lengkap', $ress->nama_lengkap);
            $this->session->set_userdata('role', $ress->role);

            // redirect ke halaman dashboard
            redirect('dashboard');
        } else {
            // set flash data message dengan notifikasi gagal
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert"> <i class="bi bi-exclamation-octagon me-1"></i> Login Gagal!. Silahkan coba lagi. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
            );
            // redirect ke halaman login
            redirect('auth');
        }
    }

    public function logout()
    {
        // hapus session
        $this->session->unset_userdata('id_users');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama_lengkap');
        $this->session->unset_userdata('role');
        // redirect ke halaman login
        redirect('auth');
    }
}
