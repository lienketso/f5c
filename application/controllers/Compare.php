<?php 

class Compare extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('product_option_model');
	}

	public function index(){
		$listcom = $this->input->post('comparelist[]');
		$product = $this->input->get('product');
		if($product){
			$listcom = explode(',',$product);
		}
		$arrProduct = array();
		$productMore = array();
		$arrOptionTitle = array();
		$catId='';
		if(!empty($listcom)){
			foreach($listcom as $key=>$val){
				$product = $this->product_model->get_info($val);
				$arrProduct[] = $product;
				$catId = $product->cat_id;
				$sp['where'] = ['cat_id'=>$product->cat_id,'id!='=>$val];
				$sp['limit'] = [4,0];
				$productMore = $this->product_model->get_list($sp);
			}
		}	
		$arrOptionTitle = $this->product_option_model->getListOptionProduct($listcom);
		$this->data['productMore'] = $productMore;
		$this->data['arrProduct'] = $arrProduct;
		$this->data['arrOptionTitle'] = $arrOptionTitle;
		$this->data['catId'] = $catId;
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

	function addmore(){		
		$id = $this->input->post('id');
		$ssProduct = $this->product_model->get_info($id);
		$input['where'] = ['product_id'=>$id];
        $input['order'] = ['option_id','asc'];
        $listOps = $this->product_option_model->get_list($input);
        $arr = '';	  
        foreach($listOps as $row){
        	$arr = '<li><span>'.$this->product_option_model->getOption($row->option_id).' :</span> '.$row->value.'</li>';
        }
		echo '<div class="col-lg-4 col-xs-6 bao_border" id="com'.$ssProduct->id.'"><div class="item-sp-com"><a class="img-sp-cat" href="'.product_url(slug($ssProduct->name),$ssProduct->id).'"><img src="'.url_tam($ssProduct->image_name).'" alt=""></a><span class="remove_com" data-id="'.$ssProduct->id.'"><img title="Xóa sản phẩm" src="'.public_url('site/img/remove_btn.png').'"></span><h4><a href="'.product_url(slug($ssProduct->name),$ssProduct->id).'">'.$ssProduct->name.'</a></h4><p><span class="price_com">'.number_format($ssProduct->price).' </span></p><div class="ts_kythuat"><ul class="list_ss"><li><span>Bảo hành :</span> '.$ssProduct->warranty.' tháng</li>'.$arr.'</ul></div><div class="btn_comp"><a class="compare_cart" id="'.$ssProduct->id.'" data-id="'.$ssProduct->id.'" data-href="'.base_url('cart/addmulti/').'">Mua sản phẩm</a></div></div></div>';

		die;
	}

	function removeCompare(){
		$this->load->helper('cookie');
		$id = $this->input->post('id');		
		delete_cookie('productid_'.$id);
	}
	
	function loadAutocompleProduct(){
		$catId = $this->input->post('catId');
		$search = $this->input->post('search');
		$arrExclude = $this->input->post('arrExclude');
		$result=  $this->product_model->autocompete($catId,$search,$arrExclude);
		foreach($result  as $item){
			$item->display_price=($item->price==0) ? 'Liên hệ' : number_format($item->price). '₫';
		}
		header('Content-Type: application/json');
		echo json_encode( $result);
		die;
	}

}