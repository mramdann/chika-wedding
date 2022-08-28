<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getDatatables($table)
    {
        $query = $this->db->select('*')
            ->from($table)
            ->get();

        return $query->result();
    }

    public function getDatatablesBooking($table)
    {
        $query = $this->db->select('*')
            ->from($table . ' a')
            ->join('tbl_paket b', 'a.id_paket = b.id_paket')
            ->join('tbl_customer c', 'a.id_customer = c.id_customer')
            ->order_by('a.id_booking', 'desc')
            ->get();

        return $query->result();
    }

    public function getDatatablesCustomer($table)
    {
        $query = $this->db->select('*')
            ->from($table . ' a')
            ->order_by('a.id_customer', 'desc')
            ->get();

        return $query->result();
    }

    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
        $r = $this->db->insert_id();

        if ($r) {
            $res['status'] = '00';
            $res['mess'] = 'Data berhasil ditambahkan.';
        } else {
            $res['status'] = '01';
            $res['mess'] = 'Data gagal ditambahkan.';
        }
        return $res;
    }

    public function get_by_id($id, $table)
    {
        $this->db->from($table)->where($id);
        return $this->db->get()->row();
    }

    public function update($where, $data, $table)
    {
        $r = $this->db->update($table, $data, $where);

        if ($r) {
            $res['status'] = '00';
            $res['mess'] = 'Data berhasil diupdate.';
        } else {
            $res['status'] = '01';
            $res['mess'] = 'Data gagal diupdate.';
        }
        return $res;
    }

    public function delete_by_id($id, $table)
    {
        $this->db->where($id);
        $r = $this->db->delete($table);

        if ($r) {
            $res['status'] = '00';
            $res['mess'] = 'Data berhasil dihapus.';
        } else {
            $res['status'] = '01';
            $res['mess'] = 'Data gagal dihapus.';
        }

        return $res;
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

    public function getPembayaran($id)
    {
        return $this->db->get_where('tbl_pembayaran', ['id_booking' => $id])->result();
    }

    public function hitungBayar($id)
    {
        $query = $this->db->get_where('tbl_pembayaran', ['id_booking' => $id, 'status_pembayaran' => 1])->result();

        $jlh = 0;
        foreach ($query as $row) {
            $jlh += $row->nominal;
        }

        return $jlh;
    }
}
