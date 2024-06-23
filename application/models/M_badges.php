<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_badges extends CI_Model {

    public function getAllBadges() {
        return $this->db->get('badge')->result_array();
    }

    public function checkBadge($param, $badgeData) {
        return $this->db->where($param, $badgeData);
    }

    public function insertBadge($badgeDatas) {
        return $this->db->insert('badge', $badgeDatas);
    }

    public function editBadge($badgeId, $badgeDatas) {
        $this->db->where('badgeId', $badgeId);
        return $this->db->update('badge', $badgeDatas);
    }

    public function deleteBadge($badgeId) {
        $this->db->where('badgeId', $badgeId);
        return $this->db->delete('badge');
    }

}

/* End of file M_badges.php */

?>