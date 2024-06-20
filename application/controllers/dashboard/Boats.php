<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Boats extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_boats');

        if (!$this->session->userdata('adminId')) {
            redirect('loginadmin');
        }
    }

    public function index()
    {
        $datas = array(
            'title' => 'BOATS',
            'boat' => $this->M_boats->getAllBoatsWithPictures()
        );
        $partials = array(
            'head' => 'partials/dashboard/head',
            'navigation' => 'partials/dashboard/navigation',
            'content' => 'dashboard/boats',
            'script' => 'partials/dashboard/script',
        );

        $this->load->vars($datas);
        $this->load->view('dashMaster', $partials);
    }

    public function addBoat() {
        $boatData = array(
            'boatName' => $this->input->post('boatName'),
            'boatPrice' => $this->input->post('boatPrice'),
            'boatType' => $this->input->post('boatType'),
            'boatStock' => $this->input->post('boatStock'),
            'boatDesc' => $this->input->post('boatDesc'),
            'boatStartPoint' => $this->input->post('boatStartPoint'),
            'maxPeople' => $this->input->post('maxPeople'),
        );
        $boatId = $this->M_boats->insertBoat($boatData);

        $countPictures = count($_FILES['files']['name']);

        for ($i = 0; $i < $countPictures; $i++) {
            $_FILES['file']['name'] = trim($_FILES['files']['name'][$i]);
            $_FILES['file']['type'] = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['files']['error'][$i];
            $_FILES['file']['size'] = $_FILES['files']['size'][$i];
            
            $fileNameCmps = explode('.', $_FILES['file']['name']);
            $pictureExtension = strtolower(end($fileNameCmps));
            $newPictureName = md5(time() . $_FILES['file']['name']) . '.' . $pictureExtension;
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'jpg|jpeg|gif|png|webp';
            $config['file_name'] = $newPictureName;
            $config['max_size']             = 2000;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $fileData = $this->upload->data();
                
                $mediaData = array(
                    'mediaFile' => $newPictureName,
                    'mediaType' => $fileData['file_type']
                );
                $mediaId = $this->M_boats->insertMedia($mediaData);

                $boatpictData = array(
                    'boatId' => $boatId,
                    'mediaId' => $mediaId
                );
                $this->M_boats->insertBoatPictures($boatpictData);
            }else {
                $uploadError = $this->upload->display_errors();
                log_message('error', $uploadError);
            }
        
        }
        redirect('dashboard/boats');
    }

    public function editBoat() {
        $boatId = $this->input->post('boatId');
        $checkBoat = $this->M_boats->checkBoat('boatId', $boatId);
        if ($checkBoat) {

            if($this->input->post('delpict')) {
                $delPictures = $this->input->post('delpict');

                if (count($delPictures) == $this->input->post('countPict')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">You cannot delete all pictures</div>');
                    redirect('dashboard/boats');
                }else {
                    foreach($delPictures as $boatpictId) {
                        $this->M_boats->delPictures($boatpictId);
                    }
                }
            }

            $boatData = array(
                'boatName' => $this->input->post('boatName'),
                'boatPrice' => $this->input->post('boatPrice'),
                'boatType' => $this->input->post('boatType'),
                'boatStock' => $this->input->post('boatStock'),
                'boatDesc' => $this->input->post('boatDesc'),
                'boatStartPoint' => $this->input->post('boatStartPoint'),
                'maxPeople' => $this->input->post('maxPeople'),
            );
            $this->M_boats->editBoat($boatId, $boatData);

            
            if (!empty($_FILES['files']['name'][0])) {
                $countPictures = count($_FILES['files']['name']);
                
                for ($i = 0; $i < $countPictures; $i++) {
                    $_FILES['file']['name'] = trim($_FILES['files']['name'][$i]);
                    $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['files']['size'][$i];
                    
                    $fileNameCmps = explode('.', $_FILES['file']['name']);
                    $pictureExtension = strtolower(end($fileNameCmps));
                    $newPictureName = md5(time() . $_FILES['file']['name']) . '.' . $pictureExtension;
                    $config['upload_path'] = './assets/uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|gif|png|webp';
                    $config['file_name'] = $newPictureName;
                    $config['max_size']             = 2000;
                    $config['max_width']            = 10000; 
                    $config['max_height']           = 10000;

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('file')) {
                        $fileData = $this->upload->data();
                        
                        $mediaData = array(
                            'mediaFile' => $newPictureName,
                            'mediaType' => $fileData['file_type']   
                        );
                        $mediaId = $this->M_boats->insertMedia($mediaData);

                        $boatpictData = array(
                            'boatId' => $boatId,
                            'mediaId' => $mediaId
                        );
                        $this->M_boats->insertBoatPictures($boatpictData);
                    }else {
                        $uploadError = $this->upload->display_errors(); 
                        $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">Cannot upload the pictures!'.$uploadError.'</div>');
                        log_message('error', $uploadError);
                    }
                }
            }
        }
        redirect('dashboard/boats');
    }

    public function deleteBoat($boatId) {
        $this->M_boats->delBoat($boatId);
        $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">The boat has been deleted successfully!</div>');
        redirect('dashboard/boats');
    }

}

/* End of file Boats.php */

?>