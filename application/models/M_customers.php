<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_customers extends CI_Model {

    public function getAllCustomers() {
        return $this->db->get('customer')->result_array();
    }

}

/* End of file M_customers.php */

?>