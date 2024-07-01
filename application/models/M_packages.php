<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_packages extends CI_Model {

    public function getAllPackagesWithToursAndBadges() {
        $this->db->select('bp.*, 
            (SELECT GROUP_CONCAT(pattractionId SEPARATOR ",") FROM package_attraction WHERE packageId = bp.packageId) as pattractionIds,
            (SELECT GROUP_CONCAT(tourId SEPARATOR ",") FROM package_attraction WHERE packageId = bp.packageId) as tourIds,
            (SELECT GROUP_CONCAT(tourName SEPARATOR ",") FROM tourist_attraction WHERE tourId IN (SELECT tourId FROM package_attraction WHERE packageId = bp.packageId)) as tourNames,
            (SELECT GROUP_CONCAT(tourDesc SEPARATOR ",") FROM tourist_attraction WHERE tourId IN (SELECT tourId FROM package_attraction WHERE packageId = bp.packageId)) as tourDescs,
            (SELECT GROUP_CONCAT(tourTime SEPARATOR ",") FROM tourist_attraction WHERE tourId IN (SELECT tourId FROM package_attraction WHERE packageId = bp.packageId)) as tourTimes,
            (SELECT GROUP_CONCAT(badgeId SEPARATOR ",") FROM package_badges WHERE packageId = bp.packageId) as packagebadgeIds, 
            (SELECT GROUP_CONCAT(badgeName SEPARATOR ",") FROM badge WHERE badgeId IN (SELECT badgeId FROM package_badges WHERE packageId = bp.packageId)) as packagebadgeNames');
        $this->db->from('booking_packages bp');
        $this->db->group_by('bp.packageId');
        return $this->db->get()->result_array();
    }

    public function getAllPackagesWithBadges() {
        $this->db->select('bp.*, 
            GROUP_CONCAT(pb.badgeId SEPARATOR ",") as packagebadgeIds, 
            GROUP_CONCAT(bg.badgeName SEPARATOR ",") as packagebadgeNames');
        $this->db->from('booking_packages bp');
        $this->db->join('package_badges pb', 'bp.packageId = pb.packageId', 'left');
        $this->db->join('badge bg', 'pb.badgeId = bg.badgeId', 'left');
        $this->db->group_by('bp.packageId');
        return $this->db->get()->result_array();
    }

    public function getAllPackagesWithTours() {
        $this->db->select('bp.*, 
            GROUP_CONCAT(pa.pattractionId SEPARATOR ",") as pattractionIds, 
            GROUP_CONCAT(pa.tourId SEPARATOR ",") as tourIds, 
            GROUP_CONCAT(ta.tourName SEPARATOR ",") as tourNames, 
            GROUP_CONCAT(ta.tourDesc SEPARATOR ",") as tourDescs, 
            GROUP_CONCAT(ta.tourTime SEPARATOR ",") as tourTimes');
        $this->db->from('booking_packages bp');
        $this->db->join('package_attraction pa', 'bp.packageId = pa.packageId', 'left');
        $this->db->join('tourist_attraction ta', 'pa.tourId = ta.tourId', 'left');
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