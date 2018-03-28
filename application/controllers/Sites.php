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
        $this->load->model('posts');
        $this->load->model('projects');
        $this->load->model('news');
        $this->load->database();
        $this->load->library('pagination');
    }

    public function index()
    {
        if ($this->session->userdata['languages'] == 'vn'){
            $data['title'] = 'Trang Chủ';
            $data['description'] = 'Trang Chủ';
        }else{
            $data['title'] = 'Home';
            $data['description'] = 'Home';
        }

        $data['template'] = 'sites/index';
        $data['categories'] = $this->categories->getDataFE();
        $data['projects'] = $this->projects->getProjectsFE();

		$this->load->view('layouts/index', $data);
    }

    public function contact($type = '', $slug = '')
    {
        if ($this->session->userdata['languages'] == 'vn'){
            $data['title'] = 'Liên Hệ';
            $data['description'] = 'Liên Hệ';
        }else{
            $data['title'] = 'Contact';
            $data['description'] = 'Contact';
        }

    	$this->load->model('contact');
        $this->load->model('contactPro');

    	$config['upload_path']          = './uploads/contact';
        $config['allowed_types']        = 'jpg|png|doc|docx|xlsx|xls';
        $config['overwrite']            = FALSE;
        $config['encrypt_name'] 		= TRUE;

        $this->load->library('upload', $config);

        if (!empty($slug)) {
            $data['is_product'] = true;
            if ($type != 'bao-gia' && $type != 'dat-hang') {
                redirect('sites/index', 'refresh');
            }
            $data['type'] = $type;
            $product = $this->products->getProductBySlug($slug);
            if (count($product) > 0) {
                $attributes = $product->getAttributes();
                $arr_color = [];
                foreach ($attributes as $attribute) {
                    if (strtolower($attribute->name) == 'color') {
                        $colors = $attribute->getAttributeValues();
                        if (count($colors) > 0) {
                            foreach ($colors as $color) {
                                $arr_color[$color->id] = $color->name;
                            }
                        }
                    }
                }
                $arr_color = array_unique($arr_color);
                $data['arr_color'] = $arr_color;
                $data['product'] = $product;
            } else {
                redirect('sites/index', 'refresh');
            }
        } else {
            $data['is_product'] = false;
        }

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
            $data_insert['created_date'] = date('Y-m-d H:i:s');
            $this->db->insert('contact', $data_insert);
            $insert_id = $this->db->insert_id();
            $data['status'] = 'Yêu cầu thành công!';
            if (!empty($insert_id)) {
                if (isset($_POST['ContactPro']) && isset($product)) {
                    foreach ($_POST['ContactPro'] as $attr_contact_info_pro) {
                        $data_insert = $attr_contact_info_pro;
                        $data_insert['product_id'] = $product->id;
                        $data_insert['contact_id'] = $insert_id;
                        $this->contactPro->set_model($data_insert);
                        $data['status'] = 'Yêu cầu thành công!';
                    }
                }
            }
        }

        $data['template'] = 'sites/contact';
		$this->load->view('layouts/index', $data);
    }

    public function category($slug){
        $data['category'] = $this->categories->getCategoryBySlug($slug);
        $data['treeCategory'] = $this->categories->getCategoryFE();

        if($data['category']){
            $config['base_url'] = base_url('cat-'. $slug.'.html');
            $config['total_rows'] = $data['category']->countProducts();
            $config['per_page'] = 12;
            $config['uri_segment'] = 2;
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

            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
            $data['products'] = $data['category']->getProducts($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
        }else{
            $data['products'] = array();
        }


        if(isset($data['category'])){
            if ($this->session->userdata['languages'] == 'vn'){
                $data['title'] = $data['category']->title;
                $data['description'] = $data['category']->description;
            }else{
                $data['title'] = $data['category']->title_en;
                $data['description'] = $data['category']->description_en;
            }
            $data['template'] = 'sites/category';
        }else{
            redirect('sites/index', 'refresh');
        }

        $this->load->view('layouts/index', $data);
    }

    public function categoryAll(){
        $data['treeCategory'] = $this->categories->getCategoryFE();

        $config['base_url'] = base_url('cat.html');
        $config['total_rows'] = $this->categories->countAllProducts();
        $config['per_page'] = 12;
        $config['uri_segment'] = 2;
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

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data['products'] = $this->categories->getAllProducts($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        if ($this->session->userdata['languages'] == 'vn'){
            $data['title'] = 'Sản Phẩm';
            $data['description'] = 'Tất Cả Sản Phẩm';
        }else{
            $data['title'] = 'Products';
            $data['description'] = 'All Products';
        }
        $data['template'] = 'sites/categoryAll';

        $this->load->view('layouts/index', $data);
    }

    public function product($slug){
        $data['product'] = $this->products->getProductBySlug($slug);

        if(isset($data['product'])){
            $data['title'] = $data['product']->title;
            $data['description'] = $data['product']->meta_description;
            $data['template'] = 'sites/product';
        }else{
            $data['template'] = 'sites/index';
        }

        $this->load->view('layouts/index', $data);
    }

    public function login() {
        $data['title'] = 'Đăng Nhập';
        $data['description'] = 'Đăng Nhập';
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
        $data['title'] = 'Đăng Ký';
        $data['description'] = 'Đăng Ký';
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
            $data['title'] = 'Tài Khoản :'.$user->full_name;
            $data['description'] = 'Tài Khoản :'.$user->full_name;
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
            redirect('sites/login', 'refresh');
        }
        $info_login_fe = $this->session->userdata['logged_in_FE'];
        $query = $this->db->get_where('users', array('email' => $info_login_fe['email'], 'application_id' => FE));
        $user = $query->row('1', 'Users');
        if (count($user)) {
            $date = DateTime::createFromFormat("Y-m-d", $user->birth_date);
            if (isset($_POST['Users'])) {
                $data_update = $_POST['Users'];
                if (md5($data_update['password']) == $user->password_hash) {
                    if (isset($_POST['days']) && $_POST['months'] && $_POST['years']) {
                        $birth_date = $_POST['years'].'-'.$_POST['months'].'-'.$_POST['days'];
                        $data_update['birth_date'] = date_format(date_create($birth_date), 'Y-m-d');
                    }

                    if (isset($data_update['new_password']) && !empty($data_update['new_password'])) {
                        $data_update['password'] = $data_update['new_password'];
                    }

                    if (isset($data_update['new_password']) && isset($data_update['confirm_password'])) {
                        unset($data_update['new_password']);
                        unset($data_update['confirm_password']);
                    }

                    $this->users->update_model($user->id, $data_update);
                    $session_data = array(
                        'full_name' => $data_update['last_name'] .' '. $data_update['first_name'],
                        'email' => $data_update['email'],
                    );
                    // Add user data in session
                    $this->session->set_userdata('logged_in_FE', $session_data);
                    redirect('sites/account', 'refresh');
                } else {
                    $data['wrong_password'] = 'Sai mật khẩu';
                    $info = $data_update;
                    $info['info'] = true;
                    if (isset($_POST['days']) && $_POST['months'] && $_POST['years']) {
                        $info['days'] = $_POST['days'];
                        $info['months'] = $_POST['months'];
                        $info['info'] = $_POST['years'];
                    }
                }
            } else {
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
            }

            $data['info'] = $info;
        }
        $data['template'] = 'sites/register';
        $this->load->view('layouts/index', $data);
    }

    public function address($id = '') {
        if(!isset($this->session->userdata['logged_in_FE'])){
            redirect('sites/login', 'refresh');
        }
        $this->load->model('billingAddress');
        $data['template'] = 'sites/address';

        if (isset($_POST['BillingAddress'])) {
            $data_insert = $_POST['BillingAddress'];

            $info_login_fe = $this->session->userdata['logged_in_FE'];
            $query = $this->db->get_where('users', array('email' => $info_login_fe['email'], 'application_id' => FE));
            $user = $query->row('1', 'Users');
            if (count($user) > 0) {
                $data_insert['user_id'] = $user->id;
            }
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
        if(!isset($this->session->userdata['logged_in_FE'])){
            redirect('sites/login', 'refresh');
        }
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
        if(!isset($this->session->userdata['logged_in_FE'])){
            redirect('sites/login', 'refresh');
        }
        $info_login_fe = $this->session->userdata['logged_in_FE'];
        $query_user = $this->db->get_where('users', array('email' => $info_login_fe['email'], 'application_id' => FE));
        $user = $query_user->row('1', 'Users');
        if (count($user) > 0) {
            $query = $this->db->query("SELECT * FROM ci_billing_address WHERE user_id = ".$user->id. " AND id = ".$id);
            $billings = $query->row();
            if (count($billings) > 0) {
                $this->load->model('billingAddress');
                $this->billingAddress->delete_model($id);
            }
        }

        redirect('sites/addresses', 'refresh');
    }

    public function forgot() {
        $this->load->library('email');
        $config['protocol'] = 'sendmail';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_user'] = 'lucjfer0407@gmail.com';
        $config['smtp_pass'] = 'cbqltyrncpgreijv';
        $config['smtp_port'] = '465';
        $config['smtp_crypto'] = 'ssl';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);
        $data['template'] = 'sites/forgot';

        if (isset($_POST['email'])) {
            $query_user = $this->db->get_where('users', array('email' => $_POST['email'], 'application_id' => FE));
            $user = $query_user->row('1', 'Users');

            if ($user) {
                $this->email->from('lucjfer0407@gmail.com', 'Lucjfer');
                $this->email->to($_POST['email']);
                $this->email->subject('Email Test');
                $this->email->message('Testing the email class.');

                $this->email->send();
                redirect('sites/login', 'refresh');
            }
        }
        $this->load->view('layouts/index', $data);
    }

    public function order() {
        if(!isset($this->session->userdata['logged_in_FE'])){
            redirect('sites/login', 'refresh');
        }
        $data['template'] = 'sites/order';
        $this->load->view('layouts/index', $data);
    }

    public function news(){
        $data['treeCategory'] = $this->categories->getCategoryNewFE();

        if ($this->session->userdata['languages'] == 'vn'){
            $data['title'] = 'Tin Tức';
            $data['description'] = 'Tin Tức';
        }else{
            $data['title'] = 'News';
            $data['description'] = 'News';
        }

        $data['template'] = 'sites/news';

        $config['base_url'] = base_url('new.html');
        $config['total_rows'] = $this->news->countNews();
        $config['per_page'] = 5;
        $config['uri_segment'] = 2;
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

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data['news'] = $this->news->getNews($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->load->view('layouts/index', $data);
    }

    public function newDetail($slug){
        $data['template'] = 'sites/newDetail';
        $data['new'] = $this->news->get_model(array('slug' => $slug));

        if($data['new']){
            $data['title'] = $data['new']->title;
            $data['description'] = $data['new']->description;

            $this->db->where('id', $data['new']->id);
            $this->db->update('news', array('views' => $data['new']->views + 1));

            $this->load->view('layouts/index', $data);
        }else{
            redirect('sites/index', 'refresh');
        }
    }

    public function cms($slug){
        $data['template'] = 'sites/page';
        $data['page'] = $this->posts->get_model(array('slug' => $slug));

        if($data['page']){
            if ($this->session->userdata['languages'] == 'vn'){
                $data['title'] = $data['page']->title;
                $data['description'] = $data['page']->description;
            }else{
                $data['title'] = $data['page']->title_en;
                $data['description'] = $data['page']->description;
            }


            $this->load->view('layouts/index', $data);
        }else{
            redirect('sites/index', 'refresh');
        }
    }

    public function addCart() {
        if(isset($this->session->userdata['logged_in_FE'])) {
            $info_login_fe = $this->session->userdata['logged_in_FE'];
            $query_user = $this->db->get_where('users', array('email' => $info_login_fe['email'], 'application_id' => FE));
            $user = $query_user->row('1', 'Users');
            if (count($user) > 0) {
                if (isset($_POST['Orders'])) {
                    $query = $this->db->query('SELECT * FROM ci_orders WHERE status = '.STATUS_ORDER_TEMP.' AND user_id = '.$user->id.' AND id IN (SELECT o.order_id FROM ci_order_details o WHERE product_id = '.$_POST['Orders']['product_id'].')');
                    $order = $query->row();
                    if (count($order) > 0) {
                        $query = $this->db->get_where('order_details', ['order_id' => $order->id, 'product_id' => $_POST['Orders']['product_id']]);
                        $order_details = $query->row();
                        if (count($order_details) > 0) {
                            $data_update_detail['quantity'] = $_POST['Orders']['quantity'];
                            $this->db->where('id', $order_details->id);
                            $this->db->update('order_details', $data_update_detail);

                            $data_update['update_date'] = date('Y-m-d H:i:s');
                            $this->db->where('id', $order->id);
                            $this->db->update('orders', $data_update);
                        }
                    } else {
                        $this->load->model('orders');
                        $this->load->model('orderDetails');
                        $data_insert['number_invoice'] = $this->orders->generateCode();
                        $data_insert['user_id'] = $user->id;
                        $data_insert['email'] = $user->email;
                        $data_insert['status'] = STATUS_ORDER_TEMP;
                        $data_insert['created_date'] = date('Y-m-d H:i:s');
                        $data_insert['update_date'] = date('Y-m-d H:i:s');
                        $this->db->insert('orders', $data_insert);
                        $order_id = $this->db->insert_id();

                        $data_insert_detail = $_POST['Orders'];
                        $data_insert_detail['order_id'] = $order_id;
                        $data_insert_detail['created_date'] = date('Y-m-d H:i:s');
                        $this->db->insert('order_details', $data_insert_detail);
                    }
                    echo 1;
                }
            }
        }
    }

    public function cart() {
        $data['template'] = 'sites/cart';
        if(isset($this->session->userdata['logged_in_FE'])) {
            $info_login_fe = $this->session->userdata['logged_in_FE'];
            $query_user = $this->db->get_where('users', array('email' => $info_login_fe['email'], 'application_id' => FE));
            $user = $query_user->row('1', 'Users');
            if (count($user) > 0) {
                $this->load->model('orders');
                $this->load->model('orderDetails');
                $this->load->model('billingAddress');
                $query = $this->db->query('SELECT * FROM ci_orders WHERE status = '.STATUS_ORDER_TEMP.' AND user_id = '.$user->id);
                $order = $query->row();
                if (count($order) > 0) {
                    $data['order_id'] = $order->id;
                    $query = $this->db->get_where('order_details', ['order_id' => $order->id]);
                    $order_details = $query->result('OrderDetails');
                    $data['order_details'] = $order_details;
                    $query = $this->db->query('SELECT * FROM ci_billing_address WHERE user_id = '.$user->id);
                    $billings = $query->result('BillingAddress');
                    $data['billings'] = $billings;
                    if (isset($_POST['Orders'])) {
                        foreach ($_POST['Orders'] as $order_detail_id => $order_detail) {
                            $data_detail = $order_detail;
                            $this->db->where('id', $order_detail_id);
                            $this->db->update('order_details', $data_detail);
                        }
                        if (isset($_POST['shipping_address'])) {
                            $data_order['shipping_address'] = $_POST['shipping_address'];
                        }
                        $data_order['order_date'] = date('Y-m-d H:i:s');
                        $data_order['update_date'] = date('Y-m-d H:i:s');
                        $data_order['status'] = STATUS_ORDER_PENDING;
                        $this->db->where('id', $order_detail_id);
                        $this->db->update('orders', $data_order);
                        $data['order_success'] = 'Bạn đã đặt hàng thành công !';
                    }
                }
            }
        }
        $this->load->view('layouts/index', $data);
    }

    public function deleteCart() {
        if (isset($_POST['id']) && isset($_POST['order_id'])) {
            $this->load->model('orders');
            $this->load->model('orderDetails');
            $this->db->where('id', $_POST['id']);
            $this->db->delete('order_details');
            $query = $this->db->get_where('order_details', ['order_id' => $_POST['order_id']]);
            $order_details = $query->result();
            if (count($order_details) == 0) {
                $this->db->where('id', $_POST['order_id']);
                $this->db->delete('orders');
            }
        }
    }

    public function languages($lang) {
        $this->load->library('user_agent');
        if (in_array($lang,['vn', 'en'])) {
            $this->session->set_userdata('languages', $lang);
            if (!$this->agent->is_referral()) {
                $refer = $this->agent->referrer();
                echo $refer;
            } else {
                echo base_url('sites');
            }
        }
    }

    public function search() {
        if ($this->session->userdata['languages'] == 'vn'){
            $data['title'] = 'Tìm kiếm';
            $data['description'] = 'Tìm kiếm';
        }else{
            $data['title'] = 'Search';
            $data['description'] = 'Search';
        }

        $this->load->model('news');
        $this->load->model('products');

        if (isset($_GET['key'])) {
            $query = $this->db->query('SELECT * FROM ci_news WHERE title LIKE "%'.$_GET['key'].'%" OR title_en LIKE "%'.$_GET['key'].'%"');
            $results = $query->result('News');
            $data['results'] = $results;
            $query = $this->db->query('SELECT * FROM ci_products WHERE product_name LIKE "%'.$_GET['key'].'%" OR product_name_en LIKE "%'.$_GET['key'].'%"');
            $products = $query->result('Products');
            $data['products'] = $products;
            $data['count'] = count($products) + count($results);
            $data['key'] = $_GET['key'];
        } else {
            $data['results'] = $data['products'] = [];
            $data['count'] = 0;
            $data['key'] = '';
        }
        $data['template'] = 'sites/search';

        $this->load->view('layouts/index', $data);
    }

    public function newCategory($slug){
        $data['category'] = $this->categories->getCategoryBySlug($slug);
        $data['treeCategory'] = $this->categories->getCategoryNewFE();

        if($data['category']){
            $config['base_url'] = base_url('new-'. $slug.'.html');
            $config['total_rows'] = $data['category']->countNews();
            $config['per_page'] = 5;
            $config['uri_segment'] = 2;
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

            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
            $data['news'] = $data['category']->getNews($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
        }else{
            $data['news'] = array();
        }


        if(isset($data['category'])){
            if ($this->session->userdata['languages'] == 'vn'){
                $data['title'] = $data['category']->title;
                $data['description'] = $data['category']->description;
            }else{
                $data['title'] = $data['category']->title_en;
                $data['description'] = $data['category']->description_en;
            }
            $data['template'] = 'sites/newCategory';
        }else{
            redirect('sites/index', 'refresh');
        }

        $this->load->view('layouts/index', $data);
    }
}