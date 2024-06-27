<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_packages extends CI_Model {

    public function getAllPackagesWithToursAndBadges() {
        $this->db->select('bp.*, 
            GROUP_CONCAT(DISTINCT pa.pattractionId ORDER BY pa.pattractionId SEPARATOR ",") as pattractionIds, 
            GROUP_CONCAT(DISTINCT ta.tourId ORDER BY ta.tourId SEPARATOR ",") as tourIds, 
            GROUP_CONCAT(DISTINCT ta.tourName ORDER BY ta.tourName SEPARATOR ",") as tourNames, 
            GROUP_CONCAT(DISTINCT ta.tourDesc ORDER BY ta.tourDesc SEPARATOR ",") as tourDescs, 
            GROUP_CONCAT(DISTINCT ta.tourTime ORDER BY ta.tourTime SEPARATOR ",") as tourTimes,
            GROUP_CONCAT(DISTINCT pb.badgeId ORDER BY pb.badgeId SEPARATOR ",") as packagebadgeIds, 
            GROUP_CONCAT(DISTINCT bg.badgeName ORDER BY bg.badgeName SEPARATOR ",") as packagebadgeNames');
        $this->db->from('booking_packages bp');
        $this->db->join('package_attraction pa', 'bp.packageId = pa.packageId', 'left');
        $this->db->join('tourist_attraction ta', 'pa.tourId = ta.tourId', 'left');
        $this->db->join('package_badges pb', 'bp.packageId = pb.packageId', 'left');
        $this->db->join('badge bg', 'pb.badgeId = bg.badgeId', 'left');
        $this->db->group_by('bp.packageId');
        return $this->db->get()->result_array();
    }

    public function checkPackage($packageId) {
        $this->db->where('packageId', $packageId);
        return $this->db->get('booking_packages');
    }

    public function insertBadges($packagebadgesDatas) {
        return $this->db->insert('package_badges', $packagebadgesDatas);
    }

    public function insertPackage($packageDatas) {
        $this->db->insert('booking_packages', $packageDatas);
        return $this->db->insert_id();
    }

    public function insertPattraction($pattractionDatas) {
        return $this->db->insert('package_attraction', $pattractionDatas);
    }

    public function insertTour($tourDatas) {
        $this->db->insert('tourist_attraction', $tourDatas);
        return $this->db->insert_id();
    }

    public function editPackage($packageId, $packageDatas) {
        $this->db->where('packageId', $packageId);
        return $this->db->update('booking_packages', $packageDatas);
    }

    public function editTour($tourId, $tourDatas) {
        $this->db->where('tourId', $tourId);
        return $this->db->update('tourist_attraction', $tourDatas);
    }

    public function deletePackage($packageId) {
        
        $this->db->where('packageId', $packageId);
        $pattractionDatas = $this->db->get('package_attraction')->result_array();

        foreach ($pattractionDatas as $key) {
            $this->db->where('tourId', $key['tourId']);
            $this->db->delete('package_attraction');
            $this->db->where('tourId', $key['tourId']);
            $this->db->delete('tourist_attraction');
        }

        $this->db->where('packageId', $packageId);
        $this->db->delete('package_badges');

        $this->db->where('packageId', $packageId);
        $this->db->delete('booking_packages');
    }

    public function deleteAllBadges($packageId) {
        $this->db->where('packageId', $packageId);
        $this->db->delete('package_badges');
    }

    public function deleteTour($tourId) {
        $this->db->where('tourId', $tourId);
        $this->db->delete('package_attraction');
        $this->db->where('tourId', $tourId);
        $this->db->delete('tourist_attraction');
    }

}

/* End of file M_packages.php */

?>