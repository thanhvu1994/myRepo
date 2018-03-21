<?php

class Post extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $config['upload_path']          = './uploads/posts';
        $config['allowed_types']        = 'jpg|png';
        $config['encrypt_name']         = TRUE;
        $this->load->library('upload', $config);
    }

    public function index()
    {
        $data['title'] = 'Quản Lý Trang Tĩnh';
        $data['template'] = 'admin/post/index';
        $data['models'] = $this->posts->get_model();
		$this->load->view('admin/layouts/index', $data);
    }

    public function create() {
        $data['title'] = 'Tạo Trang';
    	$data['template'] = 'admin/post/form';
        $data['link_submit'] = base_url('admin/post/create');
        $data['scenario'] = 'create';
        $rules = $this->posts->getRule();
        foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
        }

        if ($this->form_validation->run() == TRUE) {
            $image = '';
            if (!$this->upload->do_upload('featured_image')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $uploadData = $this->upload->data();
                $image = '/uploads/posts/'. $uploadData['file_name'];
            }

            $this->posts->set_model($image);
            redirect('admin/post/index', 'refresh');
        }
		$this->load->view('admin/layouts/index', $data);
    }

    public function view($id) {
        if ($this->input->is_ajax_request()) {
            $query = $this->db->get_where('posts', ['id' => $id]);

            $model = $query->result('Menus');
            if (count($model) > 0) {
                $result['title'] = $model[0]->title;
                $result['description'] = $model[0]->description;
                $result['short_content'] = $model[0]->short_content;
                $result['content'] = $model[0]->content;
                $result['featured_image'] = $model[0]->featured_image;
                $result['slug'] = $model[0]->slug;
                $result['type'] = ucfirst($model[0]->type);
                $result['language'] = ($model[0]->language == 'vn')? 'Tiếng Việt': 'English';
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
        $data['title'] = 'Cập Nhật Trang';
        $data['template'] = 'admin/post/form';
        $data['model'] = $this->posts->get_model(['id' => $id]);
        $data['link_submit'] = base_url('admin/post/update/'.$id);
        $data['scenario'] = 'update';

        $rules = $this->posts->getRule();
        foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
        }

        if ($this->form_validation->run() == TRUE) {
            $oldModel = $this->posts->get_model(array('id' => $id));
            if (!$this->upload->do_upload('featured_image')) {
                $data['error'] = $this->upload->display_errors();

                $this->posts->update_model($id,$oldModel->featured_image);
                redirect('admin/post/index', 'refresh');
            } else {
                $path = '.'.$oldModel->featured_image;
                @unlink($path);

                $uploadData = $this->upload->data();
                $image = '/uploads/posts/'. $uploadData['file_name'];
                $this->posts->update_model($id,$image);
                redirect('admin/post/index', 'refresh');
            }
        }

        $this->load->view('admin/layouts/index', $data);
    }

    public function delete($id) {
        $model = $this->posts->get_model(['id' => $id]);

        if (count($model) > 0) {
            $this->posts->delete_model($id);
        }
    }

    public function bulkDelete() {
        $deleteItems = isset($_POST['select']) ? $_POST['select'] : [];

        if (!empty($deleteItems)) {
            $query = $this->db->query("SELECT * FROM ci_posts WHERE id in(".implode(',', $deleteItems).")");
            $models = $query->result('Posts');
            foreach ($models as $model) {
                $this->posts->delete_model($model->id);
            }
        }
        redirect('admin/post/index', 'refresh');
    }
}