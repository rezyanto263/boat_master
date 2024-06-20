<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_bookings extends CI_Model {

    public function getAllData($table) {
        $this->db->select('booking_ticket.*, customer.custName, customer.custEmail, boats.boatName, promo_code.promoName, promo_code.discount');
        $this->db->from('booking_ticket');
        $this->db->join('customer', 'booking_ticket.custID = customer.custId');
        $this->db->join('boats', 'booking_ticket.boatID = boats.boatId');
        $this->db->join('promo_code', 'booking_ticket.procodeId = promo_code.procodeId');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertBooking($datas) {
        return $this->db->insert('booking_ticket', $datas);
    }

    public function updateBooking() {
        
    }

}

/* End of file M_dashboard.php */

?>