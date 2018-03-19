<?php
class Banner extends CI_Model {

    public function __construct()
    {
	    $this->load->database();
		$this->load->helper('url');
    }

    public function getRule() {
    	$rules = [
    		// ['image', 'Image', 'trim|required'],
    	];

    	return $rules;
    }

	public function get_model($conditions = [])
	{
		if (!empty($conditions)) {
			$query = $this->db->get_where('banners', $conditions);

        	return $query->row();
		} else {
			$query = $this->db->query("SELECT * FROM ci_banners");
			return $query->result('Banner');
		}
	}

	public function set_model($image)
	{
	    $publish = $this->input->post('publish');

	    $data = array(
	        'name' => $this->input->post('name'),
	        'button_name' => $this->input->post('button_name'),
	        'url' => $this->input->post('url'),
	        'image' => $image,
	        'publish' => $publish,
	        'update_date' => date('Y-m-d H:i:s'),
	    );

	    return $this->db->insert('banners', $data);
	}

	public function update_model($id, $image)
	{
	    $publish = $this->input->post('publish');

	    $data = array(
	        'name' => $this->input->post('name'),
	        'button_name' => $this->input->post('button_name'),
	        'url' => $this->input->post('url'),
	        'image' => $image,
	        'publish' => $publish,
	        'update_date' => date('Y-m-d H:i:s'),
	    );

	    $this->db->where('id', $id);
        $this->db->update('banners', $data);
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
		// if (file_exists(base_url($this->image))) {
			return base_url($this->image);
		// }

		// return '';
	}
}