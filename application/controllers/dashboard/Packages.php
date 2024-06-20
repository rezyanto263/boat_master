<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        if (!$this->session->userdata('adminId')) {
            redirect('loginadmin');
        }
    }

    public function index()
    {
        $datas = array(
            'title' => 'PACKAGES',
        );
        $partials = array(
            'head' => 'partials/dashboard/head',
            'navigation' => 'partials/dashboard/navigation',
            'content' => 'dashboard/packages',
            'script' => 'partials/dashboard/script',
        );

        $this->load->vars($datas);
        $this->load->view('dashMaster', $partials);
    }

}

/* End of file Packages.php */

?>