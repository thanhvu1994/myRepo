<?php

class Product extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $config['upload_path']          = './uploads/products';
        $config['allowed_types']        = 'jpg|png';
        $config['encrypt_name']         = TRUE;
        $this->load->library('upload', $config);
    }

    public function index()
    {
        $data['title'] = 'Quản lý sản phẩm';
        $data['template'] = 'admin/product/index';
        $data['models'] = $this->products->get_model();
        $this->load->view('admin/layouts/index', $data);
    }

    public function create() {
        $data['title'] = 'Tạo sản phẩm';
        $data['template'] = 'admin/product/form';
        $data['link_submit'] = base_url('admin/product/create');
        $data['scenario'] = 'create';
        $data['newCode'] = $this->products->generateCode();
        $data['newSlug'] = $this->products->generateSlug();
        $data['categories'] = $this->categories->get_dropdown_category(0, 'category');

        $rules = $this->products->getRule();
        foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
        }

        if ($this->form_validation->run() == TRUE) {
            $id = $this->products->set_model();

            $category = $this->input->post('category');

            if(!empty($category)){
                $this->productCategory->set_model($id,$category);
            }

            $attributes = $this->input->post('attributes');
            $attribute_values = $this->input->post('attribute_values');

            foreach($attributes as $key => $value){
                if(!empty($value)){
                    $productOptionId = $this->productOption->set_model($id,$value);
                    if(!empty($attribute_values[$key])){
                        $this->productOptionValue->set_model($id,$productOptionId,$attribute_values[$key]);
                    }
                }
            }

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
                $result['price'] = $model[0]->price;
                $result['sale_price'] = $model[0]->sale_price;
                $result['category'] = $model[0]->getCategory();
                $result['language'] = ($model[0]->language == 'vn')? 'Tiếng Việt': 'English';
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
        $data['title'] = 'Chỉnh sửa sản phẩm';
        $data['template'] = 'admin/product/form';
        $data['model'] = $this->products->get_model(['id' => $id]);
        $data['images'] = $this->productImages->get_images($id);
        $data['link_submit'] = base_url('admin/product/update/'.$id);
        $data['scenario'] = 'update';
        $data['newCode'] = $this->products->generateCode();
        $data['newSlug'] = $this->products->generateSlug();
        $data['attribute'] = $this->productOption->get_model($id);
        $data['attribute_value'] = array();
        $data['categories'] = $this->categories->get_dropdown_category(0, 'category');

        foreach( $data['attribute'] as $key => $item){
            $data['attribute_value'][$item->id] = $this->productOptionValue->get_model($item->id);
        }

        $rules = $this->products->getRule();
        foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
        }

        if ($this->form_validation->run() == TRUE) {
            $category = $this->input->post('category');

            if(!empty($category)){
                $this->productCategory->delete_all_model($id);
                $this->productCategory->set_model($id,$category);
            }

            $attributes = $this->input->post('attributes');
            $attribute_values = $this->input->post('attribute_values');

            if(count($attributes) > 1){ // not empty
                $this->productOption->delete_all_model($id);
                $this->productOptionValue->delete_all_model($id);
                foreach($attributes as $key => $value){
                    if(!empty($value)){
                        $productOptionId = $this->productOption->set_model($id,$value);
                        $this->productOptionValue->set_model($id,$productOptionId,$attribute_values[$key]);
                    }
                }
            }


            if(isset($_FILES['product_image']['tmp_name']['0']) && empty($_FILES['product_image']['tmp_name']['0'])) {
                $data['error'] = 'No upload';
            }else{
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

    public function ajaxPublish() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $id = $this->input->post('id');
        $publish = $this->input->post('publish');
        $model = $this->products->get_model(['id' => $id]);

        if (count($model) > 0) {
            $data_update['status'] = $publish;
            $this->db->where('id', $id);
            $this->db->update('products', $data_update);
        }
    }

    public function bulkDelete() {
        $deleteItems = isset($_POST['select']) ? $_POST['select'] : [];

        if (!empty($deleteItems)) {
            $query = $this->db->query("SELECT * FROM ci_products WHERE id in(".implode(',', $deleteItems).")");
            $models = $query->result('Products');
            foreach ($models as $model) {
                $this->productImages->delete_all_model($model->id);
                $this->products->delete_model($model->id);
            }
        }
        redirect('admin/product/index', 'refresh');
    }
}