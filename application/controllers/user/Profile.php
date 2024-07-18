<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_profile');
        $this->load->model('M_auth');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->session->keep_flashdata('message');

        if (!$this->session->userdata('custId')) {
            redirect('login');
        }
    }


    // Fetch user profile for editing
    public function index()
    {
        // Retrieve the customer ID from session data
        $custData = $this->session->userdata('custId');
        if ($custData === null) {
            show_error('No identifier provided', 500);
            return;
        }

        // Fetch user data from the model
        $data = $this->M_profile->get_user_by_id($custData);

        // Check if user data exists
        if (empty($data)) {
            show_error('User not found', 404);
            return;
        }

        // Prepare data for the view
        $datas = array(
            'title' => 'PROFILE',
            'user' => $data,
            'color' => '',
            'hidden' => '',
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



    // Update user profile
    public function update($custId)
    {
        // Validasi berhasil, perbarui data pengguna
        $data = array(
            'custName' => htmlspecialchars($this->input->post('custName')),
            'custEmail' => htmlspecialchars($this->input->post('custEmail')),
            'custAddress' => htmlspecialchars($this->input->post('custAddress')),
            'custPhone' => htmlspecialchars($this->input->post('custPhone'))
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
        $current_password = $this->input->post('current_password');
        $newPass = $this->input->post('newPass');
        $confirmPass = $this->input->post('password_confirm');
        $data['user'] = $this->db->get('customer', $custId)->row_array();


        //validation if current password Wrong 
        if (!password_verify($current_password, $data['user']['custPassword'])) {
            $this->session->set_flashdata('error', 'Wrong Current Password');
            redirect(site_url('user/profile'));
        } else {
            //Validating if the current password matches the new password
            if ($current_password == $newPass) {
                $this->session->set_flashdata('error', 'New Password Cannot Be same with Current Password');
                redirect(site_url('user/profile'));
            } else {
                // Validating that the new password is not the same as the confirm password.
                if ($newPass != $confirmPass) {
                    $this->session->set_flashdata('error', 'Password and confirm password do not match.');
                    redirect(site_url('user/profile'));
                } else {
                    // Validation successful, proceed to update the password
                    $data = array(
                        'custId' => $custId,
                        'custPassword' => password_hash($this->input->post('newPass'), PASSWORD_DEFAULT, ['cost' => 10]),
                    );

                    if ($this->M_profile->updatePassword($custId, $data)) {
                        // Password updated successfully
                        $this->session->set_flashdata('succes', 'Password changed successfully.');
                    } else {
                        // Failed to update the password
                        $this->session->set_flashdata('error', 'Failed to change the password. Please try again.');
                    }
                    redirect(site_url('user/profile'));
                }
            }
        }
    }
}

/* End of file Profile.php */
