<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gallery extends CI_Model
{
    function edit_data($where,$table)
    {
        return $this->db->get_where($table,$where);
    }

    function get_data($table, $where = NULL) {
        if($where) {
            $this->db->where($where);
        }
        return $this->db->get($table);
    }

    function insert_data($data,$table)
    {
        $this->db->insert($table,$data);
    }

    function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function delete_data($where,$table)
    {
        $this->db->where($where);
        $this->db->update($table);
    }
}
