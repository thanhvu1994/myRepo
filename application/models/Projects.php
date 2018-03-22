<?php
class Projects extends CI_Model {

    public function __construct()
    {
            $this->load->database();
	    	$this->load->helper('url');
    }

    public function getRule() {
    	$rules = [
    		['title', 'Title', 'trim|required'],
            ['description', 'Description', 'trim|required'],
            ['short_content', 'Short Content', 'trim|required'],
            ['content', 'Content', 'trim|required'],
    	];

    	return $rules;
    }

	public function get_model($conditions = [])
	{
		if (!empty($conditions)) {
			$query = $this->db->get_where('projects', $conditions);

        	return $query->row();
		} else {
			$query = $this->db->query("SELECT * FROM ci_projects");
			return $query->result('Projects');
		}
	}

	public function set_model($image)
	{
        $data = array(
            'title' => $this->input->post('title'),
            'title_en' => $this->input->post('title_en'),
            'description' => $this->input->post('description'),
            'short_content' => $this->input->post('short_content'),
            'short_content_en' => $this->input->post('short_content_en'),
            'content' => $this->input->post('content'),
            'content_en' => $this->input->post('content_en'),
            'featured_image' => $image,
            'slug' => $this->generateSlug($this->input->post('title')),
            'url' => $this->input->post('url'),
            'language' => 'vn',
        );

	    return $this->db->insert('projects', $data);
	}

	public function update_model($id,$image)
	{
	    $data = array(
	        'title' => $this->input->post('title'),
	        'title_en' => $this->input->post('title_en'),
	        'description' => $this->input->post('description'),
	        'short_content' => $this->input->post('short_content'),
	        'short_content_en' => $this->input->post('short_content_en'),
	        'content' => $this->input->post('content'),
	        'content_en' => $this->input->post('content_en'),
	        'featured_image' => $image,
            'url' => $this->input->post('url'),
            'language' => 'vn',
	    );

	    $this->db->where('id', $id);
        $this->db->update('projects', $data);
	}

	public function delete_model($id) {
		$this->db->where('id', $id);
  		$this->db->delete('projects');
	}

	public function get_created_date() {
		return date_format(date_create($this->created_date), 'd-m-Y');
	}

	public function get_update_date() {
		return date_format(date_create($this->update_date), 'd-m-Y');
	}

	public function get_dropdown_posts() {
		$result = ['sites/news' => 'NewController'];
		$posts = $this->get_model();
		if (count($posts) > 0) {
			foreach ($posts as $post) {
				$url = 'pages/'.$post->slug;
				$result[$url] = $post->title;
			}
		}

		return $result;
	}

	public function getProjectsFE(){
        $query = $this->db->query("SELECT * FROM ci_projects");
        return $query->result('Projects');
    }

    public function generateSlug($str){
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `ci_projects`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }

        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);

        if (empty($str)) {
            return 'n-a';
        }

        return $str.'-'.$maxid;
    }

    function stripUnicode($str){
        if(!$str) return false;
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
        );
        foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
        return $str;
    }

    public function getFieldFollowLanguage($field) {
        if ($this->session->userdata['languages'] == 'en')
            $field = $field.'_en';

        return $this->$field;
    }
}