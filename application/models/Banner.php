<?php
class Banner extends CI_Model {

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
			$query = $this->db->get_where('banners', $conditions);

        	return $query->row();
		} else {
			$query = $this->db->query("SELECT * FROM ci_banners ORDER BY created_date desc");
			return $query->result('Banner');
		}
	}

	public function set_model($data_insert)
	{
		if (!isset($data_insert['publish'])) {
	    	$data_insert['publish'] = 0;
	    }
	    $data_insert['created_date'] = date('Y-m-d H:i:s');
	    $data_insert['update_date'] = date('Y-m-d H:i:s');

	    return $this->db->insert('banners', $data_insert);
	}

	public function update_model($id, $data_insert)
	{
	    $data_insert['update_date'] = date('Y-m-d H:i:s');
	    if (!isset($data_insert['publish'])) {
	    	$data_insert['publish'] = 0;
	    }
	    $this->db->where('id', $id);
        $this->db->update('banners', $data_insert);
	}

	public function delete_model($id) {
		$this->db->where('id', $id);
  		$this->db->delete('banners');
	}

	public function get_created_date() {
		return date_format(date_create($this->created_date), 'd-m-Y');
	}

	public function get_update_date() {
		return date_format(date_create($this->update_date), 'd-m-Y');
	}

	public function get_publish() {
		if ($this->publish) {
			return 'Yes';
		}

		return 'No';
	}

	public function get_image() {
		if (is_file('./'.$this->image)) {
			return base_url($this->image);
		}

		return '';
	}

	public function getFieldFollowLanguage($field) {
		if ($this->session->userdata['languages'] == 'en')
			$field = $field.'_en';

		return $this->$field;
    }
}