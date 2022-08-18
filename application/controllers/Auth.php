<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_m', 'models');
    }

    public function index()
    {
        // cek apakah sudah login atau belum
        if (!$this->session->userdata('id_users')) {
            $this->load->view('login_v');
        } else {
            redirect('admin/home');
        }
    }

    public function register()
    {
        // cek apakah sudah login atau belum
        // if (!$this->session->userdata('id_users')) {
        if ($this->input->post()) {
            $data = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'no_hp' => $this->input->post('no_hp'),
                'password' => $this->input->post('password'),
            ];

            $res = $this->models->register($data);
            if ($res) {
                $this->session->set_flashdata('message', '<div class="alert alert-success">
                                                                <strong>Success!</strong> Register Success.
                                                            </div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">
                                                                <strong>Failed!</strong> Register Failed.
                                                            </div>');
                redirect('auth');
            }
        }


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
        // print_r($ress);
        // exit;

        if ($ress) {
            // set flash data message dengan notifikasi sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                                                            <div class="alert-icon"><i class="far fa-fw fa-bell"></i> </div>
                                                            <div class="alert-message"> Login Success! </div>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>');

            // simpan ke session
            $this->session->set_userdata('id_user', $ress->id_user);
            $this->session->set_userdata('id_customer', $ress->id_customer);
            $this->session->set_userdata('username', $ress->username);
            $this->session->set_userdata('nama_lengkap', $ress->nama_lengkap);
            $this->session->set_userdata('role', isset($ress->id_users) ? 'admin' : 'customer');

            // redirect ke halaman dashboard
            $ress->id_user ? redirect('admin/home') : redirect('home');
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
        $this->session->sess_destroy();
        // redirect ke halaman login
        redirect('auth');
    }
}
