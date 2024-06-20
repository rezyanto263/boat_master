<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model
{
    public function checkAccount($table, $param, $value) {
        return $this->db->get_where($table, array($param => $value))->row_array();
    }

    public function registerAccount($data) {
        $this->db->insert('customer', $data);
    }

}
