<?php 

class Compare extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
	}

	public function index(){
		$this->data['temp'] = 'site/compare/index';
		$this->load->view('site/layout',$this->data);
	}

}