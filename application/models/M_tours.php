<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_tours extends CI_Model {

    public function getAllTours() {
        return $this->db->get('tourist_attraction')->result_array();
    }

    

}

/* End of file M_tours.php */

?>