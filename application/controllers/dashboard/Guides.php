<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Guides extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_guides');

        if (!$this->session->userdata('adminId')) {
            redirect('loginadmin');
        }
    }
    

    public function index()
    {
        $datas = array(
            'title' => 'GUIDES',
            'guides' => $this->M_guides->getAllGuides()
        );

        $partials = array(
            'head' => 'partials/dashboard/head',
            'navigation' => 'partials/dashboard/navigation',
            'content' => 'dashboard/guides',
            'script' => 'partials/dashboard/script',
        );

        $this->load->vars($datas);
        $this->load->view('dashMaster', $partials);
    }

    public function addGuides() {
        $fileNameCmps = explode('.', trim($_FILES['guidesPicture']['name']));
        $pictureExtension = strtolower(end($fileNameCmps));
        $newPictureName = md5(time() . $_FILES['guidesPicture']['name']) . '.' . $pictureExtension;

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['file_name'] = $newPictureName;
        $config['max_size']             = 2000;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        
        $this->upload->initialize($config);
        
        if ($this->upload->do_upload('guidesPicture')) {
            $fileData = $this->upload->data();

            $guidesDatas = array(
                'guidesName' => $this->input->post('guidesName'),
                'guidesBio' => $this->input->post('guidesBio'),
                'guidesPicture' => $newPictureName
            );
            $this->M_guides->insertGuides($guidesDatas);
        }else {
            $uploadError = $this->upload->display_errors(); 
            $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">Cannot upload the picture!'.$uploadError.'</div>');
            log_message('error', $uploadError);
        }
        redirect('dashboard/guides');
    }

    public function editGuides() {
        $guidesId = $this->input->post('guidesId');
        $checkGuides = $this->M_guides->checkGuides('guidesId', $guidesId);

        if ($checkGuides) {

            if ($_FILES['guidesPicture']['name']) {
            
                $fileNameCmps = explode('.', trim($_FILES['guidesPicture']['name']));
                $pictureExtension = strtolower(end($fileNameCmps));
                $newPictureName = md5(time() . $_FILES['guidesPicture']['name']) . '.' . $pictureExtension;
    
                $config['upload_path'] = './assets/uploads/';
                $config['allowed_types'] = 'jpg|jpeg|gif|png|webp';
                $config['file_name'] = $newPictureName;
                $config['max_size']             = 2000;
                $config['max_width']            = 0;
                $config['max_height']           = 0;

                $this->upload->initialize($config);
                if ($this->upload->do_upload('guidesPicture')) {

                    $fileData = $this->upload->data();

                    $guidesDatas = array(
                        'guidesName' => $this->input->post('guidesName'),
                        'guidesBio' => $this->input->post('guidesBio'),
                        'guidesPicture' => $newPictureName
                    );
                    $this->M_guides->editGuides($guidesId, $guidesDatas);

                }else {
                    $uploadError = $this->upload->display_errors(); 
                    $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">Cannot upload the picture!'.$uploadError.'</div>');
                    log_message('error', $uploadError);
                }
            }else {
                $guidesDatas = array(
                    'guidesName' => $this->input->post('guidesName'),
                    'guidesBio' => $this->input->post('guidesBio'),
                );
                $this->M_guides->editGuides($guidesId, $guidesDatas);
            }
        }
        redirect('dashboard/guides');
    }

    public function deleteGuides($guidesId) {
        $this->M_guides->deleteGuides($guidesId);
            $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">The Guides has been deleted successfully!</div>');
            redirect('dashboard/guides');
    }

}

/* End of file Guides.php */

?>