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

    public function save($data)
    {
        $this->db->insert('tbl_booking', $data);
        return true;
    }

    public function getBookingUser($id)
    {
        $query = $this->db->select('*')
            ->from('tbl_booking a')
            ->join('tbl_paket b', 'a.id_paket = b.id_paket')
            ->join('tbl_customer c', 'a.id_customer = c.id_customer')
            ->where('a.id_customer', $id)
            ->where_not_in('a.status', 'Customer membatalkan pesanan')
            ->order_by('a.id_booking', 'desc')
            ->get();
        return $query->result();
    }

    public function getBookingByid($id)
    {
        $query = $this->db->select('*')
            ->from('tbl_booking a')
            ->join('tbl_paket b', 'a.id_paket = b.id_paket')
            ->join('tbl_customer c', 'a.id_customer = c.id_customer')
            ->where('a.id_booking', $id)
            ->order_by('a.id_booking', 'desc')
            ->get();
        return $query->row();
    }

    public function batalpesan($id)
    {
        return $this->db->update('tbl_booking', ['status' => 'Customer membatalkan pesanan'], ['id_booking' => $id]);
    }

    public function getPembayaran($id)
    {
        return $this->db->get_where('tbl_pembayaran', ['id_booking' => $id])->result();
    }

    public function hapusPembayaran($id)
    {
        $this->db->where('id_pembayaran', $id);
        $r = $this->db->delete('tbl_pembayaran');

        if ($r) {
            $res['status'] = '00';
            $res['mess'] = 'Data berhasil dihapus.';
        } else {
            $res['status'] = '01';
            $res['mess'] = 'Data gagal dihapus.';
        }

        return $res;
    }
}
