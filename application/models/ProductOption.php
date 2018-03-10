<?php
class ProductOption extends CI_Model {

    public function __construct()
    {
            $this->load->database();
	    	$this->load->helper('url');
    }

	public function set_model($product_id, $name)
	{
        $data = array(
            'product_id' => $product_id,
            'name' => $name,
            'created_date' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('product_option', $data);
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
        $this->db->delete('product_option');
    }
}