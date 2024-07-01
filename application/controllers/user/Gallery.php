<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function index()
	{
        $data['photo'] = $this->m_gallery->get_data('photo', array('baris' => 1))->result();
        $data['photo2'] = $this->m_gallery->get_data('photo', array('baris' => 2))->result();
        $data['photo3'] = $this->m_gallery->get_data('photo', array('baris' => 3))->result();
        $data['photo4'] = $this->m_gallery->get_data('photo', array('baris' => 4))->result();
        $data['photo5'] = $this->m_gallery->get_data('photo', array('baris' => 5))->result();
        $data['photo6'] = $this->m_gallery->get_data('photo', array('baris' => 6))->result();
        $data['photo7'] = $this->m_gallery->get_data('photo', array('baris' => 7))->result();
        $data['photo8'] = $this->m_gallery->get_data('photo', array('baris' => 8))->result();
		$this->load->view('v_gallery',$data);
	}
}
