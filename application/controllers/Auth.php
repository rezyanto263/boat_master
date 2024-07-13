<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//Do your magic here
		$this->load->model('M_auth');

	}
	
    public function index() {

		redirect('home');

    }

    public function login() {
		$email = $this->input->post('custEmail');
		$password = $this->input->post('custPassword');

		$custData = $this->M_auth->checkAccount('customer', 'custEmail', $email);

		$validate = array(
			array(
				'field' => 'custEmail',
				'label' => 'email',
				'rules' => 'required|trim|valid_email',
				'errors' => array(
					'required' => 'You must provide an %s.',
					'valid_email' => 'You must provide a valid %s.'
				)
			),
			array(
				'field' => 'custPassword',
				'label' => 'password',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'You must provide a %s.',
				)
			),
		);
		$this->form_validation->set_rules($validate);

        if ($this->form_validation->run() == false) {
            $partials = array(
				'title' => 'Login',
				'head' => 'partials/user/head',
				'script' => 'partials/user/script',
			);
			$this->load->view('user/login', $partials);

        }else if ($custData) {
			
			if (password_verify($password, $custData['custPassword'])) {
				$custSession = array(
					'custId' => $custData['custId'],
					'custName' => $custData['custName'],
					'custEmail' => $custData['custEmail'],
					'custPassword' => $custData['custPassword'],
					'custAddress' => $custData['custAddress'],
					'custPhone' => $custData['custPhone'],
					'custPicture' => $custData['custPicture'],
				);
				$this->session->set_userdata($custSession);
	
				redirect('home');
			}else {
				$this->session->set_flashdata('message', '<small class="text-warning">Wrong password, try again!</small>');
				redirect('login');
			}
			
        }else if (empty($custData)) {
			$this->session->set_flashdata('message', '<small class="text-warning">Account not found, please register!</small>');
			redirect('login');
		}

	}

	public function register() {
		$custEmail = $this->input->post('custEmail');
		$checkAccount = $this->M_auth->checkAccount('customer', 'custEmail', $custEmail);

		$validate = array(
			array(
				'field' => 'custName',
				'label' => 'username',
				'rules' => 'required',
				'errors' => array(
					'required' => 'You must provide a %s.',
				)
			),
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
				'field' => 'passconf',
				'label' => 'password confirmation',
				'rules' => 'required|trim|matches[custPassword]',
				'errors' => array(
					'required' => 'You must provide a %s.',
					'matches' => '%s does not match the Password.'
				)
			),
			array(
				'field' => 'custEmail',
				'label' => 'email',
				'rules' => 'required|trim|valid_email',
				'errors' => array(
					'required' => 'You must provide an %s.',
					'valid_email' => 'You must provide a valid %s.'
				)
			),
			array(
				'field' => 'custPhone',
				'label' => 'phone',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'You must provide a %s number.'
				)
			),
			array(
				'field' => 'custAddress',
				'label' => 'address',
				'rules' => 'required|min_length[8]',
				'errors' => array(
					'required' => 'You must provide an %s.',
					'min_length' => '%s must be at least 8 characters in length.'
				)
			),
		);
		
		$this->form_validation->set_rules($validate);

		if ($this->form_validation->run() == false) {
			$partials = array(
				'title' => 'Register',
				'head' => 'partials/user/head',
				'script' => 'partials/user/script'
			);
			$this->load->view('user/register', $partials);
		}else if($checkAccount != null) {
			$this->session->set_flashdata('message', '
			<div class="toast-container position-fixed bottom-0 end-0 p-3">
				<div id="liveToast" class="toast toast-error show message" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="toast-body">
						Email is registered!
					</div>
				</div>
			</div>');

			$partials = array(
				'title' => 'Register',
				'head' => 'partials/user/head',
				'script' => 'partials/user/script'
			);
			$this->load->view('user/register', $partials);
		}else {
			$custDetails = array(
				'custName' => htmlspecialchars($this->input->post('custName')),
				'custEmail' => htmlspecialchars($this->input->post('custEmail')),
				'custPassword' => password_hash($this->input->post('custPassword'), PASSWORD_DEFAULT),
				'custAddress' => htmlspecialchars($this->input->post('custAddress')),
				'custPhone' => htmlspecialchars($this->input->post('custPhone')),
			);
			$this->M_auth->registerAccount($custDetails);
			redirect('login');
		}

	}


    public function loginAdmin() {
		$username = $this->input->post('adminName');	
		$password = $this->input->post('adminPassword');

		$adminData = $this->M_auth->checkAccount('admin', 'adminName',$username);

		$validate = array(
			array(
				'field' => 'adminName',
				'label' => 'username',
				'rules' => 'required|trim|min_length[6]',
				'errors' => array(
					'required' => 'You must provide a %s.',
					'min_length' => '%s must be at least 6 characters in length.'
				)
			),
			array(
				'field' => 'adminPassword',
				'label' => 'password',
				'rules' => 'required|trim|min_length[6]',
				'errors' => array(
					'required' => 'You must provide a %s.',
					'min_length' => '%s must be at least 6 characters in length.'
				)
			)
		);

		$this->form_validation->set_rules($validate);


		if ($this->form_validation->run() == false) {
			$partials = array(
				'title' => 'Admin',
				'head' => 'partials/dashboard/head',
				'script' => 'partials/dashboard/script',
			);
			$this->load->view('dashboard/login', $partials);
		}else if ($adminData) {
			if (password_verify($password, $adminData['adminPassword'])) {
				$adminSession = array(
					'adminId' => $adminData['adminId'],
					'adminName' => $adminData['adminName'],
					'adminPassword' => $adminData['adminPassword'],
				);
				$this->session->set_userdata($adminSession);

				redirect('dashboard');
			}else {
				$this->session->set_flashdata('message', '<small class="text-primary-emphasis">Wrong password, try again!</small>');
				redirect('loginadmin');
			}
		}else {
			$this->session->set_flashdata('message', '<small class="text-warning">Account not registered as an admin!</small>');
			redirect('loginadmin');
		}

	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}

	public function logoutAdmin() {
		$this->session->sess_destroy();
		redirect('loginadmin');
	}
}