<?php

class Sites extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [];
		$this->load->view('layouts/index', $data);
    }
}