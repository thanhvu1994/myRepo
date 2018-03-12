<?php

class ContactOrder extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('contact');

        $config['upload_path']          = './uploads/contact';
        $config['allowed_types']        = 'jpg|png|doc|docx|xlsx|xls';
        $config['encrypt_name']         = TRUE;
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
        $this->load->model('contactPro');
        $data['template'] = 'admin/contactOrder/view';
        $model = $this->contact->get_model(['id' => $id]);
        if (count($model) > 0) {
            $data['model'] = $model;
            $data['title'] = 'Liên hệ: '.$model->getType();
            $products = $this->contactPro->getAll($id);
            $data['products'] = $products;
            if (isset($products[0])) {
                $data['title'] .= ' '.$products[0]->getProductName();
            }

            $this->load->view('admin/layouts/index', $data);
        }
    }

    public function delete($id) {
        $model = $this->contact->get_model(['id' => $id]);

        if (count($model) > 0) {
            $this->db->where('contact_id', $model->id);
            $this->db->delete('contact_info_product');
            if (is_file('.'.$model->file)) {
                unlink($model->file);
            }
            $this->contact->delete_model($id);
            echo 1;
        } else {
            echo 0;
        }
    }

}