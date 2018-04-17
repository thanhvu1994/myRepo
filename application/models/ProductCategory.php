<?php
class ProductCategory extends CI_Model {

    public function __construct()
    {
            $this->load->database();
	    	$this->load->helper('url');
    }

	public function set_model($product_id, $category_id)
	{
        $data = array(
            'product_id' => $product_id,
            'category_id' => $category_id,
        );

        $this->db->insert('product_categories', $data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
	}

    public function get_model($product_id)
    {
        $query = $this->db->query("SELECT * FROM ci_product_option WHERE product_id = '".$product_id."'");
        return $query->result('ProductOption');
    }

    public function delete_all_model($product_id){
        $this->db->where('product_id', $product_id);
        $this->db->delete('product_categories');
    }
}