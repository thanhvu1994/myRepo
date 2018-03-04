<?php
class Users extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function getRule() {
    	$rules = [
    		['email', 'Email', 'trim|required|valid_email'],
    		['password', 'Password', 'trim|required|callback_validate_password'],
    	];

    	return $rules;
    }

    // Read data using username and password
	public function login($data) {
		$condition = "username =" . "'" . $data['username'] . "' AND " . "password_hash =" . "'" . $data['password_hash'] . "' AND role_id = 1 AND application_id = 1";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	// Read data from database to show data in admin page
	public function read_user_information($username) {
		$condition = "username =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function get_model_by_username($username)
	{
        $query = $this->db->get_where('users', array('username' => $username));

        return $query->row();
	}

	function check_logged(){
		return ($this->session->userdata('logged_in')) ? TRUE : FALSE;
	}
}