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
                ['name' => 'logoBE', 'controlTyle' => 'file', 'notes' => '', 'unit' => '', 'htmlOptions' => [], 'rules' => ''],
                ['name' => 'defaultPageTitle', 'controlTyle' => 'text', 'notes' => '', 'unit' => '', 'htmlOptions' => ['maxlength' => 80], 'rules' => 'required'],
                ['name' => 'copyrightOnFooter', 'controlTyle' => 'textarea', 'notes' => '', 'unit' => '', 'htmlOptions' => ['class' => 'editor-full'], 'rules' => ''],
                ['name' => 'googleAnalytics', 'controlTyle' => 'textarea', 'notes' => '', 'unit' => '', 'htmlOptions' => ['cols' => 77, 'rows' => 4], 'rules' => ''],
            ],
        ],
        "socialsetting" => [
            'label' => 'Social Network',
            'htmlOptions' => [],
            'icon' => '<i class="social_share"></i>',
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
            'label' => 'Contact',
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

	public function get_publish() {
		if ($this->publish) {
			return 'Yes';
		}

		return 'No';
	}

	public function get_image() {
		// if (file_exists(base_url($this->image))) {
			return base_url($this->image);
		// }

		// return '';
	}
}