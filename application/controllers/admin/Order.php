<?php

class Order extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('orders');
        $this->load->model('order_details');
    }

    public function index()
    {
        $data['title'] = 'Quản lý đơn đặt hàng';
        $data['template'] = 'admin/order/index';
        $data['models'] = $this->orders->get_model();
		$this->load->view('admin/layouts/index', $data);
    }

    public function view($id) {
        
    }

    public function update($id) {
        $data['title'] = 'Cập nhật đơn đặt hàng';
        $data['template'] = 'admin/order/form';
        $model = $this->order->get_model(['id' => $id]);
        $data['model'] = $model;
        $data['link_submit'] = base_url('admin/order/update/'.$id);

        if (isset($_POST) && !empty($_POST)) {
            $this->orders->update_model($id);
            redirect('admin/order/index', 'refresh');
        }

        $this->load->view('admin/layouts/index', $data);
    }

    public function delete($id) {
        $model = $this->orders->get_model(['id' => $id]);

        if (count($model) > 0) {
            $this->order->delete_model($id);
            echo 1;
        } else {
            echo 0;
        }
    }

    public function bulkDelete() {
        $deleteItems = isset($_POST['select']) ? $_POST['select'] : [];

        if (!empty($deleteItems)) {
            $query = $this->db->query("SELECT * FROM ci_orders WHERE id in(".implode(',', $deleteItems).")");
            $models = $query->result('Orders');
            foreach ($models as $model) {
                $this->orders->delete_model($model->id);
            }
        }
        redirect('admin/order/index', 'refresh');
    }
}