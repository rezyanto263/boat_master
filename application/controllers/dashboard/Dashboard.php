<?php

use SebastianBergmann\Environment\Console;

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_chart');
        $this->load->model('M_bookings');

        if (!$this->session->userdata('adminId')) {
            redirect('loginadmin');
        }
    }

    public function index()
    {

        $selectedYear = $this->input->post('year');
        if (!$selectedYear) {
            $selectedYear = date('Y');
        }

        $monthlyData = $this->M_chart->get_monthly_booking_data($selectedYear);
        $monthlyDataByStatus = $this->M_chart->get_monthly_booking_data_by_status($selectedYear);
        $statusCounts = $this->M_chart->get_booking_status_counts();
        $customerCount = $this->M_chart->get_customer_count();
        $boatCount = $this->M_chart->get_boat_count();
        $bookCount = $this->M_chart->get_booking_count();
        $earnings = $this->M_chart->get_book_earnings();

        $datas = array(
            'title' => 'DASHBOARD',
            'scanner' => false,
            'notifications' => $this->M_bookings->getAllNotifications(),
            'graph' => $monthlyData,
            'monthlyDataByStatus' => $monthlyDataByStatus,
            'statusCounts' => $statusCounts,
            'selectedYear' => $selectedYear,
            'customerCount' => $customerCount,
            'boatCount' => $boatCount,
            'bookCount' => $bookCount,
            'earnings' => $earnings,
        );

        $partials = array(
            'head' => 'partials/dashboard/head',
            'navigation' => 'partials/dashboard/navigation',
            'content' => 'dashboard/dashboard',
            'script' => 'partials/dashboard/script',
        );

        $this->load->vars($datas);
        $this->load->view('dashMaster', $partials);
    }
}

/* End of file Dashboard.php */
