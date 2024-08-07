<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_chart extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->database();
    }

    public function get_monthly_booking_data($year = null)
    {

        // Jika parameter $year tidak diberikan, maka tahun saat ini digunakan
        if ($year === null) {
            $year = date('Y');
        }

        $this->db->select('DATE_FORMAT(bookSchedule, "%Y-%m") as month, COUNT(bookId) as bookings');
        $this->db->from('booking_ticket');
        $this->db->where('YEAR(bookSchedule)', $year); //Menambahkan kondisi untuk hanya mengambil data dari tahun tertentu
        $this->db->group_by('month');
        $this->db->order_by('month', 'ASC');    // Mengurutkan hasil berdasarkan bulan secara ascending
        $query = $this->db->get();
        return $query->result();
    }

    public function get_monthly_booking_data_by_status($year = null)
    {
        if ($year === null) {
            $year = date('Y');
        }

        // Aggregate data by month and status
        $this->db->select('DATE_FORMAT(bookSchedule, "%Y-%m") as month, bookStatus, COUNT(bookId) as bookings');
        $this->db->from('booking_ticket');
        $this->db->where('YEAR(bookSchedule)', $year);
        $this->db->group_by(['month', 'bookStatus']);
        $this->db->order_by('month', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }


    public function get_booking_status_counts()
    {
        $this->db->select('bookStatus, COUNT(bookId) as count');
        $this->db->from('booking_ticket');
        $this->db->group_by('bookStatus');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_customer_count()
    {
        $this->db->select('COUNT(custId) as customer_count');
        $this->db->from('customer');
        $query = $this->db->get();
        return $query->row()->customer_count;
    }

    public function get_booking_count()
    {
        $this->db->select('COUNT(bookId) as book_count');
        $this->db->from('booking_ticket');
        $query = $this->db->get();
        return $query->row()->book_count;
    }

    public function get_boat_count()
    {
        $this->db->select('COUNT(boatId) as boat_count');
        $this->db->from('boat');
        $query = $this->db->get();
        return $query->row()->boat_count;
    }

    public function get_book_earnings()
    {
        $this->db->select('SUM(bookPrice) as earnings, bookStatus');
        $this->db->from('booking_ticket');
        $this->db->where_in('bookStatus', ['Searching guides', 'Enjoy', 'Done']);
        $this->db->group_by('bookStatus');
        $query = $this->db->get();

        $totalEarnings = 0;
        foreach ($query->result() as $row) {
            $totalEarnings += $row->earnings;
        }

        return $totalEarnings;
    }
}

/* End of file M_chart.php */
