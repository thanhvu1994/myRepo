<?php

class Address extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('billingAddress');
    }

    public function index($id)
    {
        $data['title'] = 'Quản lý địa chỉ người dùng';
        $data['template'] = 'admin/address/index';
        $query = $this->db->query("SELECT * FROM ci_billing_address WHERE user_id = ".$id);
        $billing =  $query->result('BillingAddress');
        $data['models'] = $billing;
        $this->load->view('admin/layouts/index', $data);
    }

    public function view($id) {
        $data['title'] = 'Thông tin chi tiết địa chỉ';
        $data['template'] = 'admin/address/view';
        $model = $this->billingAddress->get_model(['id' => $id]);
        $data['model'] = $model;

        $this->load->view('admin/layouts/index', $data);
    }

    public function delete($id) {
        $model = $this->billingAddress->get_model(['id' => $id]);

        if (count($model) > 0) {
            $this->billingAddress->delete_model($model->id);
            echo 1;
        } else {
            echo 0;
        }
    }

    public function bulkDelete() {
        $deleteItems = isset($_POST['select']) ? $_POST['select'] : [];

        if (!empty($deleteItems)) {
            $query = $this->db->query("SELECT * FROM ci_billing_address WHERE id in(".implode(',', $deleteItems).")");
            $models = $query->result('BillingAddress');
            foreach ($models as $model) {
                $this->billingAddress->delete_model($model->id);
            }
        }
        redirect('admin/address', 'refresh');
    }
}