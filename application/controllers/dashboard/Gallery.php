<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_gallery');

        if (!$this->session->userdata('adminId')) {
            redirect('loginadmin');
        }
    }

    public function index()
    {
        $datas = array(
            'title' => 'GALLERY',
            'gallery' => $this->M_gallery->getAllGalleryWithMedias()
        );
        $partials = array(
            'head' => 'partials/dashboard/head',
            'navigation' => 'partials/dashboard/navigation',
            'content' => 'dashboard/gallery',
            'script' => 'partials/dashboard/script',
        );

        $this->load->vars($datas);
        $this->load->view('dashMaster', $partials);
    }

    public function addGallery() {
        $fileNameCmps = explode('.', trim($_FILES['galleryMedia']['name']));
        $pictureExtension = strtolower(end($fileNameCmps));
        $newPictureName = md5(time() . $_FILES['galleryMedia']['name']) . '.' . $pictureExtension;

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp|webm|mp4';
        $config['file_name'] = $newPictureName;
        $config['max_size']             = 10000;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        
        $this->upload->initialize($config);
        
        if ($this->upload->do_upload('galleryMedia')) {
            $fileData = $this->upload->data();

            $galleryDatas = array(
                'galleryName' => $this->input->post('galleryName'),
                'galleryDesc' => $this->input->post('galleryDesc'),
            );
            $galleryId = $this->M_gallery->insertGallery($galleryDatas);

            $mediaDatas = array(
                'mediaFile' => $newPictureName,
                'mediaType' => $pictureExtension
            );
            $mediaId = $this->M_gallery->insertMedia($mediaDatas);

            $gafileDatas = array(
                'mediaId' => $mediaId,
                'galleryId' => $galleryId
            );
            $this->M_gallery->insertGalleryFile($gafileDatas);
        }else {
            $uploadError = $this->upload->display_errors(); 
            $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">Cannot upload the picture!'.$uploadError.'</div>');
            log_message('error', $uploadError);
        }
        redirect('dashboard/gallery');
    }

    public function editGallery() {
        $galleryId = $this->input->post('galleryId');
        $mediaId = $this->input->post('mediaId');
        $checkGallery = $this->M_gallery->checkGallery('galleryId', $galleryId);

        if ($checkGallery) {

            $galleryDatas = array(
                'galleryName' => $this->input->post('galleryName'),
                'galleryDesc' => $this->input->post('galleryDesc')
            );
            $this->M_gallery->editGallery($galleryId, $galleryDatas);

            if (!empty($_FILES['galleryMedia'])) {

                $this->M_gallery->deleteGafile($galleryId);
                $this->M_gallery->deleteMedia($mediaId);

                $fileNameCmps = explode('.', trim($_FILES['galleryMedia']['name']));
                $pictureExtension = strtolower(end($fileNameCmps));
                $newPictureName = md5(time() . $_FILES['galleryMedia']['name']) . '.' . $pictureExtension;
        
                $config['upload_path'] = './assets/uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|webp|webm|mp4';
                $config['file_name'] = $newPictureName;
                $config['max_size']             = 2000;
                $config['max_width']            = 0;
                $config['max_height']           = 0;
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('galleryMedia')) {
                    $fileData = $this->upload->data();

                    $mediaDatas = array(
                        'mediaFile' => $newPictureName,
                        'mediaType' => $pictureExtension
                    );
                    $mediaId = $this->M_gallery->insertMedia($mediaDatas);
        
                    $gafileDatas = array(
                        'galleryId' => $galleryId,
                        'mediaId' => $mediaId
                    );
                    $this->M_gallery->insertGalleryFile($gafileDatas);
                }else {
                    $uploadError = $this->upload->display_errors(); 
                    $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">Cannot upload the picture!'.$uploadError.'</div>');
                    log_message('error', $uploadError);
                }
            }
        }
        redirect('dashboard/gallery');
    }

    public function delGallery($galleryId) {
        $this->M_gallery->deleteGallery($galleryId);
        $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">The Gallery has been deleted successfully!</div>');
        redirect('dashboard/gallery');
    }

}

/* End of file Gallery.php */

?>