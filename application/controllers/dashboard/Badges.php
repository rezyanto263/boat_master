<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Badges extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_badges');
        $this->load->model('M_bookings');

        if (!$this->session->userdata('adminId')) {
            redirect('loginadmin');
        }
    }
    

    public function index()
    {
        $datas = array(
            'title' => 'BADGES',
            'scanner' => false,
            'notifications' => $this->M_bookings->getAllNotifications(),
            'badge' => $this->M_badges->getAllBadges()
        );

        $partials = array(
            'head' => 'partials/dashboard/head',
            'navigation' => 'partials/dashboard/navigation',
            'content' => 'dashboard/badges',
            'script' => 'partials/dashboard/script',
        );

        $this->load->vars($datas);
        $this->load->view('dashMaster', $partials);
    }

    public function addBadge() {
        $badgeDatas = array(
            'badgeName' => $this->input->post('badgeName'),
        );
        $this->M_badges->insertBadge($badgeDatas);

        
        redirect('dashboard/badges');
    }

    public function editBadge() {
        $badgeId = $this->input->post('badgeId');
        $checkBadge = $this->M_badges->checkBadge('badgeId', $badgeId);

        $badgeDatas = array(
            'badgeName' => $this->input->post('badgeName'),
        );
        $this->M_badges->editBadge($badgeId, $badgeDatas);

        redirect('dashboard/badges');
    }
    
    public function delBadge($badgeId) {
        $this->M_badges->deleteBadge($badgeId);
        $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">The badge has been deleted successfully!</div>');
        redirect('dashboard/badges');
    }

}

/* End of file Badges.php */

?>