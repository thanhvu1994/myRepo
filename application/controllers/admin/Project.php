<?php

class Project extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $config['upload_path']          = './uploads/projects';
        $config['allowed_types']        = 'jpg|png';
        $config['encrypt_name']         = TRUE;
        $this->load->library('upload', $config);
    }

    public function index()
    {
        $data['title'] = 'Quản Lý Dự Án';
        $data['template'] = 'admin/project/index';
        $data['models'] = $this->projects->get_model();
		$this->load->view('admin/layouts/index', $data);
    }

    public function create() {
        $data['title'] = 'Tạo Dự Án';
    	$data['template'] = 'admin/project/form';
        $data['link_submit'] = base_url('admin/project/create');
        $data['scenario'] = 'create';

        if (isset($_POST['title']) && isset($_POST['short_content']) && isset($_POST['content'])) {
            $image = '';
            if (!$this->upload->do_upload('featured_image')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $uploadData = $this->upload->data();
                $image = '/uploads/projects/'. $uploadData['file_name'];
            }

            $this->projects->set_model($image);
            redirect('admin/project/index', 'refresh');
        }
		$this->load->view('admin/layouts/index', $data);
    }

    public function view($id) {
        if ($this->input->is_ajax_request()) {
            $query = $this->db->get_where('projects', ['id' => $id]);

            $model = $query->result('Projects');
            if (count($model) > 0) {
                $result['title'] = $model[0]->title;
                $result['description'] = $model[0]->description;
                $result['short_content'] = $model[0]->short_content;
                $result['content'] = $model[0]->content;
                $result['featured_image'] = $model[0]->featured_image;
                $result['slug'] = $model[0]->slug;
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
        $data['title'] = 'Cập Nhật Dự Án';
        $data['template'] = 'admin/project/form';
        $data['model'] = $this->projects->get_model(['id' => $id]);
        $data['link_submit'] = base_url('admin/project/update/'.$id);
        $data['scenario'] = 'update';

        if (isset($_POST['title']) && isset($_POST['short_content']) && isset($_POST['content'])) {
            $oldModel = $this->projects->get_model(array('id' => $id));
            if (!$this->upload->do_upload('featured_image')) {
                $data['error'] = $this->upload->display_errors();

                $this->projects->update_model($id,$oldModel->featured_image);
                redirect('admin/project/index', 'refresh');
            } else {
                $path = '.'.$oldModel->featured_image;
                @unlink($path);

                $uploadData = $this->upload->data();
                $image = '/uploads/projects/'. $uploadData['file_name'];
                $this->projects->update_model($id,$image);
                redirect('admin/project/index', 'refresh');
            }
        }

        $this->load->view('admin/layouts/index', $data);
    }

    public function delete($id) {
        $model = $this->projects->get_model(['id' => $id]);

        if (count($model) > 0) {
            $this->projects->delete_model($id);
        }
    }

    public function bulkDelete() {
        $deleteItems = isset($_POST['select']) ? $_POST['select'] : [];

        if (!empty($deleteItems)) {
            $query = $this->db->query("SELECT * FROM ci_projects WHERE id in(".implode(',', $deleteItems).")");
            $models = $query->result('Projects');
            foreach ($models as $model) {
                $this->projects->delete_model($model->id);
            }
        }
        redirect('admin/project/index', 'refresh');
    }
}