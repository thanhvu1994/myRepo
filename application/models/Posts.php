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
            'description' => $this->input->post('description'),
            'short_content' => $this->input->post('short_content'),
            'content' => $this->input->post('content'),
            'featured_image' => $image,
            'slug' => $this->input->post('slug'),
            'type' => $this->input->post('type'),
            'url' => $this->input->post('url'),
            'language' => $this->input->post('language'),
        );

	    return $this->db->insert('posts', $data);
	}

	public function update_model($id,$image)
	{
	    $data = array(
	        'title' => $this->input->post('title'),
	        'description' => $this->input->post('description'),
	        'short_content' => $this->input->post('short_content'),
	        'content' => $this->input->post('content'),
	        'featured_image' => $image,
	        'slug' => $this->input->post('slug'),
            'type' => $this->input->post('type'),
            'url' => $this->input->post('url'),
            'language' => $this->input->post('language'),
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
        $query = $this->db->query("SELECT * FROM ci_posts WHERE type = 'project'");
        return $query->result('Posts');
    }

    public function getNews($limit, $start){
        $this->db->limit($limit, $start);
        $this->db->order_by('created_date desc');
        $query = $this->db->get_where('posts', array('type' => 'new') );

        return $query->result();
    }

    public function countNews(){
        $this->db->where('type','new');
        $this->db->from('posts');
        return $this->db->count_all_results();
    }

    public function fb_comment_count()
    {
        $json = json_decode(file_get_contents('https://graph.facebook.com/?ids=' . base_url('sites/newDetail/'. $this->slug)));
        return isset($json->url->comments) ? $json->url->comments : 0;
    }
}