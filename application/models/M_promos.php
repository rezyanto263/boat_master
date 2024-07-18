<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_promos extends CI_Model {

    public function getAllPromos() {
        return $this->db->get('promo_code')->result_array();
    }

    public function getPromoByName($procodeName) {
        return $this->db->get_where('promo_code', array('procodeName' => $procodeName))->row_array();
    }

    public function checkPromo($procodeId) {
        return $this->db->get_where('promo_code', array('procodeId' => $procodeId));
    }

    public function insertPromo($promoDatas) {
        return $this->db->insert('promo_code', $promoDatas);
    }

    public function delPromo($procodeId) {
        $this->db->where('procodeId', $procodeId);
        return $this->db->delete('promo_code');
    }

    public function editPromo($procodeId, $promoDatas) {
        $this->db->where('procodeId', $procodeId);
        return $this->db->update('promo_code', $promoDatas);
    }

}

/* End of file M_promos.php */

?>