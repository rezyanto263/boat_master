<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_profile extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Fetch user data by customer ID
    public function get_user_by_id($custId)
    {
        $this->db->where('custId', $custId);
        $query = $this->db->get('customer');

        return $query->row();
    }

    // Update user data
    public function update_user($custId, $data)
    {
        $this->db->where('custId', $custId);
        return $this->db->update('customer', $data);
    }
    public function updatePassword($custId, $hashedPassword)
    {
        $this->db->where('custId', $custId);
        return $this->db->update('customers', ['password' => $hashedPassword]);
    }
}

/* End of file M_profile.php */
