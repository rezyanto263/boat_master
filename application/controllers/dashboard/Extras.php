<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Extras extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_extras');
        
        if (!$this->session->userdata('adminId')) {
            redirect('loginadmin');
        }
    }

    public function index()
    {
        $datas = array(
            'title' => 'EXTRAS',
            'extra' => $this->M_extras->getAllExtras()
        );
        $partials = array(
            'head' => 'partials/dashboard/head',
            'navigation' => 'partials/dashboard/navigation',
            'content' => 'dashboard/extras',
            'script' => 'partials/dashboard/script',
        );

        $this->load->vars($datas);
        $this->load->view('dashMaster', $partials);
    }

    public function addExtra() {
        $fileNameCmps = explode('.', trim($_FILES['extraPicture']['name']));
        $pictureExtension = strtolower(end($fileNameCmps));
        $newPictureName = md5(time() . $_FILES['extraPicture']['name']) . '.' . $pictureExtension;

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['file_name'] = $newPictureName;
        $config['max_size']             = 2000;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        
        $this->upload->initialize($config);
        
        if ($this->upload->do_upload('extraPicture')) {
            $fileData = $this->upload->data();

            $extraDatas = array(
                'extraId' => $this->input->post('extraId'),
                'extraName' => $this->input->post('extraName'),
                'extraCategory' => $this->input->post('extraCategory'),
                'extraPrice' => $this->input->post('extraPrice'),
                'extraStock' => $this->input->post('extraStock'),
                'extraDesc' => $this->input->post('extraDesc'),
                'extraPicture' => $newPictureName
            );
            $this->M_extras->insertExtra($extraDatas);
        }else {
            $uploadError = $this->upload->display_errors(); 
            $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">Cannot upload the picture!'.$uploadError.'</div>');
            log_message('error', $uploadError);
        }
        redirect('dashboard/extras');
    }

    public function editExtra() {
        $extraId = $this->input->post('extraId');
        $checkExtra = $this->M_extras->checkExtra('extraId', $extraId);

        if ($checkExtra) {

            if ($_FILES['extraPicture']['name']) {
            
                $fileNameCmps = explode('.', trim($_FILES['extraPicture']['name']));
                $pictureExtension = strtolower(end($fileNameCmps));
                $newPictureName = md5(time() . $_FILES['extraPicture']['name']) . '.' . $pictureExtension;
    
                $config['upload_path'] = './assets/uploads/';
                $config['allowed_types'] = 'jpg|jpeg|gif|png|webp';
                $config['file_name'] = $newPictureName;
                $config['max_size']             = 2000;
                $config['max_width']            = 0;
                $config['max_height']           = 0;

                $this->upload->initialize($config);
                if ($this->upload->do_upload('extraPicture')) {

                    $fileData = $this->upload->data();

                    $extraDatas = array(
                        'extraName' => $this->input->post('extraName'),
                        'extraCategory' => $this->input->post('extraCategory'),
                        'extraPrice' => $this->input->post('extraPrice'),
                        'extraStock' => $this->input->post('extraStock'),
                        'extraDesc' => $this->input->post('extraDesc'),
                        'extraPicture' => $newPictureName
                    );
                    $this->M_extras->editExtra($extraId, $extraDatas);

                }else {
                    $uploadError = $this->upload->display_errors(); 
                    $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">Cannot upload the picture!'.$uploadError.'</div>');
                    log_message('error', $uploadError);
                }
            }else {
                $extraDatas = array(
                    'extraName' => $this->input->post('extraName'),
                    'extraCategory' => $this->input->post('extraCategory'),
                    'extraPrice' => $this->input->post('extraPrice'),
                    'extraStock' => $this->input->post('extraStock'),
                    'extraDesc' => $this->input->post('extraDesc'),
                );
                $this->M_extras->editExtra($extraId, $extraDatas);
            }
        }
        redirect('dashboard/extras');
    }

    public function deleteExtra($extraId) {
        $this->M_extras->deleteExtra($extraId);
            $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">The Extra has been deleted successfully!</div>');
            redirect('dashboard/extras');
    }

}

/* End of file Extras.php */

?>