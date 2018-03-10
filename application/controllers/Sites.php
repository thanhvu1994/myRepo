<?php
require_once APPPATH . 'core/Front_Controller.php';

class Sites extends Front_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('partner');
    }

    public function index()
    {
        $data['template'] = 'sites/index';
		$this->load->view('layouts/index', $data);
    }
}