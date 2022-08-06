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
        $data['module'] = 'user/';

        // templates
        $this->load->view('template2/header', $data);
        $this->load->view('home_v', $data); // content
        $this->load->view('template2/footer', $data);
    }

}
