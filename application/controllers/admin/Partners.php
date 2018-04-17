<?php

class Partners extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('partner');
        $this->load->library('image_lib');

        $config['upload_path']          = './uploads/partners';
        $config['allowed_types']        = 'jpg|png';
        $config['encrypt_name']         = TRUE;
        $this->load->library('upload', $config);
    }

    public function index()
    {
        $data['title'] = 'Quản lý đối tác';
        $data['template'] = 'admin/partners/index';
        $data['models'] = $this->partner->get_model();
		$this->load->view('admin/layouts/index', $data);
    }

    public function create() {
        $data['title'] = 'Tạo đối tác';
    	$data['template'] = 'admin/partners/form';
        $data['link_submit'] = base_url('admin/partners/create');

        $rules = $this->partner->getRule();
        foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
        }

        if (isset($_POST) && !empty($_POST)) {
            if (!$this->upload->do_upload('logo')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $uploadData = $this->upload->data();
                $logo = '/uploads/partners/'. $uploadData['file_name'];
                $this->partner->set_model($logo);
                redirect('admin/partners/index', 'refresh');
            }
        }

		$this->load->view('admin/layouts/index', $data);
    }

    public function view($id) {
        if ($this->input->is_ajax_request()) {
            $query = $this->db->get_where('partner', ['id' => $id]);

            $model = $query->result('Partner');
            if (count($model) > 0) {
                $result['name'] = $model[0]->name;
                $result['description'] = $model[0]->description;
                $result['url'] = $model[0]->url;
                $result['logo'] = base_url($model[0]->logo);
                $result['publish'] = $model[0]->get_publish();
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
        $data['title'] = 'Chỉnh sửa đối tác';
        $data['template'] = 'admin/partners/form';
        $model = $this->partner->get_model(['id' => $id]);
        $old_logo = $model->logo;
        $data['model'] = $model;
        $data['link_submit'] = base_url('admin/partners/update/'.$id);
        $rules = $this->partner->getRule();
        foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
        }

        if (isset($_POST) && !empty($_POST)) {
            if ($_FILES['logo']['name'] != '') {
                if (!$this->upload->do_upload('logo')) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $uploadData = $this->upload->data();
                    if (is_file('.'.$old_logo)) {
                        unlink('.'.$old_logo);
                    }
                    $logo = '/uploads/partners/'. $uploadData['file_name'];
                    $this->partner->update_model($id, $logo);
                    redirect('admin/partners/index', 'refresh');
                }
            } else {
                $this->partner->update_model($id);
                redirect('admin/partners/index', 'refresh');
            }
        }

        $this->load->view('admin/layouts/index', $data);
    }

    public function delete($id) {
        $model = $this->partner->get_model(['id' => $id]);

        if (count($model) > 0) {
            $this->partner->delete_model($id);
            echo 1;
        } else {
            echo 0;
        }
    }

    public function ajaxPublish() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $id = $this->input->post('id');
        $publish = $this->input->post('publish');
        $model = $this->partner->get_model(['id' => $id]);

        if (count($model) > 0) {
            $data_update['publish'] = $publish;
            $this->db->where('id', $id);
            $this->db->update('partner', $data_update);
        }
    }

    public function bulkDelete() {
        $deleteItems = isset($_POST['select']) ? $_POST['select'] : [];

        if (!empty($deleteItems)) {
            $query = $this->db->query("SELECT * FROM ci_partner WHERE id in(".implode(',', $deleteItems).")");
            $models = $query->result('Partner');
            foreach ($models as $model) {
                if (is_file('.'.$model->logo)) {
                    unlink('.'.$model->logo);
                }
                $this->partner->delete_model($model->id);
            }
        }
        redirect('admin/partners/index', 'refresh');
    }
}