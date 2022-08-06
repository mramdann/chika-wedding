<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_m', 'models');

    }

    public function index()
    {
        $data['title'] = 'Daftar Paket';

        // templates
        $this->load->view('template2/header', $data);
        $this->load->view('paket_v', $data); // content
        $this->load->view('template2/footer', $data);
    }
}
