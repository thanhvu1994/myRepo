<?php
class Front_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // load model admin
        $this->load->model('users');
        $this->load->model('categories');
        $this->load->model('settings');
        // validate user
        // if (!$this->users->check_logged()) {
        //     redirect('admin/login', 'refresh');
        // }
        // load helper
        $this->load->helper('url_helper');

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