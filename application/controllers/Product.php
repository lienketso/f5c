<?php
Class Product extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('product_category_model');
	}
	function all(){
		//category all
		$this->language = language_current();
		$in['where'] = ['status'=>1,'parent'=>0,'lang_code'=>$this->language];
		$in['order'] = ['is_order','asc'];
		$categoryParent = $this->category_model->get_list($in);
		$this->data['categoryParent'] = $categoryParent;

		$this->load->library('pagination');
		//lấy ra tổng tất cả các sản phẩm
		$total_row = $this->product_model->get_total();
		$this->data['total_row'] = $total_row;
		$config = array();
		if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['base_url'] = base_url('san-pham');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
		$config['total_rows']  = $total_row;
		$config['per_page']    = 10;
		$config['uri_segment'] = 2;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = 'Trang đầu';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link active" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Trang tiếp';
		$config['next_tag_open'] = '<li class="page-item next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Quay lại';
		$config['prev_tag_open'] = '<li class="prev disabled">';
		$config['prev_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');
		$segment = $this->uri->segment(2);
		$segment = intval($segment);
		$this->pagination->initialize($config);
		$input['order'] = ['price','asc'];
		$input['limit'] = [$config['per_page'], $segment];
		$list = $this->product_model->get_list($input);
		$this->data['list'] = $list;

		$this->data['meta_title'] = 'Sản phẩm';
		$this->data['meta_keyword'] = 'Sản phẩm Cà phê Hoàng Hà';
		$this->data['meta_description'] = '';
		$this->data['og_title'] ='Sản phẩm';
		$this->data['og_image'] = '';
		$this->data['og_description'] = '';
		$this->data['index_link'] = 'index';
		$this->data['follow_link'] = 'follow';
		$this->data['breadcrumb'] = base_url('san-pham');
		$this->data['canonical'] = base_url('san-pham');
		$this->data['urlhttp'] = base_url('san-pham');

		$this->data['temp'] = "site/product/all";
		$this->load->view('site/layout',$this->data);
	}
	function category(){
		//lấy ra id của danh mục
		$slug = $this->uri->rsegment(3);
		$where = 'friendly_url="'.$slug.'"';
		$category = $this->category_model->get_info_rule($where);
		$this->data['category'] = $category;
		$input = array();
		//lấy ra danh sách sản phẩm trong danh mục
		
		if($category->parent_id==0){
			$ids = [$category->id];
			$s['where'] = ['parent_id'=>$category->id];
			$chill = $this->category_model->get_list($s);
			foreach($chill as $d){
				$ids[] += $d->id;
			}
			$input['where'] = ['hide'=>0];
			$input['where_in'] = ['cat_id',$ids];
		}else{
			$input['where'] = ['cat_id'=>$category->id];
		}
		
		$total_row = $this->product_model->get_total($input);

		$this->data['total_row'] = $total_row;
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = base_url($category->friendly_url);
		$config['total_rows']  = $total_row;
		$config['per_page']    = 12;
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
		$segment = $this->uri->segment(2);
		$segment = intval($segment);
		$this->pagination->initialize($config);
		
		$input["limit"] = array($config['per_page'], $segment);
		//$listMulti = $this->product_category_model->get_list($input);
		$view = '';
		$view = $this->input->get('view');
		$this->data['view'] = $view;
		$list = $this->product_model->get_list($input);
		$this->data['list'] = $list;

		//pre($list);die;

		//hiển thị ra view
		$this->data['temp'] = "site/product/category";
		$this->load->view('site/layout',$this->data);
	}
	function detail(){
		$slug = $this->uri->rsegment(3);
		$where = 'slug="'.$slug.'"';
		$info = $this->product_model->get_info_rule($where);
		$this->data['info'] = $info;
		$image_list = @json_decode($info->image_list);
		$this->data['image_list'] = $image_list;
		//cập nhật lượt xem sản phẩm
		$datas = array();
		$datas['view'] = $info->view + 1;
		$this->product_model->update($info->id,$datas);
		//sản phẩm liên quan
		//get catemeta
		$this->load->model('productmeta_model');
		$meta['where'] = ['product_id'=>$info->id];
		$listCatmeta = $this->productmeta_model->get_list($meta);
		$arrMeta = [];
		foreach($listCatmeta as $key=>$val){
			$arrMeta[$val->meta_key] = $val->meta_value;
		}
		$catInfo = $this->category_model->get_info($info->category_id);
		$this->data['catInfo'] = $catInfo;

        //category all
		$in['where'] = ['status'=>1,'lang_code'=>$this->language];
		$in['order'] = ['is_order','asc'];
		$categoryAll = $this->category_model->get_list($in);
		$this->data['categoryAll'] = $categoryAll;
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

		$re['where'] = ['category_id'=>$info->category_id,'id!='=>$info->id];
		$re['limit'] = [4,0];
		$listRelate = $this->product_model->get_list($re);
		$this->data['listRelate'] = $listRelate;
		$this->data['temp'] = "site/product/detail";
		$this->load->view("site/layout", $this->data);
	}
	//tìm kiếm theo tên sản phẩm
	function search(){
		$key = $this->input->get('key');
		$category_id = $this->input->get('category_id');
		$this->data['key'] = trim($key);
		$input = array();
		if($category_id!=''){
			$input['where'] = array('category_id'=>$category_id);
		}
		if($key!=''){
			$input['like'] = array('name',$key);
		}
		if($key!='' && $category_id!=''){
			$input['where'] = array('category_id'=>$category_id);
			$input['like'] = array('name',$key);
		}
		$list = $this->product_model->get_list($input);
		$this->data['list'] = $list;
		//load view
		$this->data['temp'] = "site/product/search";
		$this->load->view("site/layout", $this->data);
	}
}