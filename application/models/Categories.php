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

	public function set_model()
	{
	    $slug = url_title(convert_accented_characters(strtolower($this->input->post('category_name')), 'dash', TRUE));
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
	        'parent_id' => $this->input->post('parent_id'),
	        'title' => $this->input->post('title'),
	        'description' => $this->input->post('title'),
	        'url' => $this->input->post('title'),
	        'slug' => $slug,
	        'type_level' => $type_level,
	        'update_date' => date('Y-m-d H:i:s'),
	    );

	    return $this->db->insert('categories', $data);
	}

	public function update_model($id)
	{
	    $slug = url_title(convert_accented_characters(strtolower($this->input->post('category_name')), 'dash', TRUE));
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
	        'parent_id' => $this->input->post('parent_id'),
	        'title' => $this->input->post('title'),
	        'description' => $this->input->post('description'),
	        'url' => $this->input->post('title'),
	        'slug' => $slug,
	        'type_level' => $type_level,
	        'update_date' => date('Y-m-d H:i:s'),
	    );

	    $this->db->where('id', $id);
        $this->db->update('categories', $data);
	}

	public function rChilds($parent_id, &$items, $level, $id) {
		$query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = ".$parent_id." AND id != ".$id);
		$childs = $query->result('Categories');

		if (count($childs) > 0) {
			$str = '';
			for ($i=0; $i < $level; $i++) {
				$str .= '---';
			}
			$level++;
			foreach ($childs as $child) {
				$items[$child->id] = $str.$child->category_name;
				$this->rChilds($child->id, $items, $level);
			}
		}
	}

	public function get_dropdown_category($id) {
		$items = [];
		$query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = 0 AND id != ".$id);
		$parents = $query->result('Categories');
		$level = 1;
		if (count($parents) > 0) {
			foreach ($parents as $row) {
				$items[$row->id] = $row->category_name;
				$this->rChilds($row->id, $items, $level, $id);
			}
		}

		return $items;
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