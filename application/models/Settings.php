<?php
class Settings extends CI_Model {

    public function __construct()
    {
	    $this->load->database();
		$this->load->helper('url');
    }

    public $settingDefine = [
        "pagesetting" => [
            'label' => 'Website',
            'htmlOptions' => [],
            'icon' => '<span class="glyphicon glyphicon-globe"></span>',
            'items' => [
            	['name' => 'logoFE', 'controlTyle' => 'file', 'notes' => '', 'unit' => '', 'htmlOptions' => [], 'rules' => ''],
                ['name' => 'favicon', 'controlTyle' => 'file', 'notes' => '', 'unit' => '', 'htmlOptions' => [], 'rules' => ''],
                // ['name' => 'logoBE', 'controlTyle' => 'file', 'notes' => '', 'unit' => '', 'htmlOptions' => [], 'rules' => ''],
                ['name' => 'defaultPageTitle', 'controlTyle' => 'text', 'notes' => '', 'unit' => '', 'htmlOptions' => ['maxlength' => 80], 'rules' => 'required'],
                ['name' => 'defaultPageTitle_en', 'controlTyle' => 'text', 'notes' => '', 'unit' => '', 'htmlOptions' => ['maxlength' => 80], 'rules' => 'required'],
                ['name' => 'introduce', 'controlTyle' => 'textarea', 'notes' => '', 'unit' => '', 'htmlOptions' => ['class' => 'editor-full', 'id' => 'editor-full'], 'rules' => ''],
                ['name' => 'introduce_en', 'controlTyle' => 'textarea', 'notes' => '', 'unit' => '', 'htmlOptions' => ['class' => 'editor-full', 'id' => 'editor-full-2'], 'rules' => ''],
                ['name' => 'copyrightOnFooter', 'controlTyle' => 'textarea', 'notes' => '', 'unit' => '', 'htmlOptions' => ['class' => 'editor-full'], 'rules' => ''],
                ['name' => 'googleAnalytics', 'controlTyle' => 'textarea', 'notes' => '', 'unit' => '', 'htmlOptions' => ['cols' => 77, 'rows' => 4], 'rules' => ''],
            ],
        ],
        "socialsetting" => [
            'label' => 'Mạng xã hội',
            'htmlOptions' => [],
            'icon' => '<i class="glyphicon glyphicon-star-empty"></i>',
            'items' => [
                ['name' => 'facebook', 'controlTyle' => 'text', 'notes' => '', 'unit' => '', 'htmlOptions' => ['maxlength' => 80], 'rules' => ''],
                ['name' => 'googleplus', 'controlTyle' => 'text', 'notes' => '', 'unit' => '', 'htmlOptions' => ['maxlength' => 80], 'rules' => ''],
                ['name' => 'twitter', 'controlTyle' => 'text', 'notes' => '', 'unit' => '', 'htmlOptions' => ['maxlength' => 80], 'rules' => ''],
                ['name' => 'youtube', 'controlTyle' => 'text', 'notes' => '', 'unit' => '', 'htmlOptions' => ['maxlength' => 80], 'rules' => ''],
                ['name' => 'instagram', 'controlTyle' => 'text', 'notes' => '', 'unit' => '', 'htmlOptions' => ['maxlength' => 80], 'rules' => ''],
                ['name' => 'pinterest', 'controlTyle' => 'text', 'notes' => '', 'unit' => '', 'htmlOptions' => ['maxlength' => 80], 'rules' => ''],
                ['name' => 'linkedin', 'controlTyle' => 'text', 'notes' => '', 'unit' => '', 'htmlOptions' => ['maxlength' => 80], 'rules' => ''],
            ]
        ],
        "contactsetting" => [
            'label' => 'Liên hệ',
            'htmlOptions' => [],
            'icon' => '<span class="glyphicon glyphicon-search"></span>',
            'items' => [
                ['name' => 'companyAddress', 'controlTyle' => 'text', 'notes' => '', 'unit' => '', 'htmlOptions' => ['maxlength' => 80], 'rules' => ''],
                ['name' => 'companyAddress_en', 'controlTyle' => 'text', 'notes' => '', 'unit' => '', 'htmlOptions' => ['simaxlengthze' => 80], 'rules' => ''],
                ['name' => 'companyCellPhone', 'controlTyle' => 'text', 'notes' => '', 'unit' => '', 'htmlOptions' => ['maxlength' => 80], 'rules' => ''],
                ['name' => 'companyPhone', 'controlTyle' => 'text', 'notes' => '', 'unit' => '', 'htmlOptions' => ['maxlength' => 80], 'rules' => ''],
                ['name' => 'companyEmail', 'controlTyle' => 'text', 'notes' => '', 'unit' => '', 'htmlOptions' => ['maxlength' => 80], 'rules' => ''],

            ],
        ],
    ];

