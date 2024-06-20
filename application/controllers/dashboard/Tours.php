<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Tours extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_tours');
        
        if (!$this->session->userdata('adminId')) {
            redirect('loginadmin');
        }
    }

    public function index()
    {
        $datas = array(
            'title' => 'TOURS',
            'tour' => $this->M_tours->getAllTours()
        );
        $partials = array(
            'head' => 'partials/dashboard/head',
            'navigation' => 'partials/dashboard/navigation',
            'content' => 'dashboard/tours',
            'script' => 'partials/dashboard/script',
        );

        $this->load->vars($datas);
        $this->load->view('dashMaster', $partials);
    }

    public function addTour() {
        
    }

}

/* End of file Tours.php */

?>