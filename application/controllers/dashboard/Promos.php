<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Promos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_promos');
        $this->load->model('M_bookings');
        
        if (!$this->session->userdata('adminId')) {
            redirect('loginadmin');
        }
    }

    public function index()
    {
        $datas = array(
            'title' => 'PROMOS',
            'notifications' => $this->M_bookings->getAllNotifications(),
            'promo' => $this->M_promos->getAllPromos()
        );
        $partials = array(
            'head' => 'partials/dashboard/head',
            'navigation' => 'partials/dashboard/navigation',
            'content' => 'dashboard/promos',
            'script' => 'partials/dashboard/script',
        );

        $this->load->vars($datas);
        $this->load->view('dashMaster', $partials);
    }

    public function addPromo() {
        $promoDatas = array(
            'procodeName' => $this->input->post('procodeName'),
            'procodeDiscount' => $this->input->post('procodeDiscount'),
        );
        $this->M_promos->insertPromo($promoDatas);

        $this->session->set_flashdata('message', '<div class="alert alert-info message" role="alert">The promo code has been added successfully!</div>');

        redirect('dashboard/promos','refresh');
    }

    public function editPromo() {
        $procodeId = $this->input->post('procodeId');
        $checkPromo = $this->M_promos->checkPromo($procodeId);

        if ($checkPromo) {
            $promoDatas = array(
                'procodeName' => $this->input->post('procodeName'),
                'procodeDiscount' => $this->input->post('procodeDiscount'),
            );
            $this->M_promos->editPromo($procodeId, $promoDatas);

            $this->session->set_flashdata('message', '<div class="alert alert-info message" role="alert">The promo code has been updated successfully!</div>');
            redirect('dashboard/promos');
        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">No promo code found!</div>');
            redirect('dashboard/promos');
        }
    }

    public function deletePromo($procodeId) {
        $this->M_promos->delPromo($procodeId);
        $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">The promo code has been deleted successfully!</div>');
        redirect('dashboard/promos');
    }

}

/* End of file Promos.php */

?>