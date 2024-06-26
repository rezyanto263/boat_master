<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_profile');
    }


    // Fetch user profile for editing
    public function index($custId = 1)
    {
        if ($custId === null) {
            show_error('No identifier provided', 500);
        }

        // Fetch user data
        $data['user'] = $this->M_profile->get_user_by_id($custId);

        if (empty($data['user'])) {
            show_error('User not found', 404);
        }

        // Load the edit view
        $this->load->view('user/profile', $data);
    }

    // Update user profile
    public function update($custId)
    {
        // Set form validation rules
        $this->form_validation->set_rules('custName', 'Customer Name', 'required');
        $this->form_validation->set_rules('custEmail', 'Customer Email', 'required|valid_email');
        $this->form_validation->set_rules('custAddress', 'Customer Address', 'required');
        $this->form_validation->set_rules('custPhone', 'Customer Phone', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, load the edit view again
            $data['user'] = $this->M_profile->get_user_by_id($custId);
            $this->load->view('user/profile', $data);
        } else {
            // Validation passed, update user data
            $data = array(
                'custName' => $this->input->post('custName'),
                'custEmail' => $this->input->post('custEmail'),
                'custAddress' => $this->input->post('custAddress'),
                'custPhone' => $this->input->post('custPhone')
            );

            if (!empty($_FILES['custPic']['name'])) {
                $config['upload_path'] = 'assets/uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('custPic')) {
                    $uploadData = $this->upload->data();
                    $data['custPic'] = $uploadData['file_name'];
                }
            }

            if ($this->profile_model->update_profile($data)) {
                $this->session->set_flashdata('success', 'Profile updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update profile.');
            }
        }
    }
}

/* End of file Profile.php */
