<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_bookings extends CI_Model {

    public function getAllBookings() {
        $this->db->select('bt.*, 
        c.custId, c.custName, c.custEmail, b.boatId, b.boatName, bp.packageName, pc.procodeName, pc.procodeDiscount, b.boatStartPoint, 
        GROUP_CONCAT(DISTINCT be.extraId ORDER BY be.extraId SEPARATOR ",") as bookextraIds, 
        GROUP_CONCAT(DISTINCT e.extraName ORDER BY e.extraName SEPARATOR ",") as bookextraNames');
        $this->db->from('booking_ticket bt');
        $this->db->join('customer c', 'bt.custId = c.custId');
        $this->db->join('boat b', 'bt.boatId = b.boatId');
        $this->db->join('booking_packages bp', 'bt.packageId = bp.packageId');
        $this->db->join('promo_code pc', 'bt.procodeId = pc.procodeId');
        $this->db->join('booking_extras be', 'bt.bookId = be.bookId', 'left');
        $this->db->join('extra e', 'be.extraId = e.extraId', 'left');
        $this->db->group_by('bt.bookId');
        return $this->db->get()->result_array();
    }

    public function getAllBookingsByCustomerId($custId) {
        $this->db->select('bt.*, 
        c.custId, c.custName, c.custEmail, b.boatId, b.boatName, b.boatType, bp.packageName, pc.procodeName, pc.procodeDiscount, b.boatStartPoint, 
        GROUP_CONCAT(DISTINCT be.extraId ORDER BY be.extraId SEPARATOR ",") as bookextraIds, 
        GROUP_CONCAT(DISTINCT e.extraName ORDER BY e.extraName SEPARATOR ",") as bookextraNames');
        $this->db->from('booking_ticket bt');
        $this->db->join('customer c', 'bt.custId = c.custId');
        $this->db->join('boat b', 'bt.boatId = b.boatId');
        $this->db->join('booking_packages bp', 'bt.packageId = bp.packageId');
        $this->db->join('promo_code pc', 'bt.procodeId = pc.procodeId');
        $this->db->join('booking_extras be', 'bt.bookId = be.bookId', 'left');
        $this->db->join('extra e', 'be.extraId = e.extraId', 'left');
        $this->db->group_by('bt.bookId');
        $this->db->where('c.custId', $custId);
        return $this->db->get()->result_array();
    }

    public function checkBooking($bookId) {
        return $this->db->get_where('booking_ticket', array('bookId' => $bookId));
    }

    public function insertBooking($bookingDatas) {
        $this->db->insert('booking_ticket', $bookingDatas);
        return $this->db->insert_id();
    }

    public function insertBookExtras($bookextrasDatas) {
        return $this->db->insert('booking_extras', $bookextrasDatas);
    }

    public function editBooking($bookId, $bookingDatas) {
        $this->db->where('bookId', $bookId);
        return $this->db->update('booking_ticket', $bookingDatas);
    }

    public function deleteAllBookExtras($bookId) {
        $this->db->where('bookId', $bookId);
        return $this->db->delete('booking_extras');
    }

    public function deleteBooking($bookId) {
        $this->db->where('bookId', $bookId);
        $this->db->delete('booking_extras');

        $this->db->where('bookId', $bookId);
        return $this->db->delete('booking_ticket'); 
    }

}

/* End of file M_dashboard.php */

?>