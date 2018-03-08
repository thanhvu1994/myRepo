<?php

class ContactOrder extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('contact');

        $config['upload_path']          = './uploads/contact';
        $config['allowed_types']        = 'jpg|png|doc|docx|xlsx|xls';
        $this->load->library('upload', $config);
    }

    public function index()
    {
        $data['title'] = 'Liên hệ';
        $data['template'] = 'admin/contactOrder/index';
        $data['models'] = $this->contact->get_model();
		$this->load->view('admin/layouts/index', $data);
    }

    public function view($id)
    {
        $data['title'] = 'Liên hệ';
        $data['template'] = 'admin/contactOrder/view';
        $data['model'] = $this->contact->get_model(['id' => $id]);
        $this->load->view('admin/layouts/index', $data);
    }

    public function create() {
        $data['title'] = 'Create a Banner';
    	$data['template'] = 'admin/banners/form';
        $data['link_submit'] = base_url('admin/banners/create');

        $rules = $this->banner->getRule();
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
                $this->banner->set_model($image);
                redirect('admin/banners/index', 'refresh');
            }
        }

		$this->load->view('admin/layouts/index', $data);
    }

    public function update($id) {
        $data['title'] = 'Update a Banner';
        $data['template'] = 'admin/banners/form';
        $model = $this->banner->get_model(['id' => $id]);
        $data['model'] = $model;
        $data['link_submit'] = base_url('admin/banners/update/'.$id);
        $rules = $this->banner->getRule();
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
                $this->banner->update_model($id);
                redirect('admin/banners/index', 'refresh');
            }
        }

        $this->load->view('admin/layouts/index', $data);
    }

    public function delete($id) {
        $model = $this->banner->get_model(['id' => $id]);

        if (count($model) > 0) {
            if (file_exists(base_url($model->image))) {
                unlink($model->get_image);
            }
            $this->banner->delete_model($id);
            echo 1;
        } else {
            echo 0;
        }
    }

}