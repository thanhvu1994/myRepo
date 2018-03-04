<?php
class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // load model admin
        $this->load->model('users');
        $this->load->model('menus');
        // validate user
        if (!$this->users->check_logged()) {
            redirect('admin/login', 'refresh');
        }
        // load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        // Load form validation library
        $this->load->library('form_validation');

    }

    public function _remap($method, $params = array())
    {
        if (method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }
        show_404();
    }
}