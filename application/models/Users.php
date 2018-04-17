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

        return $query->row('1', 'Users');
	}

	function check_logged(){
		return ($this->session->userdata('logged_in')) ? TRUE : FALSE;
	}

	public function get_avarta() {
		if (is_file('./'.$this->avarta)) {
			return base_url($this->avarta);
		}

		return '';
	}

	public function get_background() {
		if (is_file('./'.$this->background)) {
			return base_url($this->background);
		}

		return '';
	}

	public function set_model($data_insert)
	{
		$data_insert['full_name'] = $data_insert['last_name'] .' '. $data_insert['first_name'];
		$data_insert['password_hash'] = md5($data_insert['password']);
	    $data_insert['created_date'] = date('Y-m-d H:i:s');
	    $data_insert['update_date'] = date('Y-m-d H:i:s');
	    $data_insert['status'] = STATUS_ACTIVE;
	    $data_insert['application_id'] = FE;

	    return $this->db->insert('users', $data_insert);
	}

	public function update_model($id, $data_insert)
	{
		$data_insert['full_name'] = $data_insert['last_name'] .' '. $data_insert['first_name'];
		$data_insert['password_hash'] = md5($data_insert['password']);
		$data_insert['update_date'] = date('Y-m-d H:i:s');
	    $this->db->where('id', $id);
        $this->db->update('users', $data_insert);
	}

    public function get_created_date() {
        return date_format(date_create($this->created_date), 'd-m-Y');
    }

    public function get_model($conditions = [])
    {
        if (!empty($conditions)) {
            $query = $this->db->get_where('users', $conditions);

            return $query->row();
        } else {
            $query = $this->db->query("SELECT * FROM ci_users");
            return $query->result('Users');
        }
    }
}