<?php 
Class News extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('news_model');
		$this->load->model('catnews_model');
		$this->load->model('city_model');
	}
	function catnews(){
		$this->load->model('postmeta_model');
		//lấy ra id của danh mục
		//$id = $this->uri->rsegment(3);
		//$id = intval($id);
		$catname = $this->uri->rsegment(3);
		$this->data['catname'] = $catname;
		//$catname = str_replace('.htm','',$catname);
		$where = 'cat_name="'.$catname.'"';
		$category = $this->catnews_model->get_info_rule($where);
		$this->data['category'] = $category;
		if(empty($category)){
			redirect();
		}

		$cat['where'] = ['status'=>1,'cat_type'=>'news','lang_code'=>$this->language];
		$cat['order'] = ['is_order','asc'];
		$cat['limit'] = [10,0];
		$allCat = $this->catnews_model->get_list($cat);
		$this->data['allCat'] = $allCat;
		

		$input = array();
		$this->load->model('news_catnews_model');
		$input['where'] = ['cat_id'=>$category->id];
		//kiểm tra tồn tại danh mục cha
		//lấy ra danh sách sản phẩm trong danh mục
		$this->load->library('pagination');
		//lấy ra tổng tất cả các sản phẩm
		$total_row = $this->news_catnews_model->get_total($input);
		$this->data['total_row'] = $total_row;
		$config = array();
		if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['base_url']    = base_url($category->cat_name);
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
		$config['total_rows']  = $total_row;
		$config['per_page']    = 6;
		$config['uri_segment'] = 2;
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['num_tag_open'] = '';
		$config['num_tag_close'] = '';
		$config['first_link'] = '<i class="fa fa-chevron-left" aria-hidden="true"></i>';
		$config['last_link'] = ' <i class="fa fa-chevron-left" aria-hidden="true"></i>';
		$config['last_tag_open'] = '';
		$config['last_tag_close'] = '';
		$config['first_tag_open'] = '';
		$config['first_tag_close'] = '';
		$config['cur_tag_open'] = '<a class="page-numbers current" href="#">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = '<i class="fa fa-chevron-right" aria-hidden="true"></i>';
		$config['next_tag_open'] = '';
		$config['next_tag_close'] = '';
		$config['prev_link'] = 'Quay lại';
		$config['prev_tag_open'] = '';
		$config['prev_tag_close'] = '';
		$config['attributes'] = array('class' => 'page-numbers');
		$this->pagination->initialize($config);
		$segment = $this->uri->segment(2);
		$segment = intval($segment);
		$input['order'] = ['created_at','desc'];
		$input["limit"] = array($config['per_page'], $segment);
		//lấy danh sách bài viết
		$listMulti = $this->news_catnews_model->get_list($input);
		$list = $this->catnews_model->getNews($listMulti);
		$this->data['list'] = $list;
		//get catemeta
		$this->load->model('catmeta_model');
		$meta['where'] = ['cat_id'=>$category->id];
		$listCatmeta = $this->catmeta_model->get_list($meta);
		$arrMeta = [];
		foreach($listCatmeta as $key=>$val){
                $arrMeta[$val->meta_key] = $val->meta_value;
        }
        //input to header
        $this->data['meta_title'] = $arrMeta['meta_title'];
        $this->data['meta_keyword'] = $arrMeta['meta_keyword'];
        $this->data['meta_description'] = $arrMeta['meta_description'];
        $this->data['og_title'] = $arrMeta['og_title'];
        $this->data['og_image'] = $arrMeta['og_image'];
        $this->data['og_description'] = $arrMeta['og_description'];
        $this->data['index_link'] = $arrMeta['index_link'];
        $this->data['follow_link'] = $arrMeta['follow_link'];
        $this->data['breadcrumb'] = $arrMeta['breadcrumb'];
        $this->data['canonical'] = $arrMeta['canonical'];
		$this->data['temp'] = 'site/news/catnews';
		$this->load->view('site/layout',$this->data);
	}

	function about(){
		
		$p['where'] = ['status'=>1,'display'=>1,'type'=>'page'];
		$p['order'] = ['created_at','asc'];
		$p['limit'] = [3,0];
		$pageHome = $this->news_model->get_list($p);
		$this->data['pageHome'] = $pageHome;

        //input to header
        $this->data['meta_title'] = 'Về VCCGROUP';
        $this->data['meta_keyword'] = 'vcc group, giới thiệu';
        $this->data['meta_description'] = 'Giới thiệu về VCCGROUP';
        $this->data['og_title'] = 'Giới thiệu về VCCGROUP';
        $this->data['og_image'] = '';
        $this->data['og_description'] = 'Giới thiệu về VCCGROUP';
        $this->data['index_link'] = 'index';
        $this->data['follow_link'] = 'dofollow';
        $this->data['breadcrumb'] = '';
        $this->data['canonical'] = '';

		$this->data['temp'] = 'site/news/page';
		$this->load->view('site/layout',$this->data);
	}

	function tags(){
		$title = $this->uri->rsegment(3);
		$input = array();
		$input['where'] = array();
		$input['like'] = array('news_name',$title);
		$list = $this->news_model->get_list($input);
		$this->data['list'] = $list;
		$this->data['temp'] = "site/news/tags";
		$this->load->view("site/layout",$this->data);
	}
	function detail(){

		$this->load->model('news_catnews_model');
		 $this->load->model('postmeta_model');
		 $id = $this->uri->rsegment(3);
		 $id =  intval($id);
		// $newsname = $this->uri->segment(2);
		// $newsname = str_replace('.html','',$newsname);
		//echo $newsname;
		//$where = 'slug="'.$slug.'"';
		$info = $this->news_model->get_info($id);
		if(empty($info)){
			redirect();
		}
		// echo $newsname;
		$this->data['info'] = $info;
		 //bài viết liên quan
		$input['where'] = array('status'=>1,'type'=>$info->type);
		// $input['like'] = array('title',$info->title);
		$input['limit'] = array(4,0);
		$relatenews = $this->news_model->get_list($input);
		$this->data['relatenews'] = $relatenews;
		//sản phẩm mới trang tin
		$data = ['view'=>$info->view+1];
		$this->news_model->update($id,$data);
		//get catemeta
		$this->load->model('postmeta_model');
		$meta['where'] = ['post_id'=>$info->id];
		$listCatmeta = $this->postmeta_model->get_list($meta);
		$arrMeta = [];
		foreach($listCatmeta as $key=>$val){
                $arrMeta[$val->meta_key] = $val->meta_value;
        }
        //input to header
        $this->data['meta_title'] = $arrMeta['meta_title'];
        $this->data['meta_keyword'] = $arrMeta['meta_keyword'];
        $this->data['meta_description'] = $arrMeta['meta_description'];
        $this->data['og_title'] = $arrMeta['og_title'];
        $this->data['og_image'] = '';
        $this->data['og_description'] = $arrMeta['og_description'];
        $this->data['index_link'] = $arrMeta['index_link'];
        $this->data['follow_link'] = $arrMeta['follow_link'];
        $this->data['breadcrumb'] = $arrMeta['breadcrumb'];
        $this->data['canonical'] = $arrMeta['canonical'];



		//die();
		$this->data['temp'] = 'site/news/detail';
		$this->load->view('site/layout',$this->data);
	}
}//end class