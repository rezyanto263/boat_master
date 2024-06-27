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

        $validate = array(
            array(
                'field' => 'custName',
                'label' => 'Username',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'You must provide %s',
                )
            ),
            array(
                'field' => 'custEmail',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email',
                'errors' => array(
                    'required' => 'You must provide %s',
                    'valid_email' => 'The %s field must contain a valid email address.',
                ),
            ),
            array(
                'field' => 'custAddress',
                'label' => 'Address',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'You must provide %s',
                ),
            ),
            array(
                'field' => 'custAddress',
                'label' => 'Address',
                'rules' => 'required|trim|number',
                'errors' => array(
                    'required' => 'You must provide %s',
                ),
            ),
        );

        $this->form_validation->set_rules($validate);

        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, muat kembali tampilan edit
            $this->index();
        } else {
            // Validasi berhasil, perbarui data pengguna
            $data = array(
                'custName' => $this->input->post('custName'),
                'custEmail' => $this->input->post('custEmail'),
                'custAddress' => $this->input->post('custAddress'),
                'custPhone' => $this->input->post('custPhone')
            );

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
                    redirect('user/profile/edit/' . $custId);
                }
            }

            if ($this->M_profile->update_user($custId, $data)) {
                $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui profil.');
            }

            redirect('user/profile');
        }
    }


    public function updatePassword()
    {

        $validate = array(
            array(
                'field' => 'custPassword',
                'label' => 'password',
                'rules' => 'required|trim|min_length[6]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'min_length' => '%s must be at least 6 characters in length.'
                )
            ),
            array(
                'field' => 'confirmPass',
                'label' => 'password confirmation',
                'rules' => 'required|trim|matches[custPassword]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'matches' => '%s does not match the Password.'
                )
            )
        );

        $this->form_validation->set_rules($validate);




        $data = array(
            'newPass' => $this->input->post('custPassword'),
        );
    }
}

/* End of file Profile.php */
