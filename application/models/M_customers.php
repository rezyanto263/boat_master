<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_customers extends CI_Model
{

    public function getAllCustomers()
    {
        return $this->db->get('customer')->result_array();
    }

    public function get_user_by_id($custId)
    {
        $this->db->where('custId', $custId);
        $query = $this->db->get('customer');

        return $query->row();
    }

    public function update_user($custId, $data)
    {
        $this->db->where('custId', $custId);
        return $this->db->update('customer', $data);
    }

    // Update password
    public function updatePassword($custId, $data)
    {
        $this->db->where('custId', $custId);
        return $this->db->update('customer', $data);
    }
}

/* End of file M_customers.php */
