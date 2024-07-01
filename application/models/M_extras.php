<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_extras extends CI_Model {

    public function getAllExtras() {
        return $this->db->get('extra')->result_array();
    }

    public function checkExtra($param, $extraId) {
        return $this->db->get_where('extra', array($param => $extraId));
    }

    public function insertExtra($extraDatas) {
        return $this->db->insert('extra', $extraDatas);
    }

    public function editExtra($extraId, $extraDatas) {
        $this->db->where('extraId', $extraId);
        return $this->db->update('extra', $extraDatas);
    }

    public function deleteExtra($extraId) {
        $this->db->where('extraId', $extraId);
        return $this->db->delete('extra');
    }

}

/* End of file M_extras.php */

?>