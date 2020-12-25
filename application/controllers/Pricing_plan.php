<?php
Class Pricing_plan extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('product_model');
	}

	function index(){
		$input = array();
		$input = array('status'=>1);
		$input['limit'] = array(3,0);
		$planlist = $this->product_model->get_list($input);
		$this->data['planlist'] = $planlist;

		$this->data['temp'] = 'site/pricing_plan/index';
		$this->load->view('site/layout', $this->data);
	}
}