<?php
class Menus extends CI_Model {

    public function __construct()
    {
	    $this->load->database();
		$this->load->helper('url');
    }

    public function getRule() {
    	$rules = [
    		['menu_name', 'Menu Name', 'trim|required'],
    	];

    	return $rules;
    }

	public function get_model($conditions = [])
	{
		if (!empty($conditions)) {
			$query = $this->db->get_where('menus', $conditions);

        	return $query->row();
		} else {
			$query = $this->db->query("SELECT * FROM ci_menus ORDER BY created_date desc");
			return $query->result('Menus');
		}
	}

	public function set_model()
	{
	    $display_order = $this->input->post('display_order') == "" ? 1 : $this->input->post('display_order');
	    $show_in_menu = ($this->input->post('show_in_menu') == 'on') ? 1 : 0;

	    $data = array(
	        'menu_name' => $this->input->post('menu_name'),
	        'menu_link' => $this->input->post('menu_link'),
	        'parent_id' => $this->input->post('parent_id'),
	        'icon' => $this->input->post('icon'),
	        'show_in_menu' => $show_in_menu,
	        'display_order' => $display_order,
	        'application_id' => 1,
	        'update_date' => date('Y-m-d H:i:s'),
	    );

	    return $this->db->insert('menus', $data);
	}

	public function update_model($id)
	{
	    $display_order = $this->input->post('display_order') == "" ? 1 : $this->input->post('display_order');
	    $show_in_menu = ($this->input->post('show_in_menu') == 'on') ? 1 : 0;

	    $data = array(
	        'menu_name' => $this->input->post('menu_name'),
	        'menu_link' => $this->input->post('menu_link'),
	        'parent_id' => $this->input->post('parent_id'),
	        'icon' => $this->input->post('icon'),
	        'show_in_menu' => $show_in_menu,
	        'display_order' => $display_order,
	        'application_id' => 1,
	        'update_date' => date('Y-m-d H:i:s'),
	    );

	    $this->db->where('id', $id);
        $this->db->update('menus', $data);
	}

	public function delete_model($id) {
		$this->db->where('id', $id);
  		$this->db->delete('menus');
	}

	public function rChilds($parent_id, &$items, $level) {
		$query = $this->db->query("SELECT * FROM ci_menus WHERE parent_id = ".$parent_id);
		$childs = $query->result('Menus');

		if (count($childs) > 0) {
			$str = '';
			for ($i=0; $i < $level; $i++) {
				$str .= '---';
			}
			$level++;
			foreach ($childs as $child) {
				$items[$child->id] = $str.$child->menu_name;
				$this->rChilds($child->id, $items, $level);
			}
		}
	}

	public function get_dropdown_menu() {
		$items = [];
		$query = $this->db->query("SELECT * FROM ci_menus WHERE parent_id = 0 ORDER BY menu_name asc");
		$parents = $query->result('Menus');
		$level = 1;
		if (count($parents) > 0) {
			foreach ($parents as $row) {
				$items[$row->id] = $row->menu_name;
				$this->rChilds($row->id, $items, $level);
			}
		}

		return $items;
	}

	public function get_childs($parent, &$items) {
		$query = $this->db->query("SELECT * FROM ci_menus WHERE show_in_menu = 1 AND parent_id = ".$parent->id."  ORDER BY display_order asc, menu_name asc");
		$childs = $query->result('Menus');

		if (count($childs) > 0) {
			foreach ($childs as $child) {
				$item[$child->id] = [
					'menu_name' => $child->menu_name,
					'menu_icon' => $child->icon,
					'menu_link' => $child->menu_link,
				];

				$items[$parent->id]['childs'] = $item;
				// $this->get_childs($child, $items);
			}
		} else {
			$items[$parent->id]['childs'] = [];
		}
	}

	public function show_menus() {
		$items = [];
		$query = $this->db->query("SELECT * FROM ci_menus WHERE parent_id = 0 AND show_in_menu = 1 ORDER BY display_order asc, menu_name asc");
		$parents = $query->result('Menus');

		if (count($parents) > 0) {
			foreach ($parents as $parent) {
				$items[$parent->id] = [
					'menu_name' => $parent->menu_name,
					'menu_icon' => $parent->icon,
					'menu_link' => $parent->menu_link,
				];
				$this->get_childs($parent, $items);
			}
		}
		return $items;
	}

	public function get_parent_name() {
		$query = $this->db->get_where('menus', array('id' => $this->parent_id));

		if ($query->row()) {
			return $query->row()->menu_name;
		}

    	return '';
	}

	public function get_show_menu() {
		if ($this->show_in_menu) {
			return 'Yes';
		}

		return 'No';
	}

	public function get_created_date() {
		return date_format(date_create($this->created_date), 'd-m-Y');
	}

	public function get_update_date() {
		return date_format(date_create($this->update_date), 'd-m-Y');
	}
}