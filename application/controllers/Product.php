<?php
Class Product extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('product_category_model');
		$this->load->model('comment_model');
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
		$input['where'] = ['hide'=>0];
		//lấy ra danh sách sản phẩm trong danh mục
		$this->data['sort_order'] = $sort_order;
		
		if($category->parent_id==0){
			$ids = [$category->id];
			$s['where'] = ['parent_id'=>$category->id];
			$chill = $this->category_model->get_list($s);
			foreach($chill as $d){
				$ids[] += $d->id;
			}
			$input['where'] = ['hide'=>'0'];
			$input['where_in'] = ['cat_id',$ids];
			$locamanu = $this->product_model->getLocationManu($input['where_in'],false);
			$range = $this->product_model->price_range($input,false);
		}else{
			$input['where'] = ['cat_id'=>$category->id,'hide'=>'0'];
			$locamanu = $this->product_model->getLocationManu($input['where'],true);
			$range = $this->product_model->price_range($input,true);
		}		

		
		$extent ="";
		//Search theo hãng sx
		$manu = $this->input->get('manu');
		if(!is_null($manu) && $manu>0){
			$extent .= "AND manufac_id =".$manu ." ";
		}
		//Search theo xuất xứ
		$loc = $this->input->get('loc');
		
		if(!is_null($loc)) {
			$extent .= "AND model ='".$loc ."' ";
		}
		$range_id = $this->input->get('range_id');
		$minp = $this->input->get('minp');
		$maxp =$this->input->get('maxp');
		if(!is_null($minp) && !is_null($maxp)) {
			$extent .= "AND price >=".$minp ." ";
			$extent .= "AND price <=".$maxp ." ";
		}	

		$total_row = $this->product_model->get_total($input);
		$base_url =  base_url($category->friendly_url);

		$this->data['total_row'] = $total_row;
		$this->load->library('pagination');
		$config = array();
		// $config['page_query_string'] = true;
		$config['reuse_query_string'] = true;
		$config['base_url'] = $base_url;
		$config['total_rows']  = $total_row;
		$config['per_page']    = 20;
		$config['uri_segment'] = 2;
		$config['suffix'] = '';
		$config['first_url'] = $config['base_url'] . $config['suffix'];
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = 'Trang đầu';
		$config['last_link'] = ' Trang cuối';
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
		}else{
			$input['order'] = ['sort_order','desc'];
		}
		$input["limit"] = array($config['per_page'], $segment);
		//$listMulti = $this->product_category_model->get_list($input);
		// print_r($input);die;
		$list = $this->product_model->get_list_extent($input,$extent	);
		// print_r($this->db->last_query());die;
		$this->data['list'] = $list;
		//list hãng sản xuất theo danh mục
		$hangsx = unserialize($category->manufac_ids);
		
		$listHang = [];
		if(!empty($hangsx)){
		foreach($hangsx as $h){
			$listHang[] = $this->manufac_model->get_info($h);		
		}
		}
		foreach($listHang as $i){
			$i->count = $this->product_model->countProductByManu($i->id);
		}
		foreach( $range as $key=> $item){
			$item->id = $key +1;
			if($item->price_range=='0 - 500K'){
				$item->minp=0;
				$item->maxp=500000;
			}
			else if($item->price_range=='500k - 1 triệu'){
				$item->minp=500000;
				$item->maxp=1000000;
			}
			else if($item->price_range=='500k - 1 triệu'){
				$item->minp=500000;
				$item->maxp=1000000;
			}
			else if($item->price_range=='1 triệu - 2 triệu'){
				$item->minp=1000000;
				$item->maxp=2000000;
			}
			else if($item->price_range=='2 triệu - 3 triệu'){
				$item->minp=2000000;
				$item->maxp=3000000;
			}
			else if($item->price_range=='3 triệu - 5 triệu'){
				$item->minp=3000000;
				$item->maxp=5000000;
			}
			else if($item->price_range=='5 triệu - 10 triệu'){
				$item->minp=5000000;
				$item->maxp=10000000;
			}
			else if($item->price_range=='10 triệu - 20 triệu'){
				$item->minp=10000000;
				$item->maxp=20000000;
			}else{
				$item->minp=20000000;
				$item->maxp=2000000000000;
			}
		}
		
		$this->data['listHang'] = $listHang;

		//list xem nhiều
		$xn['where'] = ['cat_id'=>$category->id];
		$xn['order'] = ['count_view','desc'];
		$xn['limit'] = [6,0];
		$listXN = $this->product_model->get_list($xn);
		$this->data['listXN'] = $listXN;

		$this->data['title'] = $category->name;
		$this->data['meta_desc'] = $category->meta_desc;
		$this->data['meta_keyword'] = $category->meta_key;
		$this->data['og_title'] = $category->name;
		$this->data['og_image'] = product_link($category->image_name);
		$this->data['urlhttp'] = category_url(slug($category->name),$category->id);
		$this->data['friendly_url'] =$base_url;
		$this->data['manu'] =$manu;
		$this->data['location_manu'] =$locamanu;
		$this->data['current_loc']=$loc;
		$this->data['range'] =$range;
		$this->data['range_id']=$range_id;

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
		$w['where'] = ['table_id'=>$info->id];
		$w['order'] = ['id','desc'];
		$listAttach = $this->file_model->get_list($w);
		$this->data['listAttach'] = $listAttach;

		$re['where'] = ['hide'=>'0','cat_id'=>$info->cat_id,'id!='=>$info->id];
		$re['limit'] = [4,0];
		$listRelate = $this->product_model->get_list($re);

		//sản phẩm cùng hãng
		$ch['where'] = ['manufac_id'=>$info->manufac_id,'id!='=>$info->id];
		$ch['limit'] = [6,0];
		$listCH = $this->product_model->get_list($ch);
		$this->data['listCH'] = $listCH;

		//so sánh sản phẩm
		$startprice = tru($info->price,1000000);
		$endprice = cong($info->price,1000000);
		$ss['where'] = ['price>='=>$startprice,'price<='=>$endprice,'id!='=>$info->id,'cat_id'=>$info->cat_id];
		$ss['order'] = ['price','asc'];
		$ss['limit'] = [8,0];
		$listSosanh = $this->product_model->get_list($ss);
		$this->data['listSosanh'] = $listSosanh;
		//pre($listSosanh);die;

		$this->data['title'] = $info->name;
		$this->data['meta_desc'] = $info->meta_desc;
		$this->data['meta_keyword'] = $info->meta_key;
		$this->data['og_title'] = $info->name;
		$this->data['og_image'] = product_link($info->image_name);
		$this->data['urlhttp'] = product_url(slug($info->name),$info->id);

		$lstComment = $this->comment_model->getComment($id);
		$this->data['lstComment'] = $lstComment;
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

	function addComment(){
		$comment=	$this->input->post('comment');
		$username = $this->input->post('userName');
		$useremail = $this->input->post('userEmail');
		$productId = $this->input->post('productId');
		$insertedId =  $this->comment_model->addComment($productId,$username,$useremail,$comment,0);
		echo ($insertedId);
		die;
	}

	function addAnswer(){
	$comment=	$this->input->post('comment');
	$parentId =	$this->input->post('commentId');
	$productId = $this->input->post('productId');
	$username = $this->input->post('userName');
	$useremail = $this->input->post('userEmail');
	//$produdctId, $name, $email,$content,$parentId = 0
	$insertedId =  $this->comment_model->addComment($productId,$username,$useremail,$comment,$parentId);
	$ressult = $this->comment_model->getById($insertedId);
		echo json_encode($ressult);
		die;		
	
	}
	function loadMoreComment(){
		
		$id = $this->input->post('productId');
		$index =$this->input->post('page');	
		$offset =$index * 10;
		$lstComment = $this->comment_model->getComment($id,$offset);
		$arrSubComment = array();
		foreach ($lstComment as $item){
			$arrSubComment[]= $item->id;
		}	
		$lstSubComment = array();
		if(count($arrSubComment)>0){
			$lstSubComment = $this->comment_model->getLoadSubComment($arrSubComment);
		}
	
		$data = array(
			'lstComment' =>$lstComment,
			'lstSubComment' => $lstSubComment		
		);	
		echo json_encode($data);
		die;
	}

	 function voteComment()
	{
		$vote =$this->input->post('vote');	
		$this->comment_model->voteComment($vote);
	}
}