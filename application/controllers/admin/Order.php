<?php

class Order extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('orders');
        $this->load->model('orderDetails');
    }

    public function index()
    {
        $data['title'] = 'Quản lý đơn đặt hàng';
        $data['template'] = 'admin/order/index';
        $data['models'] = $this->orders->get_model();
		$this->load->view('admin/layouts/index', $data);
    }

    public function update($id) {
        $data['title'] = 'Cập nhật đơn đặt hàng';
        $data['template'] = 'admin/order/form';
        $model = $this->orders->get_model(['id' => $id]);
        $data['model'] = $model;
        $billing = $model->getBilling();
        if (count($billing) > 0) {
            $data['billing'] = $billing;
        } else {
            redirect('admin/order/index', 'refresh');
        }
        $order_details = $model->getOrderDetails();
        if (count($order_details) > 0) {
            $data['order_details'] = $order_details;
        } else {
            redirect('admin/order/index', 'refresh');
        }

        $data['link_submit'] = base_url('admin/order/update/'.$id);

        if (isset($_POST['Orders'])) {
            $data_update = $_POST['Orders'];
            $this->orders->update_model($id, $data_update);
            redirect('admin/order/index', 'refresh');
        }

        $this->load->view('admin/layouts/index', $data);
    }

    public function delete($id) {
        $model = $this->orders->get_model(['id' => $id]);

        if (count($model) > 0) {
            $order_details = $model->getOrderDetails();
            if (count($order_details) > 0) {
                foreach ($order_details as $detail) {
                    $detail->delete_model($detail->id);
                }
            }
            $this->orders->delete_model($id);
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
                $order_details = $model->getOrderDetails();
                if (count($order_details) > 0) {
                    foreach ($order_details as $detail) {
                        $detail->delete_model($detail->id);
                    }
                }
                $this->orders->delete_model($model->id);
            }
        }
        redirect('admin/order/index', 'refresh');
    }
}