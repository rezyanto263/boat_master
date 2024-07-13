<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_bookings');

        if (!$this->session->userdata('custId')) {
            redirect('login');
        }
    }
    

    public function index()
    {
        $datas = array(
            'title' => 'Tickets',
            'hidden' => '',
            'color' => 'blue',
            'booking' => $this->M_bookings->getAllBookings()
        );

        $partials = array(
            'head' => 'partials/user/head',
            'navbar' => 'partials/user/navbar',
            'content' => 'user/tickets',
            'footer' => 'partials/user/footer',
            'script' => 'partials/user/script',
        );
        $this->load->vars($datas);
        $this->load->view('master', $partials);
    }

}

/* End of file Tickets.php */

?>