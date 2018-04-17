<?php

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// Load form validation library
		$this->load->library('form_validation');
		// load helper
		$this->load->helper('cookie');
		// load model user admin
		$this->load->model('users');
		$this->load->model('settings');
	}

	// Show login page
	public function index() {
		$data['template'] = 'admin/site/login';

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				redirect('admin/system', 'refresh');
			}
		} else {
			$info = array(
				'username' => $this->input->post('username'),
				'password_hash' => md5($this->input->post('password'))
			);
			$result = $this->users->login($info);
			if ($result == TRUE) {
				$username = $this->input->post('username');
				$result = $this->users->read_user_information($username);
				if ($result != false) {
					$session_data = array(
						'username' => $result[0]->username,
						'email' => $result[0]->email,
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					// remember me
					$remember = $this->input->post('remember');
					if ($remember) {

					}
					redirect('admin/system', 'refresh');
				}
			} else {
				$data['error_message'] = 'Invalid Username or Password';
			}
		}

		$this->load->view('admin/layouts/index', $data);
	}

	// Logout from admin page
	public function logout() {
		// Removing session data
		$sess_array = [];
		$this->session->unset_userdata('logged_in', $sess_array);
		redirect('admin/login', 'refresh');
	}

	public function rememberMe($cookie) {
        $this->input->set_cookie($cookie);
	}

}