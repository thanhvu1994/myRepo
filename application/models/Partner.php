<?php
class Partner extends CI_Model {

    public function __construct()
    {
	    $this->load->database();
		$this->load->helper('url');
    }

    public function getRule() {
    	$rules = [
    		// ['name', 'Tên đối tác', 'trim|required'],
    	];

    	return $rules;
    }

	public function get_model($conditions = [])
	{
		if (!empty($conditions)) {
			$query = $this->db->get_where('partner', $conditions);

        	return $query->row();
		} else {
			$query = $this->db->query("SELECT * FROM ci_partner ORDER BY created_date desc");
			return $query->result('Partner');
		}
	}

	public function set_model($logo)
	{
	    $data = array(
	        'name' => $this->input->post('name'),
	        'name_en' => $this->input->post('name_en'),
	        'description' => $this->input->post('description'),
	        'description_en' => $this->input->post('description_en'),
	        'url' => $this->input->post('url'),
	        'logo' => $logo,
	        'publish' => $this->input->post('publish'),
	        'update_date' => date('Y-m-d H:i:s'),
	    );
	    return $this->db->insert('partner', $data);
	}

	public function update_model($id, $logo = '')
	{
	    $data = array(
	        'name' => $this->input->post('name'),
	        'name_en' => $this->input->post('name_en'),
	        'description' => $this->input->post('description'),
	        'description_en' => $this->input->post('description_en'),
	        'url' => $this->input->post('url'),
	        'publish' => $this->input->post('publish'),
	        'update_date' => date('Y-m-d H:i:s'),
	    );
	    if (!empty($logo)) {
	    	$data['logo'] = $logo;
	    }

	    $this->db->where('id', $id);
        $this->db->update('partner', $data);
	}


	public function delete_model($id) {
		$this->db->where('id', $id);
  		$this->db->delete('partner');
	}


	public function get_created_date() {
		return date_format(date_create($this->created_date), 'd-m-Y');
	}

	public function get_update_date() {
		return date_format(date_create($this->update_date), 'd-m-Y');
	}

	public function get_image() {
		if (is_file('./'.$this->logo)) {
			return base_url($this->logo);
		}

		return '';
	}

	public function get_publish() {
		if ($this->publish) {
			return 'Yes';
		}

		return 'No';
	}

	public function get_partner_fe() {
		$query = $this->db->query("SELECT * FROM ci_partner WHERE publish = 1 ORDER BY created_date desc");

		$models = $query->result('Partner');

		return $models;
	}

	public function getFieldFollowLanguage($field) {
		if ($this->session->userdata['languages'] == 'en')
			$field = $field.'_en';

		return $this->$field;
    }
}