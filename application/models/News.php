<?php
class News extends CI_Model {

    public function __construct()
    {
            $this->load->database();
	    	$this->load->helper('url');
    }

    public function getRule() {
    	$rules = [
    		'title' => 'isset',
    		'short_content' => 'isset',
    		'content' => 'isset',
    	];

    	return $rules;
    }

	public function get_model($conditions = [])
	{
		if (!empty($conditions)) {
			$query = $this->db->get_where('news', $conditions);

        	return $query->row(0,'News');
		} else {
			$query = $this->db->query("SELECT * FROM ci_news");
			return $query->result('News');
		}
	}

	public function set_model($image)
	{
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'short_content' => $this->input->post('short_content'),
            'content' => $this->input->post('content'),
            'featured_image' => $image,
            'slug' => $this->generateSlug($this->input->post('title')),
            'language' => 'vn',
            'created_date' => date('Y-m-d H:i:s'),
        );

	    return $this->db->insert('news', $data);
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
            'language' => 'vn',
            'created_date' => date('Y-m-d H:i:s'),
	    );

	    $this->db->where('id', $id);
        $this->db->update('news', $data);
	}

	public function delete_model($id) {
		$this->db->where('id', $id);
  		$this->db->delete('news');
	}

	public function get_created_date() {
		return date_format(date_create($this->created_date), 'd-m-Y');
	}

	public function get_update_date() {
		return date_format(date_create($this->update_date), 'd-m-Y');
	}

	public function get_dropdown_posts() {
		$result = ['sites/news' => 'News'];
		$news = $this->get_model();
		if (count($news) > 0) {
			foreach ($news as $new) {
				$url = 'pages/'.$new->slug;
				$result[$url] = $new->title;
			}
		}

		return $result;
	}

    public function getNews($limit, $start){
        $this->db->limit($limit, $start);
        $this->db->order_by('created_date desc');
        $query = $this->db->get_where('news', array() );

        return $query->result('News');
    }

    public function countNews(){
        $this->db->from('news');
        return $this->db->count_all_results();
    }

    public function fb_comment_count()
    {
        $json = json_decode(file_get_contents('https://graph.facebook.com/?ids=' . base_url('sites/newDetail/'. $this->slug)));
        return isset($json->url->comments) ? $json->url->comments : 0;
    }

    public function generateSlug($text){
        $text = $this->stripUnicode($text);
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `ci_news`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }

        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'tin-tuc-'.$maxid;
        }

        return $text.'-'.$maxid;
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
}