<?php
class ProductImages extends CI_Model {

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
			$query = $this->db->get_where('product_images', $conditions);

        	return $query->row();
		} else {
			$query = $this->db->query("SELECT * FROM ci_product_images");
			return $query->result('ProductImages');
		}
	}

    public function get_images($product_id)
    {
        $query = $this->db->query("SELECT * FROM ci_product_images WHERE product_id = '".$product_id."'");
        return $query->result('ProductImages');
    }

	public function set_model($data)
	{
	    return $this->db->insert('product_images', $data);
	}

	public function delete_model($id) {
		$this->db->where('id', $id);
  		$this->db->delete('product_images');
	}

    public function delete_all_model($product_id) {
        $query = $this->db->get_where('product_images', ['product_id' => $product_id] );
        $data = $query->result('ProductImages');

        foreach($data as $productImage){
            @unlink('.'.$productImage->image);
        }

        $this->db->where('product_id', $product_id);
        $this->db->delete('product_images');
    }
}