<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Boats extends CI_Model {

    public function getAllBoatsWithPicturesAndBadges() {
        $this->db->select('b.*, 
            GROUP_CONCAT(DISTINCT bp.boatpictId ORDER BY bp.boatpictId SEPARATOR ",") as boatpictIds, 
            GROUP_CONCAT(DISTINCT m.mediaFile ORDER BY m.mediaFile SEPARATOR ",") as boatPictures, 
            GROUP_CONCAT(DISTINCT bb.badgeId ORDER BY bb.badgeId SEPARATOR ",") as boatbadgeIds, 
            GROUP_CONCAT(DISTINCT bg.badgeName ORDER BY bg.badgeName SEPARATOR ",") as boatbadgeNames');
        $this->db->from('boat b');
        $this->db->join('boat_pictures bp', 'b.boatId = bp.boatId', 'left');
        $this->db->join('media m', 'bp.mediaId = m.mediaId', 'left');
        $this->db->join('boat_badges bb', 'b.boatId = bb.boatId', 'left');
        $this->db->join('badge bg', 'bb.badgeId = bg.badgeId', 'left');
        $this->db->group_by('b.boatId');
        return $this->db->get()->result_array();
    }

    public function getAllBoatWithPicturesAndBadgesById($boatId) {
        $this->db->select('b.*, 
            GROUP_CONCAT(DISTINCT bp.boatpictId ORDER BY bp.boatpictId SEPARATOR ",") as boatpictIds, 
            GROUP_CONCAT(DISTINCT m.mediaFile ORDER BY m.mediaFile SEPARATOR ",") as boatPictures, 
            GROUP_CONCAT(DISTINCT bb.badgeId ORDER BY bb.badgeId SEPARATOR ",") as boatbadgeIds, 
            GROUP_CONCAT(DISTINCT bg.badgeName ORDER BY bg.badgeName SEPARATOR ",") as boatbadgeNames');
        $this->db->from('boat b');
        $this->db->join('boat_pictures bp', 'b.boatId = bp.boatId', 'left');
        $this->db->join('media m', 'bp.mediaId = m.mediaId', 'left');
        $this->db->join('boat_badges bb', 'b.boatId = bb.boatId', 'left');
        $this->db->join('badge bg', 'bb.badgeId = bg.badgeId', 'left');
        $this->db->group_by('b.boatId');
        $this->db->where('b.boatId', $boatId);
        return $this->db->get()->result_array();
    }

    public function searchBoat($searchDatas) {
        $bookDatas = [];
    
        $this->db->select('bt.boatId, boat.maxPeople, boat.boatType, SUM(bt.bookAdults + bt.bookTeens) as bookedPassengers');
        $this->db->from('booking_ticket bt');
        $this->db->join('boat', 'bt.boatId = boat.boatId');
        $this->db->where('bt.bookSchedule', $searchDatas['bookSchedule']);
        $this->db->where('bt.bookStatus !=', 'Cancelled');
        $this->db->group_by('bt.boatId');
        $this->db->having('((bookedPassengers + '.$searchDatas["maxPeople"].') > boat.maxPeople AND boat.boatType = "Shared") OR boat.boatType = "Private"');
        $bookDatas = $this->db->get()->result_array();
    
        $this->db->select('b.*,
            GROUP_CONCAT(DISTINCT bp.boatpictId ORDER BY bp.boatpictId SEPARATOR ",") as boatpictIds, 
            GROUP_CONCAT(DISTINCT m.mediaFile ORDER BY m.mediaFile SEPARATOR ",") as boatPictures, 
            GROUP_CONCAT(DISTINCT bb.badgeId ORDER BY bb.badgeId SEPARATOR ",") as boatbadgeIds, 
            GROUP_CONCAT(DISTINCT bg.badgeName ORDER BY bg.badgeName SEPARATOR ",") as boatbadgeNames');
        $this->db->from('boat b');
        $this->db->join('boat_pictures bp', 'b.boatId = bp.boatId', 'left');
        $this->db->join('media m', 'bp.mediaId = m.mediaId', 'left');
        $this->db->join('boat_badges bb', 'b.boatId = bb.boatId', 'left');
        $this->db->join('badge bg', 'bb.badgeId = bg.badgeId', 'left');
        
        if ($searchDatas['boatStartPoint'] != 'All') {
            $this->db->where('b.boatStartPoint', $searchDatas['boatStartPoint']);
        }
        if ($searchDatas['boatType'] != 'All') {
            $this->db->where('b.boatType', $searchDatas['boatType']);
        }
        if (!empty($bookDatas)) {
            $bookedBoatIds = array_column($bookDatas, 'boatId');
            $this->db->where_not_in('b.boatId', $bookedBoatIds);
        }
        $this->db->where('b.boatStatus !=', 'Repair');
        if (isset($searchDatas['maxPeople'])) {
            $this->db->where('b.maxPeople >=', $searchDatas['maxPeople']);
        }
        $this->db->group_by('b.boatId');
        
        return $this->db->get()->result_array();
    }

    public function bookedBoats($searchDatas) {
        $bookDatas = [];
        $this->db->select('bt.boatId, boat.maxPeople, boat.boatType, SUM(bt.bookAdults + bt.bookTeens) as bookedPassengers');
        $this->db->from('booking_ticket bt');
        $this->db->join('boat', 'bt.boatId = boat.boatId');
        $this->db->where('bt.bookSchedule', $searchDatas['bookSchedule']);
        $this->db->where('bt.bookStatus !=', 'Cancelled');
        $this->db->group_by('bt.boatId');
        $this->db->having('(bookedPassengers <= boat.maxPeople AND boat.boatType = "Shared") OR boat.boatType = "Private"');
        $bookDatas = $this->db->get()->result_array();
        return $bookDatas;
    }
    

    public function insertBadges($boatbadgesDatas) {
        return $this->db->insert('boat_badges', $boatbadgesDatas);
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

    public function checkBoatWithBookingSchedule($bookSchedule) {
        $this->db->where('bookSchedule', $bookSchedule);
        return $this->db->get('booking_ticket')->result_array();
    }

    public function editBoat($boatId , $boatData) {
        $this->db->where('boatId', $boatId);
        return $this->db->update('boat', $boatData);
    }

    public function deleteAllBadges($boatId) {
        $this->db->where('boatId', $boatId);
        $this->db->delete('boat_badges');
    }

    public function delBoat($boatId) {
        $this->db->where('boatId', $boatId);
        $this->db->delete('boat_pictures');

        $this->db->where('boatId', $boatId);
        $this->db->delete('boat_badges');

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