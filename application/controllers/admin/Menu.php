<?php

class Menu extends MY_Controller {

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
        $data['title'] = 'Quản lý Menu';
        $data['template'] = 'admin/menu/index';
        $query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = 0 AND type = 'menu' ORDER BY display_order asc, category_name asc");
        $categories =  $query->result('Categories');
        $data['models'] = $categories;
        $this->load->view('admin/layouts/index', $data);
    }

    public function create() {
        $data['title'] = 'Tạo Menu';
        $data['template'] = 'admin/menu/form';
        $data['link_submit'] = base_url('admin/menu/create');

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
            $data_insert['type'] = 'menu';
            $this->categories->set_model($data_insert);
            redirect('admin/menu/index', 'refresh');
        }

        $this->load->view('admin/layouts/index', $data);
    }

    public function update($id) {
        $data['title'] = 'Chỉnh sửa Menu';
        $data['template'] = 'admin/menu/form';
        $model = $this->categories->get_model(['id' => $id]);
        $data['model'] = $model;
        $data['link_submit'] = base_url('admin/menu/update/'.$id);
        $rules = $this->categories->getRule();
        foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
        }
        $old_thumb = $model->thumb;
        if (isset($_POST['Categories'])) {
            $data_update = $_POST['Categories'];

            if (isset($_FILES['thumb']['name']) && $_FILES['thumb']['name'] != '') {
                if ($this->upload->do_upload('thumb')) {
                    $uploadData = $this->upload->data();
                    if (is_file('.'.$old_thumb)) {
                        unlink('.'.$old_thumb);
                    }
                    $thumb = '/uploads/categories/'. $uploadData['file_name'];
                    $data_update['thumb'] = $thumb;
                }
            } else {
                if (isset($_POST['remove_img']) && $_POST['remove_img'] == true) {
                    if (is_file('.'.$old_thumb)) {
                        unlink('.'.$old_thumb);
                    }
                    $data_update['thumb'] = '';
                }
            }
            $data_update['type'] = 'menu';
            $this->categories->update_model($id, $data_update);
            redirect('admin/menu/index', 'refresh');
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

    public function bulkDelete() {
        $deleteItems = isset($_POST['select']) ? $_POST['select'] : [];

        if (!empty($deleteItems)) {
            $query = $this->db->query("SELECT * FROM ci_categories WHERE id in(".implode(',', $deleteItems).")");
            $models = $query->result('Categories');
            foreach ($models as $model) {
                $this->categories->delete_model($model->id);
            }
        }
        redirect('admin/menu/index', 'refresh');
    }
}