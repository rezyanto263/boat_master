<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Boats extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_boats');
        $this->load->model('M_bookings');
    }

    public function index()
    {
        $bookAdults = $this->input->post('bookAdults') ?: 1;
        $bookTeens = $this->input->post('bookTeens') ?: 0;
        $bookToddlers = $this->input->post('bookToddlers') ?: 0;
        $maxPeople = $bookAdults + $bookTeens + $bookToddlers;
        $bookSchedule =  $this->input->post('bookSchedule') ?: date('Y-m-d', strtotime('+2 days'));

        $searchDatas = array(
            'boatStartPoint' => $this->input->post('boatStartPoint') ?: 'All',
            'boatType' => $this->input->post('boatType') ?: 'All',
            'bookSchedule' => date('Y-m-d', strtotime($bookSchedule)),
            'maxPeople' => $maxPeople,
        );

        $boatDatas = $this->M_boats->searchBoat($searchDatas);

        $datas = array(
            'title' => 'Boats',
            'hidden' => '',
            'color' => 'blue',
            'boat' => $boatDatas,
            'bookAdults' => $bookAdults,
            'bookTeens' => $bookTeens,
            'bookToddlers' => $bookToddlers,
            'boatStartPoint' => $this->input->post('boatStartPoint') ?: 'All',
            'boatType' => $this->input->post('boatType') ?: 'All',
            'bookSchedule' => $bookSchedule,
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