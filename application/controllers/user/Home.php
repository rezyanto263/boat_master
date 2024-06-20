<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $datas = array(
            'title' => 'Home',
            'color' => '',
            'hidden' => 'hidden'
        );

        $partials = array(
            'head' => 'partials/user/head',
            'navbar' => 'partials/user/navbar',
            'content' => 'user/home',
            'footer' => 'partials/user/footer',
            'script' => 'partials/user/script',
        );
        $this->load->vars($datas);
        $this->load->view('master', $partials);
    }

}

/* End of file Home.php */

?>