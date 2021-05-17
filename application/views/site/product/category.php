<?php 
	
	$thu['where'] = ['parent_id'=>$category->id];
	$listThu = $this->category_model->get_list($thu);
	if(empty($listThu)){
     $this->load->view('site/product/templates/list');
	}else{
		 $this->load->view('site/product/templates/parent');
	}
?>