<?php
class Products extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    public function getRule() {
        $rules = [
            ['product_code', 'Product Code', 'trim|required'],
            ['product_name', 'Product Name', 'trim|required'],
            ['title', 'Title', 'trim|required'],
            ['slug', 'Slug', 'trim|required'],
            ['description', 'Description', 'trim|required'],
            ['meta_description', 'Meta Description', 'trim|required'],
            ['content', 'Content', 'trim|required'],
        ];

        return $rules;
    }

    public function get_model($conditions = [])
    {
        if (!empty($conditions)) {
            $query = $this->db->get_where('products', $conditions);

            return $query->row();
        } else {
            $query = $this->db->query("SELECT * FROM ci_products");
            return $query->result('Products');
        }
    }

    public function set_model()
    {
        $data = array(
            'product_code' => $this->input->post('product_code'),
            'product_name' => $this->input->post('product_name'),
            'title' => $this->input->post('title'),
            'short_content' => $this->input->post('short_content'),
            'content' => $this->input->post('content'),
            'description' => $this->input->post('description'),
            'meta_description' => $this->input->post('meta_description'),
            'price' => $this->input->post('price'),
            'sale_price' => $this->input->post('sale_price'),
            'slug' => $this->input->post('slug'),
            'feature' => $this->input->post('feature'),
            'status' => $this->input->post('status'),
        );
        $this->db->insert('products', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function update_model($id)
    {
        $data = array(
            'product_code' => $this->input->post('product_code'),
            'product_name' => $this->input->post('product_name'),
            'title' => $this->input->post('title'),
            'short_content' => $this->input->post('short_content'),
            'content' => $this->input->post('content'),
            'description' => $this->input->post('description'),
            'meta_description' => $this->input->post('meta_description'),
            'price' => $this->input->post('price'),
            'sale_price' => $this->input->post('sale_price'),
            'slug' => $this->input->post('slug'),
            'feature' => $this->input->post('feature'),
            'status' => $this->input->post('status'),
        );

        $this->db->where('id', $id);
        $this->db->update('products', $data);
    }

    public function delete_model($id) {
        $this->db->where('id', $id);
        $this->db->delete('products');
    }

    public function get_created_date() {
        return date_format(date_create($this->created_date), 'd-m-Y');
    }

    public function get_update_date() {
        return date_format(date_create($this->update_date), 'd-m-Y');
    }

    public function generateCode(){
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `ci_products`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }
        return 'P'.date('dmY').(str_pad($maxid+1, 4, '0', STR_PAD_LEFT));
    }

    public function generateSlug(){
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `ci_products`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }
        return 'product-'.(str_pad($maxid+1, 4, '0', STR_PAD_LEFT));
    }

    public function getDataFE(){
        $query = $this->db->query("SELECT * FROM ci_products WHERE status = '".STATUS_ACTIVE."' AND feature = '".STATUS_ACTIVE."'");
        return $query->result('Products');
    }

    public function getFirstImage(){
        $query = $this->db->query("SELECT * FROM ci_product_images WHERE product_id = '".$this->id."'");
        $images = $query->result();

        if(!empty($images)){
            return base_url($images[0]->image);
        }else{
            return '#';
        }
    }

    public function getProductBySlug($slug){
        $query = $this->db->get_where('products', array('slug' => $slug) );
        return $query->row();
    }
}