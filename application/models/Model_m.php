<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_m extends CI_Model
{
    // var $table = 'tbl_users';

    public function __construct()
    {
        parent::__construct();
    }

    public function getPaketByid($id)
    {
        $this->db->where('id_paket', $id);
        $query = $this->db->get('tbl_paket');
        return $query->row();
    }

    public function getPaket($cari = null)
    {
        if ($cari != '') {
            $this->db->like('nama_paket', $cari);
        }
        return $this->db->get('tbl_paket')->result();
    }

    public function getKategori()
    {
        // select distinct kategori from tbl_paket
        return $this->db->query("select distinct kategori from tbl_paket")->result();
    }

    public function getUserByid($id)
    {
        $this->db->where('id_customer', $id);
        $query = $this->db->get('tbl_customer');
        return $query->row();
    }
}
