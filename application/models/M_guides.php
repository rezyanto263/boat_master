<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_guides extends CI_Model {

    public function getAllGuides() {
        return $this->db->get('guides')->result_array();
    }

    public function checkGuides($param, $guidesId) {
        return $this->db->get_where('guides', array($param => $guidesId));
    }

    public function insertGuides($guidesDatas) {
        return $this->db->insert('guides', $guidesDatas);
    }

    public function editGuides($guidesId, $guidesDatas) {
        $this->db->where('guidesId', $guidesId);
        return $this->db->update('guides', $guidesDatas);
    }

    public function deleteGuides($guidesId) {
        $this->db->where('guidesId', $guidesId);
        return $this->db->delete('guides');
    }

}

/* End of file M_guides.php */

?>