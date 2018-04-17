<?php

class System extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('settings');
        $config['upload_path'] = './uploads/system';
        $config['allowed_types'] = '*';
        // $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite']     = FALSE;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);
    }

    public function index()
    {
        $data['title'] = 'Chỉnh sửa website';
        $data['template'] = 'admin/system/index';
        $data['link_submit'] = 'admin/system';
        $settingDefine = $this->settings->settingDefine;
        $data['settingDefine'] = $settingDefine;
        $old_file = [
            'logoFE' => $this->settings->get_value_setting('logoFE'),
            'favicon' => $this->settings->get_value_setting('favicon'),
            'logoBE' => $this->settings->get_value_setting('logoBE'),
        ];
        if (isset($_POST['Settings'])) {
            $this->db->empty_table('settings');
            $files = $_FILES;
            foreach ($settingDefine as $key => $arr_data) {
                if (isset($arr_data['items']) && is_array($arr_data['items'])) {
                    foreach ($arr_data['items'] as $item) {
                        $data_insert = [];
                        $itemObject = (object)$item;
                        if ($itemObject->controlTyle != 'file') {
                            $data_insert['key'] = $itemObject->name;
                            $data_insert['value'] = $_POST['Settings'][$itemObject->name];
                            $this->settings->set_model($data_insert);
                        } else {
                            if (isset($files['Settings']['name'][$itemObject->name]) && $files['Settings']['name'][$itemObject->name] != '') {
                                $_FILES[$itemObject->name]['name'] = $files['Settings']['name'][$itemObject->name];
                                $_FILES[$itemObject->name]['type'] = $files['Settings']['type'][$itemObject->name];
                                $_FILES[$itemObject->name]['tmp_name'] = $files['Settings']['tmp_name'][$itemObject->name];
                                $_FILES[$itemObject->name]['error'] = $files['Settings']['error'][$itemObject->name];
                                $_FILES[$itemObject->name]['size'] = $files['Settings']['size'][$itemObject->name];

                                $this->upload->do_upload($itemObject->name);
                                $uploadData = $this->upload->data();
                                if (isset($uploadData['file_name'])) {
                                    $value = '/uploads/system/'. $uploadData['file_name'];
                                    $data_insert['key'] = $itemObject->name;
                                    $data_insert['value'] = $value;
                                    if (is_file('.'.$old_file[$itemObject->name])) {
                                        unlink('.'.$old_file[$itemObject->name]);
                                    }
                                    $this->settings->set_model($data_insert);
                                }
                            } else {
                                $value = '';
                                if (isset($old_file[$itemObject->name])) {
                                    $value = $old_file[$itemObject->name];
                                }
                                $data_insert['key'] = $itemObject->name;
                                $data_insert['value'] = $value;
                                $this->settings->set_model($data_insert);
                            }
                        }
                    }
                }
            }
        }

		$this->load->view('admin/layouts/index', $data);
    }

    public function delete($key) {
        if (is_file('./'.$this->settings->get_value_setting($key))) {
            unlink('./'.$this->settings->get_value_setting($key));
        }
        $data_update['key'] = $key;
        $data_update['value'] = "";
        $this->settings->update_model($data_update);
    }
}