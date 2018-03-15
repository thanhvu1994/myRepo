<?php
class ProductOptionValue extends CI_Model {

    public function __construct()
    {
            $this->load->database();
	    	$this->load->helper('url');
    }

	public function set_model($product_id,$productOptionId, $name)
	{
        $data = array(
            'product_id' => $product_id,
            'product_option_id' => $productOptionId,
            'name' => $name,
        );

	    return $this->db->insert('product_option_value', $data);
	}

    public function get_model($product_option_id)
    {
        $query = $this->db->query("SELECT * FROM ci_product_option_value WHERE product_option_id = '".$product_option_id."'");
        return $query->result('ProductOptionValue');
    }

    public function delete_all_model($product_id){
        $this->db->where('product_id', $product_id);
        $this->db->delete('product_option_value');
    }

    public function getAttributeName($id){
        $query = $this->db->get_where('product_option', array('id' => $id) );

        $option =  $query->row(0,'ProductOption');
        if($option){
            return $option->name;
        }else{
            return '';
        }
    }
}