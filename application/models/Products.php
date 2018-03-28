<?php
class Products extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('productImages');
        $this->load->model('productOption');
    }

    public function getRule() {
        $rules = [
            ['product_code', 'Product Code', 'trim|required'],
            ['product_name', 'Product Name', 'trim|required'],
            //['title', 'Title', 'trim|required'],
            // ['slug', 'Slug', 'trim|required'],
            ['description', 'Description', 'trim|required'],
            //['meta_description', 'Meta Description', 'trim|required'],
            ['content', 'Content', 'trim|required'],
        ];

        return $rules;
    }

    public function get_model($conditions = [])
    {
        if (!empty($conditions)) {
            $query = $this->db->get_where('products', $conditions);

            return $query->row(0,'Products');
        } else {
            $query = $this->db->query("SELECT * FROM ci_products ORDER BY created_date desc");
            return $query->result('Products');
        }
    }

    public function set_model()
    {
        $data = array(
            'product_code' => $this->input->post('product_code'),
            'product_name' => $this->input->post('product_name'),
            'product_name_en' => $this->input->post('product_name_en'),
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'content_en' => $this->input->post('content_en'),
            'description' => $this->input->post('description'),
            'description_en' => $this->input->post('description_en'),
            'meta_description' => $this->input->post('meta_description'),
            'price' => $this->input->post('price'),
            'sale_price' => $this->input->post('sale_price'),
            'slug' => $this->products->generateSlug($this->input->post('product_name')),
            'feature' => STATUS_ACTIVE,
            'status' => ($this->input->post('status')) ? $this->input->post('status') : STATUS_INACTIVE
        );
        $this->db->insert('products', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function update_model($id)
    {
        $data = array(
            'product_code' => $this->input->post('product_code'),
            'product_name' => $this->input->post('product_name'),
            'product_name_en' => $this->input->post('product_name_en'),
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'content_en' => $this->input->post('content_en'),
            'description' => $this->input->post('description'),
            'description_en' => $this->input->post('description_en'),
            'meta_description' => $this->input->post('meta_description'),
            'price' => $this->input->post('price'),
            'sale_price' => $this->input->post('sale_price'),
            'status' => ($this->input->post('status')) ? $this->input->post('status') : STATUS_INACTIVE
        );

        $this->db->where('id', $id);
        $this->db->update('products', $data);
    }

    public function delete_model($id) {
        $this->db->where('id', $id);
        $this->db->delete('products');
    }

    public function get_created_date() {
        return date_format(date_create($this->created_date), 'd-m-Y');
    }

    public function get_update_date() {
        return date_format(date_create($this->update_date), 'd-m-Y');
    }

    public function generateCode(){
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `ci_products`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }
        return 'P'.date('dmY').(str_pad($maxid+1, 4, '0', STR_PAD_LEFT));
    }

    public function generateSlug($str){
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `ci_products`')->row();
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

    public function getDataFE(){
        $query = $this->db->query("SELECT * FROM ci_products WHERE status = '".STATUS_ACTIVE."' AND feature = '".STATUS_ACTIVE."'");
        return $query->result('Products');
    }

    public function getFirstImage(){
        $query = $this->db->query("SELECT * FROM ci_product_images WHERE product_id = '".$this->id."'");
        $images = $query->result();

        if(!empty($images)){
            return base_url($images[0]->image);
        }else{
            return base_url('/uploads/products/no_image.png');
        }
    }

    public function getImages(){
        $query = $this->db->query("SELECT * FROM ci_product_images WHERE product_id = '".$this->id."'");
        $images = $query->result('ProductImages');

        return $images;
    }

    public function getProductBySlug($slug){
        $query = $this->db->get_where('products', array('slug' => $slug) );
        return $query->row(0,'Products');
    }

    public function getAttributes(){
        $query = $this->db->query("SELECT * FROM ci_product_option WHERE product_id = '".$this->id."'");
        $attributes = $query->result('ProductOption');

        return $attributes;
    }

    public function getCategory(){
        $query = $this->db->get_where('product_categories', array('product_id' => $this->id));
        $productCategory = $query->row();

        if ($productCategory) {
            $query = $this->db->get_where('categories', array('id' => $productCategory->category_id));
            $category = $query->row();
            if($category){
                return $category->category_name;
            }
        }

        return '';
    }

    public function getCategorySlug(){
        $query = $this->db->get_where('product_categories', array('product_id' => $this->id));
        $productCategory = $query->row();

        if ($productCategory) {
            $query = $this->db->get_where('categories', array('id' => $productCategory->category_id));
            $category = $query->row();
            if($category){
                return $category->slug;
            }
        }

        return '';
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

    public function getListData() {
        $result = [];
        $posts = $this->get_model();
        if (count($posts) > 0) {
            foreach ($posts as $post) {
                $url = 'pro-'.$post->getCategorySlug().'/'.$post->slug.'.html';
                $result[$url] = $post->title;
            }
        }

        return $result;
    }

    public function getFieldFollowLanguage($field) {
        if ($this->session->userdata['languages'] == 'en')
            $field = $field.'_en';

        return $this->$field;
    }
}