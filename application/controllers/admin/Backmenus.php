<?php

class Backmenus extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Quản lý menu';
        $data['template'] = 'admin/backmenus/index';
        $data['models'] = $this->menus->get_model();
		$this->load->view('admin/layouts/index', $data);
    }

    public function create() {
        $data['title'] = 'Create a Backend Menu';
        $data['dropdown_menu'] = $this->menus->get_dropdown_menu();
    	$data['template'] = 'admin/backmenus/form';
        $data['link_submit'] = base_url('admin/backmenus/create');

        $rules = $this->menus->getRule();
        foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
        }

        if ($this->form_validation->run() == TRUE) {
            $this->menus->set_model();
            redirect('admin/backmenus/index', 'refresh');
        }
		$this->load->view('admin/layouts/index', $data);
    }

    public function view($id) {
        if ($this->input->is_ajax_request()) {
            $query = $this->db->get_where('menus', ['id' => $id]);

            $model = $query->result('Menus');
            if (count($model) > 0) {
                $result['menu_name'] = $model[0]->menu_name;
                $result['parent_id'] = $model[0]->get_parent_name();
                $result['show_in_menu'] = $model[0]->get_show_menu();
                $result['display_order'] = $model[0]->display_order;
                $result['created_date'] = $model[0]->get_created_date();
                $result['update_date'] = $model[0]->get_update_date();
                echo json_encode($result);
            } else {
                echo json_encode([]);
            }
        } else {
            echo json_encode([]);
        }
    }

    public function update($id) {
        $data['title'] = 'Update a Backend Menu';
        $data['dropdown_menu'] = $this->menus->get_dropdown_menu();
        $data['template'] = 'admin/backmenus/form';
        $data['model'] = $this->menus->get_model(['id' => $id]);
        $data['link_submit'] = base_url('admin/backmenus/update/'.$id);
        $rules = $this->menus->getRule();
        foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
        }

        if ($this->form_validation->run() == TRUE) {
            $this->menus->update_model($id);
            redirect('admin/backmenus/index', 'refresh');
        }

        $this->load->view('admin/layouts/index', $data);
    }

    public function delete($id) {
        $model = $this->menus->get_model(['id' => $id]);

        if (count($model) > 0) {
            $this->menus->delete_model($id);
        }
    }

}