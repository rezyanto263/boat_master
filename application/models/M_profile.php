<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_profile extends CI_Model
{

    public function get_user_by_id($custId) {
        $this->db->where('custId', $custId);
        $query = $this->db->get('customer');

        return $query->row();
    }

    public function update_user($custId, $data)
    {
        $this->db->where('custId', $custId);
        return $this->db->update('customer', $data);
    }

}

/* End of file M_profile.php */
