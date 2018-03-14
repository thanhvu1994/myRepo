<?php

class Category extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('categories');
        $this->load->model('posts');

        $config['upload_path']          = './uploads/categories';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']         = TRUE;
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

        if (isset($_POST['Categories'])) {
            $data_insert = $_POST['Categories'];
            $thumb = '';
            if (isset($_FILES['thumb']['name']) && $_FILES['thumb']['name'] != '') {
                if ($this->upload->do_upload('thumb')) {
                    $uploadData = $this->upload->data();
                    $thumb = '/uploads/categories/'. $uploadData['file_name'];
                }
            }
            $data_insert['thumb'] = $thumb;
            $this->categories->set_model($data_insert);
            redirect('admin/category/index', 'refresh');
        }

		$this->load->view('admin/layouts/index', $data);
    }

    public function view($id) {
        if ($this->input->is_ajax_request()) {
            $query = $this->db->get_where('categories', ['id' => $id]);

            $model = $query->result('Categories');
            if (count($model) > 0) {
                $url = explode('/', $model[0]->url);
                $title = '';
                if (isset($url[1])) {
                    $post = $this->posts->get_model(['slug' => $url[1]]);
                    if (count($post) > 0) {
                        $title = 'Bài viết: '.$post->title;
                    }
                }
                $result['category_name'] = $model[0]->category_name;
                $result['parent_id'] = $model[0]->get_parent_name();
                $result['title'] = $model[0]->title;
                $result['description'] = $model[0]->description;
                $result['thumb'] = $model[0]->get_image();
                $result['url'] = $title;
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
        $old_thumb = $model->thumb;
        if (isset($_POST['Categories'])) {
            $data_update = $_POST['Categories'];
            if (isset($_POST['remove_img']) && $_POST['remove_img'] == true) {
                if (is_file('.'.$old_thumb)) {
                    unlink('.'.$old_thumb);
                }
                $data_update['thumb'] = '';
            }
            if (isset($_FILES['thumb']['name']) && $_FILES['thumb']['name'] != '') {
                if ($this->upload->do_upload('thumb')) {
                    $uploadData = $this->upload->data();
                    if (is_file('.'.$old_thumb)) {
                        unlink('.'.$old_thumb);
                    }
                    $thumb = '/uploads/categories/'. $uploadData['file_name'];
                    $data_update['thumb'] = $thumb;
                }
            }
            $this->categories->update_model($id, $data_update);
            redirect('admin/category/index', 'refresh');
        }

        $this->load->view('admin/layouts/index', $data);
    }

    public function delete($id) {
        $model = $this->categories->get_model(['id' => $id]);

        if (count($model) > 0) {
            $arr_id_del = $this->categories->delete_model($id);
            echo json_encode($arr_id_del);
        }
    }

    public function changeParent() {
        if (!$this->input->is_ajax_request()) {
           exit('No direct script access allowed');
        }
        if (isset($_POST['type'])) {
            $type = $_POST['type'];
            if (isset($_POST['id']) && !empty($_POST['id'])) {
                $id = $_POST['id'];
            } else {
                $id = 0;
            }
            $categories = $this->categories->get_dropdown_category($id, $type);

            $data = '<option value="0"> -- Chọn lớp cha -- </option>';
            if (!empty($categories)) {
                foreach ($categories as $category_id => $category_name) {
                    $data .= '<option value="'.$category_id.'">'.$category_name.'</option>';
                }
            }
            echo $data;
        }
    }

    public function bulkDelete() {
        $deleteItems = isset($_POST['select']) ? $_POST['select'] : [];

        if (!empty($deleteItems)) {
            $query = $this->db->query("SELECT * FROM ci_categories WHERE id in(".implode(',', $deleteItems).")");
            $models = $query->result('Categories');
            foreach ($models as $model) {
                $this->categories->delete_model($model->id);
            }
        }
        redirect('admin/category/index', 'refresh');
    }
}