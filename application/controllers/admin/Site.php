<?php

class Site extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['template'] = 'admin/site/index';
		$this->load->view('admin/layouts/index', $data);
    }

    public function profile()
    {
        $info_login = $this->session->userdata['logged_in'];
        $user = $this->users->get_model_by_username($info_login['username']);
        $data['user'] = $user;
    	$rules = $this->users->getRule();
    	foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
    	}

    	if ($this->form_validation->run() == TRUE) {
            $data = array(
                'full_name' => $this->input->post('full_name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
            );
            $new_password = $this->input->post('new_password');
            if (!empty($new_password)) {
                $data['password'] = $new_password;
                $data['password_hash'] = md5($new_password);
            }
            $this->db->where('id', $user->id);
            $this->db->update('users', $data);

            $data['success'] = 'Updated Success';

            $user = $this->users->get_model_by_username($info_login['username']);
            $data['user'] = $user;
    	}

    	$data['content'] = 'admin/site/profile';
		$this->load->view('admin/layouts/index', $data);
    }

    public function validate_password($password) {
        $info_login = $this->session->userdata['logged_in'];

        $user = $this->users->get_model_by_username($info_login['username']);
        if ($user) {
            $current_pass = $user->password_hash;
            if (md5($password) != $current_pass) {
                $this->form_validation->set_message('validate_password', 'Wrong Password');
                return FALSE;
            }

            return TRUE;
        }

        return FALSE;
    }
}