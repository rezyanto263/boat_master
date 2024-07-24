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

    public function getBookingsByCustIdAndBookId($custId, $bookId) {
        $this->db->select('bt.*, 
        c.custId, b.boatName, b.boatType, b.boatPrice, bp.packageName, bp.packagePrice, pc.procodeName, pc.procodeDiscount, b.boatStartPoint, 
        GROUP_CONCAT(DISTINCT be.extraId ORDER BY be.extraId SEPARATOR ",") as bookextraIds, 
        GROUP_CONCAT(DISTINCT e.extraName ORDER BY e.extraName SEPARATOR ",") as bookextraNames,
        GROUP_CONCAT(DISTINCT e.extraPrice ORDER BY e.extraPrice SEPARATOR ",") as bookextraPrices,
        GROUP_CONCAT(DISTINCT m.mediaFile ORDER BY m.mediaFile SEPARATOR ",") as boatPicture');
        $this->db->from('booking_ticket bt');
        $this->db->join('customer c', 'bt.custId = c.custId');
        $this->db->join('boat b', 'bt.boatId = b.boatId');
        $this->db->join('boat_pictures bpi', 'b.boatId = bpi.boatId');
        $this->db->join('media m', 'bpi.mediaId = m.mediaId');
        $this->db->join('booking_packages bp', 'bt.packageId = bp.packageId');
        $this->db->join('promo_code pc', 'bt.procodeId = pc.procodeId');
        $this->db->join('booking_extras be', 'bt.bookId = be.bookId', 'left');
        $this->db->join('extra e', 'be.extraId = e.extraId', 'left');
        $this->db->group_by('bt.bookId');
        $this->db->where('c.custId', $custId);
        $this->db->where('bt.bookId', $bookId);
        return $this->db->get()->row_array();
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

    public function insertBookExpiredDateTime($bookId, $bookExpiredAt) {
        $this->db->where('bookId', $bookId);
        return $this->db->update('booking_ticket', array('bookExpiredAt' => $bookExpiredAt, 'bookStatus' => 'Not Paid'));
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

    public function autoCancelExpiredBooking() {
        $currentDateTime = date('Y-m-d H:i:s');
        $this->db->where('bookExpiredAt <', $currentDateTime);
        $this->db->where('bookStatus', 'Not Paid');
        $expiredBookings = $this->db->get('booking_ticket')->result_array();

        if (!empty($expiredBookings)) {
            foreach ($expiredBookings as $booking) {
                $this->db->where('bookId', $booking['bookId']);
                $this->db->update('booking_ticket', array('bookStatus' => 'Cancelled'));
                $this->cancelBookingNotification($booking['bookId'], $booking['custId']);
            }
        }

        return $expiredBookings;
    }

    public function getAllNotifications() {
        return $this->db->get('notifications')->result_array();
    }

    public function addBookingNotification($bookId, $custId) {
        $custData = $this->db->get_where('customer', array('custId' => $custId))->row_array();
        
        return $this->db->insert('notifications', array('bookId' => $bookId, 'custName' => $custData['custName'], 'notifStatus' => 'Unclicked', 'notifCreatedAt' => date('Y-m-d H:i:s')));
    }

    public function cancelBookingNotification($bookId, $custId) {
        $custData = $this->db->get_where('customer', array('custId' => $custId))->row_array();
        
        return $this->db->insert('notifications', array('bookId' => $bookId, 'custName' => $custData['custName'], 'notifStatus' => 'Cancelled', 'notifCreatedAt' => date('Y-m-d H:i:s')));
    }

    public function editNotificationStatus($notifId, $notifStatus) {
        $this->db->where('notifId', $notifId);
        return $this->db->update('notifications', array('notifStatus' => $notifStatus));
    }

}

/* End of file M_dashboard.php */

?>