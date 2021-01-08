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
		$this->load->model('manufac_model');
		//lấy ra id của danh mục
		$slug = $this->uri->rsegment(3);
		$where = 'friendly_url="'.$slug.'"';
		$category = $this->category_model->get_info_rule($where);
		$this->data['category'] = $category;
		$sort_order = 'asc';
		$sort_order = $this->input->get('sort_order');
		$input = array();
		//lấy ra danh sách sản phẩm trong danh mục
		$this->data['sort_order'] = $sort_order;
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
		$config['per_page']    = 20;
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
		$segment = $this->uri->segment(2);
		$segment = intval($segment);
		$this->pagination->initialize($config);
		if($sort_order){
			$input['order'] = ['price',$sort_order];
		}
		$input["limit"] = array($config['per_page'], $segment);
		//$listMulti = $this->product_category_model->get_list($input);

		$list = $this->product_model->get_list($input);
		$this->data['list'] = $list;
		//list hãng sản xuất theo danh mục
		$hangsx = unserialize($category->manufac_ids);
		$listHang = [];
		if(!empty($hangsx)){
		foreach($hangsx as $h){
			$listHang[] = $this->manufac_model->get_info($h);
		}
		}
		
		$this->data['listHang'] = $listHang;
		
		//pre($list);die;

		$this->data['title'] = $category->name;
		$this->data['meta_desc'] = $category->meta_desc;
		$this->data['meta_keyword'] = $category->meta_key;
		$this->data['og_title'] = $category->name;
		$this->data['og_image'] = product_link($category->image_name);
		$this->data['urlhttp'] = category_url(slug($category->name),$category->id);

		//hiển thị ra view
		$this->data['temp'] = "site/product/category";
		$this->load->view('site/layout',$this->data);
	}
	function detail(){
		$this->load->model('manufac_model');
		$this->load->model('file_model');

		$id = $this->uri->rsegment(3);
		$info = $this->product_model->get_info($id);
		$this->data['info'] = $info;
		//cập nhật lượt xem sản phẩm
		$datas = array();
		$datas['count_view'] = $info->count_view + 1;
		$this->product_model->update($info->id,$datas);
		//sản phẩm liên quan
		//get catemeta
		$categoryName = $this->category_model->get_info($info->cat_id);
		$this->data['categoryName'] = $categoryName;

		//ảnh đính kèm
		$w['where'] = ['table_id'=>$info->id,'table'=>'product'];
		$w['order'] = ['id','desc'];
		$listAttach = $this->file_model->get_list($w);
		$this->data['listAttach'] = $listAttach;

		$re['where'] = ['cat_id'=>$info->cat_id,'id!='=>$info->id];
		$re['limit'] = [4,0];
		$listRelate = $this->product_model->get_list($re);

		//sản phẩm cùng hãng
		$ch['where'] = ['manufac_id'=>$info->manufac_id,'id!='=>$info->id];
		$ch['limit'] = [6,0];
		$listCH = $this->product_model->get_list($ch);
		$this->data['listCH'] = $listCH;

		$this->data['title'] = $info->name;
		$this->data['meta_desc'] = $info->meta_desc;
		$this->data['meta_keyword'] = $info->meta_key;
		$this->data['og_title'] = $info->name;
		$this->data['og_image'] = product_link($info->image_name);
		$this->data['urlhttp'] = product_url(slug($info->name),$info->id);


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