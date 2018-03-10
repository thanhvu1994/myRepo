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

    public function contact($product = '')
    {
    	$this->load->model('contact');
    	$config['upload_path']          = './uploads/contact';
        $config['allowed_types']        = 'jpg|png|doc|docx|xlsx|xls';
        $config['overwrite']            = FALSE;
        $config['encrypt_name'] 		= TRUE;

        $this->load->library('upload', $config);

        if (isset($_POST['Contact'])) {
        	$data_insert = $_POST['Contact'];
        	$file = '';
        	if (isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])) {
                if (!$this->upload->do_upload('file')) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $uploadData = $this->upload->data();
                    $file = '/uploads/contact/'. $uploadData['file_name'];
                }
            }
            $data_insert['file'] = $file;
            $this->contact->set_model($data_insert);
        }
        if (!empty($product)) {
        	$data['is_product'] = true;
        } else {
        	$data['is_product'] = false;
        }
        $data['template'] = 'sites/contact';
		$this->load->view('layouts/index', $data);
    }
}