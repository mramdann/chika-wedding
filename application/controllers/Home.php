<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_m', 'models');
    }

    public function index()
    {
        $data['title'] = 'Halaman Utama';
        $data['paket'] = $this->models->getPaket();

        // templates
        $this->load->view('template2/header', $data);
        $this->load->view('home_v', $data); // content
        $this->load->view('template2/footer', $data);
    }

    public function kontak()
    {
        $data['title'] = 'Hubungi Kami';

        // templates
        $this->load->view('template2/header', $data);
        $this->load->view('kontak_v', $data); // content
        $this->load->view('template2/footer', $data);
    }

    public function tentang()
    {
        $data['title'] = 'Tentang Kami';

        // templates
        $this->load->view('template2/header', $data);
        $this->load->view('tentang_v', $data); // content
        $this->load->view('template2/footer', $data);
    }
}
