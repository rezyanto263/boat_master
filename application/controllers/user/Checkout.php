<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_bookings');

        if (!$this->session->userdata('custId')) {
            redirect('login');
        }
    }
    

    public function index($bookId)
    {
        $custId = $this->session->userdata('custId');

        $datas = array(
            'title' => 'Checkout',
            'hidden' => '',
            'color' => 'blue',
            'checkout' => $this->M_bookings->getBookingsByCustIdAndBookId($custId, $bookId)
        );

        $partials = array(
            'head' => 'partials/user/head', 
            'navbar' => 'partials/user/navbar',
            'content' => 'user/checkout',
            'footer' => 'partials/user/footer',
            'script' => 'partials/user/script',
        );
        $this->load->vars($datas);
        $this->load->view('master', $partials);
    }

}

/* End of file Checkout.php */

?>