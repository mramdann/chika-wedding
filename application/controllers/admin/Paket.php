<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
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
        $data['title'] = 'Data Paket';
        $data['module'] = 'admin/paket/';

        // templates
        $this->load->view('template/_header', $data);
        $this->load->view('admin/paket_v', $data); // content
        $this->load->view('template/_footer', $data);
    }

    public function ajax_list()
    {
        $list = $this->models->getDatatables('tbl_paket');

        $data = array();
        $foto = '';
        $no = 0;
        foreach ($list as $dd) {
            $no++;
            $row = array();

            if ($dd->foto !== '') {
                $foto = '<img src="' . base_url('upload/' . $dd->foto) . '" alt="' . $dd->foto . '" class="img-profile" style="width: 100px"> ';
            }

            $row[] = $no;
            $row[] = $foto . $dd->nama_paket;
            $row[] = $dd->kategori;
            $row[] = $dd->deskripsi;
            $row[] = $dd->harga;
            $row[] = $dd->tgl_buat;
            $row[] = $dd->dipesan;

            // add html for action
            $row[] = '<a href="javascript:void(0)" title="Edit" onclick="edit(' . "'" . $dd->id_paket . "'" . ')"><i class="align-middle fas fa-fw fa-pen"></i></a>
                <a href="javascript:void(0)" title="Hapus" onclick="hapus(' . "'" . $dd->id_paket . "'" . ')"><i class="align-middle fas fa-fw fa-trash"></i></a>';

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

        $result = $this->models->insert($data, 'tbl_paket');
        echo json_encode($result);
    }

    public function ajax_edit($id)
    {
        $data = $this->models->get_by_id(['id_paket' => $id], 'tbl_paket');
        echo json_encode($data);
    }

    public function ajax_update()
    {
        $get = $this->models->get_by_id(['id_paket' => $this->input->post('id')], 'tbl_paket');
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

        $result = $this->models->update(array('id_paket' => $this->input->post('id')), $data, 'tbl_paket');
        echo json_encode($result);
    }

    public function ajax_delete($id)
    {
        $result = $this->models->delete_by_id(['id_paket' => $id], 'tbl_paket');
        echo json_encode($result);
    }
}
