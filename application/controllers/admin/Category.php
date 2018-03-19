<?php

class Category extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('categories');

        $config['upload_path']          = './uploads/banners';
        $config['allowed_types']        = 'gif|jpg|png';
        $this->load->library('upload', $config);
    }

    public function index()
    {
        $data['title'] = 'Quản lý danh mục';
        $data['template'] = 'admin/category/index';
        $data['models'] = $this->categories->get_model();
		$this->load->view('admin/layouts/index', $data);
    }

    public function create() {
        $data['title'] = 'Tạo danh mục';
    	$data['template'] = 'admin/category/form';
        $data['link_submit'] = base_url('admin/category/create');

        $rules = $this->categories->getRule();
        foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
        }
        if ($this->form_validation->run() == TRUE) {
            $this->categories->set_model();
            redirect('admin/category/index', 'refresh');
        }

		$this->load->view('admin/layouts/index', $data);
    }

    public function view($id) {
        if ($this->input->is_ajax_request()) {
            $query = $this->db->get_where('categories', ['id' => $id]);

            $model = $query->result('Categories');
            if (count($model) > 0) {
                $result['category_name'] = $model[0]->category_name;
                $result['parent_id'] = $model[0]->get_parent_name();
                $result['title'] = $model[0]->title;
                $result['description'] = $model[0]->description;
                $result['url'] = $model[0]->url;
                $result['created_date'] = $model[0]->get_created_date();
                $result['update_date'] = $model[0]->get_update_date();
                echo json_encode($result);
            } else {
                echo json_encode([]);
            }
        } else {
            echo json_encode([]);
        }
    }

    public function update($id) {
        $data['title'] = 'Chỉnh sửa danh mục';
        $data['template'] = 'admin/category/form';
        $model = $this->categories->get_model(['id' => $id]);
        $data['model'] = $model;
        $data['link_submit'] = base_url('admin/category/update/'.$id);
        $rules = $this->categories->getRule();
        foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
        }

        if ($this->form_validation->run() == TRUE) {
            $this->categories->update_model($id);
            redirect('admin/category/index', 'refresh');
        }

        $this->load->view('admin/layouts/index', $data);
    }

    public function delete($id) {
        $model = $this->categories->get_model(['id' => $id]);

        if (count($model) > 0) {
            $this->categories->delete_model($id);
            echo 1;
        } else {
            echo 0;
        }
    }

}