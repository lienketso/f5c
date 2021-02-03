<?php 

class Compare extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
	}

	public function index(){
		$product = $this->input->get('product');
		$arrProduct = [];
		if($product){
			$productid = explode(',',$product);
			// pre($productid);die;
			foreach($productid as $p){
				$input['where'] = ['id'=>$p];
				$arrProduct[] = $this->product_model->get_info($p);
			}
		}
		$this->data['arrProduct'] = $arrProduct;
		$this->data['temp'] = 'site/compare/index';
		$this->load->view('site/layout',$this->data);
	}

	function addcompare(){
		$this->load->helper('cookie');
		$id = $this->input->post('id');
		setcookie('productid_'.$id,$id,time()+1000,'/'); 
		$listId = get_cookie("productid_".$id);
		$ssProduct = $this->product_model->get_info($id);
		if(!empty($ssProduct)){
		echo '<div class="col-lg-3 border_r" id="'.$ssProduct->id.'"><div class="list_compare"><div class="img_compare"><img width="80" src="'.url_tam($ssProduct->image_name).'" ></div><div class="info_compare"><h4>'.$ssProduct->name.'</h4></div><a class="del_compare" data-url="'.base_url('compare/removeCompare').'" data-id="'.$ssProduct->id.'" title="Xóa so sánh">x</a></div></div>';
		die;
		}
	}

	function removeCompare(){
		$this->load->helper('cookie');
		$id = $this->input->post('id');
		delete_cookie('productid_'.$id);
	}

}