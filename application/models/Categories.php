<?php
class Categories extends CI_Model {

    public function __construct()
    {
	    $this->load->database();
		$this->load->helper('url');
		$this->load->model('products');
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
			$query = $this->db->query("SELECT * FROM ci_categories ORDER BY display_order asc, category_name asc");
			return $query->result('Categories');
		}
	}

	public function set_model($data_insert)
	{
	    $slug = url_title(convert_accented_characters(strtolower($data_insert['category_name']), 'dash', TRUE));
	    $slug_en = url_title(convert_accented_characters(strtolower($data_insert['category_name_en']), 'dash', TRUE));
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
	    $data_insert['slug_en'] = $slug_en;
	    $data_insert['type_level'] = $type_level;

	    return $this->db->insert('categories', $data_insert);
	}

	public function update_model($id, $data_insert)
	{
	    $slug = url_title(convert_accented_characters(strtolower($this->input->post('category_name')), 'dash', TRUE));
	    $slug_en = url_title(convert_accented_characters(strtolower($data_insert['category_name_en']), 'dash', TRUE));
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
	    $data_insert['slug_en'] = $slug_en;
	    $data_insert['type_level'] = $type_level;

	    $this->db->where('id', $id);
        $this->db->update('categories', $data_insert);
	}

	public function rChilds($parent_id, &$items, $level, $id, $type) {
		if ($level <= 1) {
			$query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = ".$parent_id." AND id != ".$id.' AND type = "'.$type.'"');
			$childs = $query->result('Categories');

			if (count($childs) > 0) {
				$str = '';
				for ($i=0; $i < $level; $i++) {
					$str .= '---';
				}
				$level++;
				foreach ($childs as $child) {
					$items[$child->id] = $str.$child->category_name;
					$this->rChilds($child->id, $items, $level, $id, $type);
				}
			}
		}
	}

	public function get_dropdown_category($id, $type = 'menu') {
		$items = [];
		$query = $this->db->query('SELECT * FROM ci_categories WHERE parent_id = 0 AND id != '.$id.' AND type = "'.$type.'"');
		$parents = $query->result('Categories');
		$level = 1;
		if (count($parents) > 0) {
			foreach ($parents as $row) {
				$items[$row->id] = $row->category_name;
				$this->rChilds($row->id, $items, $level, $id, $type);
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
					'name' => $child->getFieldFollowLanguage('category_name'),
					'url' => $child->url,
					'child' => $this->rChildsFE($child->id),
				];
			}
		}

		return $items;
	}

	public function get_menuFE() {
		$items = [];
		$query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = 0 AND type = 'menu' ORDER BY display_order asc");
		$models = $query->result('Categories');
		$level = 1;

		if (count($models)) {
			foreach ($models as $model) {
				$items[$model->id] = [
					'name' => $model->getFieldFollowLanguage('category_name'),
					'url' => $model->url,
					'child' => $this->rChildsFE($model->id),
				];
			}
		}
		return $items;
	}

    public function rChildCategoriesFE($parent_id) {
        $items = [];
        $query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = ".$parent_id);
        $childs = $query->result('Categories');

        if (count($childs) > 0) {
            foreach ($childs as $child) {
                $items[$child->id] = [
                    'name' => $child->getFieldFollowLanguage('category_name'),
                    'title' => $child->getFieldFollowLanguage('title'),
                    'slug' => $child->getFieldFollowLanguage('slug'),
                    'child' => $this->rChildCategoriesFE($child->id),
                ];
            }
        }

        return $items;
    }

    public function getCategoryFE() {
        $items = [];
        $query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = 0 AND type = 'category' ORDER BY display_order asc");
        $models = $query->result('Categories');
        $level = 1;
        if (count($models)) {
            foreach ($models as $model) {
                $items[$model->id] = [
                    'name' => $model->getFieldFollowLanguage('category_name'),
                    'title' => $model->getFieldFollowLanguage('title'),
                    'slug' => $model->getFieldFollowLanguage('slug'),
                    'child' => $this->rChildCategoriesFE($model->id),
                ];
            }
        }
        return $items;
    }

    public function getDataFE(){
        $query = $this->db->query("SELECT * FROM ci_categories WHERE type = 'category' ORDER BY display_order asc LIMIT 6");
        return $query->result('Categories');
    }

    public function getCategoryBySlug($slug){
        if ($this->session->userdata['languages'] == 'vn'){
            $query = $this->db->get_where('categories', array('slug' => $slug) );
        }else{
            $query = $this->db->get_where('categories', array('slug_en' => $slug) );
        }
        return $query->row(0,'Categories');
    }

    public function getProducts($limit, $start){
        $products = array();
        $this->db->limit($limit, $start);
        $query = $this->db->get_where('product_categories', array('category_id' => $this->id) );
        $productCategories = $query->result();

        if(!empty($productCategories)){
            foreach($productCategories as $productCategory){
                $query1 = $this->db->get_where('products', array('id' => $productCategory->product_id, 'status' => STATUS_ACTIVE));
                $products[] = $query1->row(0,'Products');
            }
        }
        return $products;
    }

    public function countProducts() {
        $this->db->where('category_id', $this->id);
        $this->db->from('product_categories');
        return $this->db->count_all_results();
    }

    public function getMenuProductFooter() {
    	$query = $this->db->query("SELECT * FROM ci_categories WHERE type = 'category' ORDER BY display_order asc LIMIT 6");
        return $query->result('Categories');
    }

    public function getTableCategory($level = 0) {
        $str = '';
        for ($i=0; $i < $level; $i++) {
            $str .= '---';
        }
        $url = 'admin/category';
        if ($this->type == 'menu') {
            $url = 'admin/menu';
        }
        echo '<tr id="tr-'.$this->id.'">
                <td class="text-center check-element"><input type="checkbox" name="select[]" value="'.$this->id.'"></td>
                <td>'.$str.' '.$this->category_name.'</td>
                <td>'.$this->get_parent_name().'</td>
                <td>'.$this->get_update_date().'</td>
                <td class="button-column">
                    <a class="btn btn-danger" href="'.base_url($url.'/update/'.$this->id).'"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger button-delete" href="javascript:void(0)" title="Delete" data-id="'.$this->id.'"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>';

        $query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = ".$this->id." AND type = '".$this->type."' ORDER BY display_order asc, category_name asc");
        $categories =  $query->result('Categories');

        if (count($categories) > 0) {
            $level++;
            foreach ($categories as $child) {
                $child->getTableCategory($level);
            }
        }
    }

    public function getFieldFollowLanguage($field) {
		if ($this->session->userdata['languages'] == 'en')
			$field = $field.'_en';

		return $this->$field;
    }
}