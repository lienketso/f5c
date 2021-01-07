<?php
Class Manufac extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('manufac_model');
		$this->load->model('category_model');
		$this->load->model('product_model');
	}

	function index()
	{
		$facid = $this->uri->rsegment(3);
		$catid = $this->uri->rsegment(4);
		$InfoCat = $this->category_model->get_info($catid);
		$this->data['InfoCat'] = $InfoCat;
		$infoFac = $this->manufac_model->get_info($facid);
		$this->data['infoFac'] = $infoFac;

		$input = array();
		//lấy ra danh sách sản phẩm trong danh mục
		
		if($InfoCat->parent_id==0){
			$ids = [$InfoCat->id];
			$s['where'] = ['parent_id'=>$InfoCat->id];
			$chill = $this->category_model->get_list($s);
			foreach($chill as $d){
				$ids[] += $d->id;
				$ip['where'] = ['parent_id'=>$d->id];
				$listBa = $this->category_model->get_list($ip);
				foreach($listBa as $ba){
					$ids[] += $ba->id;
				}
			}
			$input['where'] = ['hide'=>'0'];
			$input['where_in'] = ['cat_id',$ids];
		}else{
			$input['where'] = ['cat_id'=>$catid];
		}
	
		$total_row = $this->product_model->get_total($input);

		$this->data['total_row'] = $total_row;
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = manufac_url(slug($infoFac->name),$facid,$catid);
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
		
		$input["limit"] = array($config['per_page'], $segment);

		$list = $this->product_model->get_list($input);
		$this->data['list'] = $list;


		//list hãng sản xuất theo danh mục
		$hangsx = unserialize($InfoCat->manufac_ids);
		$listHang = [];
		if(!empty($hangsx)){
		foreach($hangsx as $h){
			$listHang[] = $this->manufac_model->get_info($h);
		}
		}
		$this->data['listHang'] = $listHang;

		$this->data['title'] = $InfoCat->name;
		$this->data['meta_desc'] = $InfoCat->meta_desc;
		$this->data['meta_keyword'] = $InfoCat->meta_key;
		$this->data['og_title'] = $InfoCat->name;
		$this->data['og_image'] = product_link($InfoCat->image_name);
		$this->data['urlhttp'] = category_url(slug($InfoCat->name),$InfoCat->id);

		$this->data['temp'] = "site/manufac/index";
		$this->load->view('site/layout',$this->data);
	}

}
