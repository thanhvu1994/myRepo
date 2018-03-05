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
            $type_level = 1;
            $this->categories->set_model(['type_level' => $type_level]);
            redirect('admin/category/index', 'refresh');
        }

		$this->load->view('admin/layouts/index', $data);
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
            if (!$this->upload->do_upload('image')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $uploadData = $this->upload->data();
                $image = '/uploads/banners/'. $uploadData['file_name'];
                $this->categories->update_model($id);
                redirect('admin/category/index', 'refresh');
            }
        }

        $this->load->view('admin/layouts/index', $data);
    }

    public function delete($id) {
        $model = $this->categories->get_model(['id' => $id]);

        if (count($model) > 0) {
            if (file_exists(base_url($model->image))) {
                unlink($model->get_image);
            }
            $this->categories->delete_model($id);
            echo 1;
        } else {
            echo 0;
        }
    }

}