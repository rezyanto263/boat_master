<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Boats extends CI_Model {

    public function getAllBoatsWithPictures() {
        $this->db->select('b.*, GROUP_CONCAT(bp.boatpictId SEPARATOR ",") as boatpictIds, GROUP_CONCAT(m.mediaFile SEPARATOR ",") as boatPictures');
        $this->db->from('boat b');
        $this->db->join('boat_pictures bp', 'b.boatId = bp.boatId', 'left');
        $this->db->join('media m', 'bp.mediaId = m.mediaId', 'left');
        $this->db->group_by('b.boatId');
        return $this->db->get()->result_array();
    }

    public function getBoatsWithPictures() {
        $this->db->select('bp.boatpictId, b.*, m.mediaFile');
        $this->db->from('boat_pictures bp');
        $this->db->join('boat b', 'bp.boatId = b.boatId', 'inner');
        $this->db->join('media m', 'bp.mediaId = m.mediaId', 'inner');
        return $this->db->get()->result_array();
    }

    public function insertBoat($boatData) {
        $this->db->insert('boat', $boatData);
        return $this->db->insert_id();
    }

    public function insertMedia($mediaData) {
        $this->db->insert('media', $mediaData);
        return $this->db->insert_id();
    }

    public function insertBoatPictures($boatpictData) {
        return $this->db->insert('boat_pictures', $boatpictData);
    }

    public function checkBoat($param, $value) {
        return $this->db->get_where('boat', array($param => $value));
    }

    public function editBoat($boatId , $boatData) {
        $this->db->where('boatId', $boatId);
        return $this->db->update('boat', $boatData);
    }

    public function delBoat($boatId) {
        $this->db->where('boatId', $boatId);
        $this->db->delete('boat_pictures');
        
        $this->db->where('boatId', $boatId);
        $this->db->delete('boat');
    }

    public function delPictures($boatpictIdDatas) {
        $this->db->where('boatpictId', $boatpictIdDatas);
        $picture = $this->db->get('boat_pictures')->result_array();

        $this->db->where('boatpictId', $boatpictIdDatas);
        $this->db->delete('boat_pictures');

        $this->delMediaFiles($picture['mediaFile']);
    }

    public function delMediaFiles($filename) {
        $file_path = base_url('assets/uploads/' . $filename);
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

}

/* End of file M_Boats.php */

?>