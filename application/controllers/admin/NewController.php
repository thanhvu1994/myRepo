<?php

class NewController extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $config['upload_path']          = './uploads/news';
        $config['allowed_types']        = 'jpg|png';
        $config['encrypt_name']         = TRUE;
        $this->load->library('upload', $config);
    }

    public function index()
    {
        $data['title'] = 'Quản Lý Tin Tức';
        $data['template'] = 'admin/newController/index';
        $data['models'] = $this->news->get_model();
		$this->load->view('admin/layouts/index', $data);
    }

    public function create() {
        $data['title'] = 'Tạo Tin Tức';
    	$data['template'] = 'admin/newController/form';
        $data['link_submit'] = base_url('admin/newController/create');
        $data['categories'] = $this->categories->get_dropdown_category(0, 'news');
        $data['scenario'] = 'create';

        if(isset($_POST['title']) && isset($_POST['short_content']) && isset($_POST['content'])) {
            $image = '';
            if (!$this->upload->do_upload('featured_image')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $uploadData = $this->upload->data();
                $image = '/uploads/news/'. $uploadData['file_name'];
            }

            $this->news->set_model($image);
            redirect('admin/newController/index', 'refresh');
        }
		$this->load->view('admin/layouts/index', $data);
    }

    public function view($id) {
        if ($this->input->is_ajax_request()) {
            $query = $this->db->get_where('news', ['id' => $id]);

            $model = $query->result('News');
            if (count($model) > 0) {
                $result['title'] = $model[0]->title;
                $result['title_en'] = $model[0]->title_en;
                $result['description'] = $model[0]->description;
                $result['short_content'] = $model[0]->short_content;
                $result['short_content_en'] = $model[0]->short_content_en;
                $result['content'] = $model[0]->content;
                $result['content_en'] = $model[0]->content_en;
                $result['category'] = $model[0]->getCategory();
                $result['featured_image'] = $model[0]->featured_image;
                $result['views'] = $model[0]->views;
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
        $data['title'] = 'Cập Nhật Tin Tức';
        $data['template'] = 'admin/newController/form';
        $data['model'] = $this->news->get_model(['id' => $id]);
        $data['link_submit'] = base_url('admin/newController/update/'.$id);
        $data['categories'] = $this->categories->get_dropdown_category(0, 'news');
        $data['scenario'] = 'update';


        if(isset($_POST['title']) && isset($_POST['short_content']) && isset($_POST['content'])) {
            $oldModel = $this->news->get_model(array('id' => $id));
            if (!$this->upload->do_upload('featured_image')) {
                $data['error'] = $this->upload->display_errors();

                $this->news->update_model($id,$oldModel->featured_image);
                redirect('admin/newController/index', 'refresh');
            } else {
                $path = '.'.$oldModel->featured_image;
                @unlink($path);

                $uploadData = $this->upload->data();
                $image = '/uploads/news/'. $uploadData['file_name'];
                $this->news->update_model($id,$image);
                redirect('admin/newController/index', 'refresh');
            }
        }

        $this->load->view('admin/layouts/index', $data);
    }

    public function delete($id) {
        $model = $this->news->get_model(['id' => $id]);

        if (count($model) > 0) {
            $this->news->delete_model($id);
        }
    }

    public function ajaxPublish() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $id = $this->input->post('id');
        $publish = $this->input->post('publish');
        $model = $this->news->get_model(['id' => $id]);

        if (count($model) > 0) {
            $data_update['status'] = $publish;
            $this->db->where('id', $id);
            $this->db->update('news', $data_update);
        }
    }

    public function bulkDelete() {
        $deleteItems = isset($_POST['select']) ? $_POST['select'] : [];

        if (!empty($deleteItems)) {
            $query = $this->db->query("SELECT * FROM ci_news WHERE id in(".implode(',', $deleteItems).")");
            $models = $query->result('News');
            foreach ($models as $model) {
                $this->news->delete_model($model->id);
            }
        }
        redirect('admin/newController/index', 'refresh');
    }
}