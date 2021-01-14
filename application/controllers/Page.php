<?php

Class Page extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('page_model');

	}

	function view(){
		$id = $this->uri->rsegment(3);
		//$catname = $this->uri->segment(2);
		//$where = 'slug="'.$catname.'"';
		$info = $this->page_model->get_info($id);
		if(!$info){
			show_404();
		}
		$this->data['info'] = $info;
		//cấu hình thẻ meta
		//get catemeta
		$lq['where'] = ['id!='=>$info->id];
		$lq['limit'] = [6,0];
		$tinlienquan = $this->page_model->get_list($lq);
		$this->data['tinlienquan'] = $tinlienquan;

        //input to header
		$this->data['meta_title'] = $info->title;
		$this->data['meta_keyword'] = $info->meta_key;
		$this->data['meta_description'] = $info->meta_desc;
		$this->data['og_title'] = $info->title;
		$this->data['og_image'] = '';
		$this->data['og_description'] =$info->meta_desc;
		$this->data['index_link'] = 'index';
		$this->data['follow_link'] = 'follow';
		$this->data['breadcrumb'] = $info->title;
		$this->data['canonical'] = base_url('thong-tin/'.slug($info->title).'/i'.$info->id.'.html');
		$this->data['urlhttp'] = base_url('thong-tin/'.slug($info->title).'/i'.$info->id.'.html');


		$this->data['temp'] = 'site/templates/about';
		$this->load->view('site/layout', $this->data);

	}

}//end class