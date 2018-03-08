<?php
class Contact extends CI_Model {

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

	public function set_model()
	{
	    $slug = url_title(convert_accented_characters(strtolower($this->input->post('category_name')), 'dash', TRUE));
	    $slug_en = url_title(convert_accented_characters(strtolower($this->input->post('category_name_en')), 'dash', TRUE));
	    if ($this->input->post('parent_id') == 0) {
	    	$type_level = 1;
	    } else {
	    	$parent = $this->get_model(['id' => $this->input->post('parent_id')]);
	    	if (count($parent) > 0) {
	    		$type_level = (int)$parent->type_level + 1;
	    	} else {
	    		$type_level = 1;
	    	}
	    }
	    $data = array(
	        'category_name' => $this->input->post('category_name'),
	        'category_name_en' => $this->input->post('category_name_en'),
	        'parent_id' => $this->input->post('parent_id'),
	        'title' => $this->input->post('title'),
	        'title_en' => $this->input->post('title_en'),
	        'description' => $this->input->post('description'),
	        'description_en' => $this->input->post('description_en'),
	        'url' => $this->input->post('url'),
	        'slug' => $slug,
	        'slug_en' => $slug_en,
	        'type_level' => $type_level,
	        'update_date' => date('Y-m-d H:i:s'),
	    );

	    return $this->db->insert('categories', $data);
	}

	public function update_model($id)
	{
	    $slug = url_title(convert_accented_characters(strtolower($this->input->post('category_name')), 'dash', TRUE));
	    $slug_en = url_title(convert_accented_characters(strtolower($this->input->post('category_name_en')), 'dash', TRUE));
	    if ($this->input->post('parent_id') == 0) {
	    	$type_level = 1;
	    } else {
	    	$parent = $this->get_model(['id' => $this->input->post('parent_id')]);
	    	if (count($parent) > 0) {
	    		$type_level = (int)$parent->type_level + 1;
	    	} else {
	    		$type_level = 1;
	    	}
	    }
	    $data = array(
	        'category_name' => $this->input->post('category_name'),
	        'category_name_en' => $this->input->post('category_name_en'),
	        'parent_id' => $this->input->post('parent_id'),
	        'title' => $this->input->post('title'),
	        'title_en' => $this->input->post('title_en'),
	        'description' => $this->input->post('description'),
	        'description_en' => $this->input->post('description_en'),
	        'url' => $this->input->post('url'),
	        'slug' => $slug,
	        'slug_en' => $slug_en,
	        'type_level' => $type_level,
	        'update_date' => date('Y-m-d H:i:s'),
	    );

	    $this->db->where('id', $id);
        $this->db->update('categories', $data);
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