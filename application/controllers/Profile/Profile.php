<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('custId') == 0) {

        //     redirect('usersProfile/login_temp');
        // }

        $this->load->model('Profile/M_profile');
        $this->load->helper('url');
        $this->load->library('form_validation');
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
        $this->load->view('Profile/profile', $data);
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
            $this->load->view('profile/profile', $data);
        } else {
            // Validation passed, update user data
            $data = array(
                'custName' => $this->input->post('custName'),
                'custEmail' => $this->input->post('custEmail'),
                'custAddress' => $this->input->post('custAddress'),
                'custPhone' => $this->input->post('custPhone')
            );

            if (!empty($_FILES['custPic']['name'])) {
                $config['upload_path'] = './uploads/';
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

            if ($this->User_model->update_user($custId, $data)) {
                // Update successful, redirect to success page or load a success view
                redirect('usersProfile/user_profile/success');
            } else {
                // Update failed, load the edit view again with an error message
                $data['user'] = $this->M_profile->get_user_by_id($custId);
                $data['error'] = 'An error occurred while updating the profile.';
                $this->load->view('usersProfile/edit_user', $data);
            }
        }
    }

    // Success page
    public function success()
    {
        // Load a success view
        $this->load->view('usersProfile/success');
    }
}

/* End of file Profile.php */
