<?php
class Categories extends CI_Model {

	public $language = [
		'vn' => 'Tiếng Việt',
		'en' => 'Tiếng Anh',
	];
    public function __construct()
    {
	    $this->load->database();
		$this->load->helper('url');
    }

    public function getRule() {
    	$rules = [
    		['category_name', 'Danh mục', 'trim|required'],
    	];

    	return $rules;
    }

	public function get_model($conditions = [])
	{
		if (!empty($conditions)) {
			$query = $this->db->get_where('categories', $conditions);

        	return $query->row('1', 'Categories');
		} else {
			$query = $this->db->query("SELECT * FROM ci_categories ORDER BY language, display_order asc, category_name asc");
			return $query->result('Categories');
		}
	}

	public function set_model($data_insert)
	{
	    $slug = url_title(convert_accented_characters(strtolower($data_insert['category_name']), 'dash', TRUE));
	    if ($data_insert['parent_id'] == 0) {
	    	$type_level = 1;
	    } else {
	    	$parent = $this->get_model(['id' => $data_insert['parent_id']]);
	    	if (count($parent) > 0) {
	    		$type_level = (int)$parent->type_level + 1;
	    	} else {
	    		$type_level = 1;
	    	}
	    }
	    $data_insert['created_date'] = date('Y-m-d H:i:s');
	    $data_insert['update_date'] = date('Y-m-d H:i:s');
	    $data_insert['slug'] = $slug;
	    $data_insert['type_level'] = $type_level;

	    return $this->db->insert('categories', $data_insert);
	}

	public function update_model($id, $data_insert)
	{
	    $slug = url_title(convert_accented_characters(strtolower($this->input->post('category_name')), 'dash', TRUE));
	    if ($data_insert['parent_id'] == 0) {
	    	$type_level = 1;
	    } else {
	    	$parent = $this->get_model(['id' => $data_insert['parent_id']]);
	    	if (count($parent) > 0) {
	    		$type_level = (int)$parent->type_level + 1;
	    	} else {
	    		$type_level = 1;
	    	}
	    }
	    $data_insert['update_date'] = date('Y-m-d H:i:s');
	    $data_insert['slug'] = $slug;
	    $data_insert['type_level'] = $type_level;

	    $this->db->where('id', $id);
        $this->db->update('categories', $data_insert);
        $this->update_all_language($id, $data_insert['language']);
	}

	public function update_all_language($id, $language) {
		$query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = ".$id);
		$models =  $query->result('Categories');

		if (count($models) > 0) {
			$data_update['language'] = $language;
			foreach ($models as $model) {
				$this->db->where('id', $model->id);
        		$this->db->update('categories', $data_update);
        		$this->update_all_language($model->id, $language);
			}
		}
	}

	public function rChilds($parent_id, &$items, $level, $id) {
		if ($level <= 1) {
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
					$this->rChilds($child->id, $items, $level, $id);
				}
			}
		}
	}

	public function get_dropdown_category($id, $language = 'vn') {
		$items = [];
		$query = $this->db->query('SELECT * FROM ci_categories WHERE language = "'.$language.'" AND parent_id = 0 AND id != '.$id);
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
		$arr_id_del = [];
		$model = $this->get_model(['id' => $id]);
		if (count($model) > 0) {
			if (is_file('./'.$model->thumb)) {
				unlink('.'.$model->thumb);
			}
			$arr_id_del[$id] = $id;
			$this->db->where('id', $id);
	  		$this->db->delete('categories');
	  		$this->delete_all_child($id, $arr_id_del);
		}

  		return $arr_id_del;
	}

	public function delete_all_child($id, &$arr_id_del) {
		$query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = ".$id);
		$models =  $query->result('Categories');

		if (count($models) > 0) {
			foreach ($models as $model) {
				if (is_file('.'.$model->thumb)) {
					unlink('.'.$model->thumb);
				}
				$arr_id_del[$model->id] = $model->id;
				$this->db->where('id', $model->id);
        		$this->db->delete('categories');
        		$this->delete_all_child($model->id, $arr_id_del);
			}
		}
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
		if (is_file('.'.$this->thumb)) {
			return base_url($this->thumb);
		}

		return '';
	}

	public function rChildsFE($parent_id) {
		$items = [];
		$query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = ".$parent_id);
		$childs = $query->result('Categories');

		if (count($childs) > 0) {
			foreach ($childs as $child) {
				$items[$child->id] = [
					'name' => $child->category_name,
					'url' => $child->url,
					'child' => $this->rChildsFE($child->id),
				];
			}
		}

		return $items;
	}

	public function get_menuFE() {
		$items = [];
		$query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = 0 ORDER BY display_order asc");
		$models = $query->result('Categories');
		$level = 1;
		if (count($models)) {
			foreach ($models as $model) {
				$items[$model->id] = [
					'name' => $model->category_name,
					'url' => $model->url,
					'child' => $this->rChildsFE($model->id),
				];
			}
		}
		return $items;
	}

    public function getDataFE(){
        $query = $this->db->query("SELECT * FROM ci_categories ORDER BY display_order asc LIMIT 6");
        return $query->result('Categories');
    }
}