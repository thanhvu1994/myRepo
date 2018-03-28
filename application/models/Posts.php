<?php
class Posts extends CI_Model {

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
			$query = $this->db->get_where('posts', $conditions);

        	return $query->row();
		} else {
			$query = $this->db->query("SELECT * FROM ci_posts");
			return $query->result('Posts');
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
            'language' => 'vn',
        );

	    return $this->db->insert('posts', $data);
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
	    );

	    $this->db->where('id', $id);
        $this->db->update('posts', $data);
	}

	public function delete_model($id) {
		$this->db->where('id', $id);
  		$this->db->delete('posts');
	}

	public function get_created_date() {
		return date_format(date_create($this->created_date), 'd-m-Y');
	}

	public function get_update_date() {
		return date_format(date_create($this->update_date), 'd-m-Y');
	}

	public function get_dropdown_posts() {
        $result['/'] = 'Trang chủ';
        $this->load->model('products');
        $this->load->model('news');

        $query = $this->db->query("SELECT * FROM ci_categories WHERE type = 'category' ORDER BY display_order asc, category_name asc");
        $categories =  $query->result('Categories');

        $result['cat.html'] = 'Danh Mục :Tổng hợp Sản Phẩm';
        if (count($categories) > 0) {
            foreach ($categories as $category) {
                $url = 'cat-'.$category->slug.'.html';
                $result[$url] = 'Danh mục: '.$category->category_name;
            }
        }

        $query = $this->db->query("SELECT * FROM ci_news ORDER BY title asc");
        $news =  $query->result('News');
        $result['new.html'] = 'Trang :Tổng hợp Tin tức';
        if (count($news) > 0) {
            foreach ($news as $new) {
                $url = 'new-'.$new->getCategoryLink().'/'.$new->slug.'.html';
                $result[$url] = 'Tin Tức: '.$new->title;
            }
        }

		$posts = $this->get_model();
		if (count($posts) > 0) {
			foreach ($posts as $post) {
				$url = 'page-'.$post->slug.'.html';
				$result[$url] = 'Trang: '.$post->title;
			}
		}

		return $result;
	}

	public function getProjectsFE(){
        $query = $this->db->query("SELECT * FROM ci_posts WHERE type = 'project'");
        return $query->result('Posts');
    }

    public function getNews($limit, $start){
        $this->db->limit($limit, $start);
        $this->db->order_by('created_date desc');
        $query = $this->db->get_where('posts', array() );

        return $query->result();
    }

    public function countNews(){
        $this->db->from('posts');
        return $this->db->count_all_results();
    }

    public function fb_comment_count()
    {
        $json = json_decode(file_get_contents('https://graph.facebook.com/?ids=' . base_url('new-'.$this->getCategoryLink().'/'.$this->slug.'.html')));
        return isset($json->url->comments) ? $json->url->comments : 0;
    }

    public function generateSlug($str){
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `ci_posts`')->row();
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
}