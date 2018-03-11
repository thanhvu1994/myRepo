<?php
class Contact extends CI_Model {

	public $arr_type = [
		1 => 'Báo giá',
		2 => 'Đặt hàng',
		3 => 'Hỗ trợ',
	];

    public function __construct()
    {
	    $this->load->database();
		$this->load->helper('url');
    }

    public function getRule() {
    	$rules = [
    		// ['category_name', 'Danh mục', 'trim|required'],
    	];

    	return $rules;
    }

	public function get_model($conditions = [])
	{
		if (!empty($conditions)) {
			$query = $this->db->get_where('contact', $conditions);

        	return $query->row('1', 'Contact');
		} else {
			$query = $this->db->query("SELECT * FROM ci_contact");
			return $query->result('Contact');
		}
	}

	public function set_model($data_insert)
	{
	    $data_insert['created_date'] = date('Y-m-d H:i:s');

	    return $this->db->insert('contact', $data_insert);
	}

	public function update_model($id, $data_insert)
	{
	    $this->db->where('id', $id);
        $this->db->update('contact', $data_insert);
	}

	public function delete_model($id) {
		$this->db->where('id', $id);
  		$this->db->delete('categories');
	}

	public function get_parent_name() {
		$query = $this->db->get_where('categories', array('id' => $this->parent_id));

		if ($query->row()) {
			return $query->row()->category_name;
		}

    	return '';
	}

	public function get_created_date() {
		return date_format(date_create($this->created_date), 'd-m-Y');
	}
}