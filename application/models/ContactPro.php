<?php
class ContactPro extends CI_Model {

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
			$query = $this->db->get_where('contact_info_product', $conditions);

        	return $query->row('1', 'ContactPro');
		} else {
			$query = $this->db->query("SELECT * FROM ci_contact_info_product");
			return $query->result('ContactPro');
		}
	}

	public function set_model($data_insert)
	{
	    $data_insert['created_date'] = date('Y-m-d H:i:s');

	    return $this->db->insert('contact_info_product', $data_insert);
	}

	public function update_model($id, $data_insert)
	{
	    $this->db->where('id', $id);
        $this->db->update('contact_info_product', $data_insert);
	}

	public function delete_model($id) {
		$this->db->where('id', $id);
  		$this->db->delete('contact_info_product');
	}

	public function get_created_date() {
		return date_format(date_create($this->created_date), 'd-m-Y');
	}

	public function getAll($contact_id) {
		$query = $this->db->query("SELECT * FROM ci_contact_info_product WHERE contact_id = ".$contact_id);
		$models = $query->result('ContactPro');

		return $models;
	}

	public function getProductName() {
		$query = $this->db->query("SELECT * FROM ci_products WHERE id = ".$this->product_id);
		$product =  $query->row('1', 'Products');
		if (count($product) > 0) {
			return $product->product_name;
		}
		return '';
	}
}