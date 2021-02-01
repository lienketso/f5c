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

	function addcompare(){
		$id = $this->input->post('id');
		$ssProduct = $this->product_model->get_info($id);
		echo '<div class="col-lg-3 border_r"><div class="list_compare"><div class="img_compare"><img width="80" src="https://f5c.vn/upload/public/0457c712b41b663a389862231034dbd1.jpg" ></div><div class="info_compare"><h4>'.$ssProduct->name.'</h4></div><a class="del_compare" title="Xóa so sánh">x</a></div></div>';
		die;
	}

}