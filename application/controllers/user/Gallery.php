<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function index()
	{
        $datas = array(
            'title' => 'Gallery',
            'hidden' => '',
            'color' => 'blue'
        );

        $partials = array(
            'head' => 'partials/user/head',
            'navbar' => 'partials/user/navbar',
            'content' => 'user/gallery',
            'footer' => 'partials/user/footer',
            'script' => 'partials/user/script'
        );
        $this->load->vars($datas);
		$this->load->view('master', $partials);
	}
}
