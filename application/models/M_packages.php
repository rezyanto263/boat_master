<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_packages extends CI_Model {

    public function getAllPackagesWithTours() {
        $this->db->select('bp.*, GROUP_CONCAT(pa.pattractionId SEPARATOR ",") as pattractionIds, GROUP_CONCAT(ta.tourId SEPARATOR ",") as tourIds, GROUP_CONCAT(ta.tourName SEPARATOR ",") as tourNames, GROUP_CONCAT(ta.tourDesc SEPARATOR ",") as tourDescs, GROUP_CONCAT(ta.tourTime SEPARATOR ",") as tourTimes');
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
        $this->db->delete('booking_packages');
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