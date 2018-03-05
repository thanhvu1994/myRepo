<?php
class Categories extends CI_Model {

    public function __construct()
    {
	    $this->load->database();
		$this->load->helper('url');
    }

    public function getRule() {
    	$rules = [
    		['category_name', 'Category Name', 'trim|required'],
    	];

    	return $rules;
    }

	public function get_model($conditions = [])
	{
		if (!empty($conditions)) {
			$query = $this->db->get_where('categories', $conditions);

        	return $query->row();
		} else {
			$query = $this->db->query("SELECT * FROM ci_categories");
			return $query->result('Categories');
		}
	}

	public function set_model($data)
	{
	    $publish = $this->input->post('publish');

	    $slug = url_title($this->input->post('category_name'), 'dash', TRUE);

	    $data = array(
	        'category_name' => $this->input->post('category_name'),
	        'parent_id' => $this->input->post('parent_id'),
	        'title' => $this->input->post('title'),
	        'description' => $this->input->post('title'),
	        'url' => $this->input->post('title'),
	        'slug' => $slug,
	        // 'thumb' => $data['thumb'],
	        'type_level' => $data['type_level'],
	        'update_date' => date('Y-m-d H:i:s'),
	    );

	    return $this->db->insert('categories', $data);
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
        $this->db->update('categories', $data);
	}

	public function delete_model($id) {
		$this->db->where('id', $id);
  		$this->db->delete('categories');
	}

	public function get_created_date() {
		return date_format(date_create($this->created_date), 'd-m-Y');
	}

	public function get_update_date() {
		return date_format(date_create($this->update_date), 'd-m-Y');
	}

	public function get_image() {
		if (file_exists(base_url($this->thumb))) {
			return base_url($this->thumb);
		}

		return '';
	}
}