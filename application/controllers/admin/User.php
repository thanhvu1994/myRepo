<?php

class User extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Quản lý người dùng';
        $data['template'] = 'admin/user/index';
        $query = $this->db->query("SELECT * FROM ci_users WHERE application_id = ".FE." ORDER BY email asc");
        $users =  $query->result('Users');
        $data['models'] = $users;
        $this->load->view('admin/layouts/index', $data);
    }

    public function update($id) {
        $data['title'] = 'Cập nhật người dùng';
        $data['template'] = 'admin/user/form';
        $query = $this->db->query("SELECT * FROM ci_users WHERE application_id = ".FE." AND id = ".$id);
        $user =  $query->row();
        $data['model'] = $user;
        $data['link_submit'] = base_url('admin/user/update/'.$id);

        if (isset($_POST['Users'])) {
            $data_update = $_POST['Users'];
            $data_update['full_name'] = $data_update['last_name'] .' '. $data_update['first_name'];
            $data_update['update_date'] = date('Y-m-d H:i:s');
            $this->db->where('id', $id);
            $this->db->update('users', $data_update);
            redirect('admin/user/index', 'refresh');
        }

        $this->load->view('admin/layouts/index', $data);
    }

    public function delete($id) {
        $query = $this->db->query("SELECT * FROM ci_users WHERE application_id = ".FE." AND id = ".$id);
        $model =  $query->row();

        if (count($model) > 0) {
            $this->db->where('id', $model->id);
            $this->db->delete('users');
            echo 1;
        } else {
            echo 0;
        }
    }

    public function bulkDelete() {
        $deleteItems = isset($_POST['select']) ? $_POST['select'] : [];

        if (!empty($deleteItems)) {
            $query = $this->db->query("SELECT * FROM ci_users WHERE id in(".implode(',', $deleteItems).")");
            $models = $query->result('Users');
            foreach ($models as $model) {
                $this->db->where('id', $model->id);
                $this->db->delete('users');
            }
        }
        redirect('admin/user/index', 'refresh');
    }
}