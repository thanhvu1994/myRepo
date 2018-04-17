<?php
class BillingAddress extends CI_Model {

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
			$query = $this->db->get_where('billing_address', $conditions);

        	return $query->row('1', 'BillingAddress');
		} else {
			$query = $this->db->query("SELECT * FROM ci_billing_address");
			return $query->result('BillingAddress');
		}
	}

	public function set_model($data_insert)
	{
	    $data_insert['created_date'] = date('Y-m-d H:i:s');
	    $data_insert['update_date'] = date('Y-m-d H:i:s');

	    return $this->db->insert('billing_address', $data_insert);
	}

	public function update_model($id, $data_insert)
	{
	    $data_insert['update_date'] = date('Y-m-d H:i:s');
	    $this->db->where('id', $id);
        $this->db->update('billing_address', $data_insert);
	}

	public function delete_model($id) {
		$this->db->where('id', $id);
  		$this->db->delete('billing_address');
	}

	public function get_created_date() {
		return date_format(date_create($this->created_date), 'd-m-Y');
	}

	public function get_update_date() {
		return date_format(date_create($this->update_date), 'd-m-Y');
	}

	public function getUserName() {
        $query = $this->db->get_where('users', ['id' => $this->user_id]);
        $user = $query->row('1', 'Users');
        if (count($user) > 0) {
            return $user->full_name;
        }

        return '';
    }

    public function getFullName() {
        return $this->last_name .' '. $this->first_name;
    }
}