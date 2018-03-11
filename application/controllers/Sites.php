<?php
require_once APPPATH . 'core/Front_Controller.php';

class Sites extends Front_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('partner');
        $this->load->model('products');
        $this->load->model('categories');
        $this->load->model('banner');
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['template'] = 'sites/index';
        $query = $this->db->query("SELECT * FROM ci_banners WHERE publish = 1");
        $banners = $query->result('Banner');
        $data['banners'] = $banners;
        $data['categories'] = $this->categories->getDataFE();

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

    public function category($slug){
        $data['category'] = $this->categories->getCategoryBySlug($slug);
        $data['treeCategory'] = $this->categories->getCategoryFE();

        if($data['category']){
            $config['base_url'] = base_url('sites/category/'. $slug);
            $config['total_rows'] = $data['category']->countProducts();
            $config['per_page'] = 12;
            $config['uri_segment'] = 4;
            $config['use_page_numbers'] = TRUE;

            $config["prev_tag_open"] = "<li id='pagination_previous_bottom' class='pagination_previous'>";
            $config["prev_tag_close"] = "<li>";

            $config["next_tag_open"] = "<li id='pagination_next_bottom' class='pagination_next'>";
            $config["next_tag_open"] = "<li>";

            $config["num_tag_open"] = "<li>";
            $config["num_tag_close"] = "</li>";

            $config["cur_tag_open"] = "<li><span>";
            $config["cur_tag_close"] = "</span></li>";

            $this->pagination->initialize($config);

            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['products'] = $data['category']->getProducts($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
        }else{
            $data['products'] = array();
        }


        if(isset($data['category'])){
            $data['template'] = 'sites/category';
        }else{
            redirect('sites/index', 'refresh');
        }

        $this->load->view('layouts/index', $data);
    }

    public function product($slug){
        $data['product'] = $this->products->getProductBySlug($slug);

        if(isset($data['product'])){
            $data['template'] = 'sites/product';
        }else{
            $data['template'] = 'sites/index';
        }

        $this->load->view('layouts/index', $data);
    }
}