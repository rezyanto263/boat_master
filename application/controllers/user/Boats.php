<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Boats extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_boats');
    }

    public function index()
    {
        $datas = array(
            'title' => 'Boats',
            'hidden' => '',
            'color' => 'blue',
            'boat' => $this->M_boats->getAllBoatsWithPicturesAndBadges()
        );

        $partials = array(
            'head' => 'partials/user/head',
            'navbar' => 'partials/user/navbar',
            'content' => 'user/boats',
            'footer' => 'partials/user/footer',
            'script' => 'partials/user/script',
        );

        $this->load->vars($datas);
        $this->load->view('master', $partials);
    }

}

/* End of file Boats.php */

?>