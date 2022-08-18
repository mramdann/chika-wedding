<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{
    var $table = 'tbl_users';

    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            // return false;
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $query2 = $this->db->get('tbl_customer');

            if ($query2->num_rows() > 0) {
                return $query2->row();
            } else {
                return false;
            }
        }
    }

    public function register($data)
    {
        $this->db->insert('tbl_customer', $data);
        $r =  $this->db->insert_id();
        if ($r) {
            return true;
        } else {
            return false;
        }
    }
}
