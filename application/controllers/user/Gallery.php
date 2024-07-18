<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_gallery');
    }
    

	public function index()
	{
        $datas = array(
            'title' => 'Gallery',
            'hidden' => '',
            'color' => 'blue',
            'gallery' => $this->M_gallery->getAllGalleryWithMedias()
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
