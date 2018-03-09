<?php

class Product extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $config['upload_path']          = './uploads/products';
        $config['allowed_types']        = 'jpg|png';
        $this->load->library('upload', $config);
    }

    public function index()
    {
        $data['template'] = 'admin/product/index';
        $data['models'] = $this->products->get_model();
		$this->load->view('admin/layouts/index', $data);
    }

    public function create() {
        $data['title'] = 'Create a Product';
    	$data['template'] = 'admin/product/form';
        $data['link_submit'] = base_url('admin/product/create');
        $data['scenario'] = 'create';
        $data['newCode'] = $this->products->generateCode();
        $data['newSlug'] = $this->products->generateSlug();

        $rules = $this->products->getRule();
        foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
        }

        if ($this->form_validation->run() == TRUE) {
            $id = $this->products->set_model();

            if(isset($_FILES['product_image'])){
                $arrFiles = $this->reArrayFiles($_FILES['product_image']);
            }

            if(!empty($arrFiles)){
                $_FILES = $arrFiles;
                foreach($_FILES as $key => $value){
                    if (!$this->upload->do_upload($key)) {
                        if(isset($data['error'])){
                            $data['error'] .= $this->upload->display_errors();
                        }else{
                            $data['error'] = $this->upload->display_errors();
                        }

                    }else{
                        $uploadData = $this->upload->data();
                        $image = '/uploads/products/'. $uploadData['file_name'];

                        $this->productImages->set_model(array(
                            'product_id' => $id,
                            'image' => $image,
                            'created_date' => date('Y-m-d H:i:s')
                        ));
                    }
                }
            }

            redirect('admin/product/index', 'refresh');
        }
		$this->load->view('admin/layouts/index', $data);
    }

    public function view($id) {
        if ($this->input->is_ajax_request()) {
            $query = $this->db->get_where('products', ['id' => $id]);

            $model = $query->result('Products');
            if (count($model) > 0) {
                $result['product_code'] = $model[0]->product_code;
                $result['product_name'] = $model[0]->product_name;
                $result['title'] = $model[0]->title;
                $result['content'] = $model[0]->content;
                $result['description'] = $model[0]->description;
                $result['meta_description'] = $model[0]->meta_description;
                $result['price'] = $model[0]->price;
                $result['sale_price'] = $model[0]->sale_price;
                $result['slug'] = $model[0]->slug;
                $result['language'] = ($model[0]->language == 'vn')? 'Tiếng Việt': 'English';
                $result['feature'] = ($model[0]->feature == STATUS_ACTIVE)? 'Active': 'In-Active';
                $result['status'] = ($model[0]->status == STATUS_ACTIVE)? 'Active': 'In-Active';
                $result['created_date'] = $model[0]->created_date;

                echo json_encode($result);
            } else {
                echo json_encode([]);
            }
        } else {
            echo json_encode([]);
        }
    }

    public function update($id) {
        $arrFiles = array();
        $data['title'] = 'Update a Product';
        $data['template'] = 'admin/product/form';
        $data['model'] = $this->products->get_model(['id' => $id]);
        $data['images'] = $this->productImages->get_images($id);
        $data['link_submit'] = base_url('admin/product/update/'.$id);
        $data['scenario'] = 'update';
        $data['newCode'] = $this->products->generateCode();
        $data['newSlug'] = $this->products->generateSlug();

        $rules = $this->products->getRule();
        foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
        }

        if ($this->form_validation->run() == TRUE) {
            if(isset($_FILES['product_image'])){
                $arrFiles = $this->reArrayFiles($_FILES['product_image']);
            }

            if(!empty($arrFiles)){
                $this->productImages->delete_all_model($id);

                $_FILES = $arrFiles;
                foreach($_FILES as $key => $value){
                    if (!$this->upload->do_upload($key)) {
                        if(isset($data['error'])){
                            $data['error'] .= $this->upload->display_errors();
                        }else{
                            $data['error'] = $this->upload->display_errors();
                        }

                    }else{
                        $uploadData = $this->upload->data();
                        $image = '/uploads/products/'. $uploadData['file_name'];

                        $this->productImages->set_model(array(
                            'product_id' => $id,
                            'image' => $image,
                            'created_date' => date('Y-m-d H:i:s')
                        ));
                    }
                }
            }

            $this->products->update_model($id);
            redirect('admin/product/index', 'refresh');
        }

        $this->load->view('admin/layouts/index', $data);
    }

    public function delete($id) {
        $model = $this->products->get_model(['id' => $id]);

        if (count($model) > 0) {
            $this->productImages->delete_all_model($id);
            $this->products->delete_model($id);
        }
    }

    public function reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }
}