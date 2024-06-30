<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('user/M_profile');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->session->keep_flashdata('message');
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
        // Validasi berhasil, perbarui data pengguna
        $data = array(
            'custName' => $this->input->post('custName'),
            'custEmail' => $this->input->post('custEmail'),
            'custAddress' => $this->input->post('custAddress'),
            'custPhone' => $this->input->post('custPhone')
        );

        // $this->M_profile->update_user($custId, $data);

        if (!empty($_FILES['custPic']['name'])) {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // Maksimal ukuran file 2MB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('custPic')) {
                $uploadData = $this->upload->data();
                $data['custPic'] = $uploadData['file_name'];
            } else {
                // Tangani kesalahan upload file
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('profile/update/' . $custId);
            }
        }

        if ($this->M_profile->update_user($custId, $data)) {
            $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui profil.');
        }
        redirect('user/profile');
    }

    // Update Password
    public function updatePassword($custId)
    {
        $newPass = $this->input->post('newPass');
        $confirmPass = $this->input->post('password_confirm');

        if ($newPass != $confirmPass) {
            $this->session->set_flashdata('error', 'Password and confirm password do not match.');
            redirect(site_url('user/profile'));
        } else {
            // Validation successful, proceed to update the password
            $data = array(
                'custId' => $custId,
                'custPassword' => password_hash($this->input->post('newPass'), PASSWORD_DEFAULT),
            );

            if ($this->M_profile->updatePassword($custId, $data)) {
                // Password updated successfully
                $this->session->set_flashdata('message', 'Password changed successfully.');
            } else {
                // Failed to update the password
                $this->session->set_flashdata('error', 'Failed to change the password. Please try again.');
            }
            redirect(site_url('user/profile'));
        }
    }
}

/* End of file Profile.php */
