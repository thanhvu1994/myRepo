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
        $this->load->model('users');
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

    public function login() {
        $data['template'] = 'sites/login';

        if(isset($this->session->userdata['logged_in_FE'])){
            redirect('sites', 'refresh');
        }

        if (isset($_POST['Users'])) {
            $query = $this->db->get_where('users', array('email' => $_POST['Users']['email'], 'password_hash' => md5($_POST['Users']['password'])));
            $user = $query->row('1', 'Users');

            if (count($user) > 0) {
                $session_data = array(
                    'full_name' => $user->full_name,
                    'email' => $user->email,
                );
                // Add user data in session
                $this->session->set_userdata('logged_in_FE', $session_data);
                redirect('sites', 'refresh');
            }
        }
        $this->load->view('layouts/index', $data);
    }

    public function logout() {
        // Removing session data
        $sess_array = [];
        if(isset($this->session->userdata['logged_in_FE'])){
            $this->session->unset_userdata('logged_in_FE', $sess_array);
        }
        redirect('sites', 'refresh');
    }

    public function register() {
        $data['template'] = 'sites/register';

        if (isset($_POST['Users'])) {
            $data_insert = $_POST['Users'];
            $email = $data_insert['email'];
            $query = $this->db->get_where('users', array('email' => $email, 'application_id' => FE));
            $users = $query->row('1', 'Users');
            if (count($users) > 0) {
                $data['error_user_exists'] = 'An account using this email address has already been registered. Please enter a valid password or request a new one.';
            } else {
                if (isset($_POST['days']) && $_POST['months'] && $_POST['years']) {
                    $birth_date = $_POST['years'].'-'.$_POST['months'].'-'.$_POST['days'];
                    $data_insert['birth_date'] = date_format(date_create($birth_date), 'Y-m-d');
                }
                $this->users->set_model($data_insert);
                redirect('sites/login', 'refresh');
            }
        }
        $this->load->view('layouts/index', $data);
    }

    public function account() {
        if(!isset($this->session->userdata['logged_in_FE'])){
            redirect('sites', 'refresh');
        }
        $info_login_fe = $this->session->userdata['logged_in_FE'];
        $query = $this->db->get_where('users', array('email' => $info_login_fe['email'], 'application_id' => FE));
        $user = $query->row('1', 'Users');
        if (count($user) > 0) {
            $data['user_id'] = $user->id;
        } else {
            $data['user_id'] = 0;
        }
        $this->load->model('billingAddress');
        $data['template'] = 'sites/account';
        $this->load->view('layouts/index', $data);
    }

    public function infomation() {
        if(!isset($this->session->userdata['logged_in_FE'])){
            redirect('sites', 'refresh');
        }
        $info_login_fe = $this->session->userdata['logged_in_FE'];
        $query = $this->db->get_where('users', array('email' => $info_login_fe['email'], 'application_id' => FE));
        $user = $query->row('1', 'Users');
        if (count($user)) {
            $date = DateTime::createFromFormat("Y-m-d", $user->birth_date);
            // if (isset($_POST['Users'])) {
            //     $data_update = $_POST['Users'];
            //     if (md5($data_update['password']) == $user->password_hash) {

            //     } else {
            //         $data['wrong_password'] = 'Sai mật khẩu';
            //         $info = $data_update;
            //         $info['info'] = true;
            //     }
            // } else {
                $info = [
                    'gender' => $user->gender,
                    'last_name' => $user->last_name,
                    'first_name' => $user->first_name,
                    'email' => $user->email,
                    'days' => $date->format("d"),
                    'months' => $date->format("m"),
                    'years' => $date->format("Y"),
                    'info' => true,
                ];
            // }

            $data['info'] = $info;
        }
        $data['template'] = 'sites/register';
        $this->load->view('layouts/index', $data);
    }

    public function address($id = '') {
        $this->load->model('billingAddress');
        $data['template'] = 'sites/address';

        if (isset($_POST['BillingAddress'])) {
            $data_insert = $_POST['BillingAddress'];
            if (!empty($id)) {
                $this->billingAddress->update_model($id, $data_insert);
            } else {
                $this->billingAddress->set_model($data_insert);
            }
            redirect('sites/addresses', 'refresh');
        } else {
            if (!empty($id)) {
                $billing = $this->billingAddress->get_model(['id' => $id]);

                if (count($billing) > 0) {
                    $data['billing'] = $billing;
                }
            }
        }
        $this->load->view('layouts/index', $data);
    }

    public function addresses() {
        $this->load->model('billingAddress');
        $data['template'] = 'sites/addresses';
        $info_login_fe = $this->session->userdata['logged_in_FE'];
        $query_user = $this->db->get_where('users', array('email' => $info_login_fe['email'], 'application_id' => FE));
        $user = $query_user->row('1', 'Users');
        if (count($user) > 0) {
            $query = $this->db->query("SELECT * FROM ci_billing_address WHERE user_id = ".$user->id);
            $billings = $query->result('BillingAddress');
            $data['billings'] = $billings;
        }
        $this->load->view('layouts/index', $data);
    }

    public function delete($id) {
        $this->load->model('billingAddress');
        $this->billingAddress->delete_model($id);
        redirect('sites/addresses', 'refresh');
    }
}