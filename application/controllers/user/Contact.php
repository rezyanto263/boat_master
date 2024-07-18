<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function index()
    {
        $datas = array(
            'title' => 'Contact',
            'hidden' => '',
            'color' => '',
        );

        $partials = array(
            'head' => 'partials/user/head',
            'navbar' => 'partials/user/navbar',
            'content' => 'user/contact',
            'footer' => 'partials/user/footer',
            'script' => 'partials/user/script',
        );
        $this->load->vars($datas);
        $this->load->view('master', $partials);
    }

    public function sendEmail() {
        $name = $this->input->post('custName');
        $email = $this->input->post('custEmail');
        $subject = $name.' contact Boat Master!';
        $message = $this->input->post('message');

        $validate = array(
			array(
				'field' => 'custName',
				'label' => 'name',
				'rules' => 'required',
				'errors' => array(
					'required' => 'You must provide a %s.',
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
				'field' => 'message',
				'label' => 'message',
				'rules' => 'required',
				'errors' => array(
					'required' => 'You must provide some %s.',
				)
			),
		);
		$this->form_validation->set_rules($validate);

        if ($this->form_validation->run() == false) {
            $datas = array(
                'title' => 'Home',
                'hidden' => 'hidden',
                'color' => ''
            );
    
            $partials = array(
                'head' => 'partials/user/head',
                'navbar' => 'partials/user/navbar',
                'content' => 'user/home',
                'footer' => 'partials/user/footer',
                'script' => 'partials/user/script',
            );
    
            $this->load->vars($datas);
            $this->load->view('master', $partials);
        } else {

            $config = array(
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_user' => 'rezyanto263@gmail.com',
                'smtp_pass' => 'ehju llty rjht asbu',
                'smtp_port' => 587,
                'smtp_crypto' => 'tls',
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n",
                'send_multipart'=> false
            );

            $this->load->library('email', $config);
            $this->email->initialize($config);

            $this->email->from($email, $name);
            $this->email->to('rezyanto263@gmail.com');
            $this->email->subject($subject);
            $this->email->message($message);
            
            if($this->email->send()) {
                $this->session->set_flashdata('message', '
                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                    <div id="liveToast" class="toast toast-success show message" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-body">
                            Your message has been sent. Thank you for contacting us!
                        </div>
                    </div>
                </div>');
                redirect('contact/#contact');
            }else {
                $this->session->set_flashdata('message', '
                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                    <div id="liveToast" class="toast toast-error show message" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-body">
                            Sorry, your message could not be send!
                        </div>
                    </div>
                </div>');
                redirect('contact/#contact');
            }
        }
    }

}

/* End of file Contact.php */

?>