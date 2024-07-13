<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_customers');
    }

    public function index()
    {
        $custId = $this->session->userdata('custId');
        $datas = array(
            'title' => 'Profile',
            'hidden' => '',
            'color' => 'blue',
            'customer' => $this->M_customers->getCustomerById($custId),
        );

        $partials = array(
            'head' => 'partials/user/head',
            'navbar' => 'partials/user/navbar',
            'content' => 'user/profile',
            'footer' => 'partials/user/footer',
            'script' => 'partials/user/script',
        );
        $this->load->vars($datas);
        $this->load->view('master', $partials);
    }

    public function editCustomer()
    {
        $custId = $this->session->userdata('custId');
        $customerDatas = array(
            'custName' => htmlspecialchars($this->input->post('custName')),
            'custEmail' => htmlspecialchars($this->input->post('custEmail')),
            'custAddress' => htmlspecialchars($this->input->post('custAddress')),
            'custPhone' => htmlspecialchars($this->input->post('custPhone'))
        );
        $this->M_customers->editCustomer($custId, $customerDatas);

        if (!empty($_FILES['custPicture']['name'][0])) {
            $fileNameCmps = explode('.', trim($_FILES['custPicture']['name']));
            $pictureExtension = strtolower(end($fileNameCmps));
            $newPictureName = md5(time() . $_FILES['custPicture']['name']) . '.' . $pictureExtension;

            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['file_name'] = $newPictureName;
            $config['max_size']             = 2048;
            $config['max_width']            = 0;
            $config['max_height']           = 0;
            
            $this->upload->initialize($config);

            if ($this->upload->do_upload('custPicture')) {
                $fileData = $this->upload->data();
                $custPicture['custPicture'] = $newPictureName;
                $this->M_customers->editCustomer($custId, $custPicture);
                $this->session->set_userdata('custPicture', $newPictureName);
            } else {
                $this->session->set_flashdata('message', '<div id="liveToast" class="toast show message toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            Gagal memperbarui foto!
                        </div>
                    </div>
                </div>');
                redirect('profile');
            }
        }

        if ($this->M_customers->editCustomer($custId, $customerDatas)) {
            $this->session->set_userdata($customerDatas);
            $this->session->set_flashdata('message', '<div id="liveToast" class="toast show message toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        Profile berhasil diperbarui!
                    </div>
                </div>
            </div>');
        } else {
            $this->session->set_flashdata('message', '<div id="liveToast" class="toast show message toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        Gagal memperbarui profile!
                    </div>
                </div>
            </div>');
        }

        redirect('profile');
    }

    public function changePassword()
    {
        $custId = $this->session->userdata('custId');
        $oldcustPassword = $this->input->post('oldcustPassword');
        $newcustPassword = $this->input->post('newcustPassword');
        $confirmNewPassword = $this->input->post('confirmNewPassword');

        if (!password_verify($oldcustPassword, $this->session->userdata('custPassword'))) {
            $this->session->set_flashdata('message', '<div id="liveToast" class="toast show message toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        Wrong Current Password!
                    </div>
                </div>
            </div>');
        } else {
            if ($oldcustPassword == $newcustPassword) {
                $this->session->set_flashdata('message', '<div id="liveToast" class="toast show message toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            New Password cannot be same with Current Password!
                        </div>
                    </div>
                </div>');
            } else {
                if ($newcustPassword != $confirmNewPassword) {
                    $this->session->set_flashdata('message', '<div id="liveToast" class="toast show message toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            New Password and Confirm Password does not match!
                        </div>
                    </div>
                </div>');
                } else {
                    $custPassword = password_hash($newcustPassword, PASSWORD_DEFAULT);
                    $this->M_customers->editCustomerPassword($custId, $custPassword);
                    if ($this->M_customers->editCustomerPassword($custId, $custPassword)) {
                        $this->session->set_userdata('custPassword', $custPassword);
                        $this->session->set_flashdata('message', '<div id="liveToast" class="toast show message toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body">
                                    Password changed succesfully!
                                </div>
                            </div>
                        </div>');
                    } else {
                        $this->session->set_flashdata('message', '<div id="liveToast" class="toast show message toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body">
                                    Failed to change the password. Please try again!
                                </div>
                            </div>
                        </div>');
                    }
                }
            }
        }

        redirect('profile');
    }
}

/* End of file Profile.php */
