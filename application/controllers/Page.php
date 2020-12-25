<?php

Class Page extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('news_model');

	}

	function view(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		//$catname = $this->uri->segment(2);
		//$where = 'slug="'.$catname.'"';
		$info = $this->news_model->get_info($id);
		$this->data['info'] = $info;
		//cấu hình thẻ meta
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
		$this->data['og_image'] = $info->image;
		$this->data['og_description'] = $arrMeta['og_description'];
		$this->data['index_link'] = $arrMeta['index_link'];
		$this->data['follow_link'] = $arrMeta['follow_link'];
		$this->data['breadcrumb'] = $arrMeta['breadcrumb'];
		$this->data['canonical'] = $arrMeta['canonical'];

		$urlhttp = news_url('',$info->slug,$info->id);

		$this->data['urlhttp'] = $urlhttp;

		$this->data['temp'] = 'site/templates/service/single';
		$this->load->view('site/layout', $this->data);

	}

}//end class