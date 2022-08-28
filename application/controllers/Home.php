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

    public function akun()
    {
        // cek apakah sudah login sebagai customer
        if (!$this->session->userdata('id_customer')) {
            redirect('auth');
        }

        $user =  $this->models->getUserByid($this->session->userdata('id_customer'));
        $data['title'] = 'User Akun';
        $data['user'] = $user;
        $data['booking'] = $this->models->getBookingUser($this->session->userdata('id_customer'));

        if ($this->input->post()) {
            $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
                'password' => $this->input->post('password') ? $this->input->post('password') : $user->password,
            );

            $this->db->update('tbl_customer', $data, ['id_customer' => $user->id_customer]);
            redirect('home/akun');
        }

        // templates
        $this->load->view('template2/header', $data);
        $this->load->view('akun_v', $data); // content
        $this->load->view('template2/footer', $data);
    }

    public function upload($input)
    {
        $config['upload_path'] = './upload/bukti_pembayaran/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload($input)) {
            $data = $this->upload->data();
        } else {
            $data = $this->upload->display_errors();
        }

        return $data;
    }

    public function invoice($id)
    {
        // cek apakah sudah login sebagai customer
        if (!$this->session->userdata('id_customer')) {
            redirect('auth');
        }
        $paket = $this->models->getBookingByid($id);
        $data['booking'] = $paket;
        $data['pays'] = $this->models->getPembayaran($id);
        $data['title'] = 'Detail Booking - ' . $paket->nama_paket;

        // save data
        if ($this->input->post()) {
            $foto =  $_FILES['bukti_pembayaran']['name'] == '' ? '' : $this->upload('bukti_pembayaran')['file_name'];

            $data = array(
                'id_booking' => $this->input->post('id'),
                'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
                'nominal' => $this->input->post('nominal'),
                'bukti_pembayaran' => 'upload/bukti_pembayaran/' . $foto,
                'ket_pembayaran' => $this->input->post('ket_pembayaran'),
                'tgl_bayar' => date('Y-m-d H:i:s'),
                'status_pembayaran' => 0,
            );

            $this->db->insert('tbl_pembayaran', $data);
            redirect('home/invoice/' . $id);
        }

        // templates
        $this->load->view('template2/header', $data);
        $this->load->view('invoice_v', $data); // content
        $this->load->view('template2/footer', $data);
    }

    public function batalpesan($id)
    {
        $this->models->batalpesan($id);
        redirect('home/akun');
    }

    public function hapusPembayaran($id)
    {
        $result = $this->models->hapusPembayaran($id);
        echo json_encode($result);
    }
}
