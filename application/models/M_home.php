<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

    public function getAllGalleryVideo() {
        $this->db->where('mediaType', 'video');
        return $this->db->get('media')->result_array();
    }

}

/* End of file M_home.php */

?>