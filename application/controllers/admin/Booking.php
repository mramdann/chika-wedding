<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_m', 'models');

        // cek apakah sudah login atau belum
        if (!$this->session->userdata('id_user')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Booking';
        $data['module'] = 'admin/booking/';

        // templates
        $this->load->view('template/_header', $data);
        $this->load->view('admin/booking_v', $data); // content
        $this->load->view('template/_footer', $data);
    }

    public function detail($id)
    {
        $paket = $this->models->getBookingByid($id);
        $data['booking'] = $paket;
        $data['pays'] = $this->models->getPembayaran($id);

        $data['title'] = 'Detail Booking - ' . $paket->nama_paket;
        $data['module'] = 'admin/booking/';

        // templates
        $this->load->view('template/_header', $data);
        $this->load->view('admin/booking_detail_v', $data); // content
        $this->load->view('template/_footer', $data);
    }

    public function ajax_list()
    {
        $list = $this->models->getDatatablesBooking('tbl_booking');

        $data = array();
        $status = '';
        $st = '';
        $no = 0;
        foreach ($list as $dd) {
            $no++;
            $row = array();

            $pembayaran = $this->models->hitungBayar($dd->id_booking);

            if ($dd->harga == $pembayaran) {
                $status = '<span class="badge badge-success">Lunas</span>';
            } else {
                $status = '<span class="badge badge-danger">Belum Lunas</span>';
            }

            if ($dd->status == 'Menunggu Konfirmasi Admin') {
                $st = '<span class="badge badge-warning">' . $dd->status . '</span>';
            } else if ($dd->status == 'Menunggu Pembayaran Uang Muka (DP)') {
                $st = '<span class="badge badge-info">' . $dd->status . '</span>';
            } else if ($dd->status == 'Kunci Tanggal') {
                $st = '<span class="badge badge-primary">' . $dd->status . '</span>';
            } else if ($dd->status == 'Selesai') {
                $st = '<span class="badge badge-success">' . $dd->status . '</span>';
            } else if ($dd->status == 'Pesanan Ditolak') {
                $st = '<span class="badge badge-danger">' . $dd->status . '</span><br> Catatan : ' . $dd->catatan;
            } else if ($dd->status == 'Customer membatalkan pesanan') {
                $st = '<span class="badge badge-danger">' . $dd->status . '</span>';
            }

            $row[] = $no;
            $row[] = $dd->nama_lengkap;
            $row[] = $dd->nama_paket;
            $row[] = $dd->tgl_booking;
            $row[] = $dd->tgl_acara;
            $row[] = $dd->lokasi;
            $row[] = 'Rp. ' . number_format($dd->harga);
            $row[] = 'Rp. ' . number_format($pembayaran);
            $row[] = $status;
            $row[] = $st;

            // add html for action
            $row[] = '<a href="' . base_url('admin/booking/detail/' . $dd->id_booking) . '" title="Lihat Detail Booking"><i class="align-middle fas fa-fw fa-eye"></i></a>
                <a href="javascript:void(0)" title="Hapus" onclick="hapus(' . "'" . $dd->id_booking . "'" . ')"><i class="align-middle fas fa-fw fa-trash"></i></a>';

            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function upload($input)
    {
        $config['upload_path'] = './upload/';
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

    public function ajax_add()
    {
        $foto =  $_FILES['foto']['name'] == '' ? '' : $this->upload('foto')['file_name'];
        $foto2 =  $_FILES['foto2']['name'] == '' ? '' : $this->upload('foto2')['file_name'];

        $data = array(
            'nama_paket' => $this->input->post('nama_paket'),
            'harga' => $this->input->post('harga'),
            'kategori' => $this->input->post('kategori'),
            'deskripsi' => $this->input->post('deskripsi'),
            'foto' => $foto,
            'foto2' => $foto2,
            'tgl_buat' => date('Y-m-d H:i:s'),
        );

        $result = $this->models->insert($data, 'tbl_booking');
        echo json_encode($result);
    }

    public function ajax_edit($id)
    {
        $data = $this->models->get_by_id(['id_booking' => $id], 'tbl_booking');
        echo json_encode($data);
    }

    public function ajax_update()
    {
        $get = $this->models->get_by_id(['id_booking' => $this->input->post('id')], 'tbl_booking');
        $foto = $_FILES['foto']['name'] ? $this->upload('foto')['file_name'] : ($get ? $get->foto : '');
        $foto2 = $_FILES['foto2']['name'] ? $this->upload('foto2')['file_name'] : ($get ? $get->foto2 : '');

        $data = array(
            'nama_paket' => $this->input->post('nama_paket'),
            'harga' => $this->input->post('harga'),
            'kategori' => $this->input->post('kategori'),
            'deskripsi' => $this->input->post('deskripsi'),
            'foto' => $foto,
            'foto2' => $foto2,
            'tgl_buat' => date('Y-m-d H:i:s'),
        );

        $result = $this->models->update(array('id_booking' => $this->input->post('id')), $data, 'tbl_booking');
        echo json_encode($result);
    }

    public function ajax_delete($id)
    {
        $result = $this->models->delete_by_id(['id_booking' => $id], 'tbl_booking');

        $this->db->where('id_booking', $id);
        $this->db->delete('tbl_pembayaran');
        echo json_encode($result);
    }

    public function konfirmasi($id)
    {
        $data = array(
            'status' => 'Menunggu Pembayaran Uang Muka (DP)',
        );

        $result = $this->models->update(array('id_booking' => $id), $data, 'tbl_booking');
        echo json_encode($result);
    }
    public function selesai($id)
    {
        $data = array(
            'status' => 'Selesai',
        );

        $result = $this->models->update(array('id_booking' => $id), $data, 'tbl_booking');
        echo json_encode($result);
    }

    public function batal()
    {
        $data = array(
            'status' => 'Pesanan Ditolak',
            'catatan' => $this->input->post('catatan'),
        );

        $result = $this->models->update(array('id_booking' => $this->input->post('id')), $data, 'tbl_booking');
        echo json_encode($result);
    }

    public function acc($id)
    {
        $data = array(
            'status_pembayaran' => 1,
        );

        $result = $this->models->update(array('id_pembayaran' => $id), $data, 'tbl_pembayaran');
        echo json_encode($result);

        $idnya = $this->db->get_where('tbl_pembayaran', ['id_pembayaran' => $id])->row();
        $cek = $this->models->getPembayaran($idnya->id_booking);
        foreach ($cek as $dd) {
            if ($dd->status_pembayaran == 1 && $dd->jenis_pembayaran == 'Uang Muka (DP)') {
                $this->db->update('tbl_booking', ['status' => 'Kunci Tanggal'], ['id_booking' => $dd->id_booking]);
            }
        }
    }

    public function tolak($id)
    {
        $data = array(
            'status_pembayaran' => 2,
        );

        $result = $this->models->update(array('id_pembayaran' => $id), $data, 'tbl_pembayaran');
        echo json_encode($result);
    }
}
