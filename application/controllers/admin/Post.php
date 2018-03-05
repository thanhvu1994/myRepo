<?php

class Post extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['template'] = 'admin/post/index';
        $data['models'] = $this->posts->get_model();
		$this->load->view('admin/layouts/index', $data);
    }

    public function create() {
        $data['title'] = 'Create a Backend Menu';
        $data['dropdown_menu'] = $this->menus->get_dropdown_menu();
    	$data['content'] = 'admin/backmenus/form';
        $data['link_submit'] = base_url('admin/backmenus/create');

        $rules = $this->menus->getRule();
        foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
        }

        if ($this->form_validation->run() == TRUE) {
            $this->menus->set_model();
        }
		$this->load->view('admin/layouts/index', $data);
    }

    public function view($id) {
        if ($this->input->is_ajax_request()) {
            $query = $this->db->get_where('posts', ['id' => $id]);

            $model = $query->result('Menus');
            if (count($model) > 0) {
                $result['title'] = $model[0]->title;
                $result['description'] = $model[0]->description;
                $result['short_content'] = $model[0]->short_content;
                $result['content'] = $model[0]->content;
                $result['featured_image'] = $model[0]->featured_image;
                $result['slug'] = $model[0]->slug;
                $result['created_date'] = $model[0]->created_date;

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
        $data['content'] = 'admin/backmenus/form';
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