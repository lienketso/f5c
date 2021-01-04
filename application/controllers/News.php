<?php 
Class News extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('news_model');
		$this->load->model('catnews_model');
	}

	function all(){

		$ca['where'] = ['parent_id'=>0];
		$ca['order'] = ['sort_order','asc'];
		$allCatnews = $this->catnews_model->get_list($ca);
		$this->data['allCatnews'] = $allCatnews;

		$input = array();
		//lấy ra danh sách sản phẩm trong danh mục
		$this->load->library('pagination');
		//lấy ra tổng tất cả các sản phẩm
		$total_row = $this->news_model->get_total($input);
		$this->data['total_row'] = $total_row;
		$config = array();
		if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['base_url']    = base_url('tin-tuc.html');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
		$config['total_rows']  = $total_row;
		$config['per_page']    = 12;
		$config['uri_segment'] = 2;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = '<i class="fa fa-chevron-left" aria-hidden="true"></i>';
		$config['last_link'] = ' <i class="fa fa-chevron-left" aria-hidden="true"></i>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="page-numbers current" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '<i class="fa fa-chevron-right" aria-hidden="true"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<i class="fa fa-chevron-left" aria-hidden="true"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-numbers');
		$this->pagination->initialize($config);
		$segment = $this->uri->segment(2);
		$segment = intval($segment);
		$input['order'] = ['id','desc'];
		$input["limit"] = array($config['per_page'], $segment);
		//lấy danh sách bài viết

		$list = $this->news_model->get_list($input);
		$this->data['list'] = $list;


		$this->data['temp'] = 'site/news/all';
		$this->load->view('site/layout',$this->data);
	}

	function catnews(){
		
		$catid = $this->uri->rsegment(3);
		$category = $this->catnews_model->get_info($catid);
		$this->data['category'] = $category;
		if(empty($category)){
			redirect();
		}

		$ca['where'] = ['parent_id'=>0];
		$ca['order'] = ['sort_order','asc'];
		$allCatnews = $this->catnews_model->get_list($ca);
		$this->data['allCatnews'] = $allCatnews;
		
		$input = array();
		$input['where'] = ['cat_id'=>$category->id];
		//kiểm tra tồn tại danh mục cha
		//lấy ra danh sách sản phẩm trong danh mục
		$this->load->library('pagination');
		//lấy ra tổng tất cả các sản phẩm
		$total_row = $this->news_model->get_total($input);
		$this->data['total_row'] = $total_row;
		$config = array();
		if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['base_url']    = base_url('bai-viet-'.slug($category->name).'/cn'.$catid.'.html');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
		$config['total_rows']  = $total_row;
		$config['per_page']    = 12;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = '<i class="fa fa-chevron-left" aria-hidden="true"></i>';
		$config['last_link'] = ' <i class="fa fa-chevron-left" aria-hidden="true"></i>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="page-numbers current">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '<i class="fa fa-chevron-right" aria-hidden="true"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<i class="fa fa-chevron-left" aria-hidden="true"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-numbers');
		$this->pagination->initialize($config);
		$segment = $this->uri->segment(3);
		$segment = intval($segment);
		$input['order'] = ['id','desc'];
		$input["limit"] = array($config['per_page'], $segment);
		//lấy danh sách bài viết

		$list = $this->news_model->get_list($input);
		$this->data['list'] = $list;
	
		$this->data['temp'] = 'site/news/catnews';
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

		 $id = $this->uri->rsegment(3);
		 $id =  intval($id);
		
		$info = $this->news_model->get_info($id);
		if(empty($info)){
			redirect();
		}
		$catName = $this->catnews_model->get_info($info->cat_id);
		$this->data['catName'] = $catName;
		// echo $newsname;
		$this->data['info'] = $info;
		 //bài viết liên quan
		$input['where'] = array('cat_id'=>$info->cat_id,'id!='=>$info->id);
		// $input['like'] = array('title',$info->title);
		$input['limit'] = array(5,0);
		$relatenews = $this->news_model->get_list($input);
		$this->data['relatenews'] = $relatenews;
		//sản phẩm mới trang tin
		$data = ['count_view'=>$info->count_view+1];
		$this->news_model->update($id,$data);

		$ca['where'] = ['parent_id'=>0];
		$ca['order'] = ['sort_order','asc'];
		$allCatnews = $this->catnews_model->get_list($ca);
		$this->data['allCatnews'] = $allCatnews;

		$this->data['temp'] = 'site/news/detail';
		$this->load->view('site/layout',$this->data);
	}
}//end class