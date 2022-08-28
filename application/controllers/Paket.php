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
        $data['kategori'] = $this->models->getKategori();

        // templates
        $this->load->view('template2/header', $data);
        $this->load->view('paket_v', $data); // content
        $this->load->view('template2/footer', $data);
    }

    public function detail()
    {
        $id = $this->uri->segment(3);
        $paket = $this->models->getPaketByid($id);
        $data['title'] = 'Paket ' . $paket->nama_paket;
        $data['paket'] = $paket;

        // templates
        $this->load->view('template2/header', $data);
        $this->load->view('detail_v', $data); // content
        $this->load->view('template2/footer', $data);
    }

    public function pesan($id)
    {
        // cek apakah user sudah login
        if (!$this->session->userdata('id_customer')) {
            redirect('auth');
        }

        $paket = $this->models->getPaketByid($id);
        $data['title'] = 'Form Booking Paket';
        $data['paket'] = $paket;
        $data['user'] = $this->models->getUserByid($this->session->userdata('id_customer'));

        if ($this->input->post()) {

            $data = [
                'id_customer' => $this->session->userdata('id_customer'),
                'id_paket' => $id,
                'tgl_booking' => date('Y-m-d H:i:s'),
                'lokasi' => $this->input->post('lokasi'),
                'tgl_acara' => $this->input->post('tgl_acara'),
                'catatan_pesanan' => $this->input->post('catatan_pesanan'),
                'status' => 'Menunggu Konfirmasi Admin',
            ];

            $this->models->save($data);
            redirect('home/akun');
        }

        // templates
        $this->load->view('template2/header', $data);
        $this->load->view('pesan_v', $data); // content
        $this->load->view('template2/footer', $data);
    }

    public function getPaket()
    {
        $cari = $this->input->post('cari');
        $list = $this->models->getPaket($cari);

        $paket = '';
        foreach ($list as $dd) {

            $paket .= '<div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="wpo-product-item">
                            <div class="wpo-product-img">
                                <img src="' . base_url('upload/' . $dd->foto) . '" alt="">
                                <a href="' . base_url('paket/pesan/' . $dd->id_paket) . '">Pesan Sekarang</a>
                            </div>
                            <div class="wpo-product-text">
                                <h3><a href="' . base_url('paket/detail/' . $dd->id_paket) . '">' . $dd->nama_paket . '</a></h3>
                                <span>Rp. ' . number_format($dd->harga) . '</span>
                            </div>
                        </div>
                    </div>';
        }

        $data['paket'] = $paket;
        $data['jumlah'] = count($list);

        echo json_encode($data);
    }
}
