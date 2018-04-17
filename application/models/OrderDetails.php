<?php
class OrderDetails extends CI_Model {

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
            $query = $this->db->get_where('order_details', $conditions);

            return $query->row();
        } else {
            $query = $this->db->query("SELECT * FROM ci_order_details");
            return $query->result('OrderDetails');
        }
    }

    public function set_model($data_insert)
    {
        $data_insert['created_date'] = date('Y-m-d H:i:s');
        $data_insert['update_date'] = date('Y-m-d H:i:s');

        return $this->db->insert('partner', $data_insert);
    }

    public function update_model($id, $data_insert)
    {
        $data_insert['update_date'] = date('Y-m-d H:i:s');

        $this->db->where('id', $id);
        $this->db->update('order_details', $data_insert);
    }


    public function delete_model($id) {
        $this->db->where('id', $id);
        $this->db->delete('order_details');
    }


    public function get_created_date() {
        return date_format(date_create($this->created_date), 'd-m-Y');
    }

    public function get_update_date() {
        return date_format(date_create($this->update_date), 'd-m-Y');
    }

    public function getProductName() {
        $this->load->model('products');
        $product = $this->products->get_model(['id' => $this->product_id]);
        if (count($product) > 0) {
            if($this->session->userdata['languages'] == 'vn'){
                return $product->product_name;
            }else{
                return $product->product_name_en;
            }

        }
        return '';
    }

    public function getProductColor() {
        $this->load->model('products');
        $product = $this->products->get_model(['id' => $this->product_id]);
        if (count($product) > 0) {
            $attributes = $product->getAttributes();
            $arr_color = [];
            foreach ($attributes as $attribute) {
                if (strtolower($attribute->name) == 'color') {
                    $colors = $attribute->getAttributeValues();
                    if (count($colors) > 0) {
                        foreach ($colors as $color) {
                            $arr_color[$color->id] = $color->name;
                        }
                    }
                }
            }
            return $arr_color;
        }

        return [];
    }

    public function getProductImage() {
        $this->load->model('products');
        $product = $this->products->get_model(['id' => $this->product_id]);
        if (count($product) > 0) {
            return $product->getFirstImage();
        }

        return '';
    }

    public function getMoreInfo()
    {
        if (!empty($this->more_info)) {
            return $this->more_info;
        }
    }

    public function getColor() {
        if ($this->product_option_value_id) {
            $this->load->model('productOptionValue');
            $query = $this->db->get_where('product_option_value', ['id' => $this->product_option_value_id]);
            $color = $query->row();
            if (count($color) > 0) {
                return $color->name;
            }
        }

        return '';
    }
}