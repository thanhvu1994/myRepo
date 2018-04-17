<?php

class Site extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $config['upload_path'] = './uploads/admin';
        $config['allowed_types'] = 'jpg|png';
        $config['overwrite']     = FALSE;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);
    }

    public function index()
    {
        $data['template'] = 'admin/site/index';
		$this->load->view('admin/layouts/index', $data);
    }

    public function profile()
    {
        $data['title'] = 'Thông tin tài khoản';
        $info_login = $this->session->userdata['logged_in'];
        $user = $this->users->get_model_by_username($info_login['username']);
        $data['user'] = $user;
    	$rules = $this->users->getRule();
    	foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
    	}
        $avarta = $user->avarta;
        $background = $user->background;

    	if ($this->form_validation->run() == TRUE) {
            $files = $_FILES;
            if (isset($files['file']['name']['avarta']) && $files['file']['name']['avarta'] != '') {
                $_FILES['avarta']['name'] = $files['file']['name']['avarta'];
                $_FILES['avarta']['type'] = $files['file']['type']['avarta'];
                $_FILES['avarta']['tmp_name'] = $files['file']['tmp_name']['avarta'];
                $_FILES['avarta']['error'] = $files['file']['error']['avarta'];
                $_FILES['avarta']['size'] = $files['file']['size']['avarta'];

                $this->upload->do_upload('avarta');
                $uploadData = $this->upload->data();
                if (isset($uploadData['file_name'])) {
                    if (is_file('.'.$avarta)) {
                        unlink('.'.$avarta);
                    }
                    $avarta = '/uploads/admin/'. $uploadData['file_name'];
                }
            }
            if (isset($files['file']['name']['background']) && $files['file']['name']['background'] != '') {
                $_FILES['background']['name'] = $files['file']['name']['background'];
                $_FILES['background']['type'] = $files['file']['type']['background'];
                $_FILES['background']['tmp_name'] = $files['file']['tmp_name']['background'];
                $_FILES['background']['error'] = $files['file']['error']['background'];
                $_FILES['background']['size'] = $files['file']['size']['background'];

                $this->upload->do_upload('background');
                $uploadData = $this->upload->data();
                if (isset($uploadData['file_name'])) {
                    if (is_file('.'.$background)) {
                        unlink('.'.$background);
                    }
                    $background = '/uploads/admin/'. $uploadData['file_name'];
                }
            }
            $data_insert = array(
                'full_name' => $this->input->post('full_name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'avarta' => $avarta,
                'background' => $background,
            );
            $new_password = $this->input->post('new_password');
            if (!empty($new_password)) {
                $data_insert['password'] = $new_password;
                $data_insert['password_hash'] = md5($new_password);
            }
            $this->db->where('id', $user->id);
            $this->db->update('users', $data_insert);

            $data['success'] = 'Updated Success';

            $user = $this->users->get_model_by_username($info_login['username']);
            $data['user'] = $user;
    	}

    	$data['template'] = 'admin/site/profile';
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