    public function getAttributeName($field) {
        $attrbute_name = [
            'logoFE' => 'Logo Trang Web',
            'favicon' => 'Favicon',
            'logoBE' => 'Logo Trang Admin',
            'defaultPageTitle' => 'Tiêu đề trang web',
            'defaultPageTitle_en' => 'Tiêu đề trang web (tiếng anh)',
            'copyrightOnFooter' => 'Bản quyền trang web',
            'googleAnalytics' => 'Google Analytics',
            'companyAddress' => 'Địa chỉ công ty',
            'companyAddress_en' => 'Địa chỉ công ty (tiếng anh)',
            'companyCellPhone' => 'Điện thoại di động',
            'companyPhone' => 'Điện thoại công ty',
            'companyEmail' => 'Địa chỉ Email',
            'introduce' => 'Sơ lược công ty',
            'introduce_en' => 'Sơ lược công ty (tiếng anh)'
        ];

        if (isset($attrbute_name[$field])) {
            return $attrbute_name[$field];
        }

        return ucfirst($field);
    }

    public function getRule() {
    	$rules = [
    		// ['image', 'Image', 'trim|required'],
    	];

    	return $rules;
    }

	public function get_model($conditions = [])
	{
		if (!empty($conditions)) {
			$query = $this->db->get_where('settings', $conditions);

        	return $query->row();
		} else {
			$query = $this->db->query("SELECT * FROM ci_settings");
			return $query->result('Settings');
		}
	}

	public function get_value_setting($key) {
		$model = $this->get_model(['key' => $key]);
		if (count($model) > 0) {
			return $model->value;
		}

		return '';
	}

	public function set_model($data)
	{
	    return $this->db->insert('settings', $data);
	}

	public function update_model($data)
	{
		$this->db->where('key', $data['key']);
        $this->db->update('settings', $data);
	}

	public function delete_model($id) {
		$this->db->where('id', $id);
  		$this->db->delete('banners');
	}

	public function get_created_date() {
		return date_format(date_create($this->created_date), 'd-m-Y');
	}

	public function get_update_date() {
		return date_format(date_create($this->update_date), 'd-m-Y');
	}

	public function get_logoFE() {
        $setting = $this->get_model(['key' => 'logoFE']);
        if (count($setting) > 0) {
            if (is_file('.'.$setting->value)) {
                return base_url($setting->value);
            }
        }

		return '';
	}

    public function get_logoBE() {
        $setting = $this->get_model(['key' => 'logoBE']);
        if (count($setting) > 0) {
            if (is_file('.'.$setting->value)) {
                return base_url($setting->value);
            }
        }

        return base_url('/themes/admin/plugins/images/agileadmin-text-dark.png');
    }

    public function get_param($key) {
        if ($key == 'introduce') {
            $key = $this->getFieldFollowLanguage('introduce');
        } elseif ($key == 'companyAddress') {
            $key = $this->getFieldFollowLanguage('companyAddress');
        } elseif ($key == 'defaultPageTitle') {
            $key = $this->getFieldFollowLanguage('defaultPageTitle');
        }
        $setting = $this->get_model(['key' => $key]);
        if (count($setting) > 0) {
            return $setting->value;
        }
        return '';
    }

    public function getFieldFollowLanguage($field) {
        if (isset($this->session->userdata['languages']) && $this->session->userdata['languages'] == 'en')
            $field = $field.'_en';

        return $field;
    }
}