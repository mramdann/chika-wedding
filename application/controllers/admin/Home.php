<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_m', 'models');

        // cek apakah sudah login atau belum
        // if (!$this->session->userdata('id_users')) {
        //     redirect('auth');
        // }
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['module'] = 'home/';

        // templates
        $this->load->view('template/_header', $data);
        $this->load->view('admin/home_v', $data); // content
        $this->load->view('template/_footer', $data);
    }
}
