<?php
require_once APPPATH . 'core/Front_Controller.php';

class Sites extends Front_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('partner');
        $this->load->model('products');
    }

    public function index()
    {
        $data['template'] = 'sites/index';
        $data['products'] = $this->products->getDataFE();

		$this->load->view('layouts/index', $data);
    }

    public function product($slug){
        $data['template'] = 'sites/product';
        $data['product'] = $this->products->getProductBySlug($slug);

        $this->load->view('layouts/index', $data);
    }
}