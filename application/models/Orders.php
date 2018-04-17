<?php
class Orders extends CI_Model {

    public $all_status = [
        STATUS_ORDER_PENDING => 'Đang chờ',
        STATUS_ORDER_COMPLETE => 'Đã xử lý',
        STATUS_ORDER_CANCEL => 'Hủy',
    ];

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    public function getRule() {
        $rules = [
        ];

        return $rules;
    }

    public function get_model($conditions = [])
    {
        if (!empty($conditions)) {
            $query = $this->db->get_where('orders', $conditions);

            return $query->row(0, 'Orders');
        } else {
            $query = $this->db->query("SELECT * FROM ci_orders ORDER BY status asc");
            return $query->result('Orders');
        }
    }

    public function set_model($data_insert)
    {
        $data_insert['created_date'] = date('Y-m-d H:i:s');
        $data_insert['update_date'] = date('Y-m-d H:i:s');

        return $this->db->insert('orders', $data_insert);
    }

    public function update_model($id, $data_insert)
    {
        $data_insert['update_date'] = date('Y-m-d H:i:s');

        $this->db->where('id', $id);
        $this->db->update('orders', $data_insert);
    }


    public function delete_model($id) {
        $this->db->where('id', $id);
        $this->db->delete('orders');
    }


    public function get_created_date() {
        return date_format(date_create($this->created_date), 'd-m-Y');
    }

    public function get_update_date() {
        return date_format(date_create($this->update_date), 'd-m-Y');
    }

    public function get_order_date() {
        return date_format(date_create($this->order_date), 'd-m-Y');
    }

    public function generateCode(){
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `ci_orders`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }
        return 'P'.date('dmY').(str_pad($maxid+1, 4, '0', STR_PAD_LEFT));
    }

    public function getStatus() {
        switch ($this->status) {
            case STATUS_ORDER_PENDING:
                return 'Đang chờ';
                break;
            case STATUS_ORDER_COMPLETE:
                return 'Đã xử lý';
                break;
            case STATUS_ORDER_CANCEL:
                return 'Hủy bỏ';
                break;
            default:
                return 'Chưa đặt hàng';
                break;
        }
    }

    public function getCustomerName() {
        if ($this->user_id) {
            $query = $this->db->get_where('users', ['id' => $this->user_id]);

            $user = $query->row();
            if (count($user) > 0) {
                return ucwords($user->full_name);
            }
        }

        return '';
    }

    public function getBilling() {
        if ($this->shipping_address) {
            $this->load->model('billingAddress');
            $query = $this->db->get_where('billing_address', ['id' => $this->shipping_address]);

            $billing = $query->row(0, 'BillingAddress');

            if (count($billing) > 0) {
                return $billing;
            }
        }

        return null;
    }

    public function getOrderDetails() {
        if ($this->id) {
            $this->load->model('orderDetails');
            $query = $this->db->get_where('order_details', ['order_id' => $this->id]);

            $orderr_details = $query->result('OrderDetails');

            if (count($orderr_details) > 0) {
                return $orderr_details;
            }
        }

        return null;
    }
}